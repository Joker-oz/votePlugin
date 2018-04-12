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

// Route::get('/', function () {
//   // return view('Puzzle.publicUse.login');
//      return view('index');
// });

//登录界面
Route::get('/', 'StaticPagesController@index')->name('login');
//登录验证
Route::post('/adas', 'StaticPagesController@login')->name('login.verify');
//首页
Route::get('/index', 'StaticPagesController@show')->name('index');


//投票编辑界面
Route::get('/vote/edit', 'VoteController@index')->name('vote.edit');
//投票存储动作
Route::post('/vote/store', 'VoteController@store')->name('vote.store');
//游客投票单个显示界面，直播界面
Route::get('/vote/{vId}/showing', 'VoteController@show')->name('vote.show');
//游客点击投票显示界面
Route::get('/vote/{cId}/add/score', 'VoteController@addScore')->name('vote.addSore');
//无线返回候选者数据
Route::get('/vote/{vId}/send/score', 'VoteController@addScore')->name('vote.sendSore');
