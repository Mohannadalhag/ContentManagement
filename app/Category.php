<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articleCategories()
    {
        return $this->hasMany('App\ArticleCategory');//::orderBy('id', 'desc')->paginate(5);
    }

}
