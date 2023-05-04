<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_medias';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'image',
        'title',
        'url',
        'description',
    ];

    public function projectgalleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }
}
