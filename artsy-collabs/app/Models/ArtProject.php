<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ArtProject extends Model implements HasMedia
{
    use SoftDeletes;
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'title', 'description', 'budget', 'start_date', 'end_date', 'status', 'partner_id'
    ];

    public const STATUS_LABELS = [
        0 => 'Pending',
        1 => 'Accepted',
        2 => 'Refused',
    ];

    public function getStatusLabelAttribute()
    {
        return self::STATUS_LABELS[$this->status] ?? 'Unknown';
    }

    public function setStatusAttribute($value)
    {
        if (Auth::check() && Auth::user()->role->id == 1) {
            $this->attributes['status'] = 1;
        } else {
            
            $this->attributes['status'] = $value; 
        }
    }


    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('response_status', 'request_status');

    }
}
