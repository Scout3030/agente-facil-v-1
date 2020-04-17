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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@operation')->name('operation');

Route::get('/images/{path}/{attachment}', function ($path, $attachment) {
	$file = sprintf('storage/%s/%s', $path, $attachment);
	if (File::exists($file)) {
		return Image::make($file)->response();
	}
});

Route::group(['middleware' => ["auth"]], function () {
	Route::get('/transferencia-interbancaria', 'OperationController@transfer')->name('operation.transfer');
	Route::get('/pago-interbancario', 'OperationController@payment')->name('operation.payment');

	Route::post('/accounts', 'AccountController@getAccounts')->name('get.accounts');

	Route::get('/historial', 'OperationController@history')->name('operation.history');

	Route::get('/perfil', 'UserController@profile')->name('user.profile');

	Route::get('/mis-cuentas', 'UserController@accounts')->name('user.accounts');
});