<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes ;
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'logo'
    ];

    public function artProjects()
    {
        return $this->hasMany(ArtProject::class);
    }
}
