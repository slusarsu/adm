<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $lang
 * @property bool $enabled
 */
class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lang',
        'enabled',
        'items',
    ];
}