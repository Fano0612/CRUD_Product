<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'user_list';
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_username','user_email','password', 'user_access_rights', 'user_status'];
}
