<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'image',
        'title',
        'description',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_galleries');
    }

    // public function project()
    // {
    //     return $this->belongsTo(Project::class);
    // }
}
