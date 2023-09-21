<?php

namespace App\Http\Controllers\Admin\ConventionLaw;

use App\Http\Controllers\Controller;
use App\Models\ConventionLaw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ConventionLawController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = ConventionLaw::all();
        return view('admin.convention-law.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.convention-law.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
                "kt_docs_repeater_basic.*.filename" => "string|min:3|max:255",
                "kt_docs_repeater_basic.*.file" => "mimes:pdf",

            ],
            [
                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'kt_docs_repeater_basic.*.filename.min' => "يجب ان يكون اسم الملف اكبر من ثلاث حروف",
                'kt_docs_repeater_basic.*.filename.max' => "اسم الملف كبير للغاية",

                'kt_docs_repeater_basic.*.file.required' => "حقل الصورة مصلوب",
                'kt_docs_repeater_basic.*.file.mimes' => "يجب ادخال صورة بصيغة pdf",

            ]);


            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            $store = ConventionLaw::create([
                "title" => $request->post('title'),
            ]);

            foreach ($request->kt_docs_repeater_basic as $item) {
                $file = $item['file'];
                $basicFileName = time() . $file->getClientOriginalName();
                $path_file = $file->storeAs('files/convention-law', $basicFileName, ['disk' => 'public']);

                ConventionLaw::create([
                    "title" => $item['filename'],
                    "file_name" => $path_file,
                    "parent_id" => $store->id,
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
        // $news = MediaCenter::findOrFail($id);
        // return view('admin.news.visits', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $conventionLaw = ConventionLaw::findOrFail($id);
        $conventions = ConventionLaw::where('parent_id', $id)->get();

        return view('admin.convention-law.edit', compact('conventionLaw', 'conventions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //
        try {
            $conventionLaw = ConventionLaw::findOrFail($id);

            $validator = Validator::make($request->all(), [
                "title" => "required|string|min:3|max:255",
                "kt_docs_repeater_basic.*.filename" => "string|min:3|max:255",
                "kt_docs_repeater_basic.*.file" => "mimes:pdf",

            ],
            [
                'title.required' => "حقل الاسم مطلوب",
                'title.min' => "يجب ان يكون الاسم اكبر من ثلاث حروف",
                'title.max' => "الاسم كبير للغاية",

                'kt_docs_repeater_basic.*.filename.min' => "يجب ان يكون اسم الملف اكبر من ثلاث حروف",
                'kt_docs_repeater_basic.*.filename.max' => "اسم الملف كبير للغاية",

                'kt_docs_repeater_basic.*.file.required' => "حقل الصورة مصلوب",
                'kt_docs_repeater_basic.*.file.mimes' => "يجب ادخال صورة بصيغة pdf",

            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }


            $updateParent = $conventionLaw->update([
                "title" => $request->post('title'),
            ]);



            foreach ($request->kt_docs_repeater_basic as $item) {

                $itemID = $item['id'] ?? 0;

                $updateChild = ConventionLaw::where('id', $itemID)->first();

                if (isset($updateChild))
                {
                    if (isset($item['file'])) {
                        $file = $item['file'];
                        $basicFileName = time() . $file->getClientOriginalName();
                        $path_file = $file->storeAs('files/convention-law', $basicFileName, ['disk' => 'public']);
                        Storage::disk('public')->delete("$conventionLaw->file_name");
                    }

                    $update = $updateChild->update([
                        "title" => $item['filename'],
                        "file_name" => $path_file ?? $updateChild->file_name,
                    ]);
                }
                else
                {
                    $file = $item['file'];
                    $basicFileName = time() . $file->getClientOriginalName();
                    $path_file = $file->storeAs('files/convention-law', $basicFileName, ['disk' => 'public']);

                    ConventionLaw::create([
                        "title" => $item['filename'],
                        "file_name" => $path_file,
                        "parent_id" => $id,
                    ]);
                }



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
            $delete = ConventionLaw::findOrFail($id);
            $del = ConventionLaw::where('parent_id', $id)->get();
            foreach ($del as $d) {
                $d->delete();
                Storage::disk('public')->delete("$d->file_name");
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
