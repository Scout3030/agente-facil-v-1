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

		/* BANKS */
		Route::group(['prefix' => "operation"], function () {

			Route::get('/', 'Admin\OperationController@index')
				->name('admin.operation.index');

			Route::get('/datatable', 'Admin\OperationController@datatable')
				->name('admin.operation.datatable');

			Route::put('/deposit', 'Admin\OperationController@acreditDeposit')
				->name('admin.operation.acreditdeposit');

			Route::put('/cancel', 'Admin\OperationController@cancelOperation')
				->name('admin.operation.canceloperation');

			Route::get('/complete/{operation}', 'Admin\OperationController@completeOperation')
				->name('admin.operation.completeoperation');

			Route::put('/complete/{operation}', 'Admin\OperationController@completeOperationStatus')
				->name('admin.operation.completeoperationstatus');

			Route::get('/all', 'Admin\OperationController@all')
				->name('admin.operation.all');
			Route::get('/datatable/all', 'Admin\OperationController@datatableAll')
				->name('admin.operation.datatableall');
			Route::post('/send-message', 'Admin\OperationController@sendConfirmationMessage')
				->name('admin.operation.send_confirmation_message');
		});

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

		/* ACCOUNTS*/
		Route::group(['prefix' => "account"], function () {

			Route::get('/', 'Admin\AccountController@index')
				->name('admin.account.index');
			Route::get('/edit/{account}', 'Admin\AccountController@edit')
				->name('admin.account.edit');
			Route::put('/{account}', 'Admin\AccountController@update')
				->name('admin.account.update');
			Route::post('/', 'Admin\AccountController@store')
				->name('admin.account.store');
			Route::delete('/{account}', 'Admin\AccountController@destroy')
				->name('admin.account.destroy');

			Route::get('/accounts', 'Admin\AccountController@accounts')
				->name('admin.account.accounts');
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

		Route::group(['prefix' => "faq"], function () {

			Route::get('/', 'Admin\QuestionController@index')
				->name('admin.faq.index');
			Route::get('/edit/{question}', 'Admin\QuestionController@edit')
				->name('admin.faq.edit');
			Route::put('/{question}', 'Admin\QuestionController@update')
				->name('admin.faq.update');
			Route::post('/', 'Admin\QuestionController@store')
				->name('admin.faq.store');
			Route::delete('/{question}', 'Admin\QuestionController@destroy')
				->name('admin.faq.destroy');
		});

	});

});
