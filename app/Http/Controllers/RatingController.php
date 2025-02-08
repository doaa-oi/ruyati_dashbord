<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Volunteer;
use App\Notifications\AssistanceCompletedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{




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


        // حساب متوسط التقييمات
        $volunteer = Volunteer::find($request->volunteer_id);
        $averageRating = $volunteer->ratings()->avg('rating');

        // تحديث حقل rating في جدول المتطوعين
        $volunteer->rating = $averageRating;
        $volunteer->save();

        // إعادة توجيه مع رسالة نجاح
        return redirect()->back()->with('rating', 'تم التقييم بنجاح.');
    }

}
