<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submit extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'table_submit';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'description',
        'fld_id',
        'cty_id',
    ];
    public function field()
    {
        return $this->belongsTo(Field::class, 'fld_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'cty_id');
    }

}
