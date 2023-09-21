<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Service::query();

            $data = $data->select('*')->orderBy('id', 'desc');



            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('icon_image', function ($row) {

                    $url = asset("storage/$row->icon_image");
                        return '<a href="'. $url .'" data-fancybox ><i class="fa-solid fa-image" style="color: #e4e6ef"></i></a>';

                })->escapeColumns([])

                ->addColumn('background_image', function ($row) {

                    $url = asset("storage/$row->background_image");
                        return '<a href="'. $url .'" data-fancybox ><i class="fa-solid fa-image" style="color: #e4e6ef"></i></a>';

                })->escapeColumns([])

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("services.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.add');
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
                "background_image" => "required|array",
                'background_image.*'=>"required|image|mimes:png,jpg,jpeg,mp4",
                "icon_image" => "required|array",
                'icon_image.*'=>"required|file|mimes:png,jpg,jpeg,mp4",
            ],
            [

                "background_image.required" => "صورة الخلفية مطلوبة",
                'background_image.*.required' => "حقل صورة الخلفية مطلوب",
                'background_image.*.image' => "الرجاء ادخال صورة خلفية صحيحة",
                'background_image.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'background_image.*.max' => "يجب ان يكون حجم صورة الخلفية اقل من 3 ميجا",

                "icon_image.required" => "صورة الايقونة مطلوبة",
                'icon_image.*.required' => "حقل صورة الايقونة مطلوب",
                'icon_image.*.image' => "الرجاء ادخال صورة ايقونة صحيحة",
                'icon_image.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'icon_image.*.max' => "يجب ان يكون حجم صورة الايقونة اقل من 3 ميجا",

                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'description.required' => "حقل الوصف مصلوب",
            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            // start upload image

            foreach ($request->file('background_image') as $file) {
                // $background_image = range(1, 100) . time() . range(1, 100);
                $background_image = time() . $file->getClientOriginalName();
                $background_image_url = $file->storeAs('files/services', $background_image, ['disk' => 'public']);
                break;
            }

            foreach ($request->file('icon_image') as $file) {
                $icon_image = time() . $file->getClientOriginalName();
                $icon_image_url = $file->storeAs('files/services', $icon_image, ['disk' => 'public']);
                break;
            }
            // end upload image




            $store = Service::create([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "background_image" => $background_image_url,
                "icon_image" => $icon_image_url,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $service = Service::findOrFail($id);

            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
                "description" => "required",
            ],
            [
                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'description.required' => "حقل الوصف مصلوب",
            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            // start upload image

            if ($request->file('background_image')) {

                $validator = Validator::make($request->all(), [
                    "background_image" => "required|array",
                    'background_image.*'=>"required|image|mimes:png,jpg,jpeg,mp4",
                ],
                [
                    "background_image.required" => "صورة الخلفية مطلوبة",
                    'background_image.*.required' => "حقل صورة الخلفية مطلوب",
                    'background_image.*.image' => "الرجاء ادخال صورة خلفية صحيحة",
                    'background_image.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'background_image.*.max' => "يجب ان يكون حجم صورة الخلفية اقل من 3 ميجا",
                ]);

                //Now check validation:
                if ($validator->fails()) {
                    return Response::make(['errors' => $validator->errors()->first()], 400);
                }

                foreach ($request->file('background_image') as $file) {
                    // $background_image = range(1, 100) . time() . range(1, 100);
                    $background_image = time() . $file->getClientOriginalName();
                    $background_image_url = $file->storeAs('files/services', $background_image, ['disk' => 'public']);
                    break;
                }
                Storage::disk('public')->delete("$service->background_image");
            }

            if ($request->file('icon_image')) {

                $validator = Validator::make($request->all(), [
                    "icon_image" => "required|array",
                    'icon_image.*'=>"required|file|mimes:png,jpg,jpeg,mp4",
                ],
                [
                    "icon_image.required" => "صورة الايقونة مطلوبة",
                    'icon_image.*.required' => "حقل صورة الايقونة مطلوب",
                    'icon_image.*.image' => "الرجاء ادخال صورة ايقونة صحيحة",
                    'icon_image.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'icon_image.*.max' => "يجب ان يكون حجم صورة الايقونة اقل من 3 ميجا",
                ]);

                //Now check validation:
                if ($validator->fails()) {
                    return Response::make(['errors' => $validator->errors()->first()], 400);
                }


                foreach ($request->file('icon_image') as $file) {
                    $icon_image = time() . $file->getClientOriginalName();
                    $icon_image_url = $file->storeAs('files/services', $icon_image, ['disk' => 'public']);
                    break;
                }
                Storage::disk('public')->delete("$service->icon_image");
            }

            // end upload image

            $update = $service->update([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "background_image" => $background_image_url ?? $service->background_image,
                "icon_image" => $icon_image_url ?? $service->icon_image,
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
    public function destroy(string $id)
    {
        try {
            $delete = Service::findOrFail($id);
            Storage::disk('public')->delete("$delete->icon_image");
            Storage::disk('public')->delete("$delete->background_image");
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
