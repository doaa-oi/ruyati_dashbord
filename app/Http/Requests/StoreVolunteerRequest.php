<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Foundation\Http\FormRequest;

class StoreVolunteerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                function ($attribute, $value, $fail) {
                    // تحقق من وجود البريد الإلكتروني في جدول المستخدمين
                    if (User::where('email', $value)->exists()) {
                        $fail('هذا البريد الإلكتروني مستخدم بالفعل  .');
                    }

                    // تحقق من وجود البريد الإلكتروني في جدول المتطوعين
                    if (Volunteer::where('email', $value)->exists()) {
                        $fail('هذا البريد الإلكتروني مستخدم بالفعل.');
                    }
                },
            ],
            'password' => 'required|string|confirmed|min:8',
            'age' => 'required|integer|min:12|max:120',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'national_id' => 'required|string|max:20|unique:volunteers,national_id',
            'gender' => 'required|string|in:ذكر,أنثى', // Select option
            'assistance_type' => 'required|string', // Select option
            'available_days' => 'required|array', // Checkboxes
            'available_from' => 'required|string', // Select option
            'available_to' => 'required|string', // Select option
            'user_type' => 'required|string|in:volunteer,blind', // Select option
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا.',

            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.string' => 'يجب أن يكون البريد الإلكتروني نصًا.',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',

            'password.required' => 'كلمة المرور مطلوبة.',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
            'password.min' => 'يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل.',

            'age.required' => 'العمر مطلوب.',
            'age.integer' => 'يجب أن يكون العمر عددًا صحيحًا.',
            'age.min' => 'يجب أن يكون العمر 12 على الأقل.',
            'age.max' => 'يجب أن يكون العمر 120 كحد أقصى.',

            'city.required' => 'اسم المدينة مطلوب.',
            'city.string' => 'يجب أن تكون المدينة نصًا.',
            'city.max' => 'يجب ألا تتجاوز المدينة 255 حرفًا.',

            'phone.required' => 'رقم الهاتف مطلوب.',
            'phone.string' => 'يجب أن يكون رقم الهاتف نصًا.',
            'phone.max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفًا.',

            'national_id.required' => 'الرقم الوطني مطلوب.',
            'national_id.string' => 'يجب أن يكون الرقم الوطني نصًا.',
            'national_id.max' => 'يجب ألا يتجاوز الرقم الوطني 20 حرفًا.',
            'national_id.unique' => 'هذا الرقم الوطني مستخدم بالفعل.',

            'gender.required' => 'الجنس مطلوب.',
            'gender.string' => 'يجب أن يكون الجنس نصًا.',
            'gender.in' => 'يجب أن يكون الجنس "ذكر" أو "انثى".',

            'assistance_type.required' => 'نوع المساعدة مطلوب.',
            'assistance_type.string' => 'يجب أن يكون نوع المساعدة نصًا.',

            'available_days.required' => 'أيام المساعدة مطلوبة.',
            'available_days.array' => 'يجب أن تكون أيام المساعدة مصفوفة.',

            'available_from.required' => 'وقت البدء مطلوب.',
            'available_from.string' => 'يجب أن يكون وقت البدء نصًا.',

            'available_to.required' => 'وقت الانتهاء مطلوب.',
            'available_to.string' => 'يجب أن يكون وقت الانتهاء نصًا.',

            'user_type.required' => 'نوع المستخدم مطلوب.',
            'user_type.string' => 'يجب أن يكون نوع المستخدم نصًا.',
            'user_type.in' => 'يجب أن يكون نوع المستخدم "volunteer" أو "blind".',
        ];
    }

}
