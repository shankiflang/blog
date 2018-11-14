<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = ['auteur', 'titre', 'texte', 'image', 'categorie_id'];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }

}
