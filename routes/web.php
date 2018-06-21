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

Route::get('/', 'HomeController@index');

Route::get('/leads', 'Webapi\LeadController@index');

// Webhooks
Route::group(['prefix' => 'webhooks', 'namespace' => 'Webhooks'], function () {
    Route::post('amocrm', 'AmoCRMWebhookController@handleWebhook');
});