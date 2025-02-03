<?php

namespace App\Http\Controllers;

use App\Models\Blind;
use App\Models\DirectAssistance;
use App\Models\RejectAssistance;
use App\Models\Volunteer;
use App\Notifications\ApprovedNotification;
use App\Notifications\AssistanceCompletedNotification;
use App\Notifications\RejectionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DirectAssistanceController extends Controller
{
    public function approveAssistance($volunteerId, $blindId)
    {
        // استرجاع المتطوع والكفيف
        $volunteer = Volunteer::findOrFail($volunteerId);
        $blind = Blind::findOrFail($blindId);

        // تخزين بيانات المساعدة
        $assistance = DirectAssistance::create([
            'volunteer_id' => $volunteer->id,
            'blind_id' => $blind->id,
            'approved_at' => now(), // وقت القبول
            'status' => 'قيد التنفيذ', // تعيين الحالة إلى قيد التنفيذ

        ]);

        // تحديث حالة المتطوع
        $volunteer->update(['availability' => 'غير متاح']);

        Notification::send($blind, new ApprovedNotification($volunteer->id, $volunteer->name));

        return redirect()->route('volunteers.index')->with('success', 'تم قبول طلب المساعدة بنجاح.');
    }

    public function completeAssistance($id)
    {
        $assistance = DirectAssistance::findOrFail($id);
        $assistance->update([

            'completed_at' => now(),
            'status' => 'مكتمل', // تحديث الحالة إلى مكتمل



    ]); // تحديث وقت الاكتمال


        $volunteer = Volunteer::findOrFail($assistance->volunteer_id);
        $volunteer->update(['availability' => 'متاح']); // تحديث حالة المتطوع

        $blind = Blind::findOrFail($assistance->blind_id); // تأكد من وجود حقل blind_id

        Notification::send($blind, new AssistanceCompletedNotification($volunteer->id, $volunteer->name,$assistance->id));

        return redirect()->route('volunteers.index')->with('success', 'تم اكمال المساعدة بنجاح.');
    }



    public function rejectAssistance(Request $request, $volunteerId, $blindId)
    {
        // استرجاع المتطوع والكفيف
        $volunteer = Volunteer::findOrFail($volunteerId);
        $blind = Blind::findOrFail($blindId);

        // تسجيل الرفض في جدول reject_assistances
        RejectAssistance::create([
            'volunteer_id' => $volunteer->id,
            'blind_id' => $blind->id,
            'rejection_at' => now(),
        ]);

        // يمكنك إضافة منطق إضافي هنا إذا أردت
        Notification::send($blind, new RejectionNotification($volunteer->id, $volunteer->name));

        return redirect()->route('volunteers.index')->with('rejection', 'تم رفض طلب المساعدة .');
    }


}
