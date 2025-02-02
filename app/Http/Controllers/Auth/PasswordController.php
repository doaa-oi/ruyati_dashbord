<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Blind;
use App\Models\Volunteer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        // التحقق من صحة المدخلات
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'string'], // إزالة current_password
            'new_password' => ['required', 'string', 'confirmed'], // تأكد من التأكيد
        ]);

        // الحصول على المستخدم الحالي
        $user = $request->user();

        // تحقق من صحة كلمة المرور الحالية (مطلوب للتحقق ولكن ليس مشفر)
        if ($user && $request->current_password !== $user->password) {
            return back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة.']);
        }

        // تحديث كلمة المرور بدون تشفير
        $user->update([
            'password' => $request->new_password, // تخزين كلمة المرور بشكل نص عادي
        ]);

         // الحصول على السجل في جدول الكفيف وتحديث كلمة المرور
         $blind = Blind::where('user_id', $user->id)->first();
         if ($blind) {
             $blind->update([
                 'password' => $request->new_password, // تحديث كلمة المرور بشكل نص عادي
             ]);
         }

         // تحديث كلمة المرور في جدول "volunteers" إذا كان هناك سجل مرتبط
        $volunteer = Volunteer::where('user_id', $user->id)->first();
        if ($volunteer) {
            $volunteer->update([
                'password' => $request->new_password, // تحديث كلمة المرور بشكل نص عادي
            ]);
        }

        return back()->with('status', 'تم تحديث كلمة المرور بنجاح.');
    }
}
