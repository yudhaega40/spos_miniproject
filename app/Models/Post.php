<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'post';

    public function category(){
        return $this->hasManyThrough('App\Models\Category', 'App\Models\PostCategory', 'id_post', 'id', 'id', 'id_category');
    }

    public function tag(){
        return $this->hasManyThrough('App\Models\Tag', 'App\Models\TagCategory', 'id_post', 'id', 'id', 'id_tag');
    }

    public function user(){
        return $this->hasOne('App\Models\Custom_User','id','id_user');
    }
}
