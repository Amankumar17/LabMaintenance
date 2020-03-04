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
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');


// Route::get ( '/admin_search', function () {
//     return view ( 'admin_search' );
// } );

Route::get ('/admin_search', 'AdminController@admin_lab_search');

Route::any('/search', 'AdminController@admin_search');

Route::any('/searchLab', 'AdminController@admin_lab_search1');


Route::get ('/hod_search', 'AdminController@hod_lab_search');

Route::any('/hodsearch', 'AdminController@hod_search');

Route::any('/hodsearchLab', 'AdminController@hod_lab_search1');


Route::get ('/principal_search', 'AdminController@principal_lab_search');

Route::any('/principalsearch', 'AdminController@principal_search');

Route::any('/principalsearchLab', 'AdminController@principal_lab_search1');


Route::post('/chart', 'UserChartController@index');

Route::get('/chart_options', 'UserChartController@chart_options');

Route::get('/download_chart', 'UserChartController@downloadChart');

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

Route::get('/delete_admin', function () {
    return view('admin_del_admin');
});

Route::get('/add_system','AdminController@systemAdd2');

Route::get('/delete_system','AdminController@systemRemove2');

Route::post('/system_demo1','AdminController@systemAdd');

Route::get('/transfer_pc1','AdminController@transferPC1');

Route::post('/transfer_pc','AdminController@transferPC');

Route::post('/system_demo2','AdminController@systemRemove');

Route::post('/admin_demo1','AdminController@adminAdd');

Route::post('/admin_demo2','AdminController@adminRemove');

Route::get('/manage_issue_insert', function () {
    return view('manage_issue_insert');
});

Route::post('/admin_demo3','AdminController@admin_manage_issue_insert');


Route::get('/manage_issue_delete', 'AdminController@admin_manage_issue');

Route::post('/admin_demo4','AdminController@admin_manage_issue_delete');


Route::get('/manage_issue', function () {
    return view('manage_issue');
});


Route::get ( '/admin_deadstock', function () {
    return view ( 'admin_deadstock' );
} );

Route::post('/admin_deadstock_form','AdminController@admin_deadstock_form');

Route::get('/view_registry', 'UserChartController@displayRegistry');



Route::get ( '/system_logs', function () {
    return view ( 'system_logs' );
} );

Route::post('/search_action', 'AdminController@search_action');




