<?php

namespace App\Models;

use App\Traits\HasResourceModel;
use App\Traits\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use VerifyEmail, HasFactory, Notifiable, HasUuids, HasResourceModel { HasResourceModel::uniqueIds insteadof HasUuids; }

    protected $table = 'tb_users';
    protected $tableColumnPrefix = 'us';
    protected $primaryKey = 'us_id';
    protected $relationships = ['roles'];

    protected $appends = [
        'name',
        'email',
        'verified_at',
        'password'
    ];

    protected $fillable = [
        'us_name',
        'us_email',
        'us_verified_at',
        'us_password'
    ];

    // SETTERS
    public function setUsPasswordAttribute($value)
    {
        $this->attributes['us_password'] = bcrypt($value);
    }

    // RELATIONSHIPS
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'tb_user_roles', 'us_id', 'ro_id');
    }
}
