<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    use HasFactory;
    protected $table = 'user_details'; 
    protected $fillable = ['user_id','address', 'city', 'state',];
    protected $primaryKey = "id";

    public function user()  
{  
     
    return $this->belongsTo(User_details::class, 'user_id', 'id');

    

} 
}
