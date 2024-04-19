<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'table_emails';

    protected $fillable = [
        'subject',
        'content',
        'user_id',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
