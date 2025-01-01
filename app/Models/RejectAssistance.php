<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectAssistance extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_id',
        'blind_id',
        'rejection_at',
    ];

}
