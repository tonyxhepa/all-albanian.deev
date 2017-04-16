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

Route::get('/', 'ShowEightController@index');

Auth::routes();
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');

Route::get('/home', 'HomeController@index');


Route::group(['prefix' => 'argetim'], function (){
    Route::get('/', 'Show\ArgetimController@index');
    Route::get('/funlajme/', 'Show\ArgetimController@fun_lajme');
    Route::get('/funlajme/{slug}', 'Show\ArgetimController@showfun_lajme');
    Route::get('/barsoleta/', 'Show\ArgetimController@barsoleta');
    Route::get('/barsoleta/{slug}', 'Show\ArgetimController@show_barsoleta');
    Route::get('/funvideo/', 'Show\ArgetimController@fun_video');
    Route::get('/funvideo/{slug}', 'Show\ArgetimController@funshow_video');
});
Route::group(['prefix' => 'femrat'], function (){
    Route::get('/', 'Show\FemraController@index');
    Route::get('/mode/', 'Show\FemraController@mode');
    Route::get('/familja/', 'Show\FemraController@familja');
    Route::get('/karriera/', 'Show\FemraController@karriera');
    Route::get('/bukuri/', 'Show\FemraController@bukuri');
    Route::get('/{slug}', 'Show\FemraController@show');
});
Route::group(['prefix' => 'lajme'], function (){
    Route::get('/', 'Show\LajmeController@index');
    Route::get('/al/', 'Show\LajmeController@lajme_al');
    Route::get('/ks/', 'Show\LajmeController@lajme_ks');
    Route::get('/mk/', 'Show\LajmeController@lajme_mk');
    Route::get('/bota/', 'Show\LajmeController@lajme_bota');
    Route::get('/{slug}', 'Show\LajmeController@show');

});
Route::group(['prefix' => 'magazina'], function (){
    Route::get('/', 'Show\MagazinaController@index');
    Route::get('/vipat/', 'Show\MagazinaController@vipat');
    Route::get('/muzike/', 'Show\MagazinaController@muzike');
    Route::get('/film/', 'Show\MagazinaController@film');
    Route::get('/{slug}', 'Show\MagazinaController@show');
});
Route::group(['prefix' => 'prona'], function (){
    Route::get('/', 'Show\PronaController@index');
    Route::get('/kerko', 'Show\PronaController@search');
    Route::get('/{slug}', 'Show\PronaController@show');
});
Route::group(['prefix' => 'puna'], function (){
    Route::get('/', 'Show\PunaController@index');
    Route::get('/kerko', 'Show\PunaController@search');
    Route::get('/{slug}', 'Show\PunaController@show');
});
Route::group(['prefix' => 'shitje'], function (){
    Route::get('/', 'Show\ShitjeController@index');
    Route::get('/kerko', 'Show\ShitjeController@search');
    Route::get('/{slug}', 'Show\ShitjeController@show');
});
Route::group(['prefix' => 'sport'], function (){
    Route::get('/', 'Show\SportController@index');
    Route::get('/bota/', 'Show\SportController@bota');
    Route::get('/boterori/', 'Show\SportController@boterori');
    Route::get('/bundesliga/', 'Show\SportController@bundesliga');
    Route::get('/eredivisie/', 'Show\SportController@eredivisie');
    Route::get('/formula-1/', 'Show\SportController@formula_1');
    Route::get('/laliga/', 'Show\SportController@laliga');
    Route::get('/liga-pare/', 'Show\SportController@liga_pare');
    Route::get('/liga1/', 'Show\SportController@liga1');
    Route::get('/premier/', 'Show\SportController@premier');
    Route::get('/seria-a/', 'Show\SportController@seria_a');
    Route::get('/sup-kosoves/', 'Show\SportController@sup_kosoves');
    Route::get('/superliga/', 'Show\SportController@superliga');
});
Route::group(['prefix' => 'tech'], function (){
    Route::get('/', 'Show\TechController@index');
    Route::get('/app/', 'Show\TechController@app');
    Route::get('/internet/', 'Show\TechController@internet');
    Route::get('/media-sociale/', 'Show\TechController@m_sociale');
    Route::get('/mobile/', 'Show\TechController@mobile');
    Route::get('/{slug}', 'Show\TechController@show');
});
Route::group(['prefix' => 'kuzhina'], function (){
    Route::get('/', 'Show\KuzhinaController@index');
    Route::get('/embelsira/', 'Show\KuzhinaController@embelsira');
    Route::get('/sallata/', 'Show\KuzhinaController@sallata');
    Route::get('/tradicionale/', 'Show\KuzhinaController@tradicionale');
    Route::get('/gjellera/', 'Show\KuzhinaController@gjellera');
    Route::get('/{slug}', 'Show\KuzhinaController@show');
});
Route::group(['prefix' => 'makina'], function (){
    Route::get('/', 'Show\MakinaController@index');
    Route::get('/kerko', 'Show\MakinaController@search');
    Route::get('/{slug}', 'Show\MakinaController@show');
});
Route::group(['prefix' => 'elektronike'], function (){
    Route::get('/', 'Show\ElektronikController@index');
    Route::get('/kerko', 'Show\ElektronikController@search');
    Route::get('/{slug}', 'Show\ElektronikController@show');
});


Route::get('/home', 'HomeController@index');
Route::group(['middleware'=>'admin'], function() {
    Route::get('/admin', function() {
        return view('admin.index');
    });

    Route::resource('admin/makina', 'Admin\MakinaController');
    Route::delete('photos/{id}', 'PhotosController@destroy');
    Route::post('admin/makina/{id}/photos', 'Admin\MakinaController@addPhoto');
    Route::resource('admin/argetim', 'Admin\ArgetimController');
    Route::post('admin/argetim/{id}/photos', 'Admin\ArgetimController@addPhoto');
    Route::post('admin/argetim/{id}/embeds', 'Admin\ArgetimController@addEmbed');
    Route::resource('admin/elektronik', 'Admin\ElektroniksController');
    Route::post('admin/elektronik/{id}/photos', 'Admin\ElektroniksController@addPhoto');
    Route::resource('admin/femrat', 'Admin\FemraController');
    Route::post('admin/femrat/{id}/photos', 'Admin\FemraController@addPhoto');
    Route::resource('admin/kuzhina', 'Admin\KuzhinaController');
    Route::post('admin/kuzhina/{id}/photos', 'Admin\KuzhinaController@addPhoto');
    Route::resource('admin/lajme', 'Admin\LajmeController');
    Route::post('admin/lajme/{id}/photos', 'Admin\LajmeController@addPhoto');
    Route::resource('admin/magazina', 'Admin\MagazinaController');
    Route::post('admin/magazina/{id}/photos', 'Admin\MagazinaController@addPhoto');
    Route::resource('admin/prona', 'Admin\PronaController');
    Route::post('admin/prona/{id}/photos', 'Admin\PronaController@addPhoto');
    Route::resource('admin/puna', 'Admin\PunaController');
    Route::post('admin/puna/{id}/photos', 'Admin\PunaController@addPhoto');
    Route::resource('admin/shitje', 'Admin\ShitjeController');
    Route::post('admin/shitje/{id}/photos', 'Admin\ShitjeController@addPhoto');
    Route::resource('admin/sport', 'Admin\SportController');
    Route::post('admin/sport/{id}/photos', 'Admin\SportController@addPhoto');
    Route::resource('admin/tech', 'Admin\TechController');
    Route::post('admin/tech/{id}/photos', 'Admin\TechController@addPhoto');

});
Route::delete('/photos/{id}', 'PhotosController@destroy');

Route::group(['middleware'=>'profile'], function() {
//    Route::resource('/profile', 'Profile\ProfileController');
//    Route::get('/profile/{slug}/create', 'Profile\ProfileController@create');
    Route::resource('{slug}/profile/makinaime', 'Profile\ProfileMakinaController');
    Route::post('{slug}/profile/makinaime/{id}/photos', 'Profile\ProfileMakinaController@addPhoto');
    Route::resource('{slug}/profile/elektroniketemia', 'Profile\ProfileElektronikController');
    Route::post('{slug}/profile/elektroniketemia/{id}/photos', 'Profile\ProfileElektronikController@addPhoto');
    Route::resource('{slug}/profile/pronaime', 'Profile\ProfilePronaController');
    Route::post('{slug}/profile/pronaime/{id}/photos', 'Profile\ProfilePronaController@addPhoto');
    Route::resource('{slug}/profile/punaime', 'Profile\ProfilePunaController');
    Route::post('{slug}/profile/punaime/{id}/photos', 'Profile\ProfilePunaController@addPhoto');
    Route::resource('{slug}/profile/shitjetemia', 'Profile\ProfileShitjeController');
    Route::post('{slug}/profile/shitjetemia/{id}/photos', 'Profile\ProfileShitjeController@addPhoto');
    Route::resource('{slug}/profile', 'Profile\ProfileController');
    Route::post('{slug}/profile/{id}/photos','Profile\ProfileController@addPhoto');

});
Route::get('mycarform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'ShowCCMController@mycarformAjax'));
Route::get('mycityform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'ShowCCMController@mycityformAjax'));
Route::get('myteamform/ajax/{id}',array('as'=>'myform.ajax','uses'=>'ShowCCMController@myteamformAjax'));
