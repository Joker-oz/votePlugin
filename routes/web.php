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


//登录界面
Route::get('/', 'StaticPagesController@index')->name('login');
//首页
Route::get('/index', 'StaticPagesController@show')->name('index');

//投票编辑界面
Route::get('/vote/edit', 'VoteController@index')->name('vote.edit');
//投票存储动作
Route::post('/vote/store', 'VoteController@store')->name('vote.store');
//投票单个显示界面，直播界面
Route::get('/vote/showing', 'VoteController@show')->name('vote.show');
