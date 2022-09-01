<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = ['name', 'username',  'email', 'user_id', 'password', 'xender', 'hobbies', 'file',];
    protected $primaryKey = "id";
}
