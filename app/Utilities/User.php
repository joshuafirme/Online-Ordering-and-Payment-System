<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbluser';
    protected $fillable = ['id', '_prefix', 'fullname', 'password', 'username', 'contact_no', 'role'];
}
