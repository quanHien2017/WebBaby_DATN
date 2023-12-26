<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //
    protected $table = 'tb_user_role';
    protected $guarded = [];
    protected $casts = [
        'json_action' => 'object',
    ];
}
