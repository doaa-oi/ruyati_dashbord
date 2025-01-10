<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Notifications\AssistanceCompletedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{


    // public function showNotifications()
    // {
    //     // الحصول على المستخدم الحالي (الكفيف)
    //     $user = Auth::user();

    //     // استرجاع جميع الإشعارات التي تخص الكفيف
    //     $notifications = $user->notifications()
    //         ->where('type', AssistanceCompletedNotification::class) // تحقق من نوع الإشعار
    //         ->whereNull('read_at') // نحن مهتمون بالإشعارات غير المقروءة
    //         ->get();

    //     return view('rating', compact('notifications'));
    // }


    public function submitRating(Request $request)
    {
       // تحقق من صحة البيانات
       $request->validate([
        'volunteer_id' => 'required|exists:volunteers,id', // تحقق من وجود المتطوع
        'blind_id' => 'required|exists:blinds,id', // تحقق من وجود الكفيف
        'rating' => 'required|integer|between:1,5', // تحقق من أن القيمة بين 1 و 5
    ]);

    // قم بإنشاء طلب المساعدة
    Rating::create([
        'volunteer_id' => $request->volunteer_id,
        'blind_id' => $request->blind_id,
        'rating' => $request->rating,

    ]);

        // إعادة توجيه مع رسالة نجاح
        return redirect()->back()->with('rating', 'تم التقييم بنجاح.');
    }

}
