<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class NewsCategory extends Model
{
    use HasFactory;
    protected $table = 'news_categories';
    protected $fillable = ['user_id', 'category_id',  'description', 'image'];
    protected $primaryKey = "id";


public function category()  
{  
     
    return $this->belongsTo(News::class, 'category_id', 'id'); 

} 

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id'); 

}



} 
