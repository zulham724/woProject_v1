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
    return redirect('login');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('checking',function(){
	switch (Auth::user()->role_id) {
    case '1':
        return redirect('/admin/schedule');
      break;
    case '2':
        return redirect('/operator/schedule');
      break;
    case '3':
        return redirect('/staff/schedule');
      break;
    default:
        return redirect('/home');
      break;
  }
});
// end checking

Route::group(['middleware'=>'web'],function(){

	Route::group(['middleware'=>'role:1'],function(){

		Route::get('admin','AdminController@admin')->name('admin');

    Route::group(['prefix'=>'admin'],function(){

      Route::get('schedule','ScheduleController@admin');
      Route::get('staff','AdminController@index')->name('staff');

  		Route::group(['prefix'=>'staff'],function(){
  			Route::post('edit','AdminController@edit');
  			Route::post('delete','AdminController@delete');
  			Route::get('create','AdminController@create');
        Route::post('store','AdminController@store');
        Route::post('update','AdminController@update');
  		});

      Route::get('order','OrderController@index');

      Route::group(['prefix'=>'order'],function(){
        Route::get('create','OrderController@create');
        Route::post('store','OrderController@store');
        Route::post('delete','OrderController@delete');
        Route::post('edit','OrderController@edit');
        Route::post('update','OrderController@update');
      });
      // end group order

      Route::get('pembayaran','PembayaranController@create');
      Route::group(['prefix'=>'pembayaran'],function(){
        Route::post('store','PembayaranController@store');
        Route::post('update','PembayaranController@update');
        Route::get('delete/{id}','PembayaranController@delete');
      });

    });
    // end admin group

	});
	// end middleware role admin
	Route::group(['middleware'=>'role:2'],function(){

		Route::get('operator','OperatorController@index')->name('operator');

    Route::group(['prefix'=>'operator'],function(){

      Route::get('schedule','ScheduleController@operator');
      Route::get('order','OrderController@index')->name('order');

      Route::group(['prefix'=>'order'],function(){
        Route::get('create','OrderController@create');
        Route::post('store','OrderController@store');
        Route::post('edit','OrderController@edit');
        Route::post('update','OrderController@update');
        Route::post('delete','OrderController@delete');

        Route::group(['prefix'=>'item'],function(){
          Route::post('save','ItemController@save');
          Route::post('delete','ItemController@delete');
        });
        // end item group

      });
      // end group order

      Route::get('pembayaran','PembayaranController@create');
      Route::group(['prefix'=>'pembayaran'],function(){
        Route::post('store','PembayaranController@store');
        Route::post('update','PembayaranController@update');
        Route::get('delete/{id}','PembayaranController@delete');
      });

    });
    // end group operator
	});

	// end middleware role operator
  Route::group(['middleware'=>'role:3'],function(){
    Route::get('staff','StaffController@index')->name('staff');
    Route::group(['prefix'=>'staff'],function(){
      Route::get('schedule','ScheduleController@staff');
    });
    // end group staff
  });
  // end middleware role staff

  Route::get('readNotif','NotificationController@readNotif');
  Route::get('file/{filename}','FileController@index');
  Route::get('deleteFile','FileController@delete');
  // Route::group(['prefix'=>'file'],function(){
  //   Route::get('delete','FileController@delete');
  // });

});
// end middleware web
