<?php

namespace App\Http\Controllers\Admin\Image;

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

class ImageController extends Controller
{

    public function archive_image(Request $request)
    {
        if ($request->ajax()) {

            $data = MediaCenter::query();

            $data = $data->select('*')->onlyTrashed()->where('type', 'image')->orderBy('id', 'desc');



            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                            $url = asset("storage/files/images/$row->basicFile");
                            $part2 = explode('.', $row->basicFile);
                            if ($part2[1] == 'mp4') {
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
        return view('admin.images.archive_image');
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

            $data = $data->select('*')->where('type', 'image')->orderBy('id', 'desc');

            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                            $url = asset("storage/files/images/$row->basicFile");
                            $part2 = explode('.', $row->basicFile);
                            if ($part2[1] == 'mp4') {
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

                    return '0';

                })->escapeColumns([])

                ->addcolumn('publication_at', function ($row) {

                    return Carbon::parse($row->publication_at)->toDateString();
                })

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("media_center_logs", $row->id) . '"><i class="text-success fa fa-blog" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a href=" ' . route("images.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.images.index');
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
        return view('admin.images.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
                'basicFile'=>"required|mimes:png,jpg,jpeg,mp4", // |max:10240
                "status" => 'required|in:active,unactive,scheduled',
                'publication_at' => 'required',

                "files" => "required|array",
                'files.*'=>"required|file|mimes:png,jpg,jpeg,mp4",

            ],
            [

                'basicFile.required' => "حقل الصورة مصلوب",
                'basicFile.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg او mp4",

                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'publication_at.required' => 'حقل تاريخ النشر مطلوب',
                'status.required' => 'حقل حالة الخبر مطلوب',
                'status.in' => 'يجب ادخال قيمة صحيحة في حقل حالة الخبر',

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

            // dd($request->file('files'));

            $slug = Str::slug($request->post('title'));

            $validate = MediaCenter::where('slug', $slug)->first();

            if($validate != null) {
                return Response::make(['errors' => 'تمت إضافة العنوان مسبقا'], 400);
            }

            $file = $request->file('basicFile');
            $basicFileName = time() . $file->getClientOriginalName();
            $file->storeAs('files/images', $basicFileName, ['disk' => 'public']);

            $store = MediaCenter::create([
                "title" => $request->post('title'),
                "slug" => $slug,
                "type" => "image",
                "status" => $request->post('status'),
                "basicFile" => $basicFileName,
                "publication_at" => $request->post('publication_at'),
            ]);





            foreach ($request->file('files') as $file) {
                    $fileName = time() . $file->getClientOriginalName();
                    $file->storeAs('files/images', $fileName, ['disk' => 'public']);
                    $store->files()->create([
                        "filename" => $fileName,
                    ]);
            }

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
        return view('admin.images.edit', compact('news'));
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
                "status" => 'required|in:active,unactive,scheduled',
                'publication_at' => 'required',
            ],
            [
                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",


                'publication_at.required' => 'حقل تاريخ النشر مطلوب',
                'status.required' => 'حقل حالة الخبر مطلوب',
                'status.in' => 'يجب ادخال قيمة صحيحة في حقل حالة الخبر',

            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            if ($file = $request->file('basicFile')) {
                $basicFileName = time() . $file->getClientOriginalName();
                $file->storeAs('files/images', $basicFileName, ['disk' => 'public']);
            }

            $update = $news->update([
                "title" => $request->post('title'),
                "status" => $request->post('status'),
                "publication_at" => $request->post('publication_at'),
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

                foreach ($request->file('files') as $file) {
                        $fileName = time() . $file->getClientOriginalName();
                        $file->storeAs('files/images', $fileName, ['disk' => 'public']);
                        $storeFile = File::create([
                            'filename' => $fileName,
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


    public function deleteImage(request $request, string $id)
    {
        try {
            $delete = File::findOrFail($id);
            if ($request->typeModel == 'news') {
                Storage::disk('public')->delete("files/news/$delete->filename");
            }

            if ($request->typeModel == 'activity') {
                Storage::disk('public')->delete("files/activities/$delete->filename");
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

    public function confirmForceDelete(Request $request, string $id)
    {
        try {
            $delete = MediaCenter::withTrashed()->findOrFail($id);
            foreach ($delete->files as $image) {
                $fileName = $image->filename;
                Storage::disk('public')->delete("files/images/$fileName");
                $image->delete();
            }
            Storage::disk('public')->delete("files/images/$delete->basicFile");
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



}
