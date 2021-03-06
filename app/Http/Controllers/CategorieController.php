<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;


class CategorieController extends Controller
{
    public function categorie_unique($id){

        $categorie = Categorie::find($id)->blogposts;

        $categorie_titre = Categorie::find($id);

        $categories = Categorie::All();

        return view('layouts/categorie')->with(array(
            "categorie" => $categorie,
            "categorie_titre" => $categorie_titre,
            "categories" => $categories
        ));

    }
}
