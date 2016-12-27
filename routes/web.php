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
    return view('welcome');
});

Route::get('customer/{id}', 'CustomerController@customer');

Route::get('customer_name', function(){
    $customer = App\Customer::where('name', '=', 'Bobby')->first();
    echo $customer->id;
});

Route::get('orders', function(){
    $orders = App\Order::all();
    foreach($orders as $order){
        echo $order->name . ' belongs to ' . $order->customer->name . '.<br>';
    }
});

Route::get('mypage', function(){
    return view('mypage');
});

Route::get('mypage', function(){
    $data = array(
        'var1' => 'Hamburger',
        'var2' => 'Hot Dog',
        'var3' => 'French Fries',
        'orders' => App\Order::all()
        );
        return view('mypage', $data);
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['admin']], function(){
    Route::get('admin', function(){
        echo 'You have access.';
    })->middleware('admin');
});

Route::post('upload', 'UploadController@upload');

Route::get('create', function(){
    App\User::create(array(
        'name' => 'john doe',
        'email' => 'JohnDoe@gmail.com',
        'password' => Hash::make('password')));
});

Route::get('user', function(){
    $user = App\User::find(2);
    echo $user->name . '<br />';
    echo $user->email;
});
// // CREATE an item
// Route::post('test', function(){
//     echo 'We just created an item.';
// });
//
// // READ an item
// Route::get('test', function(){
//     echo '<form action="test" method="POST">';
//     echo '<input type="submit">';
//     echo '<input type="hidden" value="' . csrf_token() . '" name="_token">';
//     echo '<input type="hidden" value="DELETE" name="_method">';
//     echo '</form>';
// });
//
// // UPDATE an item
// Route::put('test', function(){
//     echo 'We have updated an item!';
// });
//
// // DELETE an item
// Route::delete('test', function(){
//     echo 'We have deleted an item!';
// });


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
