<?php

namespace App\Http\Controllers\SMS;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SMSController extends Controller
{
    public function index()
    {
        return view('admin.SMS.index');
    }


    public function sendSMS(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
            'messageSMS' => 'required',
        ], [

            'phone_number.required' => 'حقل رقم الجوال مطلوب',
            'messageSMS.required' => 'حقل الرسالة مطلوب',
        ]);

        try {

            $client = new Client();

            $settings_sms = Setting::select('*')->where('type', 'sms-information')->get();

            $response = $client->get("http://hotsms.ps/sendbulksms.php?user_name=" . $settings_sms->where('key', 'username_sms')->first()->description . "&user_pass=". $settings_sms->where('key', 'password_sms')->first()->description ."&sender=". $settings_sms->where('key', 'send_name_sms')->first()->description ."&mobile=$request->phone_number&type=0&text=$request->messageSMS");
            $data = json_decode($response->getBody(), true);


            if ($data == 1001) {
                session()->flash('add');
                return back();
            } else if($data == 1000) {
                return back()->withErrors(['errors' => 'لا يوجد رصيد كافي']);
            } else if($data == 2000) {
                return back()->withErrors(['errors' => 'خطأ في عملية التفويض']);
            } else if($data == 3000) {
                return back()->withErrors(['errors' => 'خطأ في نوع المسج']);
            } else if($data == 4000) {
                return back()->withErrors(['errors' => 'أحد المدخلات المطلوبة غير موجود']);
            } else if($data == 5000) {
                return back()->withErrors(['errors' => 'رقم المحمول غير مدعوم']);
            } else if($data == 6000) {
                return back()->withErrors(['errors' => 'اسم المرسل غير معرف على حسابك']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['errors' => $e->getMessage()]);
        }
    }


    public function settingsSMS(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'send_name_sms' => 'required',
            'username_sms' => 'required',
            'password_sms' => 'required',
        ]);

        //Now check validation:
        if ($validator->fails()) {
            return Response::make(['errors' => $validator->errors()->first()], 400);
        }

        // start
        if($send_name_sms = Setting::where(['type' => 'sms-information', 'key' => 'send_name_sms'])->first())
        {
            $send_name_sms->update([
                'description' => $request->send_name_sms,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->send_name_sms,
                'key' => 'send_name_sms',
                'type' => 'sms-information'
            ]);
        }
        // end

        // start
        if($username_sms = Setting::where(['type' => 'sms-information', 'key' => 'username_sms'])->first())
        {
            $username_sms->update([
                'description' => $request->username_sms,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->username_sms,
                'key' => 'username_sms',
                'type' => 'sms-information'
            ]);
        }
        // end

        // start
        if($password_sms = Setting::where(['type' => 'sms-information', 'key' => 'password_sms'])->first())
        {
            $password_sms->update([
                'description' => $request->password_sms,
            ]);
        }
        else
        {
            Setting::create([
                'description' => $request->password_sms,
                'key' => 'password_sms',
                'type' => 'sms-information'
            ]);
        }
        // end

        session()->flash('update');
        return redirect()->route('sms.index');

    }


}
