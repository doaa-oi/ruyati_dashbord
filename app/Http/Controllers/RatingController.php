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
}
