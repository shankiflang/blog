<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('ounoustrouver',function(){
   return "Ceci est la page ou nous trouver";
});

Route::get('utilisateur/{id}', function ($id){
    return 'Utilisateur n°' . $id;
})->where('id', '[0-9]+');