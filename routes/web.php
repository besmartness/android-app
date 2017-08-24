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
    if(Auth::check()){
        return view('admin_template');
    } else {
        return view('auth.login');
    }
});



Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/camera-list', 'CameraController@camera_list');
Route::get('/add-camera', 'CameraController@add_view');
Route::post('/add_camera_item', 'CameraController@store');
Route::get('/delete_camera/{id?}', 'CameraController@delete');
Route::get('/edit_camera/{id?}', 'CameraController@edit');

Route::get('/myusers-list', 'MyUsersController@myusers_list');
Route::get('/delete_myusers/{id?}', 'MyUsersController@delete');
Route::get('/edit_myusers/{id?}', 'MyUsersController@edit');

Route::get('/azs-list', 'AzsController@azs_list');
Route::get('/add-azs', 'AzsController@add_view');
Route::post('/add_azs_item', 'AzsController@store');
Route::get('/delete_azs/{id?}', 'AzsController@delete');
Route::get('/edit_azs/{id?}', 'AzsController@edit');

Route::get('/vul-list', 'VulController@vul_list');
Route::get('/add-vul', 'VulController@add_view');
Route::post('/add_vul_item', 'VulController@store');
Route::get('/delete_vul/{id?}', 'VulController@delete');
Route::get('/edit_vul/{id?}', 'VulController@edit');
/*Route::get('/api/v1/camera/{id?}', ['middleware' => 'auth.basic', function ($id = null) {
    if ($id == null) {
        $cameras = App\Camera::all(array('id', 'name', 'longitude', 'lattitude'));
    } else {
        $cameras = App\Camera::find($id, array('id', 'name', 'longitude', 'lattitude'));
    }
    return Response::json(array(
        'error' => false,
        'data' => $cameras,
        'code' => 200
    ));
}]);*/

Route::get('/api/v1/camera-list/{token_id?}', 'HomeController@cameraList');
Route::get('/api/v1/azs-list/{token_id?}', 'HomeController@azsList');
Route::get('/api/v1/vul-list/{token_id?}', 'HomeController@vulList');

Route::post('/api/v1/login', 'HomeController@login');

Auth::routes();

Route::post('/api/v1/registration', 'HomeController@createForApi');
