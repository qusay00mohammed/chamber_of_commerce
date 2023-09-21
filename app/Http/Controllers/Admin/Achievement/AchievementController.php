<?php

namespace App\Http\Controllers\Admin\Achievement;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {

            $data = Achievement::orderBy('id', 'desc')->select('*');
            return DataTables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })
            ->addColumn('image', function($row) {
                $url =asset("storage/$row->image");
                return '<a href="'. $url .'" data-fancybox >
                            <i class="fa-solid fa-image" style="color: #e4e6ef"></i>
                        </a>';

            })->escapeColumns([])

            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    $btn .= '<a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer;"
                                data-achievement_id="'.$row->id.'"
                                data-title="'.$row->title.'"
                                data-number="'.$row->number.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            ->make(true);
        }

        return view('admin.achievements.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                "title"   => "required|string|min:3|max:255",
                "number"   => "required|numeric",
                'image'=>"required|image|max:3072|mimes:png,jpg,jpeg"
            ],
            [
                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'number.required' => "حقل عدد الشركاء مصلوب",
                'number.numeric' => "حقل عدد الشركاء يجب ان يكون رقم صحيح",

                'image.required' => "حقل الصورة مصلوب",
                'image.image' => "يجب ان يكون نوع الملف صورة",
                'image.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'image.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"
            ]);
            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            // start upload file
            $image = $request->file('image');
            $fileName = time() . $image->getClientOriginalName();
            $path = $image->storeAs('files/achievements', $fileName, ['disk' => 'public']);
            // end upload file
            $store = Achievement::create([
                "title" => $request->title,
                "number" => $request->number,
                "image" => $path,
            ]);
            return response()->json([
                'status' => 'success',
            ], 201);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'faild',
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $achievement = Achievement::findOrFail($request->achievement_id);
        try {
            $validator = Validator::make($request->all(),[
                "title"   => "required|string|min:3|max:255",
                "number"   => "required|numeric",
            ],
            [
                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'number.required' => "حقل عدد الشركاء مصلوب",
                'number.numeric' => "حقل عدد الشركاء يجب ان يكون رقم صحيح",
            ]);
            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            // start upload file
            if($file = $request->file('image')) {

                $validator = Validator::make($request->all(),[
                    'image'=>"required|image|max:3072|mimes:png,jpg,jpeg"
                ], [
                    'image.required' => "حقل الصورة مصلوب",
                    'image.image' => "يجب ان يكون نوع الملف صورة",
                    'image.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'image.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا"
                ]);

                //Now check validation:
                if ($validator->fails()) {
                    return Response::make(['errors' => $validator->errors()->first()], 400);
                }

                Storage::disk('public')->delete("$achievement->image");
                $fileName = time() . $file->getClientOriginalName();
                $path = $file->storeAs('files/achievements', $fileName, 'public');
            }
            // end upload file
            $update = $achievement->update([
                "title" => $request->title,
                "number" => $request->number,
                "image" => $path ?? $achievement->image,
            ]);
            session()->flash('update');
            return redirect()->route('achievements.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Achievement::findOrFail($id);
        Storage::disk('public')->delete("$delete->image");
        $delete->delete();

        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
