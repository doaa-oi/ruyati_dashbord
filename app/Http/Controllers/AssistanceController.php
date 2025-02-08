<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use App\Models\Blind;
use App\Models\HelpRequest;
use App\Models\Volunteer;
use App\Notifications\ApprovedNotification;
use App\Notifications\AssistanceCompletedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AssistanceController extends Controller
{
    public function approveAssistance($volunteerId, $blindId, $requestId)
    {
        $assistance = Assistance::firstOrCreate(
            [
                'volunteer_id' => $volunteerId,
                'blind_id' => $blindId,
                'help_request_id' => $requestId
            ],
            [
                'approved_at' => now()
            ]
        );
            // تحديث حالة طلب المساعدة إلى "in progress"
    $helpRequest = HelpRequest::findOrFail($requestId); // استرجاع طلب المساعدة
    $helpRequest->update(['status' => 'قيد التنفيذ']); // قم بتحديث الحالة

    $volunteer = Volunteer::findOrFail($volunteerId); // استرجاع معلومات المتطوع
    $volunteer->update(['availability' => 'غير متاح']); // تأكد من أن لديك حقل لتحديد حالة التوفر

    $blind = Blind::findOrFail($blindId);

    Notification::send($blind, new ApprovedNotification($volunteer->id, $volunteer->name));

        return redirect()->back()->with('success', 'تمت الموافقة على طلب المساعدة بنجاح.');
    }

    public function completeAssistance($id)
    {
        $assistance = Assistance::findOrFail($id);



        $assistance->update([
            'completed_at' => now()
        ]);

        $helpRequest = HelpRequest::findOrFail($assistance->help_request_id); // استرجاع الطلب المرتبط بالمساعدة
        $helpRequest->update(['status' => 'مكتمل']); // تعيين الحالة إلى "مكتمل"

        $volunteer = Volunteer::findOrFail($assistance->volunteer_id); // تأكد من وجود حقل volunteer_id
        $blind = Blind::findOrFail($assistance->blind_id); // تأكد من وجود حقل blind_id

        // تحديث حالة المتطوع إلى "متاح"
        $volunteer->update(['availability' => 'متاح']); // تأكد من أن لديك حقل availability في جدول المتطوعين

        Notification::send($blind, new AssistanceCompletedNotification($volunteer->id, $volunteer->name,$assistance));

        return redirect()->route('volunteers.index')->with('success', 'تم اكمال المساعدة بنجاح.');
    }
}
