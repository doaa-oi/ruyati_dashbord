<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVolunteerRequest;
use App\Models\Blind;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blinds=Blind::all();

        return view('layoutv.dashv',compact('blinds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sign_in_up.volunteer_registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVolunteerRequest $request)
    {

        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:volunteers',
        //     'password' => 'required|string|confirmed|min:8',
        //     'age' => 'required|integer|min:1|max:120',
        //     'city' => 'required|string|max:255',
        //     'phone' => 'required|string|max:20',
        //     'national_id' => 'required|string|max:20',
        //     'gender' => 'required|string|in:ذكر,انثى',
        //     'assistance_type' => 'required|string',
        //     'available_days' => 'required|array',
        //     'available_from' => 'required|string',
        //     'available_to' => 'required|string',
        //     'user_type' => 'required|string|in:volunteer,blind',
        // ]);

        $selectedDays = implode(',', $request->input('available_days'));

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => $request->user_type,
            'password' => Hash::make($request->password), // تجزئة كلمة المرور
            'email_verified_at' => now(), // تعيين الوقت الحالي
            'remember_token' => Str::random(60), // تعيين قيمة عشوائية
        ]);

        Auth::login($user);

        Volunteer::create([
            'user_id' => $user->id, // احفظ معرف المستخدم هنا
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Directly use $request->password
            'age' => $request->age,
            'city' => $request->city,
            'phone' => $request->phone,
            'national_id' => $request->national_id,
            'gender' => $request->gender,
            'assistance_type' => $request->assistance_type,
            'available_days' => implode(',', $request->available_days), // Assuming $request->available_days is an array
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
            'availability' => 'متاح',
            'rating' => '0.0',
            'user_type' => $request->user_type,

]);
return redirect()->route('volunteers.index');


        //return redirect()->route('home')->with('success', 'تم التسجيل بنجاح!');
//        return view('layoutv.dashv');


    }
    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteer)
    {


   // الحصول على معلومات المستخدم المسجل دخوله
   $user = Auth::user();

   // الحصول على معلومات المتطوع المرتبطة بالمستخدم
   $volunteer = $user->volunteer; // هذه تمثل السجل في جدول المتطوعين المرتبط بالمستخدم

   // تحويل days المخزنة كنص إلى مصفوفة إذا كانت مخزنة كسلسلة نصية مفصولة
   $volunteer->available_days = explode(',', $volunteer->available_days);

   return view('layoutv.profilev', compact('volunteer')); // يتم تمرير معلومات المتطوع للعرض

    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(Volunteer $volunteer)
     {
         //
     }


     public function showblind($encryptedId)
     {



         // فك تشفير المعرف
         $blindId = Crypt::decrypt($encryptedId);

         // البحث عن الكفيف بناءً على معرفه
         $blind = Blind::findOrFail($blindId); // تأكد من أن ID صحيح


   // احصل على  الإشعارات المطابقة
   $notificationIds = DB::table('notifications')
   ->where('data->BlindId', $blind->id)
   ->pluck('id');

    // تحديث جميع الإشعارات المطابقة لتعيين الوقت الحالي كوقت القراءة
    DB::table('notifications')
    ->whereIn('id', $notificationIds)
    ->update(['read_at' => now()]);



         // إعادة عرض معلومات الكفيف
         return view('layoutv.blind_profile', compact('blind'));
     }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $volunteer = Volunteer::where('id', $request->id)->firstOrFail();
        $user = User::where('id', $volunteer->user_id)->firstOrFail();

        // Update the User information
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // You can choose to hash the password if it's provided
           // 'password' => $request->password ? Hash::make($request->password) : $user->password,
            'user_type' => $request->user_type, // If user_type needs to be updated
        ]);

        // Update the Volunteer information
        $volunteer->update([
            'name' => $request->name,
            'email' => $request->email,
            // You can choose to hash the password if it's provided
            //'password' => $request->password ? Hash::make($request->password) : $user->password,
            'user_type' => $request->user_type, // If user_type needs to be updated

            'age' => $request->age,
            'city' => $request->city,
            'phone' => $request->phone,
            'national_id' => $request->national_id,
            'gender' => $request->gender,
            'assistance_type' => $request->assistance_type,
            'available_days' => implode(',', $request->available_days),
            'available_from' => $request->available_from,
            'available_to' => $request->available_to,
            // Note: user_type is typically not updated in volunteer's table
        ]);


        // Redirect with success message
        return redirect()->route('volunteers.index')->with('success', 'تم تحديث المعلومات بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }




//     public function updatePassword(Request $request)
// {

//    // dd($request->current_password); // تحقق من القيم

//     // تحقق من صحة البيانات
//     $request->validate([
//         'current_password' => 'required|string',
//         'new_password' => 'required|string|min:8|confirmed',
//     ]);

//     // الحصول على المتطوع المرتبط بالمستخدم الحالي
//     $volunteer = Volunteer::where('user_id', Auth::id())->firstOrFail(); // تأكد من استخدام user_id

//     // التحقق من صحة كلمة المرور الحالية
//     if (!Hash::check($request->current_password, $volunteer->user->password)) {
//         return redirect()->back()->withErrors(['current_password' => 'كلمة المرور الحالية غير صحيحة.']);
//     }

//     // تحديث كلمة المرور في جدول المستخدمين
//     $volunteer->user->password = Hash::make($request->new_password);
//     $volunteer->user->save();

//     // إذا كان لديك حاجة لتحديث معلومات المتطوع أيضًا، يمكنك إضافتها هنا إذا لزم الأمر
//     // مثال على تحديث معلومات المتطوع إذا كانت جديدة
//     // $volunteer->update([...]);

//     // توجيه المستخدم مع رسالة نجاح
//     return redirect()->route('volunteer.dashboard')->with('success', 'تم تغيير كلمة المرور بنجاح!');
// }





public function search(Request $request)
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

    return view('layoutv.dashv', compact('blinds'));
}

}



