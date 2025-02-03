<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Blind;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('sign_in_up.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'password.required' => 'كلمة المرور مطلوبة.',
        ]


    );


        $user = User::where('email', $request->email)->first();

        if ($user && $request->password === $user->password) {
            Auth::login($user); // تسجيل الدخول للمستخدم

            // توجيه المستخدم حسب نوعه
            if ($user->user_type == 'volunteer') {
                // البحث عن المتطوع المرتبط بالمستخدم
                $volunteer = Volunteer::where('user_id', $user->id)->first(); // تأكد من استخدام المفتاح الصحيح

                if ($volunteer) {
                    // تحقق من حالة المتطوع
                    if ($volunteer->status == 1) {
                        session()->flash('alert', 'موافق'); // تخزين رسالة التنبيه
                        return redirect()->route('volunteers.index');
                    } elseif ($volunteer->status == 0) {
                        session()->flash('alert', 'انتظر موافقة المسؤول'); // تخزين رسالة التنبيه لحالة 0
                        return redirect()->route('landing.master');
                    } elseif ($volunteer->status == 3) {
                        session()->flash('alert', 'تم حذف حسابك'); // تخزين رسالة التنبيه لحالة 3
                        return redirect()->route('landing.master');
                    } elseif ($volunteer->status == 2) {
                        session()->flash('alert', 'انت مقيد'); // تخزين رسالة التنبيه لحالة 2
                        return redirect()->route('landing.master');
                    }
                }
            } elseif ($user->user_type == 'blind') {
            // البحث عن الكفيف المرتبط بالمستخدم
            $blind = Blind::where('user_id', $user->id)->first(); // تأكد من استخدام المفتاح الصحيح

            if ($blind) {
                // تحقق من حالة الكفيف
                if ($blind->status == 1) {
                    return redirect()->route('blinds.index'); // تأكد من وجود route مناسبة
                } else {
                    return redirect()->route('landing.master'); // توجيه إلى صفحة أخرى إذا كانت الحالة غير مفعلّة
                }
            }
            } elseif ($user->user_type == 'admin') {
                return redirect()->route('show.volunteers'); // تأكد من وجود route مناسبة
            }
        }

        // في حالة فشل المصادقة
        return back()->withErrors([
        'email' => 'يرجى التحقق من البيانات المدخلة',
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
