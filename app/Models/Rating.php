<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    use HasFactory;

    protected $fillable = [
        'volunteer_id',
        'blind_id',
        'rating',
    ];

    // تعريف علاقات النموذج
    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class,'volunteer_id');
    }

    public function blind()
    {
        return $this->belongsTo(Blind::class,'blind_id');
    }

}
