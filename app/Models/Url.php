<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'image',
        'title',
        'description',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
