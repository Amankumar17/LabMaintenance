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
Route::get('/connect', function () {
    return view('connect');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/add_admin', function () {
    return view('admin_add_admin');
});

Route::get('/add_faculty', function () {
    return view('admin_add_fac');
});

Route::get('/add_system', function () {
    return view('admin_add_system');
});


Route::get('/delete_admin', function () {
    return view('admin_del_admin');
});

Route::get('/delete_system','AdminController@delsys');

// Route::get('/delete_system', function () {
//     return view('admin_del_system');
// });

Route::get('/filecomplaint', function () {
    return view('filecomplaint');
});

// Route::get('/student_com', function () {
//     return view('student_com');
// });

Route::get('/student_com','LoginController@system');

Route::get('/student','LoginController@login');

// Route::get('/student', function (Request $request) {
//     return view('student');
// });

Route::get('/teacher_com', function () {
    return view('teacher_com');
});

Route::get('/teacher','LoginController@teacher');


Route::get('/student_demo','AdminController@systemadd');

Route::get('/admin_demo3','AdminController@addremove');

Route::get('/system_demo1','AdminController@systemRemove');

Route::get('/faculty_demo1','AdminController@facultyAdd');

Route::get('/admin_home','LoginController@admin');


Route::get('/admin_demo1','AdminController@adminAdd');


// Route::get('/admin_home', function () {
//     return view('admin_home');
// });

// Route::get('/teacher', function () {
//    return view('teacher');
// });

