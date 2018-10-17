<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Categorie;


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
}
