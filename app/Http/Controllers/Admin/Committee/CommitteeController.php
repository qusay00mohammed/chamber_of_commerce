<?php

namespace App\Http\Controllers\Admin\Committee;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CommitteeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Committee::query();

            $data = $data->select('*')->orderBy('id', 'desc');



            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('image', function ($row) {

                    $url = asset("storage/files/committes/$row->image_url");
                    return '<a href="'. $url .'" data-fancybox ><i class="fa-solid fa-image" style="color: #e4e6ef"></i></a>';

                })->escapeColumns([])

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("committees.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';

                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                    <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }
        return view('admin.committees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $request = request();
        // $request->ip();
        $currentUserInfo = Location::get('176.106.41.254');
        $members = Member::all();
        return view('admin.committees.add', compact('currentUserInfo', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(explode(',', $request->members));
        try {
            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
                "address" => "required|string|min:3|max:255",
                "email" => "required|email",
                "latitude" => "required",
                "longitude" => "required",
                "phone_number" => "required|string|min:3|max:30",

                "files" => "required|array",
                'files.*'=>"required|file|mimes:png,jpg,jpeg",

            ],
            [

                "files.required" => "الصورة مطلوبة",
                'files.*.required' => "حقل الصورة مصلوب",
                'files.*.image' => "يجب ان يكون نوع الملف صورة",
                'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا",

                'longitude.required' => "حقل خط الطول مطلوب",
                'latitude.required' => "حقل خط العرض مطلوب",

                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'address.required' => "حقل العنوان مطلوب",
                'address.min' => "يجب ان يكون العنوان اكبر من ثلاث حروف",
                'address.max' => "العنوان كبير للغاية",

                'email.required' => "حقل البريد الالكتروني مطلوب",
                'email.email' => "الرجاء ادخال بريد الكتروني صحيح",

                'phone_number.required' => "حقل رقم الجوال مطلوب",
                'phone_number.min' => "يجب ان يكون رقم الجوال اكبر من ثلاث حروف",
                'phone_number.max' => "رقم الجوال كبير للغاية",

            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }


            foreach ($request->file('files') as $file) {
                $fileName = time() . $file->getClientOriginalName();
                $file->storeAs('files/committes', $fileName, ['disk' => 'public']);
                break;
            }

            $store = Committee::create([
                "title" => $request->post('title'),
                "address" => $request->post('address'),
                "phone_number" => $request->post('phone_number'),
                "email" => $request->post('email'),
                "longitude" => $request->post('longitude'),
                "image_url" => $fileName,
                "latitude" => $request->post('latitude'),
            ]);

            if($request->members)
            {
                $store->members()->sync(explode(',', $request->members));
            }



            if ($request->repeaterData) {

                $array = [];

                foreach (json_decode($request->repeaterData) as $data) {
                    if ($data == null) {
                        break;
                    }
                    $store_member = Member::create([
                        "full_name" => $data,
                        "type" => 'external',
                    ]);

                    array_push($array, $store_member->id);
                }
                // dd($array);
                $store->members()->syncWithoutDetaching($array);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $members = Member::all();
        $committee = Committee::with('members')->findOrFail($id);

        // dd($committee->members->first()->full_name);
        return view('admin.committees.edit', compact('committee', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd(json_decode($request->repeaterData));
        try {
            $committee = Committee::findOrFail($id);
            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
                "address" => "required|string|min:3|max:255",
                "email" => "required|email",
                "latitude" => "required",
                "longitude" => "required",
                "phone_number" => "required|string|min:3|max:30",

            ],
            [
                'longitude.required' => "حقل خط الطول مطلوب",
                'latitude.required' => "حقل خط العرض مطلوب",

                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'address.required' => "حقل العنوان مطلوب",
                'address.min' => "يجب ان يكون العنوان اكبر من ثلاث حروف",
                'address.max' => "العنوان كبير للغاية",

                'email.required' => "حقل البريد الالكتروني مطلوب",
                'email.email' => "الرجاء ادخال بريد الكتروني صحيح",

                'phone_number.required' => "حقل رقم الجوال مطلوب",
                'phone_number.min' => "يجب ان يكون رقم الجوال اكبر من ثلاث حروف",
                'phone_number.max' => "رقم الجوال كبير للغاية",

            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }


            if($request->file('files'))
            {
                $validator = Validator::make($request->all(), [
                    "files" => "required|array",
                    'files.*'=>"required|file|mimes:png,jpg,jpeg",
                ],
                [
                    "files.required" => "الصورة مطلوبة",
                    'files.*.required' => "حقل الصورة مصلوب",
                    'files.*.image' => "يجب ان يكون نوع الملف صورة",
                    'files.*.mimes' => "يجب ادخال صورة بصيغة png او jpg او jpeg",
                    'files.*.max' => "يجب ان يكون حجم الصورة اقل من 3 ميجا",
                ]);

                foreach ($request->file('files') as $file) {
                    $fileName = time() . $file->getClientOriginalName();
                    $file->storeAs('files/committes', $fileName, ['disk' => 'public']);
                    break;
                }

                Storage::disk('public')->delete("files/committes/$committee->image_url");
            }

            $update = $committee->update([
                "title" => $request->post('title'),
                "address" => $request->post('address'),
                "phone_number" => $request->post('phone_number'),
                "email" => $request->post('email'),
                "longitude" => $request->post('longitude'),
                "image_url" => $fileName ?? $committee->image_url,
                "latitude" => $request->post('latitude'),
            ]);

            if($request->members)
            {
                $committee->members()->sync(explode(',', $request->members));
            }



            if (isset($request->repeaterData)) {

                $array = [];

                foreach (json_decode($request->repeaterData) as $data) {


                    if ($data == null) {
                        break;
                    }

                    $store_member = Member::create([
                        "full_name" => $data,
                        "type" => 'external',
                    ]);

                    array_push($array, $store_member->id);
                }
                // dd($array);
                $committee->members()->syncWithoutDetaching($array);
            }


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
            $delete = Committee::findOrFail($id);
            Storage::disk('public')->delete("files/committes/$delete->image_url");
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
