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

Auth::routes();

Route::get('/images/{path}/{attachment}', function ($path, $attachment) {
	$file = sprintf('storage/%s/%s', $path, $attachment);
	if (File::exists($file)) {
		return Image::make($file)->response();
	}
});

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@operation')->name('operation');

Route::get('/nosotros', function () {
	return view('about');
})->name('about');

Route::get('/precios', function () {
	return view('prices');
})->name('prices');

Route::get('/preguntas-frecuentes', function () {
	return view('faq');
})->name('faq');

Route::get('/opiniones', function () {
	return view('reviews');
})->name('reviews');

Route::group(['middleware' => ["auth"]], function () {
	Route::get('/transferencia-interbancaria', 'OperationController@transfer')->name('operation.transfer');

	Route::get('/pago-interbancario', 'OperationController@payment')->name('operation.payment');

	Route::post('/deposito', 'OperationController@depositCreate')->name('operation.deposit.create');

	Route::group(['middleware' => ['route']], function () {
		Route::get('/deposito', 'OperationController@depositIndex')->name('operation.deposit.index');

		Route::post('/operation/store', 'OperationController@store')->name('operation.store');
	});

	Route::post('/accounts', 'AccountController@getAccounts')->name('get.accounts');

	Route::get('/historial', 'OperationController@history')->name('operation.history');

	Route::get('/perfil', 'UserController@profile')->name('user.profile');
	Route::put('/perfil', 'UserController@profileUpdate')->name('user.profile.update');

	Route::get('/mis-cuentas', 'UserController@accounts')->name('user.accounts');

	Route::post('/mis-cuentas', 'AccountController@store')->name('user.accounts.store');
	Route::delete('/mis-cuentas/{account}', 'AccountController@destroy')->name('user.accounts.destroy');
});