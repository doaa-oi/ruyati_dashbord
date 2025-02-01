<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlindRequest;
use App\Models\Blind;
use App\Models\Report;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class BlindController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteers=Volunteer::all();
        //return $volunteers;

        $blind = Auth::user()->blind;

        // تحديد الأنواع التي ترغب في الحصول على الإشعارات لها
        $types = [
            'App\Notifications\ApprovedNotification',
            'App\Notifications\RejectionNotification'
        ];

        // الحصول على الإشعارات غير المقروءة من النوع المحدد للكفيف المرتبط بالمستخدم
        $blind = $blind->notifications()
                                ->whereIn('type', $types)
                                ->get();

        return view('layout.index',compact('volunteers','blind'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sign_in_up.blind_registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlindRequest $request)
    {
        // // التحقق من البيانات المدخلة
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:blinds', // تعديل هنا
        //     'password' => 'required|string|confirmed|min:8',
        //     'age' => 'required|integer|min:1|max:120',
        //     'city' => 'required|string|max:255',
        //     'phone' => 'required|string|max:20',
        //     'gender' => 'required|string|in:ذكر,انثى',
        //     'user_type' => 'required|string|in:blind',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password), // تجزئة كلمة المرور
            'email_verified_at' => now(), // تعيين الوقت الحالي
            'remember_token' => Str::random(60), // تعيين قيمة عشوائية
        ]);

        Auth::login($user);

        Blind::create([
            'user_id' => $user->id, // احفظ معرف المستخدم
            'name' => $request->name, // استخدم input() للحصول على القيمة
            'email' => $request->email,
            'password' => Hash::make($request->password), // تجزئة كلمة المرور
            'age' => $request->age,
            'city' => $request->city,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'user_type' => $request->user_type,
            'status' => 1,

        ]);
        return redirect()->route('blind.index');

     //   return redirect()->route('blind.dashboard')->with('success', 'تم التسجيل بنجاح!');
    //return view('layout.dashb');
    }

    /**
     * Display the specified resource.
     */



        public function show(Blind $blind)
        {

                // الحصول على معلومات المستخدم المسجل دخوله
                $user = Auth::user();

        // الحصول على معلومات المتطوع المرتبطة بالمستخدم
            $blind = $user->blind; // هذه تمثل السجل في جدول المتطوعين المرتبط بالمستخدم



        return view('layout.profileb', compact('blind')); // يتم تمرير معلومات المتطوع للعرض


        }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blind $blind)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $blind = Blind::where('id', $request->id)->firstOrFail();
        $user = User::where('id', $blind->user_id)->firstOrFail();

        // Update the User information
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // You can choose to hash the password if it's provided
           // 'password' => $request->password ? Hash::make($request->password) : $user->password,
            'user_type' => $request->user_type, // If user_type needs to be updated
        ]);

        // Update the Volunteer information
        $blind->update([
            'name' => $request->name,
            'email' => $request->email,
            // You can choose to hash the password if it's provided
            //'password' => $request->password ? Hash::make($request->password) : $user->password,
            'user_type' => $request->user_type, // If user_type needs to be updated

            'age' => $request->age,
            'city' => $request->city,
            'phone' => $request->phone,

            'gender' => $request->gender,

            // Note: user_type is typically not updated in volunteer's table
        ]);


        // Redirect with success message
        return redirect()->route('blinds.index')->with('success', 'تم تحديث المعلومات بنجاح!');

    }



    public function showvolunteer($encryptedId)
    {



        // فك تشفير المعرف
        $volunteerId = Crypt::decrypt($encryptedId);

        // البحث عن المتطوع بناءً على معرفه
        $volunteer = Volunteer::findOrFail($volunteerId); // تأكد من أن ID صحيح


        // استرجاع إشعارات المتطوع من جدول notifications
        $notifications = DB::table('notifications')
        ->where('data->VolunteerId', (string)$volunteer->id) // التأكد من أن القيمة برقم صحيح أو نصي
        ->get();
       //dd($notifications); // اضف هذا السطر للتحقق من وجود البيانات

        // تحديث جميع الإشعارات المطابقة لتعيين الوقت الحالي كوقت القراءة
        DB::table('notifications')
        ->whereIn('id', $notifications->pluck('id'))
        ->update(['read_at' => now()]);



        // إعادة عرض معلومات الكفيف
        return view('layout.volunteer_profile', compact('volunteer', 'notifications'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            // البحث عن المتطوعين بالاسم، المدينة، أو التخصص
            $volunteers = Volunteer::where('name', 'LIKE', "%{$query}%")
                ->orWhere('city', 'LIKE', "%{$query}%")
                ->orWhere('assistance_type', 'LIKE', "%{$query}%")
                ->get();
        } else {
            // إذا لم يكن هناك استعلام، استرجع جميع المتطوعين
            $volunteers = Volunteer::all();
        }

        return view('layout.index', compact('volunteers'));
    }
    // gdfgjvhkbjknlm,;?
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blind $blind)
    {
        //
    }

    public function report(Request $request)
    {
        $request->validate([
            'report_details' => 'required|string|max:1000', // تأكيد أن حقل البلاغ مطلوب ويجب أن لا يتجاوز 1000 حرف
        ]);

        // إنشاء البلاغ في قاعدة البيانات
        Report::create([
            'volunteer_id' => $request->input('volunteer_id'),
            'blind_id' => $request->input('blind_id'),
            'message' => $request->input('report_details'),
            'status' => 0,
        ]);

        return redirect()->back()->with('report', 'تم إرسال البلاغ بنجاح.');
    }
}
