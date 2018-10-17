<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = ['titre', 'texte'];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

}
