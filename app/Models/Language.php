<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $code
 * @property string $name
 * @property string $native_name
 * @property string $direction
 * @property bool $enabled
 */
class Language extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'native_name',
        'direction',
        'enabled',
    ];
}
