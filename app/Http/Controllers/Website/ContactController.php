<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    public function create()
    {
        return  view('website.contact-us.contactUs');
    }

    public function store(Request $request)
    {

        try {

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


            Contact::create($request->all());

            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }
}
