<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\MediaCenter\MediaCenter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Spatie\Activitylog\Models\Activity;

class NewsController extends Controller
{


    public function media_center_logs($id)
    {
        $data = MediaCenter::select('*')->where('id', 11)->first();

        // dd($data->visits->sum('visits_count'));

        $logs = Activity::orderBy('id', 'asc')->where('subject_id', $id)->get();
        $media = MediaCenter::select('title', 'type')->findOrFail($id);

        return view('admin.logs', compact('logs', 'media'));
    }

    public function media_center_Archive_logs($id)
    {
        $logs = Activity::orderBy('id', 'asc')->where('subject_id', $id)->get();

        $media = MediaCenter::onlyTrashed()->select('title', 'type')->findOrFail($id);




        return view('admin.logs', compact('logs', 'media'));
    }

    public function archive_news(Request $request)
    {
        if ($request->ajax()) {

            $data = MediaCenter::query();

            $data = $data->select('*')->onlyTrashed()->with('visits')->where('type', 'news')->orderBy('id', 'desc');


            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                            $url = asset("storage/files/news/$row->basicFile");
                            $part2 = explode('.', $row->basicFile);
                            if ($part2[1] == 'mp4') {
                                // style="display: block" target="_blank"
                                return '
                                <a href="'. $url .'" data-fancybox data-width="640" data-height="360">
                                    <i class="fa-solid fa-video" style="color: #e4e6ef"></i>
                                </a>';

                            }
                            else
                            {
                                return '
                                <a href="'. $url .'" data-fancybox >
                                    <i class="fa-solid fa-image" style="color: #e4e6ef"></i>
                                </a>
                                ';

                            }
                })->escapeColumns([])
                ->addcolumn('visited_count', function ($row) {

                    return $row->visits->sum('visits_count');

                })->escapeColumns([])

                ->addcolumn('publication_at', function ($row) {

                    return Carbon::parse($row->publication_at)->toDateString();
                })

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a onclick="restore(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-info fa-solid fa-trash-can-arrow-up"></i>
                            </a>';
                    $btn .= '<a href=" ' . route("media_center_Archive_logs", $row->id) . '"><i class="text-success fa fa-blog" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a onclick="forceDelete(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';

                    return $btn;
                })
                ->make(true);
        }
        return view('admin.news.archive_news');
    }





    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = MediaCenter::query();

            // Date Range Filtering
            if (isset($request->start_date) && isset($request->end_date)) {
                $start_date = $request->input('start_date');
                $end_date = $request->input('end_date');

                $data->whereBetween('publication_at', [$start_date, $end_date]);
            }

            // Name Filtering
            if (isset($request->title)) {
                $title = $request->input('title');
                $data->where('title', 'like', '%' . $title . '%');
            }

            // Description Filtering
            if (isset($request->desc)) {
                $description = $request->input('desc');
                $data->where('description', 'like', '%' . $description . '%');
            }





            $data = $data->select('*')->where('type', 'news')->orderBy('id', 'desc');



            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                            $url = asset("storage/files/news/$row->basicFile");
                            $part2 = explode('.', $row->basicFile);
                            if ($part2[1] == 'mp4') {
                                // style="display: block" target="_blank"
                                return '
                                <a href="'. $url .'" data-fancybox data-width="640" data-height="360">
                                    <i class="fa-solid fa-video" style="color: #e4e6ef"></i>
                                </a>';

                            }
                            else
                            {
                                return '
                                <a href="'. $url .'" data-fancybox >
                                    <i class="fa-solid fa-image" style="color: #e4e6ef"></i>
                                </a>
                                ';

                            }
                })->escapeColumns([])
                ->addcolumn('visited_count', function ($row) {

                    return $row->visits->sum('visits_count');

                })->escapeColumns([])

                ->addcolumn('publication_at', function ($row) {

                    return Carbon::parse($row->publication_at)->toDateString();
                })

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("media_center_logs", $row->id) . '"><i class="text-success fa fa-blog" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a href=" ' . route("news.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.news.index');
    }


    public function rss()
    {
        $news = MediaCenter::latest()->get();

        return response()->view('admin.news.rss', [
            'news' => $news
        ])->header('Content-Type', 'text/xml');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
                "description" => "required",
                "short_description" => "required|string|min:3|max:255",
                'basicFile'=>"required|mimes:png,jpg,jpeg,mp4", // |max:10240
                "status" => 'required|in:active,unactive,scheduled',
                "showInSlider" => 'required|in:yes,no',
                'publication_at' => 'required',
            ],
            [

                'basicFile.required' => "حقل الصورة مصلوب",
                'basicFile.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg او mp4",

                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'description.required' => "حقل الوصف مصلوب",

                'short_description.required' => "حقل الوصف المختصر مطلوب",
                'short_description.min' => "يجب ان يكون الوصف المختصر اكبر من ثلاث حروف",
                'short_description.max' => "الوصف المختصر كبير للغاية",

                'publication_at.required' => 'حقل تاريخ النشر مطلوب',
                'status.required' => 'حقل حالة الخبر مطلوب',
                'status.in' => 'يجب ادخال قيمة صحيحة في حقل حالة الخبر',

                'showInSlider.required' => 'حقل عرض الخبر مطلوب',
                'showInSlider.in' => 'يجب ادخال قيمة صحيحة في حقل عرض الخبر',


            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            // dd($request->file('files'));

            $slug = Str::slug($request->post('title'));

            $validate = MediaCenter::where('slug', $slug)->first();

            if($validate != null) {
                return Response::make(['errors' => 'تمت إضافة العنوان مسبقا'], 400);
            }

            $file = $request->file('basicFile');
            $basicFileName = time() . $file->getClientOriginalName();
            $file->storeAs('files/news', $basicFileName, ['disk' => 'public']);

            $store = MediaCenter::create([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "short_description" => $request->post('short_description'),
                "slug" => $slug,
                "type" => "news",
                "status" => $request->post('status'),
                "showInSlider" => $request->post('showInSlider'),
                "basicFile" => $basicFileName,
                "publication_at" => $request->post('publication_at'),
            ]);


            // // start upload image
            if ($request->file('files')) {

                $request->validate([
                    "files" => "required|array",
                    'files.*'=>"required|file|mimes:png,jpg,jpeg,mp4",
                ], [
                    "files.required" => "الصورة مطلوبة",
                    'files.*.required' => "حقل الصورة مصلوب",
                    'files.*.image' => "يجب ان يكون نوع الملف صورة",
                    'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"
                ]);

                foreach ($request->file('files') as $file) {
                    // foreach ($file as $f) {
                        $fileName = time() . $file->getClientOriginalName();
                        $file->storeAs('files/news', $fileName, ['disk' => 'public']);
                        $store->files()->create([
                            "filename" => $fileName,
                        ]);
                    // }
                    // break;
                }
            }
            // // end upload image




            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = MediaCenter::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = MediaCenter::findOrFail($id);
        try {

            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
                "description" => "required",
                "short_description" => "required|string|min:3|max:255",
                // "files" => "required|array",
                // 'files.*'=>"required|file|mimes:png,jpg,jpeg,mp4", // |max:10240
                // 'basicFile'=>"required|mimes:png,jpg,jpeg,mp4", // |max:10240
                "status" => 'required|in:active,unactive,scheduled',
                "showInSlider" => 'required|in:yes,no',
                'publication_at' => 'required',
            ],
            [
                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'description.required' => "حقل الوصف مصلوب",

                'short_description.required' => "حقل الوصف المختصر مطلوب",
                'short_description.min' => "يجب ان يكون الوصف المختصر اكبر من ثلاث حروف",
                'short_description.max' => "الوصف المختصر كبير للغاية",

                'publication_at.required' => 'حقل تاريخ النشر مطلوب',
                'status.required' => 'حقل حالة الخبر مطلوب',
                'status.in' => 'يجب ادخال قيمة صحيحة في حقل حالة الخبر',

                'showInSlider.required' => 'حقل عرض الخبر مطلوب',
                'showInSlider.in' => 'يجب ادخال قيمة صحيحة في حقل عرض الخبر',

                // "basicFile.required" => "الصور مطلوبة",
                // 'basicFile.required' => "حقل الصورة مصلوب",
                // 'files.*.image' => "يجب ان يكون نوع الملف صورة",
                // 'basicFile.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg او mp4",
                // 'basicFile.max' => "يجب ان يكون حجم الصورة اقل من 30 ميجا"
            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            if ($file = $request->file('basicFile')) {
                $basicFileName = time() . $file->getClientOriginalName();
                $file->storeAs('files/news', $basicFileName, ['disk' => 'public']);
                Storage::disk('public')->delete("files/news/$news->basicFile");
            }

            $update = $news->update([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "short_description" => $request->post('short_description'),
                "status" => $request->post('status'),
                "publication_at" => $request->post('publication_at'),

                "showInSlider" => $request->post('showInSlider'),
                "basicFile" => $basicFileName ?? $news->basicFile,
            ]);


            // start upload image
            if ($request->file('files')) {

                $request->validate([
                    "files" => "required|array",
                    'files.*'=>"required|file|mimes:png,jpg,jpeg,mp4",
                ], [
                    "files.required" => "الصورة مطلوبة",
                    'files.*.required' => "حقل الصورة مصلوب",
                    'files.*.image' => "يجب ان يكون نوع الملف صورة",
                    'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"
                ]);

                //Now check validation:
                if ($validator->fails()) {
                    return Response::make(['errors' => $validator->errors()->first()], 400);
                }

                foreach ($request->file('files') as $file) {
                    // foreach ($file as $f) {
                        $fileName = time() . $file->getClientOriginalName();
                        $file->storeAs('files/news', $fileName, ['disk' => 'public']);
                        $storeFile = File::create([
                            'filename' => $fileName,
                            'fileable_id' => $id,
                            'fileable_type' => 'App\Models\MediaCenter\MediaCenter'
                        ]);
                    // }
                    // break;
                }
            }
            // end upload image




            session()->flash('update');
            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->getMessage(),
            ], 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $delete = MediaCenter::findOrFail($id);
            $delete->delete();

            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
        }
    }

    public function confirmForceDelete(Request $request, string $id)
    {
        try {
            $delete = MediaCenter::withTrashed()->findOrFail($id);
            foreach ($delete->files as $image) {
                $fileName = $image->filename;
                Storage::disk('public')->delete("files/news/$fileName");
                $image->delete();
            }
            Storage::disk('public')->delete("files/news/$delete->basicFile");
            $delete->forceDelete();


            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
        }
    }



    public function restore(Request $request, string $id)
    {
        try {
            $delete = MediaCenter::withTrashed()->findOrFail($id);
            $delete->restore();


            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
        }
    }



    public function deleteImage(request $request, string $id)
    {
        try {
            $delete = File::findOrFail($id);
            if ($request->typeModel == 'news') {
                Storage::disk('public')->delete("files/news/$delete->filename");
            }

            else if ($request->typeModel == 'activity') {
                Storage::disk('public')->delete("files/activities/$delete->filename");
            }

            else if ($request->typeModel == 'image') {
                Storage::disk('public')->delete("files/images/$delete->filename");
            }

            else if ($request->typeModel == 'video') {
                Storage::disk('public')->delete("files/videos/$delete->filename");
            }

            else {
                Storage::disk('public')->delete("$delete->filename");
            }

            $delete->delete();
            return response()->json([

                'status' => 'success',
            ], 201);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
        }
    }
}
