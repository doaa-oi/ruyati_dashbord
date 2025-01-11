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

}



