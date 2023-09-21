<?php

namespace App\Http\Controllers\Admin\AdministrationMember;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdministrationMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Member::query();

            $data = $data->select('*')->where('type', 'council')->orderBy('id', 'desc');

            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                            $url = asset("storage/$row->image_url");
                            return '<a href="'. $url .'" data-fancybox ><i class="fa-solid fa-image" style="color: #e4e6ef"></i></a>';

                })->escapeColumns([])

                ->addcolumn('administration', function ($row) {
                    if ($row->administration == 1) {
                        $administration = "نعم";
                    } else {
                        $administration = "لا";
                    }
                    return $administration;
                })->escapeColumns([])

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("administrationMembers.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.administrationMembers.index');
    }


    public function members(Request $request)
    {
        if ($request->ajax()) {

            $data = Member::query();

            $data = $data->select('id', 'full_name')->where('type', 'external')->orderBy('id', 'desc');

            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                // ->addColumn('image', function ($row) {

                //             $url = asset("storage/$row->image_url");
                //             return '<a href="'. $url .'" data-fancybox ><i class="fa-solid fa-image" style="color: #e4e6ef"></i></a>';

                // })->escapeColumns([])

                // ->addcolumn('administration', function ($row) {
                //     if ($row->administration == 1) {
                //         $administration = "نعم";
                //     } else {
                //         $administration = "لا";
                //     }
                //     return $administration;
                // })->escapeColumns([])

                ->addColumn('action', function ($row) {
                    $btn = '';
                    // $btn .= '<a href=" ' . route("administrationMembers.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.administrationMembers.members');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.administrationMembers.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "full_name" => "required|string|min:3|max:255",
                "job_title" => "required|string|min:3|max:255",
                "administration" => 'required|in:1,0',
                "files" => "required|array",
                'files.*'=>"required|file|mimes:png,jpg,jpeg",
            ],
            [

                "files.required" => "الصورة مطلوبة",
                'files.*.required' => "حقل الصورة مصلوب",
                'files.*.image' => "يجب ان يكون نوع الملف صورة",
                'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا",

                'administration.required' => 'حقل عضو مجلس إدارة مطلوب',
                'administration.in' => 'يجب ادخال قيمة صحيحة في حقل عضو مجلس إدارة',

                'full_name.required' => "حقل الاسم مطلوب",
                'full_name.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'full_name.max' => "الاسم كبير للغاية",

                'job_title.required' => "حقل المسمى الوظيفي مطلوب",
                'job_title.min' => "يجب ان يكون المسمى الوظيفي اكبر من ثلاث حروف",
                'job_title.max' => "المسمى الوظيفي كبير للغاية",

            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            if($request->administration == 1)
            {
                $validator = Validator::make($request->all(), [
                    "description" => "required",
                ],
                [
                    'description.required' => "حقل الوصف مصلوب",
                ]);
                //Now check validation:
                if ($validator->fails()) {
                    return Response::make(['errors' => $validator->errors()->first()], 400);
                }

                $superMember = Member::where('administration', 1)->first();
                if ($superMember) {
                    $superMember->update([
                        'administration' => '0'
                    ]);
                }
            }

            // start upload image
            foreach ($request->file('files') as $file) {
                $fileName = time() . $file->getClientOriginalName();
                $pathImage = $file->storeAs('files/administration-members', $fileName, ['disk' => 'public']);
                break;
            }
            // end upload image

            $store = Member::create([
                "image_url" => $pathImage,
                "full_name" => $request->post('full_name'),
                "job_title" => $request->post('job_title'),
                "administration" => $request->post('administration'),
                "description" => $request->post('description'),
                "type" => 'council',
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
        // $news = MediaCenter::findOrFail($id);
        // return view('admin.news.visits', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        return view('admin.administrationMembers.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $member = Member::findOrFail($id);
        try {

            $validator = Validator::make($request->all(), [
                "full_name" => "required|string|min:3|max:255",
                "job_title" => "required|string|min:3|max:255",
                "administration" => 'required|in:1,0',
            ],
            [
                "files.required" => "الصورة مطلوبة",
                'files.*.required' => "حقل الصورة مصلوب",
                'files.*.image' => "يجب ان يكون نوع الملف صورة",
                'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا",

                'administration.required' => 'حقل عضو مجلس إدارة مطلوب',
                'administration.in' => 'يجب ادخال قيمة صحيحة في حقل عضو مجلس إدارة',

                'full_name.required' => "حقل الاسم مطلوب",
                'full_name.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'full_name.max' => "الاسم كبير للغاية",

                'job_title.required' => "حقل المسمى الوظيفي مطلوب",
                'job_title.min' => "يجب ان يكون المسمى الوظيفي اكبر من ثلاث حروف",
                'job_title.max' => "المسمى الوظيفي كبير للغاية",
            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            if($request->administration == 1)
            {
                $validator = Validator::make($request->all(), [
                    "description" => "required",
                ],
                [
                    'description.required' => "حقل الوصف مصلوب",
                ]);
                //Now check validation:
                if ($validator->fails()) {
                    return Response::make(['errors' => $validator->errors()->first()], 400);
                }

                $superMember = Member::where('administration', 1)->where('id', '!=', $id)->first();
                if ($superMember) {
                    $superMember->update([
                        'administration' => '0',
                    ]);
                }

            }


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
                    $fileName = time() . $file->getClientOriginalName();
                    $pathImage = $file->storeAs('files/administration-members', $fileName, ['disk' => 'public']);
                    Storage::disk('public')->delete("$member->image_url");
                    break;
                }
            }
            // end upload image

            $update = $member->update([
                "image_url" => $pathImage ?? $member->image_url,
                "full_name" => $request->post('full_name'),
                "job_title" => $request->post('job_title'),
                "administration" => $request->post('administration'),
                "description" => $request->post('description'),
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
            $delete = Member::findOrFail($id);
            Storage::disk('public')->delete("$delete->image_url");
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
