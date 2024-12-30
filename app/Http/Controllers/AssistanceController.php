<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use App\Models\HelpRequest;
use App\Models\Volunteer;
use Illuminate\Http\Request;

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

        // تحديث حالة المتطوع إلى "متاح"
        $volunteer->update(['availability' => 'متاح']); // تأكد من أن لديك حقل availability في جدول المتطوعين

        return redirect()->back()->with('success', 'تم اكتمال المساعدة بنجاح.');
    }
}
