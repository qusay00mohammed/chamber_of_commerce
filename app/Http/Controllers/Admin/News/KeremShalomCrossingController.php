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

class KeremShalomCrossingController extends Controller
{

    public function archive_keremShalom(Request $request)
    {
        if ($request->ajax()) {

            $data = MediaCenter::query();

            $data = $data->select('*')->onlyTrashed()->where('type', 'keremShalom')->orderBy('id', 'desc');



            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                            $url = asset("storage/$row->basicFile");
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
        return view('admin.news.keremShalom.archive_keremShalom');
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





            $data = $data->select('*')->where('type', 'keremShalom')->orderBy('id', 'desc');



            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                    $url = asset("storage/$row->basicFile");
                    $part2 = explode('.', $row->basicFile);
                    if ($part2[1] == 'mp4') {
                        return '
                                <a href="' . $url . '" data-fancybox data-width="640" data-height="360">
                                    <i class="fa-solid fa-video" style="color: #e4e6ef"></i>
                                </a>';
                    } else {
                        return '
                                <a href="' . $url . '" data-fancybox >
                                    <i class="fa-solid fa-image" style="color: #e4e6ef"></i>
                                </a>
                                ';

                    }
                })->escapeColumns([])
                ->addcolumn('visited_count', function ($row) {

                    // return $row->visits->sum('visits_count');
                    return $row->visits->sum('visits_count');
                    // return '<a href=" ' . route("news.show", $row->id) . '">'. $row->visits->sum('visits_count') .'</a>';

                })->escapeColumns([])

                ->addcolumn('publication_at', function ($row) {

                    return Carbon::parse($row->publication_at)->toDateString();
                })

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("media_center_logs", $row->id) . '"><i class="text-success fa fa-blog" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a href=" ' . route("keremShalomCrossing.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.news.keremShalom.index');
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
        return view('admin.news.keremShalom.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    "title" => "required|string|min:3|max:255",
                    "description" => "required",
                    "short_description" => "required|string|min:3|max:255",
                    'basicFile' => "required|mimes:png,jpg,jpeg,mp4", // |max:10240
                    "status" => 'required|in:active,unactive,scheduled',
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

                ]
            );

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            $slug = Str::slug($request->post('title'));

            $validate = MediaCenter::where('slug', $slug)->first();

            if ($validate != null) {
                return Response::make(['errors' => 'تمت إضافة العنوان مسبقا'], 400);
            }

            $file = $request->file('basicFile');
            $basicFileName = time() . $file->getClientOriginalName();
            $pathbasicimage = $file->storeAs('files/news/keremShalom', $basicFileName, ['disk' => 'public']);

            $store = MediaCenter::create([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "short_description" => $request->post('short_description'),
                "slug" => $slug,
                "type" => "keremShalom",
                "status" => $request->post('status'),
                "basicFile" => $pathbasicimage,
                "publication_at" => $request->post('publication_at'),
            ]);


            // // start upload image
            if ($request->file('files')) {

                $request->validate([
                    "files" => "required|array",
                    'files.*' => "required|file|mimes:png,jpg,jpeg,mp4",
                ], [
                    "files.required" => "الصورة مطلوبة",
                    'files.*.required' => "حقل الصورة مصلوب",
                    'files.*.image' => "يجب ان يكون نوع الملف صورة",
                    'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"
                ]);

                foreach ($request->file('files') as $file) {
                    $fileName = time() . $file->getClientOriginalName();
                    $path_file = $file->storeAs('files/news/keremShalom', $fileName, ['disk' => 'public']);
                    $store->files()->create([
                        "filename" => $path_file,
                    ]);
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
        // $news = MediaCenter::findOrFail($id);
        // return view('admin.news.visits', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = MediaCenter::findOrFail($id);
        return view('admin.news.keremShalom.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $news = MediaCenter::findOrFail($id);
        try {

            $validator = Validator::make(
                $request->all(),
                [
                    "title" => "required|string|min:3|max:255",
                    "description" => "required",
                    "short_description" => "required|string|min:3|max:255",
                    "status" => 'required|in:active,unactive,scheduled',
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
                ]
            );

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            if ($file = $request->file('basicFile')) {

                Storage::disk('public')->delete("$news->basicFile");
                $basicFileName = time() . $file->getClientOriginalName();
                $pathImage = $file->storeAs('files/news/keremShalom', $basicFileName, ['disk' => 'public']);
            }

            $update = $news->update([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "short_description" => $request->post('short_description'),
                "status" => $request->post('status'),
                "publication_at" => $request->post('publication_at'),
                "basicFile" => $pathImage ?? $news->basicFile,
            ]);


            // start upload image
            if ($request->file('files')) {

                $request->validate([
                    "files" => "required|array",
                    'files.*' => "required|file|mimes:png,jpg,jpeg",
                ], [
                    "files.required" => "الصورة مطلوبة",
                    'files.*.required' => "حقل الصورة مصلوب",
                    'files.*.image' => "يجب ان يكون نوع الملف صورة",
                    'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"
                ]);

                foreach ($request->file('files') as $file) {
                    $fileName = time() . $file->getClientOriginalName();
                    $path = $file->storeAs('files/news/keremShalom', $fileName, ['disk' => 'public']);
                    $storeFile = File::create([
                        'filename' => $path,
                        'fileable_id' => $id,
                        'fileable_type' => 'App\Models\MediaCenter\MediaCenter'
                    ]);
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
    public function destroy(string $id)
    {
        try {
            $delete = MediaCenter::findOrFail($id);
            // foreach ($delete->files as $image) {
            //     $fileName = $image->filename;
            //     Storage::disk('public')->delete("$fileName");
            //     $image->delete();
            // }
            // Storage::disk('public')->delete("$delete->basicFile");
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



    public function deleteImage(request $request, string $id)
    {
        try {
            $delete = File::findOrFail($id);
            if ($request->typeModel == 'news') {
                Storage::disk('public')->delete("files/news/$delete->filename");
            } else if ($request->typeModel == 'activity') {
                Storage::disk('public')->delete("files/activities/$delete->filename");
            } else if ($request->typeModel == 'image') {
                Storage::disk('public')->delete("files/images/$delete->filename");
            } else if ($request->typeModel == 'video') {
                Storage::disk('public')->delete("files/videos/$delete->filename");
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
