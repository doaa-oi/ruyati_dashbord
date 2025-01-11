<?php

namespace App\Http\Middleware;

use App\Models\Volunteer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{

    public function handle(Request $request, Closure $next, $type)
    {
        // تحقق مما إذا كان المستخدم قد سجل دخوله
        if (!Auth::check()) {
            return redirect('/login'); // توجيه إلى صفحة تسجيل الدخول إذا لم يكن مسجلاً
        }

        // تحقق من نوع المستخدم
        $user = Auth::user();

        // المقارنة مع الأنواع المختلفة
        if ($user->user_type !== $type) {
            return redirect('/'); // توجيه إلى الصفحة الرئيسية إذا لم يكن من النوع المطلوب
        }

         // تحقق من حالة المتطوع إذا كان نوعه 'volunteer'
         if ($type === 'volunteer') {
            $volunteer = Volunteer::where('user_id', $user->id)->first();
            if (!$volunteer || $volunteer->status != 1) {
                return redirect('/'); // توجيه إلى الصفحة الرئيسية إذا كانت الحالة غير مفعلّة
            }
        }

        return $next($request); // استمر في الطلب إذا كان النوع صحيحًا
    }
}
