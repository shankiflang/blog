<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    public $timestamps = false;

    protected $fillable = ['titre_categorie'];

    public function blogposts(){
        return $this->hasMany('App\Blog');
    }

}
