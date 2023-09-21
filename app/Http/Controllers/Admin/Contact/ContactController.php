<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::select('*')->orderBy('id', 'desc');

            return DataTables::of($data)
                ->addColumn('id', function ($row) {
                    static $count = 1;
                    return $count++;
                })
                ->addColumn('reason', function ($row) {
                    if($row->reason == 'problem')
                    {
                        return 'مشكلة';
                    }
                    else
                    {
                        return 'استفسار';
                    }
                })->escapeColumns([])

                ->addColumn('action', function ($row) {
                    $btn = '';
                    $btn .= '<a href=" ' . route("contact-us.edit", $row->id) . '"><i class="text-info fas fa-edit" style="font-size: 16px"></i>&nbsp;&nbsp;</a>';
                    $btn .= '<a onclick="performDestroy(' . $row->id . ', this)" style="cursor: pointer; font-size: 16px">
                                <i class="text-danger fas fa-trash-alt"></i>
                            </a>';
                    return $btn;
                })
                ->make(true);
        }

        return view('admin.contact-us.index');
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
        //
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
        $message = Contact::findOrFail($id);
        return view('admin.contact-us.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $message = Contact::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'fullname' => "required|string|min:3|max:70",
                'title' => "required|string|min:3|max:70",
                'email' => "required|email",
                'reason' => "required|in:inquiry,problem",
                'message' => "required",
            ], [
                'fullname.required' => 'حقل الاسم مطلوب',
                'fullname.min' => 'حقل الاسم يجب ان يكون اكثر من ثلاث حروف',
                'fullname.max' => 'حقل الاسم يجب ان يكون اقل من 255 حرف',
                'email.required' => 'حقل البريد الالكتروني مطلوب',
                'email.email' => 'الرجاء ادخال بريد الكتروني صالح',
                'message.required' => 'حقل الرسالة مطلوب',

                'title.required' => 'حقل العنزان مطلوب',
                'title.min' => 'حقل العنزان يجب ان يكون اكثر من ثلاث حروف',
                'title.max' => 'حقل العنزان يجب ان يكون اقل من 255 حرف',

                'reason.required' => 'حقل سبب المراسلة مطلوب',
                'reason.in' => 'الرجاء اختيار قيمة صحيحة ',
            ]);

            //Now check validation:
            if ($validator->fails()) {
                return redirect()->back()->withErrors(['errors' => $validator->errors()->first()]);
            }

            $message->update($request->all());

            session()->flash('update');
            return redirect()->route('contact-us.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Contact::findOrFail($id)->delete();
        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
