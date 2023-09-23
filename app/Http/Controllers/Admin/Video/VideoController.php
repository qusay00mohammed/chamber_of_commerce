<?php

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\MediaCenter\MediaCenter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
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

            $data = $data->select('*')->where('type', 'video')->orderBy('id', 'desc');



            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                    return '<a href="'. $row->basicFile .'" data-fancybox data-width="640" data-height="360">
                                <i class="fa-solid fa-video" style="color: #e4e6ef"></i>
                            </a>';


                })->escapeColumns([])

                ->addcolumn('publication_at', function ($row) {

                    return Carbon::parse($row->publication_at)->toDateString();
                })

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("videos.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.videos.index');
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
        return view('admin.videos.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        activity()->disableLogging();

        // dd(json_decode($request->repeaterData));
        try {
            $validator = Validator::make($request->all(), [
                'basicFile'=>"required|url", // |max:10240
                "status" => 'required|in:active,unactive,scheduled',
                'publication_at' => 'required',
            ],
            [

                'basicFile.required' => "حقل الصورة مصلوب",
                'basicFile.url' => "الرجاء ادخال رابط صحيح",

                'publication_at.required' => 'حقل تاريخ النشر مطلوب',
                'status.required' => 'حقل حالة الخبر مطلوب',
                'status.in' => 'يجب ادخال قيمة صحيحة في حقل حالة الخبر',

            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }


            $store = MediaCenter::create([
                "title" => 'null',
                "slug" => $request->post('basicFile') . $request->post('status') . $request->post('publication_at'),
                "type" => "video",
                "status" => $request->post('status'),
                "basicFile" => $request->post('basicFile'),
                "publication_at" => $request->post('publication_at'),
            ]);


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
        return view('admin.videos.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        activity()->disableLogging();
        $news = MediaCenter::findOrFail($id);
        try {

            $validator = Validator::make($request->all(), [
                "status" => 'required|in:active,unactive,scheduled',
                'publication_at' => 'required',
            ],
            [

                'publication_at.required' => 'حقل تاريخ النشر مطلوب',
                'status.required' => 'حقل حالة الخبر مطلوب',
                'status.in' => 'يجب ادخال قيمة صحيحة في حقل حالة الخبر',

            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }


            $update = $news->update([
                "title" => 'null',
                "status" => $request->post('status'),
                "publication_at" => $request->post('publication_at'),
                "basicFile" => $request->post('basicFile') ?? $news->basicFile,
            ]);

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
        activity()->disableLogging();
        try {
            $delete = MediaCenter::findOrFail($id);
            foreach ($delete->files as $image) {
                $fileName = $image->filename;
                Storage::disk('public')->delete("files/images/$fileName");
                $image->delete();
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


    public function deleteImage(request $request, string $id)
    {
        activity()->disableLogging();
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
}
