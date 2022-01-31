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
use App\Http\Controllers\FilterController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\GuestController;
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
	if(Auth::check()) {
        return redirect()->route('home');
    }
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => ['auth','role:admin,owner']], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::post('profile', ['as' => 'profile.create', 'uses' => 'App\Http\Controllers\ProfileController@create']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'register', 'as' => 'register.'], function () {

		Route::group(['prefix' => 'graduate', 'as' => 'graduate.'], function () {

			Route::group(['middleware' => 'role:admin,operator,owner'], function () {

				Route::get('/create',  [DegreeRegisterController::class, 'index']);
				Route::post('/store',  [DegreeRegisterController::class, 'store']);
				Route::get('/view/{id}',  [DegreeRegisterController::class, 'view']);
				Route::get('/edit/{id}',  [DegreeRegisterController::class, 'edit']);
				Route::put('/update/{id}',  [DegreeRegisterController::class, 'update']);
			});
	
			Route::get('/show',  [DegreeRegisterController::class, 'show']);
			
		});

		Route::group(['prefix' => 'diploma', 'as' => 'diploma.'], function () {

			Route::group(['middleware' => 'role:admin,operator,owner'], function () {

				Route::get('/create',  [DiplomaRegisterController::class, 'index']);
				Route::post('/store',  [DiplomaRegisterController::class, 'store']);
				Route::get('/view/{id}',  [DiplomaRegisterController::class, 'view']);
				Route::get('/edit/{id}',  [DiplomaRegisterController::class, 'edit']);
				Route::put('/update/{id}',  [DiplomaRegisterController::class, 'update']);

			});
			
			Route::get('/show',  [DiplomaRegisterController::class, 'show']);
			
		});
	});
});

Route::group(['middleware' => ['auth','role:operator,admin,owner']], function () {
	Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function () {
		Route::get('/institutes_load',  [AjaxController::class, 'institutes']);
	});
});

Route::group(['middleware' => ['auth','role:admin,owner']], function () {

	Route::group(['prefix' => 'list', 'as' => 'list.'], function () {

		Route::group(['prefix' => 'graduate', 'as' => 'graduate.'], function () {

			Route::get('/',  [ListController::class, 'show_graduate_form']);
			Route::post('/view',  [ListController::class, 'show_graduate_list']);
			Route::post('/export',  [ListController::class, 'export_graduate_list_excel']);
		});
		Route::group(['prefix' => 'diploma', 'as' => 'diploma.'], function () {

			Route::get('/',  [ListController::class, 'show_diploma_form']);

		});

	});
});


Route::group(['middleware' => ['auth','role:operator,admin,owner']], function () {

	Route::group(['prefix' => 'import', 'as' => 'import.'], function () {

		Route::get('/',  [ImportController::class, 'graduate_form_view']);

		Route::group(['prefix' => 'graduate', 'as' => 'graduate.'], function () {

			Route::post('/store',  [ImportController::class, 'graduate_import_data']);
		});

		Route::group(['prefix' => 'diploma', 'as' => 'diploma.'], function () {

			Route::post('/store',  [ImportController::class, 'diploma_import_data']);
		});
	});
});


Route::group(['middleware' => ['auth','role:admin,owner']], function () {
	Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function () {

		Route::group(['prefix' => 'graduate', 'as' => 'graduate.'], function () {

			Route::get('/',  [FilterController::class, 'show_graduate_filter_form']);
			Route::post('/filter',  [FilterController::class, 'get_graduate_contacts']);
		});
		Route::group(['prefix' => 'diploma', 'as' => 'diploma.'], function () {

			Route::get('/',  [FilterController::class, 'show_diploma_filter_form']);
			Route::post('/filter',  [FilterController::class, 'get_diploma_contacts']);
		});
	});
});

Route::group(['middleware' => ['auth','role:admin,owner']], function () {
	Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
		Route::get('/',  [ReportController::class, 'index']);
		Route::post('/generate',  [ReportController::class, 'report']);	
	});
});

Route::group(['middleware' => ['auth','role:admin,operator,owner']], function () {

	Route::resource('institutes', InstituteController::class);

	Route::resource('districts', DistrictController::class)->only([
		'index', 'show'
	]);

	Route::resource('divisions', DivisionController::class)->only([
		'index', 'show'
	]);

	Route::resource('streams', StreamController::class);

	Route::resource('degrees', DegreeController::class);

	Route::resource('diplomas', DiplomaController::class);

	Route::get('get_email',  [AjaxController::class, 'get_email']);

});

//Guest Route
Route::get('/search',  [GuestController::class, 'index']);
Route::post('/find_data',  [GuestController::class, 'view']);