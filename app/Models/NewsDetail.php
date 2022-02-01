<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="news_details";

    protected $fillable=[
         'title',
         'image',
         'post',
         'user_id',
         'category_id',

    ];

    public function user(){
       return $this->belongsTo(User::class)->withDefault([
          "name"=>" Publisher not known"


       ]);

    }

    public function category(){
       return $this->belongsTo(Category::class);

    }
    public function comments(){
        return $this->hasMany(Comment::class);

    }

    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }


}
