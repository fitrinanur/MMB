<?php
use App\Setting;
use App\Motto;
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
    $settings = Setting::all();
    $vission = Motto::where('category','visi')->get();
    $mission = Motto::where('category','misi')->get();
    return view('welcome',compact('settings','vission','mission'));
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::resource('user', 'UserController');
    Route::resource('store', 'StoreController');
    Route::resource('product', 'ProductController');
    Route::resource('product-type', 'ProductTypeController');
    Route::resource('setting', 'SettingController');
    Route::resource('motto', 'MottoController');
});

Route::get('/nearly-page','WebsiteController@nearlyPage')->name('website.nearly');
Route::post('/nearly-process','WebsiteController@nearlyProcess')->name('website.nearlyProcess');
Route::post('/recommendation','WebsiteController@getRecommendation')->name('recommendation');

Route::get('/store-direction-page','WebsiteController@directionPage')->name('website.direction');
Route::post('/store-direction-page','WebsiteController@directionStore')->name('direction.store');