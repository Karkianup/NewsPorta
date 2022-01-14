<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsDetail extends Model
{
    use HasFactory;

    protected $table="news_details";

    protected $fillable=[
         'title',
         'image',
         'post',
         'user_id'

    ];

    public function user(){
       return $this->belongsTo(User::class)->withDefault([
          "name"=>" Publisher not known"


       ]);

    }

    public function category(){
       return $this->belongsTo(Category::class);

    }


}
