<?php

namespace App\Http\Controllers\Admin\Program;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Program::query();

            $data = $data->select('*')->orderBy('id', 'desc');

            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image_icon', function ($row) {

                    $url = asset("storage/$row->image_icon");
                        return '<a href="'. $url .'" data-fancybox ><i class="fa-solid fa-image" style="color: #e4e6ef"></i></a>';

                })->escapeColumns([])

                ->addColumn('image_url', function ($row) {

                    $url = asset("storage/$row->image_url");
                        return '<a href="'. $url .'" data-fancybox ><i class="fa-solid fa-image" style="color: #e4e6ef"></i></a>';

                })->escapeColumns([])

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("programs.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.programs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.add');
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
                "image_url" => "required|array",
                'image_url.*'=>"required|image|mimes:png,jpg,jpeg,mp4",
                "image_icon" => "required|array",
                'image_icon.*'=>"required|file|mimes:png,jpg,jpeg,mp4",
            ],
            [

                "image_url.required" => "صورة الخلفية مطلوبة",
                'image_url.*.required' => "حقل صورة الخلفية مطلوب",
                'image_url.*.image' => "الرجاء ادخال صورة خلفية صحيحة",
                'image_url.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'image_url.*.max' => "يجب ان يكون حجم صورة الخلفية اقل من 3 ميجا",

                "image_icon.required" => "صورة الايقونة مطلوبة",
                'image_icon.*.required' => "حقل صورة الايقونة مطلوب",
                'image_icon.*.image' => "الرجاء ادخال صورة ايقونة صحيحة",
                'image_icon.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'image_icon.*.max' => "يجب ان يكون حجم صورة الايقونة اقل من 3 ميجا",

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

            foreach ($request->file('image_url') as $file) {
                // $background_image = range(1, 100) . time() . range(1, 100);
                $_image_url = time() . $file->getClientOriginalName();
                $image_url = $file->storeAs('files/programs', $_image_url, ['disk' => 'public']);
                break;
            }

            foreach ($request->file('image_icon') as $file) {
                $icon_image = time() . $file->getClientOriginalName();
                $icon_image_url = $file->storeAs('files/programs', $icon_image, ['disk' => 'public']);
                break;
            }
            // end upload image




            $store = Program::create([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "image_url" => $image_url,
                "image_icon" => $icon_image_url,
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
        $program = Program::findOrFail($id);

        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $service = Program::findOrFail($id);

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

            if ($request->file('image_url')) {

                $validator = Validator::make($request->all(), [
                    "image_url" => "required|array",
                    'image_url.*'=>"required|image|mimes:png,jpg,jpeg",
                ],
                [
                    "image_url.required" => "صورة الخلفية مطلوبة",
                    'image_url.*.required' => "حقل صورة الخلفية مطلوب",
                    'image_url.*.image' => "الرجاء ادخال صورة خلفية صحيحة",
                    'image_url.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'image_url.*.max' => "يجب ان يكون حجم صورة الخلفية اقل من 3 ميجا",
                ]);

                //Now check validation:
                if ($validator->fails()) {
                    return Response::make(['errors' => $validator->errors()->first()], 400);
                }

                foreach ($request->file('image_url') as $file) {
                    $image_url = time() . $file->getClientOriginalName();
                    $path_image = $file->storeAs('files/programs', $image_url, ['disk' => 'public']);
                    break;
                }
                Storage::disk('public')->delete("$service->image_url");
            }

            if ($request->file('image_icon')) {

                $validator = Validator::make($request->all(), [
                    "image_icon" => "required|array",
                    'image_icon.*'=>"required|file|mimes:png,jpg,jpeg,mp4",
                ],
                [
                    "image_icon.required" => "صورة الايقونة مطلوبة",
                    'image_icon.*.required' => "حقل صورة الايقونة مطلوب",
                    'image_icon.*.image' => "الرجاء ادخال صورة ايقونة صحيحة",
                    'image_icon.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'image_icon.*.max' => "يجب ان يكون حجم صورة الايقونة اقل من 3 ميجا",
                ]);

                //Now check validation:
                if ($validator->fails()) {
                    return Response::make(['errors' => $validator->errors()->first()], 400);
                }


                foreach ($request->file('image_icon') as $file) {
                    $icon_image = time() . $file->getClientOriginalName();
                    $path_icon = $file->storeAs('files/programs', $icon_image, ['disk' => 'public']);
                    break;
                }
                Storage::disk('public')->delete("$service->image_icon");
            }

            // end upload image

            $update = $service->update([
                "title" => $request->post('title'),
                "description" => $request->post('description'),
                "image_url" => $path_image ?? $service->image_url,
                "image_icon" => $path_icon ?? $service->image_icon,
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
            $delete = Program::findOrFail($id);
            Storage::disk('public')->delete("$delete->image_url");
            Storage::disk('public')->delete("$delete->image_icon");
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
