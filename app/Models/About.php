<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'image',
        'bio',
        'phone',
        'address',
        'language',
    ];

    public function projectgalleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }
}
