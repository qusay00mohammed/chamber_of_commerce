<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
// use App\Models\LoginLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function create()
    {
        return view('admin.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            'email.required' => "حقل البريد الالكتروني مطلوب",
            'email.email' => "يجب ادخال بريد الكتروني صحيح",
            'password.required' => "حقل كلمة المرور مطلوب",
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            session()->flash('warning', "الايميل غير مسجل لدينا");
            return redirect()->back();
        }

        if (Hash::check($request->password, $user->password)) {
            auth()->login($user);

            $userAgent = $request->header('User-Agent');
            if (strpos($userAgent, 'Mobile') !== false) {
                $userAgent = "Mobile Device";
            } elseif (strpos($userAgent, 'Tablet') !== false) {
                $userAgent = "Tablet Device";
            } else {
                $userAgent = "Desktop Device";
            }

            LoginLog::create([
                'user_id' => auth()->user()->id,
                'ip_address' => request()->ip(),
                'user_device' => $userAgent,
            ]);
            session()->flash('success', "تم تسجيل الدخول بنجاح");
            return redirect()->route('admin.dashboard');
        }
        session()->flash('error', "هناك خطأ في كلمة المرور او البريد الالكتروني");

        return redirect()->back();
    }

    public function logout()
    {
        Session::flush();
        auth()->logout();
        session()->flash('success', "تم تسجيل الخروج بنجاح");
        return redirect()->route('login.create');
    }
}
