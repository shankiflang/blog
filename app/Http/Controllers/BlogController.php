<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Categorie;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    public function index(){

        $posts = Blog::All();
        $categories = Categorie::All();

        return view("layouts/blog")->with(array(
            "blogs" => $posts,
            "categories" => $categories,
            "auteur" => "Benjamin"
        ));

    }

    public function post_unique($id){

        $post = Blog::find($id);

        return view("layouts/blogpost")->with(array(
            "blog" => $post
        ));

    }

    public function nouveau_blog(){

        $categories = Categorie::pluck('titre_categorie', 'id')->prepend('---');

        return view('layouts.nouveau')->with(array('categories' => $categories));
    }

    public function creation_blog(){

        $blog = Blog::create(Input::all());

        return redirect('/blog/' . $blog->id);

    }

}
