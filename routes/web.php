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

	Route::post('/operation/ajax', 'OperationController@show')->name('operation.show');

	Route::post('/accounts', 'AccountController@getAccounts')->name('get.accounts');

	Route::get('/historial', 'OperationController@history')->name('operation.history');

	Route::get('/perfil', 'UserController@profile')->name('user.profile');
	Route::put('/perfil', 'UserController@profileUpdate')->name('user.profile.update');

	Route::get('/mis-cuentas', 'UserController@accounts')->name('user.accounts');

	Route::post('/mis-cuentas', 'AccountController@store')->name('user.accounts.store');
	Route::delete('/mis-cuentas/{account}', 'AccountController@destroy')->name('user.accounts.destroy');

	Route::group(['prefix' => "dashboard", "middleware" => [sprintf("role:%s", \App\Role::ADMIN)]], function () {

		Route::get('/', 'Admin\HomeController@index')->name('admin.index');

		Route::get('/operations', 'Admin\OperationController@index')
			->name('admin.operation.index');

		Route::get('/operations-ajax', 'Admin\OperationController@datatable')
			->name('admin.operation.datatable');

		Route::put('/deposit', 'Admin\OperationController@acreditDeposit')
			->name('admin.operation.acreditdeposit');

		Route::put('/cancel-operation', 'Admin\OperationController@cancelOperation')
			->name('admin.operation.canceloperation');

		Route::get('/complete-operation/{operation}', 'Admin\OperationController@completeOperation')
			->name('admin.operation.completeoperation');

		Route::put('/complete-operation/{operation}', 'Admin\OperationController@completeOperationStatus')
			->name('admin.operation.completeoperationstatus');

		Route::get('/operations-all', 'Admin\OperationController@all')->name('admin.operation.all');
		Route::get('/operations-ajax-all', 'Admin\OperationController@datatableAll')
			->name('admin.operation.datatableall');

		/* BANKS */
		Route::group(['prefix' => "bank"], function () {

			Route::get('/', 'Admin\BankController@index')
				->name('admin.bank.index');
			Route::get('/edit/{bank}', 'Admin\BankController@edit')
				->name('admin.bank.edit');
			Route::put('/{bank}', 'Admin\BankController@update')
				->name('admin.bank.update');
			Route::post('/', 'Admin\BankController@store')
				->name('admin.bank.store');
			Route::delete('/{bank}', 'Admin\BankController@destroy')
				->name('admin.bank.destroy');

			Route::post('/status', 'Admin\BankController@status')
				->name('admin.bank.status');
		});

		/* PAYMENTS */
		Route::group(['prefix' => "payment"], function () {

			Route::get('/', 'Admin\PaymentController@index')
				->name('admin.payment.index');
			Route::get('/edit/{bankOperation}', 'Admin\PaymentController@edit')
				->name('admin.payment.edit');
			Route::put('/{bankOperation}', 'Admin\PaymentController@update')
				->name('admin.payment.update');
			Route::post('/', 'Admin\PaymentController@store')
				->name('admin.payment.store');
			Route::delete('/{bankOperation}', 'Admin\PaymentController@destroy')
				->name('admin.payment.destroy');

			Route::get('/datatable', 'Admin\PaymentController@datatable')
				->name('admin.payment.datatable');
			Route::put('/status/{bankOperation}', 'Admin\PaymentController@status')
				->name('admin.payment.status');
		});

	});

});
