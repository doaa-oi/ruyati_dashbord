<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectAssistance extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_id',
        'blind_id',
        'approved_at',
        'completed_at',
        'status',
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }

    public function blind()
    {
        return $this->belongsTo(Blind::class,'blind_id');
    }

}
