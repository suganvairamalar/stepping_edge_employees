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
    return view('frontend.index');
});

Route::group(['middleware'=> ['prevent-back-history','auth','isManager']], function (){

    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    });

    Route::get('registered-user','Manager\RegisteredController@index')->name('registered-user');
    Route::get('role-edit/{id}','Manager\RegisteredController@editrole'); 

    Route::put('role-update/{id}','Manager\RegisteredController@updaterole');

    Route::get('user-delete/{id}','Manager\RegisteredController@delete')->name('user-delete');

    Route::get('user_deleted_records','Manager\RegisteredController@delete_records');

    Route::get('user_deleted_restore/{id}','Manager\RegisteredController@delete_restore')->name('user-restore');

     Route::get('user-restore-all','Manager\RegisteredController@restore_all')->name('user-restore-all');

     Route::get('employee-leave','Manager\EmployeeLeaveController@index')->name('employee-leave');

     Route::get('leave-edit/{id}','Manager\EmployeeLeaveController@editleave'); 

      Route::put('leave-update/{id}','Manager\EmployeeLeaveController@updateleave');

       Route::get('search_filter','Manager\EmployeeLeaveController@search_filter')->name('search_filter');

    Route::get('/manager_profile', 'Manager\RegisteredController@manager_profile')->name('manager_profile');
    
    Route::post('/manager_profile_update', 'Manager\RegisteredController@manager_profile_update')->name('manager_profile_update');

    Route::get('/manager_change_password', 'Manager\RegisteredController@manager_change_password')->name('manager_change_password');
    
    Route::post('/manager_change_password_update','Frontend\RegisteredController@manager_change_password_update')->name('manager_change_password_update');


});








Auth::routes();


Route::group(['middleware'=> ['prevent-back-history','auth','isEmployee']], function (){

Route::get('/home','EmployeeDetailLeaveController@index')->name('employee_detail_leaves.index');


Route::get('/employee_detail_leaves','EmployeeDetailLeaveController@index')->name('employee_detail_leaves.index');
Route::post('/employee_detail_leaves_add','EmployeeDetailLeaveController@insert')->name('employee_detail_leaves.insert');
Route::get('/employee_detail_leaves_edit/{id}','EmployeeDetailLeaveController@edit')->name('employee_detail_leaves.edit');
Route::post('/employee_detail_leaves_update','EmployeeDetailLeaveController@update')->name('employee_detail_leaves.update');
Route::get('/employee_detail_leaves_view/{id}','EmployeeDetailLeaveController@view')->name('employee_detail_leaves.view');
Route::get('/employee_detail_leaves_delete/{id}','EmployeeDetailLeaveController@delete')->name('employee_detail_leaves.delete');

Route::get('/employee_profile', 'Frontend\UserController@employee_profile')->name('employee_profile');
Route::post('/employee_profile_update', 'Frontend\UserController@employee_profile_update')->name('employee_profile_update');
Route::get('/changePassword', 'Frontend\UserController@changePassword')->name('changePassword');
Route::post('/changePasswordupdate','Frontend\UserController@changePasswordupdate')->name('changePasswordupdate');
});



