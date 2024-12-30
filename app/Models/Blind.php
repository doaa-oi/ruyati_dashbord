<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blind extends Model
{


    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'city',
        'phone',
        'gender',
        'user_type', // نوع المستخدم: متطوع أو كفيف
        'user_id', // نوع المستخدم: متطوع أو كفيف
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function helprequest(){
        return $this->hasMany(HelpRequest::class,'user_id');
    }
}
