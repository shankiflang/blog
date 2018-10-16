<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;


class BlogController extends Controller
{
    public function index(){

        $posts = Blog::All();

        return view("layouts/blog")->with(array(
            "blogs" => $posts,
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
