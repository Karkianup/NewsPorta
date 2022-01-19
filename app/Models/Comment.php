<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table="comments";

    protected $fillable=[
         'news_detail_id',
         'comment',
         'user_id',

    ];

    public function newsDetail(){
        return $this->belongsTo(NewsDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
