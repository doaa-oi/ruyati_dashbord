<?php

namespace App\Http\Controllers;

use App\Models\Assistance;
use App\Models\Blind;
use App\Models\DirectAssistance;
use App\Models\HelpRequest;
use App\Models\User;
use App\Models\Volunteer;
use App\Notifications\HelpRequestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Notification;


class HelpRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }







   public function pendingRequests()
   {
       // استرجاع طلبات المساعدة التي تحمل الحالة "معلقة"
       $help_requests = HelpRequest::with('blind') // تحميل العلاقة مع الكفيف
       ->where('status', 'معلق')
       ->get();
       // إعادة عرض الطلبات في واجهة جديدة
       return view('layoutv.allposts', compact('help_requests'));
   }

    public function inProgressRequests()
    {
        // احصل على معرف المتطوع الحالي
        $volunteerId = Auth::user()->volunteer->id; // يجب أن يكون للمتطوع معرف مرتبط في الجلسة

        // جمع معرفات المكفوفين من المساعدات الحالية التي تخص المتطوع الحالي
        $assistanceIDs = DirectAssistance::where('status', 'قيد التنفيذ')
            ->where('volunteer_id', $volunteerId) // تأكد من أن المتطوع الحالي هو المستهدف
            ->pluck('blind_id'); // جمع معرفات المكفوفين

        // جمع بيانات المكفوفين بناءً على المعرفات
        $blinds = Blind::whereIn('id', $assistanceIDs)->get();

        $assistances = Assistance::where('volunteer_id', $volunteerId)
            ->pluck('help_request_id');

        $help_requests = HelpRequest::whereIn('id', $assistances)
            ->where('status', 'قيد التنفيذ')
            ->get();

        // عرض الطلبات
        return view('layoutv.myposts', compact('help_requests', 'blinds'));
    }


    public function userRequests()
    {

        $blind = Auth::user()->blind;

        // احصل على طلبات المساعدة الخاصة بالمستخدم المسجل دخوله
        $help_requests = HelpRequest::where('user_id', $blind->id)
        ->where('status', 'معلق') // إضافة شرط الحالة
        ->get();
        // أعد عرض الطلبات في عرض
        return view('help_request.my_help_request', compact('help_requests'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('help_request.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   // تحقق من صحة البيانات
        $validated = $request->validate([
            'user_id' => 'required|exists:blinds,id', // تأكد من أن user_id موجود في blinds
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location_url' => 'nullable|url',
        ], [

            'title.required' => 'العنوان مطلوب.',
            'title.string' => 'يجب أن يكون العنوان نصًا.',
            'title.max' => 'يجب ألا يتجاوز العنوان 255 حرفًا.',
            'description.string' => 'يجب أن تكون الوصف نصًا.',
            'description.required' => 'يجب إدخال وصف للطلب.',
            'location_url.url' => 'يرجى إدخال عنوان URL صالح.',
        ]);

        // قم بإنشاء طلب المساعدة
        HelpRequest::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'معلق', // حالة الطلب الافتراضية
            'location_url' => $request->location_url,
        ]);

   // dd($request->all()); // تفحص القيم المرسلة

   return redirect()->route('my.help.request')->with('success', 'تم إنشاء الطلب بنجاح.');
    }

    /**
     * Display the specified resource.
     */
    public function show($encryptedId)
    {
        // فك تشفير المعرف
        $help_requestId = Crypt::decrypt($encryptedId);

        // البحث عن الكفيف بناءً على معرفه
        $help_request = HelpRequest::with('blind')->findOrFail($help_requestId); // تحميل العلاقة

        $assistanceId = Assistance::where('help_request_id', $help_requestId)->value('id'); // أو استخدم findOrFail إذا كنت تعرفه

        return view('help_request.show', compact('help_request', 'assistanceId'));

        // إعادة عرض معلومات الكفيف
       // return view('help_request.show', compact('help_request'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($encryptedId)
    {
        // فك تشفير المعرف
        $help_requestId = Crypt::decrypt($encryptedId);

        // استرجاع الطلب
        $help_request = HelpRequest::findOrFail($help_requestId);

        // احصل على الكفيف المرتبط بالمستخدم الحالي
        $blind = Auth::user()->blind;

        // تحقق مما إذا كان الكفيف موجودًا وتحقق إذا كان لديه حق الوصول لهذا الطلب
        if ($blind && $help_request->user_id !== $blind->id) {
            return redirect()->back()->with('error', 'ليس لديك إذن لتحرير هذا الطلب.');
        }

        return view('help_request.edit', compact('help_request'));
    }

    public function update(Request $request)
    {


        $help_request = HelpRequest::where('id', $request->id)->firstOrFail();

        // Update the Volunteer information
        $help_request->update([
            'title' => $request->title,
            'description' => $request->description,
            'location_url' => $request->location_url,
        ]);


        // Redirect with success message
        return redirect()->route('my.help.request')->with('update', 'تم تعديل الطلب بنجاح!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $helpRequest = HelpRequest::findOrFail($id);

    $blind = Auth::user()->blind;
    // تحقق مما إذا كان المستخدم لديه الإذن لحذف هذا الطلب
    if ($helpRequest->user_id !== $blind->id) {
        return redirect()->back()->with('error', 'ليس لديك الإذن لحذف هذا الطلب.');
    }

    $helpRequest->delete(); // حذف الطلب

    return redirect()->route('my.help.request')->with('delete', 'تم حذف الطلب بنجاح.');
}



public function sendHelpRequest($encryptedId, $encryptedBlindId)
{
    // فك تشفير المعرفات
    $volunteerId = Crypt::decrypt($encryptedId);
    $blindId = Crypt::decrypt($encryptedBlindId);

    // ابحث عن المتطوع باستخدام معرفه في جدول المتطوعين
    $volunteer = Volunteer::findOrFail($volunteerId); // تأكد من استخدام نموذج Volunteer


    // احصل على الكفيف باستخدام blindId
    $blind = Blind::find($blindId);

    // إرسال الإشعار إلى المتطوع
    Notification::send($volunteer, new HelpRequestNotification($blind->id, $blind->name));

    return back()->with('send', 'تم طلب المساعدة من المتطوع ' . $volunteer->name);
}


}
