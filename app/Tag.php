<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function articleTags()
    {
        return $this->hasMany('App\ArticleTag');//::orderBy('id', 'desc')->paginate(5);
    }
}
