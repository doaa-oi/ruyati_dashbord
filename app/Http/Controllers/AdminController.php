<?php

namespace App\Http\Controllers;

use App\Models\Blind;
use App\Models\Report;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function dashboard()
    // {
    //     return view('admin.volunteers'); // تأكد من أن الـ view موجودة
    // }


    public function showBlinds(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // البحث عن الكفيفين بالاسم أو المدينة أو نوع المساعدة، مع التأكد من أن الحالة تساوي 1
            $blinds = Blind::where('status', 1)
                ->where(function($queryBuilder) use ($query) {
                    $queryBuilder->where('name', 'LIKE', "%{$query}%")
                                 ->orWhere('city', 'LIKE', "%{$query}%");
                })
                ->get();
        } else {
            // إذا لم يكن هناك استعلام، احصل على جميع الكفيفين الذين لديهم حالة 1
            $blinds = Blind::where('status', 1)->get();
        }

        return view('admin.blind', compact('blinds'));
    }

    public function showVolunteers(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // البحث عن المتطوعين بالاسم، المدينة، أو التخصص مع شرط كونهم مفعلين
            $volunteers = Volunteer::where('status', 1) // شرط التفعيل
                ->where(function($queryBuilder) use ($query) {
                    $queryBuilder->where('name', 'LIKE', "%{$query}%")
                        ->orWhere('city', 'LIKE', "%{$query}%")
                        ->orWhere('assistance_type', 'LIKE', "%{$query}%");
                })
                ->get();
        } else {
            // إذا لم يكن هناك استعلام، استرجع جميع المتطوعين
            $volunteers = Volunteer::where('status', 1)->get();
        }        return view('admin.volunteers',compact('volunteers'));

    }

    public function newVolunteer()
    {
        $volunteers = Volunteer::where('status', 0)->get();
        return view('admin.new_volunteer_requests', compact('volunteers'));
    }

    public function accept($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->status = 1; // تعيين الحالة إلى "مفعل"
        $volunteer->save();

        return redirect()->back()->with('accept', 'تم قبول المتطوع بنجاح.');
    }

    public function reject($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->status = 3; // تعيين الحالة إلى "محذوف"
        $volunteer->save();
        return redirect()->back()->with('reject', 'تم رفض طلب المتطوع وحذفه.');
    }

    public function reject_blind($id)
    {
        $blind = Blind::findOrFail($id);
        $blind->status = 0; // تعيين الحالة إلى "محذوف"
        $blind->save();

        return redirect()->back()->with('reject', 'تم حذف الكفيف.');
    }

    public function showReports()
    {
        $reports = Report::where('status', 0)->get();
        return view('admin.reports', compact('reports'));
    }

    public function rejectReport($volunteerId, $reportId)
    {
        // ابحث عن المتطوع بناءً على المعرف
        $volunteer = Volunteer::findOrFail($volunteerId);

        // تحديث حالة البلاغ المرتبط
        $report = Report::findOrFail($reportId);
        $report->status = 1; // تغيير الحالة إلى 1
        $report->save();

        // حذف المتطوع
        $volunteer->status = 3; // تعيين الحالة إلى "مفعل"
        $volunteer->save();

        return redirect()->back()->with('success', 'تم حذف المتطوع وتحديث حالة البلاغ.');
    }

    public function deactivate($volunteerId, $reportId)
    {
        // ابحث عن المتطوع بناءً على المعرف
        $volunteer = Volunteer::findOrFail($volunteerId);

        // تحديث حالة البلاغ المرتبط
        $report = Report::findOrFail($reportId);
        $report->status = 1; // تغيير الحالة إلى 1
        $report->save();

        // تحديث حالة المتطوع إلى 0
        $volunteer->status = 2; // تعيين حالة المتطوع إلى غير مفعل
        $volunteer->availability = 'غير متاح';
        $volunteer->save(); // حفظ التغييرات في قاعدة البيانات

        return redirect()->back()->with('success', 'تم تحديث حالة المتطوع وحالة البلاغ بنجاح.');
    }

    public function showVolunteersDeactivate(Request $request)
    {

        $volunteers = Volunteer::where('status', 2)->get();
        return view('admin.volunteers_deactivate', compact('volunteers'));

    }

    public function activate($volunteerId)
{
    // ابحث عن المتطوع بناءً على المعرف
    $volunteer = Volunteer::findOrFail($volunteerId);

    // تحديث حالة المتطوع إلى 1 (نشط)
    $volunteer->status = 1; // تعيين حالة المتطوع إلى نشط
    $volunteer->availability = 'متاح'; // تحديث حالة التوفر
    $volunteer->save(); // حفظ التغييرات في قاعدة البيانات

    return redirect()->back()->with('success', 'تم تحديث حالة المتطوع وحالة البلاغ بنجاح.');
}

public function showRejectedBlinds()
{
    // الحصول على الكفيفين المرفوضين (الذين لديهم حالة رفض)
    $blinds = Blind::where('status', 0)->get(); // تأكد من استخدام القيمة الصحيحة للحالة

    // إرجاع عرض مع الكفيفين المرفوضين
    return view('admin.blinds_rejected', compact('blinds'));
}

public function showRejectedVolunteers()
{
    // الحصول على الكفيفين المرفوضين (الذين لديهم حالة رفض)
    $volunteers = Volunteer::where('status', 3)->get(); // تأكد من استخدام القيمة الصحيحة للحالة

    // إرجاع عرض مع الكفيفين المرفوضين
    return view('admin.volunteers_rejected', compact('volunteers'));
}

public function showStatistics()
{

    $volunteers=User::where('user_type','volunteer')->count();
    $blinds=User::where('user_type','blind')->count();




    $volunteers_statistics = Volunteer::with([
        'assistances', // لطلبات المساعدة
        'directAssistances', // للمساعدات المباشرة
        'reports', // البلاغات
        'rejectAssistances' // طلبات الرفض
    ])
    ->get();

// إنشاء مصفوفة لتخزين إحصائيات كل متطوع
$statistics = [];

foreach ($volunteers_statistics as $volunteer_statistics) {
    // إضافة إحصائيات المتطوع
    $statistics[] = [
        'name' => $volunteer_statistics->name, // اسم المتطوع
        'accepted_requests' => $volunteer_statistics->assistances->count() + $volunteer_statistics->directAssistances->count(), // مجموع مساعدات القبول
        'rejected_requests' => $volunteer_statistics->rejectAssistances->count(), // أعداد الطلبات المرفوضة
        'reports' => $volunteer_statistics->reports->count(), // أعداد البلاغات
    ];
}

    return view('admin.show_statistics', compact('volunteers','blinds','statistics'));
}


}
