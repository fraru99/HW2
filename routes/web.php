<?php

use Illuminate\Support\Facades\Route;

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

Route::get("/login", "LoginController@login")->name("login");
Route::get("/logout", "LoginController@logout")->name("logout");
Route::post("/login", "LoginController@checkLogin");
Route::get("/login/username/{q}", "LoginController@checkUsername");
Route::get("/login/password/{u}/{p}", "LoginController@checkPassword");




Route::get('/registrazione', "RegisterController@registrazione")->name("registrazione");
Route::post('/registrazione', "RegisterController@create");
Route::get("/registrazione/username/{q}", "RegisterController@checkUsername");
Route::get("/registrazione/mail/{q}", "RegisterController@checkEmail");



Route::get("/home", "HomeController@home");



Route::get("/tour", "TourController@tour");
Route::get("/europa", "TourController@europa");
Route::get("/africa", "TourController@africa");
Route::get("/asia", "TourController@asia");
Route::get("/america", "TourController@america");
Route::get("/CaricaEuropa", "TourController@CaricaEuropa");
Route::get("/CaricaAsia", "TourController@CaricaAsia");
Route::get("/CaricaAmerica", "TourController@CaricaAmerica");
Route::get("/CaricaAfrica", "TourController@CaricaAfrica");



Route::get("/AggiungiPacchetto/{q}", "TourController@AggiungiPacchetto");
Route::get("/RimuoviPacchetto/{q}", "TourController@RimuoviPacchetto");
Route::get("/ControlloAccesso", "TourController@ControlloAccesso");




Route::get("/treni", "TreniController@treni");
Route::get("/CaricaTreni", "TreniController@CaricaTreni");


Route::get("/carrello", "CarrelloController@carrello")->name("carrello");
Route::get("/CaricaCarrello", "CarrelloController@CaricaCarrello");
Route::get("/OggettiCarrello", "CarrelloController@OggettiCarrello");





Route::get("/infoViaggi", "InfoViaggiController@infoViaggi")->name("infoViaggi");
Route::get("/unplash/{q}", "InfoViaggiController@unplash");
Route::get("/wether/{q}", "InfoViaggiController@wether");