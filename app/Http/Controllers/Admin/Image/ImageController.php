<?php

namespace App\Http\Controllers\Admin\Image;

use App\Http\Controllers\Controller;
use App\Models\File;
// use App\Models\Audit;
// use App\Models\LoginLog;
use App\Models\MediaCenter\MediaCenter;
// use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Yajra\DataTables\Services\Datatables;
// use App\DataTables\NewsDataTable;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use Yajra\DataTables\Facades\DataTables;

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

            // Description Filtering
            // if (isset($request->desc)) {
            //     $description = $request->input('desc');
            //     $data->where('description', 'like', '%' . $description . '%');
            // }





            $data = $data->select('*')->where('type', 'image')->orderBy('id', 'desc');



            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {
                    // if ($row->files->first() != null) {
                        // foreach ($row->files as $image) {

                            $url = asset("storage/files/images/$row->basicFile");
                            $part2 = explode('.', $row->basicFile);
                            if ($part2[1] == 'mp4') {
                                // style="display: block" target="_blank"
                                return '
                                <a href="'. $url .'" data-fancybox data-width="640" data-height="360">
                                    <i class="fa-solid fa-video" style="color: #e4e6ef"></i>
                                </a>';

                                // <img height="70px" width="80px" src="http://i3.ytimg.com/vi/dZRqB0JLizw/h" />
                                // <video height="70px" width="80px">
                                //     <source src="'. $url .'" type="video/mp4">
                                //     <source src="'. $url .'" type="video/mp4">
                                //     <source src="'. $url .'" type="video/mp4">
                                // </video>
                            }
                            else
                            {
                                return '
                                <a href="'. $url .'" data-fancybox >
                                    <i class="fa-solid fa-image" style="color: #e4e6ef"></i>
                                </a>
                                ';

                                // <img height="60px" width="70px" style="border-radius: 7px" src="' . $url . '">
                            }
                            // break;
                        // }

                    // } else {
                    //     return 'لا يوجد صورة';
                    // }
                })->escapeColumns([])
                // ->addcolumn('status', function ($row) {

                //     $checked = $row->status == 'active' ? 'checked' : '';
                //     if ($row->status == 'active') {
                //         $status = "1";
                //     } else {
                //         $status = "2";
                //     }

                //     return "<input $checked onchange='checkboxFun($status, $row->id)' type='checkbox' style='height: 20px; width: 20px;'>";
                // })->escapeColumns([])
                ->addcolumn('visited_count', function ($row) {

                    // return $row->visits->sum('visits_count');
                    return '0';
                    // return '<a href=" ' . route("news.show", $row->id) . '">'. $row->visits->sum('visits_count') .'</a>';

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


    // public function logDetails($id)
    // {
    //     // $audits = News::findOrFail($id);
    //     // $audits = News::with('audits')->findOrFail($id);
    //     // $audits = DB::table('audits')->select('*')->where('id', $id)->first();
    //             // ->where('auditable_type', 'App\Models\News')->get();


    //     $audits = Audit::findOrFail($id);

    //     // dd($audits->user_agent);
    //     // dd($audits);

    //     return view('admin.news.logDetails', compact('audits'));
    // }


    // public function logNews(Request $request)
    // {

    //     // dd('qwe');

    //     // $logs = DB::table('audits')->select('*')
    //     // ->join('users', 'audits.user_id', '=', 'users.id')
    //     // // ->join('news', 'audits.auditable_id', '=', 'news.id')
    //     // ->where('auditable_type', 'App\Models\News')->get();

    //     // $logs = Audit::with(['news', 'user'])->get();
    //     // dd(json_decode($logs[0]->old_values)->title_ar);
    //     //$row->news->title_ar ?? $row->old_values->title_ar


    //     if($request->ajax()) {

    //         // $data = DB::table('audits')->select('*')
    //         //     ->join('users', 'audits.user_id', '=', 'users.id')
    //         //     ->join('news', 'audits.auditable_id', '=', 'news.id')
    //         //     ->where('auditable_type', 'App\Models\News')->get();

    //         $data = Audit::orderBy('id', 'desc')->with(['news', 'user']);



    //         return FacadesDataTables::of($data)
    //             ->addColumn('event', function ($row) {
    //                 if ($row->event == 'deleted')
    //                 {
    //                     $btn = '';
    //                     $btn .= '<a><i class="fa-solid fa-trash" style="font-size: 15px; color:rgb(196, 30, 58)"></i>&nbsp;&nbsp;&nbsp;</a>';
    //                     $btn .= '<a title="عرض التفاصيل" href=" ' . route('logDetails', [$row->id ?? json_decode($row->old_values)->id]) . '"><i style="font-size: 15px; color:rgb(50, 205, 50)" class="fa-solid fa-eye"></i></a>';
    //                     return $btn;
    //                 }
    //                 else if($row->event == 'updated')
    //                 {
    //                     $btn = '';
    //                     $btn .= '<a><i class="fa-solid fa-pen-clip" style="font-size: 15px; color:rgb(0, 119, 190)"></i>&nbsp;&nbsp;&nbsp;</a>';
    //                     $btn .= '<a title="عرض التفاصيل" href=" ' . route('logDetails', [$row->id]) . '"><i style="font-size: 15px; color:rgb(50, 205, 50)" class="fa-solid fa-eye"></i></a>';
    //                     return $btn;
    //                 }
    //                 else
    //                 {
    //                     $btn = '';
    //                     $btn .= '<a><i class="fa-solid fa-plus" style="font-size: 15px; color:rgb(50, 205, 50)"></i>&nbsp;&nbsp;&nbsp;</a>';
    //                     $btn .= '<a title="عرض التفاصيل" href=" ' . route('logDetails', [$row->id]) . '"><i style="font-size: 15px; color:rgb(50, 205, 50)" class="fa-solid fa-eye"></i></a>';
    //                     return $btn;
    //                 }

    //                 // return '<a href=" ' . route("news.show", $row->id) . '">'.$title.'</a>';
    //             })->escapeColumns([])



    //             ->addcolumn('created_at', function ($row) {
    //                 Carbon::setLocale('ar');
    //                 // return $row->created_at->diffForHumans();

    //                 return Carbon::parse($row->created_at)->diffForHumans();
    //                 // return __('تم النشر منذ', ['time' => $row->created_at->diffForHumans()]);

    //                 // return trans('منذ', [$row->created_at->diffForHumans()]);

    //             })->escapeColumns([])

    //             // ->addcolumn('title_ar', function ($row) {
    //             //     return $row->title_ar;

    //             // })->escapeColumns([])


    //             ->addColumn('news_id', function ($row) {
    //                 $title = $row->news->title_ar ?? json_decode($row->old_values)->title_ar ?? "خبر محذوف";

    //                 if ($row->event == 'updated')
    //                 {
    //                     return '<span class="spanPop" style="background-color:rgb(0, 119, 190);"></span>' . mb_substr($title, 0, 50, 'UTF-8');
    //                 }
    //                 else if($row->event == 'deleted')
    //                 {
    //                     return '<span class="spanPop" style="background-color:rgb(196, 30, 58)"></span>' . mb_substr($title, 0, 50, 'UTF-8');
    //                 }
    //                 else
    //                 {
    //                     return '<span class="spanPop" style="background-color:rgb(50, 205, 50)"></span>' . mb_substr($title, 0, 50, 'UTF-8');
    //                 }

    //             })->escapeColumns([])



    //             ->addColumn('user_id', function ($row) {
    //                 return $row->user->name;
    //             })
    //             ->make(true);
    //     }
    //     return view('admin.news.logs');
    // }




    // public function status(Request $request)
    // {
    //     try {
    //         $request->validate([
    //             'id' => 'required',
    //             'status' => 'required',
    //         ]);
    //         $news = News::findOrfail($request->id);
    //         if ($request->status == '2') {
    //             $news->status = 'active';
    //         } else if ($request->status == '1') {
    //             $news->status = 'unactive';
    //         }

    //         $news->save();

    //         return response()->json([
    //             'status' => 'success',
    //         ], 201);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => 'error',
    //         ], 400);
    //     }
    // }


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
                // "description" => "required",
                // "short_description" => "required|string|min:3|max:255",
                'basicFile'=>"required|mimes:png,jpg,jpeg,mp4", // |max:10240
                "status" => 'required|in:active,unactive,scheduled',
                // "showInSlider" => 'required|in:yes,no',
                'publication_at' => 'required',

                "files" => "required|array",
                'files.*'=>"required|file|mimes:png,jpg,jpeg,mp4",

            ],
            [

                // 'basicFile.file' => "رجاء اختيار ملف",
                'basicFile.required' => "حقل الصورة مصلوب",
                'basicFile.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg او mp4",
                // 'basicFile.max' => "يجب ان يكون حجم الصورة اقل من 30 ميجا",

                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                // 'description.required' => "حقل الوصف مصلوب",

                // 'short_description.required' => "حقل الوصف المختصر مطلوب",
                // 'short_description.min' => "يجب ان يكون الوصف المختصر اكبر من ثلاث حروف",
                // 'short_description.max' => "الوصف المختصر كبير للغاية",

                'publication_at.required' => 'حقل تاريخ النشر مطلوب',
                'status.required' => 'حقل حالة الخبر مطلوب',
                'status.in' => 'يجب ادخال قيمة صحيحة في حقل حالة الخبر',

                "files.required" => "الصورة مطلوبة",
                'files.*.required' => "حقل الصورة مصلوب",
                'files.*.image' => "يجب ان يكون نوع الملف صورة",
                'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"

                // 'showInSlider.required' => 'حقل عرض الخبر مطلوب',
                // 'showInSlider.in' => 'يجب ادخال قيمة صحيحة في حقل عرض الخبر',


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
                // "description" => $request->post('description'),
                // "short_description" => $request->post('short_description'),
                "slug" => $slug,
                "type" => "image",
                "status" => $request->post('status'),
                // "showInSlider" => $request->post('showInSlider'),
                "basicFile" => $basicFileName,
                "publication_at" => $request->post('publication_at'),
            ]);


            // $request->validate([

            // ], [

            // ]);

            foreach ($request->file('files') as $file) {
                // foreach ($file as $f) {
                    $fileName = time() . $file->getClientOriginalName();
                    $file->storeAs('files/images', $fileName, ['disk' => 'public']);
                    $store->files()->create([
                        "filename" => $fileName,
                    ]);
                // }
                // break;
            }




            // // start upload image
            // if ($request->file('files')) {


            // }
            // // end upload image

            // $userAgent = $request->header('User-Agent');
            // if (strpos($userAgent, 'Mobile') !== false) {
            //     $userAgent = "Mobile";
            // } elseif (strpos($userAgent, 'Tablet') !== false) {
            //     $userAgent = "Tablet";
            // } else {
            //     $userAgent = "PC";
            // }

            // LoginLog::create([
            //     'user_id' => auth()->user()->id,
            //     'news_id' => $store->id,
            //     'ip_address' => request()->ip(),
            //     'user_device' => $userAgent,
            //     'type' => 'news',
            //     'process' => 'إضافة'
            // ]);



            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
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
                // "description" => "required",
                // "short_description" => "required|string|min:3|max:255",
                // "files" => "required|array",
                // 'files.*'=>"required|file|mimes:png,jpg,jpeg,mp4", // |max:10240
                // 'basicFile'=>"required|mimes:png,jpg,jpeg,mp4", // |max:10240
                "status" => 'required|in:active,unactive,scheduled',
                // "showInSlider" => 'required|in:yes,no',
                'publication_at' => 'required',
            ],
            [
                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                // 'description.required' => "حقل الوصف مصلوب",

                // 'short_description.required' => "حقل الوصف المختصر مطلوب",
                // 'short_description.min' => "يجب ان يكون الوصف المختصر اكبر من ثلاث حروف",
                // 'short_description.max' => "الوصف المختصر كبير للغاية",

                'publication_at.required' => 'حقل تاريخ النشر مطلوب',
                'status.required' => 'حقل حالة الخبر مطلوب',
                'status.in' => 'يجب ادخال قيمة صحيحة في حقل حالة الخبر',

                // 'showInSlider.required' => 'حقل عرض الخبر مطلوب',
                // 'showInSlider.in' => 'يجب ادخال قيمة صحيحة في حقل عرض الخبر',

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
                $file->storeAs('files/images', $basicFileName, ['disk' => 'public']);
            }

            $update = $news->update([
                "title" => $request->post('title'),
                // "description" => $request->post('description'),
                // "short_description" => $request->post('short_description'),
                "status" => $request->post('status'),
                "publication_at" => $request->post('publication_at'),
                // "showInSlider" => $request->post('showInSlider'),
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
                    // foreach ($file as $f) {
                        $fileName = time() . $file->getClientOriginalName();
                        $file->storeAs('files/images', $fileName, ['disk' => 'public']);
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

            // $userAgent = $request->header('User-Agent');
            // if (strpos($userAgent, 'Mobile') !== false) {
            //     $userAgent = "Mobile";
            // } elseif (strpos($userAgent, 'Tablet') !== false) {
            //     $userAgent = "Tablet";
            // } else {
            //     $userAgent = "PC";
            // }

            // LoginLog::create([
            //     'user_id' => auth()->user()->id,
            //     'news_id' => $id,
            //     'ip_address' => request()->ip(),
            //     'user_device' => $userAgent,
            //     'type' => 'news',
            //     'process' => 'تعديل'
            // ]);



            session()->flash('update');
            return response()->json([
                'status' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        try {
            $delete = MediaCenter::findOrFail($id);
            // foreach ($delete->files as $image) {
            //     $fileName = $image->filename;
            //     Storage::disk('public')->delete("files/images/$fileName");
            //     $image->delete();
            // }
            // Storage::disk('public')->delete("files/images/$delete->basicFile");
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
            // return redirect()->route('news.index');
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'faild',
                'errors' => $e->getMessage(),
            ], 400);
            // return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
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
