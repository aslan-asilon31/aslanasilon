<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
    ];

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'project_galleries');
    }

    // public function galleries()
    // {
    //     return $this->hasMany(Gallery::class);
    // }

    // public function urls()
    // {
    //     return $this->hasMany(Url::class);
    // }

    // public function technologies()
    // {
    //     return $this->hasMany(Technology::class);
    // }
}
