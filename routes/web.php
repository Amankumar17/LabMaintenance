<?php

use Illuminate\Http\Request;
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

Route::get ( '/admin_search', function () {
    return view ( 'admin_search' );
} );

Route::any ( '/search', 'AdminController@admin_search');

Route::post('/chart', 'UserChartController@index');

Route::get('/chart_options', 'UserChartController@chart_options');

Route::post('/report', 'UserChartController@displayReport');

Route::get('/report_options', 'UserChartController@report_options');



Route::get('/testlogin', function (Request $request) {
    $request->session()->flush();
    return view('student_login');
});


Route::any("/feedback",'LoginController@feedback');

Route::any('/teacher','LoginController@teacher');

Route::any('/admin_home','LoginController@admin');

Route::any('/hod_home','LoginController@hod');

Route::any('/principal_home','LoginController@principal');


Route::get('/student_history','LoginController@student_history');

Route::get("/teacher_feedback",'LoginController@teacher_feedback');

Route::post("/datasubmitted",'LoginController@datasubmitted');

Route::post("/datasubmitted_fac",'LoginController@datasubmitted_fac');

Route::post('/teacher_confirm','LoginController@status_teacher_confirm');


Route::post('/admin_confirm','AdminController@status_admin_confirm');

Route::post('/admin_done','AdminController@status_admin_done');


Route::get('/add_admin', function () {
    return view('admin_add_admin');
});

Route::get('/add_faculty', function () {
    return view('admin_add_fac');
});

Route::get('/delete_admin', function () {
    return view('admin_del_admin');
});

Route::get('/delete_faculty', function () {
    return view('admin_del_fac');
});


Route::get('/add_system','AdminController@systemAdd2');

Route::get('/delete_system','AdminController@systemRemove2');

Route::post('/system_demo1','AdminController@systemAdd');

Route::post('/system_demo2','AdminController@systemRemove');

Route::post('/admin_demo1','AdminController@adminAdd');

Route::post('/admin_demo2','AdminController@adminRemove');

Route::post('/faculty_demo1','AdminController@facultyAdd');

Route::post('/faculty_demo2','AdminController@facultyRemove');




