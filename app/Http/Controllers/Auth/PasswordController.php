<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'string', 'current_password'],
            'new_password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // الحصول على المستخدم الحالي
        $user = $request->user();

        // تحقق من صحة كلمة المرور الحالية
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_passwo  rd' => 'كلمة المرور الحالية غير صحيحة.']);
        }

        // تحديث كلمة المرور
        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('status', 'تم تحديث كلمة المرور بنجاح.');
    }
}
