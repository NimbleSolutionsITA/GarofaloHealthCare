<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;

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

// Pages routes
Route::get('/', 'ContentController@index');
Route::get('/about/{anchor?}', 'ContentController@about');
Route::get('/strutture', 'ContentController@strutture');
Route::get('/strutture/{struttura}', 'ContentController@struttura');
Route::get('/contatti', 'ContentController@contatti');
Route::get('/privacy-policy', 'ContentController@privacyPolicy');
Route::get('/codice-etico', 'ContentController@codiceEtico');
Route::get('/governance/{section?}/{subsection?}', 'ContentController@corporate');
Route::get('/investor-relations/{section?}/{subsection?}', 'ContentController@corporate');
Route::get('/media/{section?}/{subsection?}', 'ContentController@corporate');
Route::get('/archivio', 'ContentController@archivio');
Route::get('/flash-news/{slug}', 'ContentController@flashNews');


Route::post('/contatti', 'ContentController@postContatti');
Route::post('/headForm', 'ContentController@postHeadForm');

Route::get('/loghi', function () {
    return view('pages.loghi');
});


// Language route
Route::post('language-chooser', 'LanguageController@changeLanguage');
Route::post('/language/', array(
        'before' => 'csrf',
        'as' => 'language-chooser',
        'uses' => 'LanguageController@changeLanguage',
    )
);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

/*
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
*/
