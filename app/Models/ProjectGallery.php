<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'gallery_id',
        'technology_id',
        'url_id',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function url()
    {
        return $this->belongsTo(Url::class);
    }
}
