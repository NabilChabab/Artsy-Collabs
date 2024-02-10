<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArtProjectUser extends Pivot
{

    use HasFactory;
    protected $fillable = ['response_status', 'request_status'];


    public const RESPONSE_STATUS_LABELS = [
        0 => 'Pending',
        1 => 'Accepted',
        2 => 'Refused',
    ];



public function getResponseStatusAttribute()
{
    return self::RESPONSE_STATUS_LABELS[$this->attributes['response_status']] ?? 'Unknown';
}


    
}