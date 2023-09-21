<?php

namespace App\Http\Controllers\Admin\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Partner::orderBy('id', 'desc')->select('*');

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

            ->addcolumn('date', function($row) {
                return $row->created_at->toFormattedDateString();
            })

            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    $btn .= '<a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer;"
                                data-partner_id="'.$row->id.'"
                                data-link="'.$row->link.'"
                                data-image="'.$row->image.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            ->make(true);
        }

        return view('admin.partners.index');
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
            $validator = Validator::make($request->all(), [
                "link"   => "required|url",
                'image'=>"required|image|max:3072|mimes:png,jpg,jpeg"
            ], [
                'link.required' => "حقل الرابط مطلوب",
                'link.url' => "يجب ادخال رابط صحيح",
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
            $path = $image->storeAs('files/partners', $fileName, ['disk' => 'public']);
            // end upload file

            $store = Partner::create([
                "link" => $request->link,
                "image" => $path,
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $store
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
        try {
            $partner = Partner::findOrFail($request->partner_id);

            $validator = Validator::make($request->all(), [
                "link"   => "required|url",
            ], [
                'link.required' => "حقل الرابط مطلوب",
                'link.url' => "يجب ادخال رابط صحيح",
            ]);
            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            // start upload file
            if($file = $request->file('image')) {

                $validator = validator::make($request->all(), [
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

                Storage::disk('public')->delete("$partner->image");
                $fileName = time() . $file->getClientOriginalName();
                $path = $file->storeAs('files/partners', $fileName, 'public');
            }
            // end upload file
            $update = $partner->update([
                "link" => $request->link,
                "image" => $path ?? $partner->image,
            ]);
            session()->flash('update');
            return redirect()->route('partners.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $delete = Partner::findOrFail($id);
        Storage::disk('public')->delete("$delete->image");
        $delete->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
