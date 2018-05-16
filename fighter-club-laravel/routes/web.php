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
/*
| -------------- |
| Fight routes  |
| -------------- |
*/
Route::get('/fights/arena', function(){
    return view('fights.arena');
});
Route::get('/fights/fighters', function(){
    return view('fights.fighters');
});
Route::get('/fights/leaderboard', function(){
    return view('fights.leaderboard');
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