<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    public function technologies()
    {
        return $this->belongsToMany(Project::class, 'project_galleries');
    }
}
