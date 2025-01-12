<?php

namespace App\Http\Controllers;

use App\Models\Blind;
use App\Models\Report;
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
            // البحث عن المتطوعين بالاسم أو المدينة أو نوع المساعدة
            $blinds = Blind::where('name', 'LIKE', "%{$query}%")
                ->orWhere('city', 'LIKE', "%{$query}%")
                ->get();
        } else {
            // إذا لم يكن هناك استعلام، احصل على جميع المتطوعين
            $blinds = Blind::all();
        }
        return view('admin.blind',compact('blinds'));

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
        $volunteer->delete(); // حذف المتطوع

        return redirect()->back()->with('reject', 'تم رفض طلب المتطوع وحذفه.');
    }

    public function reject_blind($id)
    {
        $blind = Blind::findOrFail($id);
        $blind->delete(); // حذف المتطوع

        return redirect()->back()->with('reject', 'تم حذف الكفيف.');
    }

    public function showReports()
    {
        $reports = Report::where('status', 0)->get();
        return view('admin.reports', compact('reports'));
    }

    public function rejectReport($id)
    {

    // ابحث عن المتطوع بناءً على المعرف
    $volunteer = Volunteer::findOrFail($id);

    // تحديث حالة البلاغات المرتبطة بالمتطوع
    Report::where('volunteer_id', $volunteer->id)->update(['status' => 1]); // تغيير الحالة إلى 1

    // حذف المتطوع
    $volunteer->delete(); // قم بحذف المتطوع من قاعدة البيانات

    return redirect()->back()->with('success', 'تم حذف المتطوع وتحديث حالة البلاغ.');
    }

    public function deactivate($id) // تعديل الاسم هنا
    {
        // ابحث عن المتطوع بناءً على المعرف
        $volunteer = Volunteer::findOrFail($id);

        // تحديث حالة البلاغات المرتبطة بالمتطوع إلى 1
        Report::where('volunteer_id', $volunteer->id)->update(['status' => 1]); // تغيير حالة البلاغ إلى 1

        // تحديث حالة المتطوع إلى 0
        $volunteer->status = 0; // تعيين حالة المتطوع إلى غير مفعل
        $volunteer->availability = 'غير متاح';
        $volunteer->save(); // حفظ التغييرات في قاعدة البيانات

        return redirect()->back()->with('success', 'تم تحديث حالة المتطوع وحالة البلاغ بنجاح.');
    }

}
