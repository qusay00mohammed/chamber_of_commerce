<?php

namespace App\Http\Controllers\Admin\GoalAndValue;

use App\Http\Controllers\Controller;
use App\Models\GoalAndValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = GoalAndValue::where('type', 'value')->orderBy('id', 'desc')->select('*');

            return DataTables::of($data)
            ->addColumn('id', function ($row) {
                static $count = 1;
                return $count++;
            })

            ->addColumn('action', function ($row) {
                $btn = '';
                    $btn .= '<a onclick="performDestroy('.$row->id.', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    $btn .= '<a data-bs-toggle="modal" data-bs-target="#kt_modal_2" style="cursor: pointer;"
                                data-value_id="'.$row->id.'"
                                data-description="'.$row->description.'"
                                data-title="'.$row->title.'"
                            ><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                return $btn;
            })
            ->make(true);
        }

        return view('admin.values.index');
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
                "description"   => "required",
                "title"   => "required",
            ], [
                'description.required' => "حقل الوصف مطلوب",
            ]);

            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }

            $store = GoalAndValue::create([
                "description" => $request->description,
                "title" => $request->title,
                "type" => "value"
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
            $goal = GoalAndValue::findOrFail($request->value_id);

            $validator = Validator::make($request->all(), [
                "description"   => "required",
                "title"   => "required",
            ], [
                'description.required' => "حقل الوصف مطلوب",
            ]);
            //Now check validation:
            if ($validator->fails()) {
                return Response::make(['errors' => $validator->errors()->first()], 400);
            }


            $update = $goal->update([
                "description" => $request->description,
                "title" => $request->title,
            ]);

            session()->flash('update');
            return redirect()->route('values.index');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GoalAndValue::where('type', 'value')->findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
