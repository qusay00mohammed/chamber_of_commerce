<?php

namespace App\Http\Controllers\Admin\OfficialAgency;

use App\Http\Controllers\Controller;
use App\Models\OfficialAgency;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OfficialAgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = OfficialAgency::orderBy('id', 'desc')->select('*');

            return DataTables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })
            ->addColumn('image', function($row) {
                $url =asset("storage/$row->image_url");

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
                                data-title="'.$row->title.'"
                                data-image="'.$row->image_url.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            ->make(true);
        }

        return view('admin.official-agencies.index');
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
                "title" => "required|string|min:3|max:255",
                'image'=>"required|image|max:3072|mimes:png,jpg,jpeg"
            ], [
                'title.required' => "حقل العنوان مطلوب",
                'title.min' => "يجب ان يكون العنوان اكبر من ثلاث حروف",
                'title.max' => "العنوان كبير للغاية",

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
            $path = $image->storeAs('files/official-agencies', $fileName, ['disk' => 'public']);
            // end upload file

            $store = OfficialAgency::create([
                "title" => $request->title,
                "image_url" => $path,
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
            $partner = OfficialAgency::findOrFail($request->partner_id);

            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
            ], [
                'title.required' => "حقل العنوان مطلوب",
                'title.min' => "يجب ان يكون العنوان اكبر من ثلاث حروف",
                'title.max' => "العنوان كبير للغاية",
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

                Storage::disk('public')->delete("$partner->image_url");
                $fileName = time() . $file->getClientOriginalName();
                $path = $file->storeAs('files/official-agencies', $fileName, 'public');
            }
            // end upload file
            $update = $partner->update([
                "title" => $request->title,
                "image_url" => $path ?? $partner->image_url,
            ]);
            session()->flash('update');
            return redirect()->route('officialAgencies.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = OfficialAgency::findOrFail($id);
        Storage::disk('public')->delete("$delete->image_url");
        $delete->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
