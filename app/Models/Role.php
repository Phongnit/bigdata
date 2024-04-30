<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'table_role';

    protected $fillable = [
        'name',
    ];
    public function permission(){
        return $this->belongsToMany(Permission::class, 'table_role_per', 'role_id', 'per_id');
    }
}
