<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    use HasFactory;

    protected $fillable = [
        'volunteer_id', 'blind_id', 'help_request_id', 'approved_at', 'completed_at',
    ];
}
