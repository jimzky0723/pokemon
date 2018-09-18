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
Route::get('/logout',function (){
    Session::flush();
    return redirect('/login');
});
Route::get('/login','LoginCtrl@login');
Route::post('/login','LoginCtrl@validateLogin');

Route::get('/', 'HomeCtrl@index');

Route::get('/pokemon','PokemonCtrl@index');
Route::post('/pokemon/search','PokemonCtrl@searchPokemon');
Route::get('/pokemon/search','PokemonCtrl@searchPokemon');

Route::get('/pokemon/info/{id}','PokemonCtrl@pokemonInfo');

Route::get('/map','PokemonCtrl@map');
Route::get('/map/search','PokemonCtrl@searchMap');
Route::post('/map/search','PokemonCtrl@searchMap');
Route::get('/map/search/{id}','PokemonCtrl@searchMapById');

Route::get('/suggestion','PokemonCtrl@suggestion');
Route::post('/suggestion','PokemonCtrl@sendSuggestion');

Route::get('/admin/pokemon','AdminCtrl@pokemon');
Route::post('/admin/pokemon/search','AdminCtrl@searchPokemon');
Route::get('/admin/pokemon/search','AdminCtrl@searchPokemon');

Route::post('/admin/pokemon','AdminCtrl@savePokemon');
Route::get('/admin/pokemon/info/{id}','AdminCtrl@pokemon');
Route::post('/admin/pokemon/update','AdminCtrl@updatePokemon');
Route::get('/admin/pokemon/delete/{id}','AdminCtrl@deletePokemon');

Route::get('/admin/pokemon/type','AdminCtrl@pokemonType');
Route::post('/admin/pokemon/type','AdminCtrl@savePokemonType');
Route::get('/admin/pokemon/type/{id}','AdminCtrl@editPokemonType');
Route::get('/admin/pokemon/type/delete/{id}','AdminCtrl@deletePokemonType');

Route::get('/admin/pokemon/evolve','AdminCtrl@evolve');
Route::post('/admin/pokemon/evolve','AdminCtrl@saveEvolve');
Route::get('/admin/pokemon/evolve/{id}','AdminCtrl@editEvolve');
Route::post('/admin/pokemon/evolve/update/{id}','AdminCtrl@updateEvolve');
Route::get('/admin/pokemon/evolve/delete/{id}','AdminCtrl@deleteEvolve');
Route::post('/admin/pokemon/evolve/search','AdminCtrl@searchEvolve');
Route::get('/admin/pokemon/evolve/search','AdminCtrl@searchEvolve');

Route::get('/admin/map','AdminCtrl@map');
Route::post('/admin/map','AdminCtrl@saveMap');
Route::get('/admin/map/delete/{id}','AdminCtrl@deleteMap');
Route::get('/admin/map/update/{id}','AdminCtrl@editMap');
Route::post('/admin/map/update','AdminCtrl@updateMap');
Route::post('/admin/map/search','AdminCtrl@searchMap');
Route::get('/admin/map/search','AdminCtrl@searchMap');

Route::get('/admin/suggestion','AdminCtrl@suggestion');
Route::get('/admin/suggestion/delete/{id}','AdminCtrl@deleteSuggestion');
