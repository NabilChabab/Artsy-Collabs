<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtProject extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'budget', 'start_date', 'end_date', 'status', 'partner_id'
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
