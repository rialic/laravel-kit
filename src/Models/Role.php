<?php

namespace App\Models;

use App\Traits\HasResourceModel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasUuids, HasResourceModel { HasResourceModel::uniqueIds insteadOf HasUuids; }

    protected $table = 'tb_roles';
    protected $tableColumnPrefix = 'ro';
    protected $primaryKey = 'ro_id';
    protected $relationships = ['users', 'permissions'];

    protected $appends = [
        'name',
    ];

    protected $fillable = [
        'ro_name',
    ];

    // RELATIONSHIPS
    public function users()
    {
        return $this->belongsToMany(User::class, 'tb_user_roles', 'ro_id', 'us_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'tb_role_permissions', 'ro_id', 'pe_id');
    }
}
