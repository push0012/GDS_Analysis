<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;

use App\Http\Controllers\InstituteController;
use App\Http\Controllers\StreamController;

use App\Http\Controllers\DegreeRegisterController;
use App\Http\Controllers\DiplomaRegisterController;

use App\Http\Controllers\DegreeController;
use App\Http\Controllers\DiplomaController;

use App\Http\Controllers\AjaxController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('institutes', InstituteController::class);

});
Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix'=>'register','as'=>'register.'], function(){

		Route::group(['prefix'=>'graduate','as'=>'graduate.'], function(){

			Route::get('/create',  [DegreeRegisterController::class, 'index']);
			Route::post('/store',  [DegreeRegisterController::class, 'store']);
			Route::get('/show',  [DegreeRegisterController::class, 'show']);
			Route::get('/view/{id}',  [DegreeRegisterController::class, 'view']);
			Route::get('/edit/{id}',  [DegreeRegisterController::class, 'edit']);
			Route::put('/update/{id}',  [DegreeRegisterController::class, 'update']);
		});

		Route::group(['prefix'=>'diploma','as'=>'diploma.'], function(){

			Route::get('/create',  [DiplomaRegisterController::class, 'index']);
			Route::post('/store',  [DiplomaRegisterController::class, 'store']);
			Route::get('/show',  [DiplomaRegisterController::class, 'show']);
			Route::get('/view/{id}',  [DiplomaRegisterController::class, 'view']);
			Route::get('/edit/{id}',  [DiplomaRegisterController::class, 'edit']);
			Route::put('/update/{id}',  [DiplomaRegisterController::class, 'update']);
		});
		
	});

});

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix'=>'ajax','as'=>'ajax.'], function(){

			Route::get('/institutes_load',  [AjaxController::class, 'institutes']);
			
	});

});

Route::resource('districts', DistrictController::class)->only([
    'index', 'show'
]);
Route::resource('divisions', DivisionController::class)->only([
    'index', 'show'
]);
Route::resource('institutes', InstituteController::class);

Route::resource('streams', StreamController::class);

Route::resource('degrees', DegreeController::class);
Route::resource('diplomas', DiplomaController::class);
