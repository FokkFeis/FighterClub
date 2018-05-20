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
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/signup', function () {
    return view('signup');
});
/*
| -------------- |
| Fight routes  |
| -------------- |
*/
Route::get('/fights/arena', function(){
    $fighters = DB::table('fighters')->get();
    return view('fights.arena', ['fighters' => $fighters]);
});
Route::get('/fights/fighters', function(){
    $fighters = DB::select('SELECT Allfighters.*, leagues.ID AS LeagueID FROM Allfighters JOIN leagues ON Allfighters.League = leagues.name');
    
    return view('fights.fighters', ['fighters' => $fighters]);
});
Route::get('/fights/leaderboard', function(){
    $leaderboard = DB::select('SELECT * FROM Allfighters ORDER BY strength DESC LIMIT 10');
    return view('fights.leaderboard', ['leaderboard' => $leaderboard]);
});

/*
| ----------- |
| Home Routes |
| ----------- |
*/
Route::get('/home/account',function(){
    return view('home.account');
});
Route::get('home/admin', function(){
    return view('home.admin');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
