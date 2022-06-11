<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Collection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function hasRole($roleName): int
    {
        return $this->roles()->where('name', $roleName)->count();
    }

    public function hasRoles($roleNames): int
    {
        return $this->roles()->whereIn('name', $roleNames)->count();
    }

    public function getRoleLabels(): Collection
    {
        return $this->roles()->pluck('label');
    }

    public function getRoleLabelsString(): string
    {
        return implode(', ', $this->getRoleLabels()->toArray());
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function getSettings()
    {
        $profile = $this->profile()->first();
        dd($profile);
        if(!empty($profile->settings)) {
            return json_decode($profile->settings, 1);
        }

        return null;
    }
}
