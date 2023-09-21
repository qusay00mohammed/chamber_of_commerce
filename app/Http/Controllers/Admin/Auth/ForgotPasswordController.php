<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('admin.auth.forgetPassword');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          try {
            $request->validate([
                'email' => 'required|email|exists:users',
                'email' => 'required|email|unique:password_reset_tokens,email',
            ], [
                'email.required' => 'حقل البريد مطلوب',
                'email.email' => 'الرجاء ادخال بريد الكتروني صحيح',
                'email.exists' => 'البريد الالكتروني المدخل غير مسجل لدينا',
                'email.unique' => 'تم ارسال بريد الكتروني يحتوي على رابط تغيير كلمة المرور'
            ]);



            $token = Str::random(64);

            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('admin.auth.emailResetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });

            return back()->with('resetPass', 'We have e-mailed your password reset link!');
          } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
          }
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) {
         return view('admin.auth.forgetPasswordLink', ['token' => $token]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          try {
            $request->validate([
                'email' => 'required|email|exists:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required'
            ], [
              'email.required' => 'حقل البريد مطلوب',
              'email.email' => 'الرجاء ادخال بريد الكتروني صحيح',
              'email.exists' => 'البريد الالكتروني المدخل غير مسجل لدينا',
              'password.required' => 'حقل كلمة المرور مطلوب',
              'password.confirmed' => 'كلمة المرور غير متطابقة',
              'password_confirmation.required' => 'حقل تأكيد كلمة المرور مطلوب',
          ]);

            $updatePassword = DB::table('password_reset_tokens')->where([
              'email' => $request->email,
              'token' => $request->token
              ])->first();

            if(!$updatePassword){
                return back()->withInput()->withErrors(['errors' => 'رمز غير صالح!']);
            }

            $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

            DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

            return redirect()->route('login.create_ar')->with('successResetPass', 'Your password has been changed!');
          } catch (\Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
          }
      }
}
