<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlindRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:blinds', // تعديل هنا
            'password' => 'required|string|confirmed|min:8',
            'age' => 'required|integer|min:12|max:120',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|in:ذكر,أنثى',
            'user_type' => 'required|string|in:blind',
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
            'email.max' => 'يجب ألا يتجاوز البريد الإلكتروني 255 حرفًا.',
            'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',

            'password.required' => 'كلمة المرور مطلوبة.',
            'password.string' => 'يجب أن تكون كلمة المرور نصًا.',
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

            'gender.required' => 'الجنس مطلوب.',
            'gender.string' => 'يجب أن يكون الجنس نصًا.',
            'gender.in' => 'يجب أن يكون الجنس "ذكر" أو "أنثى".',

            'user_type.required' => 'نوع المستخدم مطلوب.',
            'user_type.string' => 'يجب أن يكون نوع المستخدم نصًا.',
            'user_type.in' => 'يجب أن يكون نوع المستخدم "blind".',
        ];
    }

}
