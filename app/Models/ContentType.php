<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentType extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'user_id',
        'key',
        'name',
        'singular_name',
        'position',
        'enabled',
        'icon',
        'fields'
    ];

    protected $casts = [
        'fields' => 'array'
    ];

    public function sluggable(): array
    {
        return [
            'key' => [
                'source' => 'name'
            ]
        ];
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
