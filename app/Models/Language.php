<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'languaes';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'image',
        'title',
        'description',
    ];

    public function projectgalleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }
}
