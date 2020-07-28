<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    
    public function article(){
        return $this->belongsTo('App\Article');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
