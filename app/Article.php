<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function articleCategories()
    {
        return $this->hasMany('App\ArticleCategory');//::orderBy('id', 'desc')->paginate(5);
    }

    public function articleTags()
    {
        return $this->hasMany('App\ArticleTag');//::orderBy('id', 'desc')->paginate(5);
    }
}
