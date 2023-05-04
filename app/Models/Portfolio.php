<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

        
    protected $table = 'portfolios';

    protected $keyType = 'string';

    public $primaryKey = 'id';

    protected $fillable = [
        'image',
        'title',
        'icon',
        'description'
    ];

    public function projectgalleries()
    {
        return $this->hasMany(ProjectGallery::class);
    }
}
