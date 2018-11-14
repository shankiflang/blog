<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Auth;
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
        $categories = Categorie::All();

        return view("layouts/blogpost")->with(array(
            "blog" => $post,
            "categories" => $categories
        ));

    }

    public function nouveau_blog(){

        $categories_list = Categorie::pluck('titre_categorie', 'id');
        $categories = Categorie::All();

        return view('layouts.nouveau')->with(array('categories_list' => $categories_list, 'categories' => $categories));
    }

    public function creation_blog(Request $request){

        $request->validate([
            'titre' => 'required|unique:posts|max:50',
            'image' => 'required',
            'texte' => 'required|max:1000',
            'categorie_id' => 'required'
        ]);

        $data = Input::all();
        $data['auteur'] = Auth::user()->name;

        $blog = Blog::create($data);


        return redirect('/blog/' . $blog->id);

    }

    public function edition_post($id){

        $categories_list = Categorie::pluck('titre_categorie', 'id');
        $categories = Categorie::All();

        $blog = Blog::find($id);

        return view('layouts.edition')->with(array('categories_list' => $categories_list, 'categories' => $categories, 'blog' => $blog));
    }

    public function edition_valider(Request $request, $id){

        $request->validate([
            'titre' => 'required|max:50',
            'image' => 'required',
            'texte' => 'required|max:1000',
            'categorie_id' => 'required'
        ]);

        $blog_a_editer = Blog::find($id);
        $blog_a_editer->update(Input::all());

        return redirect('/blog/' . $blog_a_editer->id)->withSuccess('Le billet a bien été édité.');

    }

    public function suppression_post($id){

        $blog_a_supprimer = Blog::find($id);
        $blog_a_supprimer->delete();

        return redirect('/')->withSuccess('Le billet a bien été supprimé.');

    }

}
