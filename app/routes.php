<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::controller('auth', 'ApiAuthController');

Route::controller('bike-types', 'ApiBikeTypeController');

Route::controller('profiles', 'ApiProfileController');

Route::group(array('prefix' => 'api', 'before' => 'Auth'), function()
{
  Route::controller('users', 'ApiUserController');

  Route::controller('messages', 'ApiMessageController');
});