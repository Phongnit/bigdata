<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePer extends Model
{
    use HasFactory;
    protected $table = 'table_role_per';

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function permissions()
    {
        return $this->belongsTo(Permission::class, 'per_id');
    }
}
