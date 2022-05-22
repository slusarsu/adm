<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'native_name',
        'direction',
        'enabled',
    ];
}
