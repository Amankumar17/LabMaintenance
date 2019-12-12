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

// Route::any ( '/search', function () {
//     $q = Input::get ( 'q' );
//     $user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->get ();
//     if (count ( $user ) > 0)
//         return view ( 'admin_search' )->withDetails ( $user )->withQuery ( $q );
//     else
//         return view ( 'admin_search' )->withMessage ( 'No Details found. Try to search again !' );
// } );




Route::post('/report', 'UserChartController@displayReport');

Route::get('/report_options', function () {
    return view('report_options');
});

Route::post('/chart', 'UserChartController@index');

Route::get('/chart_options', function () {
    return view('chart_options');
});

Route::get('/testlogin', function (Request $request) {
    $request->session()->flush();
    return view('student_login');
});

Route::any("/feedback",'LoginController@feedback');

Route::get("/teacher_feedback",'LoginController@teacher_feedback');

Route::post("/datasubmitted",'LoginController@datasubmitted');

Route::post("/datasubmitted_fac",'LoginController@datasubmitted_fac');


// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/add_admin', function () {
    return view('admin_add_admin');
});

Route::get('/add_faculty', function () {
    return view('admin_add_fac');
});

// Route::get('/add_system', function () {
//     return view('admin_add_system');
// });

Route::get('/add_system','AdminController@systemAdd2');


Route::get('/delete_admin', function () {
    return view('admin_del_admin');
});

Route::get('/delete_faculty', function () {
    return view('admin_del_fac');
});

// Route::get('/delete_system', function () {
//     return view('admin_del_system');
// });

Route::get('/delete_system','AdminController@systemRemove2');

// Route::get('/filecomplaint', function () {
//     return view('filecomplaint');
// });

Route::get('/filecomplaint','LoginController@check_input');

Route::get('/filecomplaint2','LoginController@check_input2');

// Route::get('/student', function (Request $request) {
//     return view('student');
// });

Route::get('/student','LoginController@login');

Route::get('/student_history','LoginController@student_history');

// Route::get('/studenthistory_to_feedback','LoginController@studenthistory_to_feedback');


// Route::get('/student_com', function () {
//     return view('student_com');
// });

Route::get('/student_com','LoginController@system');

//Route::get('/comlpaint_page','LoginController@system');

Route::any('/teacher','LoginController@teacher');

// Route::get('/teacher_com', function () {
//     return view('teacher_com');
// });

Route::get('/go','LoginController@check_input1');

Route::get('/teacher_com','LoginController@system_for_fac');

Route::get('/go2','LoginController@check_input3');

Route::any('/admin_home','LoginController@admin');

Route::any('/hod_home','LoginController@hod');

Route::post('/system_demo1','AdminController@systemAdd');

Route::post('/system_demo2','AdminController@systemRemove');

Route::post('/admin_demo1','AdminController@adminAdd');

Route::post('/admin_demo2','AdminController@adminRemove');

Route::post('/faculty_demo1','AdminController@facultyAdd');

Route::post('/faculty_demo2','AdminController@facultyRemove');

Route::post('/teacher_confirm','LoginController@status_teacher_confirm');

Route::post('/admin_confirm','AdminController@status_admin_confirm');

Route::post('/admin_done','AdminController@status_admin_done');



// Route::get('/admin_home', function () {
//     return view('admin_home');
// });

// Route::get('/teacher', function () {
//    return view('teacher');
// });

