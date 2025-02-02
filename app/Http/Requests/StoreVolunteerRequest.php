<?php

namespace App\Http\Requests;

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
            'email' => 'required|string|email|max:255|unique:volunteers',
            'password' => 'required|string|confirmed|min:8',
            'age' => 'required|integer|min:1|max:120',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'national_id' => 'required|string|max:20',
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
            'name.required' => 'ادخل اسمك',
            'name.string' => 'يجب أن يكون الاسم نصًا',
            'name.max' => 'يجب ألا يتجاوز الاسم 255 حرفًا',

            'email.required' => 'ادخل بريدك الإلكتروني',
            'email.email' => 'يرجى إدخال بريد إلكتروني صالح',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل',

            'password.required' => 'ادخل كلمة المرور',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
            'password.min' => 'يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل',

            'age.required' => 'ادخل عمرك',
            'age.integer' => 'يجب أن يكون العمر عددًا صحيحًا',
            'age.min' => 'يجب أن يكون العمر 1 على الأقل',
            'age.max' => 'يجب أن يكون العمر 120 كحد أقصى',

            'city.required' => 'ادخل اسم مدينتك',
            'city.string' => 'يجب أن تكون المدينة نصًا',
            'city.max' => 'يجب ألا تتجاوز المدينة 255 حرفًا',

            'phone.required' => 'ادخل رقم هاتفك',
            'phone.string' => 'يجب أن يكون رقم الهاتف نصًا',
            'phone.max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفًا',

            'national_id.required' => 'ادخل الرقم الوطني',
            'national_id.string' => 'يجب أن يكون الرقم الوطني نصًا',
            'national_id.max' => 'يجب ألا يتجاوز الرقم الوطني 20 حرفًا',

            'gender.required' => 'اختر جنسك',
            'gender.string' => 'يجب أن يكون الجنس نصًا',
            'gender.in' => 'يجب أن يكون الجنس "ذكر" أو "انثى"',

            'assistance_type.required' => 'اختر نوع المساعدة',
            'assistance_type.string' => 'يجب أن يكون نوع المساعدة نصًا',

            'available_days.required' => 'اختر أيام المساعدة',
            'available_days.array' => 'يجب أن تكون أيام المساعدة مصفوفة',

            'available_from.required' => 'اختر وقت البدء',
            'available_from.string' => 'يجب أن يكون وقت البدء نصًا',

            'available_to.required' => 'اختر وقت الانتهاء',
            'available_to.string' => 'يجب أن يكون وقت الانتهاء نصًا',

            'user_type.required' => 'اختر نوع المستخدم',
            'user_type.string' => 'يجب أن يكون نوع المستخدم نصًا',
            'user_type.in' => 'يجب أن يكون نوع المستخدم "volunteer" أو "blind"',
        ];
    }

}
