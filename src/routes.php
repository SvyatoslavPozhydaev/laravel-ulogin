<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 25.04.17
 * Time: 23:12
 */

Route::group([
    'prefix'=>'ulogin',
    'namespace' => 'Ulogin\Modulse\Controllers','middleware' => ['web']
    ], function() {

    Route::get('form',[ 'as' => 'uLogin.form.show' , 'uses' => 'UloginController@uLoginFormShow' ]);
    Route::post('form',[ 'as' => 'uLogin.form.redirect' , 'uses' => 'UloginController@uLoginFormCallback' ]);
    Route::post('save',[ 'as' => 'uLogin.user.save' , 'uses' => 'UloginController@UserSave' ]);

});