<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpRequest extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'location_url',
    ];

    public function blind()
    {
        return $this->belongsTo(Blind::class,'user_id');
    }

}
