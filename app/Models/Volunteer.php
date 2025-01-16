<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Volunteer extends Model
{

    use HasFactory, Notifiable;




    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'city',
        'phone',
        'national_id', // الرقم الوطني
        'gender',
        'assistance_type',
        'available_days',
        'available_from',
        'available_to',
        'user_type', // نوع المستخدم: متطوع أو كفيف
        'user_id',
        'availability',
        'rating',
        'status',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    
    public function assistances()
    {
        return $this->hasMany(Assistance::class); // تأكد من أن Assistance هو الاسم الصحيح
    }

    public function directAssistances()
    {
        return $this->hasMany(DirectAssistance::class); // تأكد من أن DirectAssistance هو الاسم الصحيح
    }

    public function reports()
    {
        return $this->hasMany(Report::class); // تأكد من أن Report هو الاسم الصحيح
    }

    public function rejectAssistances()
    {
        return $this->hasMany(RejectAssistance::class); // تأكد من أن RejectAssistance هو الاسم الصحيح
    }

}



