<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/registration/options', 'HomeController@register_option');
Route::get('/about', 'HomeController@about');
Route::get('/feature', 'HomeController@feature');
Route::get('/team', 'HomeController@team');
Route::get('/contact', 'HomeController@contact');


Route::get('/exam-manages','ExamsController@exam_type')->name('exam.dashboard');
Route::get('/json-exam','ExamsController@exam');
Route::get('/json-exam-level','ExamsController@level');
Route::get('/json-exam-subject','ExamsController@subject');
Route::get('/exam-manages-view/{term_id}/{exam_id}/{level_id}/{subject_id}','ExamsController@manage_marks');
Route::post('/marks','ExamsController@store');

/*
  admin routes
*/
Route::get('/register/admin','AdminsController@create');
Route::post('/register/admin','AdminsController@store')->name('admin.register.form');

Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{

  // Route::get('/login/admin','AdminsController@showLogin');
  // Route::post('/login/admin','AdminsController@authenticate')->name('admin.login');

  //Route::get('/student-information','StudentController@index')->name('index.students');

  Route::get('/admin/add-subjects','SubjectController@add')->name('add.subject');
  Route::post('/admin/subjects','SubjectController@store')->name('store.subject');
  Route::get('/admin/subjects','SubjectController@index')->name('index.subject');
  Route::get('/admin/subjects/edit/{id}','SubjectController@edit');
  Route::post('/admin/subjects/edit/{subject}','SubjectController@update');
  Route::get('/admin/subjects/delete/{subject}', 'SubjectController@destroy');

  Route::get('/admin/levels/create','LevelsController@create')->name('create.levels');
  Route::post('/admin/levels/store','LevelsController@store')->name('store.levels');
  Route::get('/admin/levels/index','LevelsController@index')->name('index.levels');
  Route::get('/levels/delete/{level}', 'LevelsController@destroy');
  Route::get('/levels/edit/{level}', 'LevelsController@edit');
  Route::post('/levels/edit/{level}', 'LevelsController@update');

  Route::get('/student/delete/{student}', 'StudentController@destroy');
  Route::get('/teacher/delete/{teacher}', 'TeacherController@destroy');

  Route::get('/admin/student-info/{id}','AdminPagesController@student_info');
  Route::get('/admin/teacher-list','AdminPagesController@teacher_info');
  Route::get('/admin/subject/{id}','AdminPagesController@subject_info');

   Route::get('/admin/term/create', 'AdminPagesController@term_view');
  Route::post('/admin/term/create', 'AdminPagesController@term_store');
  Route::get('/admin/exam/create', 'AdminPagesController@subExam_view');
  Route::post('/admin/exam/create', 'AdminPagesController@subExam_store');



  Route::get('/admin/dashboard','AdminPagesController@profile');

  Route::get('/admin/file-upload','FileUploadController@file_upload_view');
  Route::post('/admin/file-upload/post','FileUploadController@upload')->name('post.file');
  Route::get('/admin/file-view','FileUploadController@show_uploaded_file');

  Route::get('/admin/student-result/{id}','AdminPagesController@show_student_result');
  Route::get('/admin/student/result/{id}','AdminPagesController@show_result');

  //Route::get('/admin/student/attendance/{id}','AdminPagesController@show_student_attendance');
  //Route::get('/admin/student/attendance-report','AdminPagesController@student_attendance_report_card');

});



/*
  students routes
*/
Route::get('/register-student','StudentController@create')->name('register.form');
Route::post('/register-student','StudentController@store')->name('register.student');

Route::group(['middleware' => 'App\Http\Middleware\StudentMiddleware'], function()
{
  Route::get('/student/{id}/edit', 'StudentController@edit')->name('edit.student');
  Route::post('/student/{student}', 'StudentController@update');

  /*
    Student dashboard routes
  */
  Route::get('/student/dashboard','StudentPageController@profile');
  Route::get('/student/teacher-list','StudentPageController@teacher_info');
  Route::get('/student/subject','StudentPageController@subject_info');
  Route::get('/student/exam-marks','StudentPageController@exam_marks');

  Route::get('/student/assignment-view','StudentPageController@show_uploaded_file');
  Route::get('/student/assignment/upload/{assignment_id}/{subject_id}','StudentPageController@assignment_upload_view');
  Route::post('/student/assignment/upload','StudentPageController@post_assignment_upload');
  Route::get('/student/assignment/download/{file_name}','AssignmentController@assignment_download');
  Route::get('/student/notice-view','StudentPageController@show_notice');


});

Route::get('/register-teacher','TeacherController@create')->name('register.teacher.form');
Route::post('/register-teacher','TeacherController@store')->name('register.teacher');


Route::group(['middleware'=> 'App\Http\Middleware\TeacherMiddleware'], function()
{

  /*
    Teacher dashboard routes
  */
  Route::get('/teacher/dashboard','TeacherPageController@profile');
  Route::get('/student-info/{id}','TeacherPageController@student_info');
  Route::get('/teacher-list','TeacherPageController@teacher_info');
  Route::get('/subject/{id}','TeacherPageController@subject_info');

    /*
      Teacher assignment routes
    */
  Route::get('/teacher/assignment-upload','AssignmentController@assignment_upload_view');
  Route::post('/teacher/assignment-upload','AssignmentController@upload');
  Route::get('/teacher/assignment-view','AssignmentController@show_files');
  Route::get('/teacher/assignment/download/{file_name}','AssignmentController@assignment_download');
  Route::get('/teacher/assignment/delete/{file_name}','AssignmentController@assignment_delete');
  Route::get('/teacher/student/assignment','AssignmentController@student_assignment_show');
  Route::get('/teacher/student/assignment/download/{file_name}','AssignmentController@student_assignment_download');
  Route::get('/teacher/student/assignment/delete/{file_name}','AssignmentController@student_assignment_delete');


  Route::get('/teacher/file-view','TeacherPageController@show_uploaded_file');

  Route::get('/teacher/edit/{id}', 'TeacherController@edit');
  Route::post('/teacher/edit/{teacher}', 'TeacherController@update');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/*
  attendance routes
*/

Route::get('/attendance','AttendanceController@level');
Route::get('/json-attendance','AttendanceController@subject');
Route::post('/attendance-manages/{date}/{level_id}/{subject_id}','AttendanceController@manage_attendance');
Route::post('/attendance-manages-view','AttendanceController@store');
Route::get('/student/attendance-report','AttendanceController@attendance_report');
Route::post('/attendance-report','AttendanceController@attendance_report_card');




/*
  student attendance routes
*/


Route::get('/file-view/download/{file_name}','FileUploadController@download');
Route::get('/file-view/delete/{file_name}','FileUploadController@file_delete');

Route::get('/admin/attendance-report','AdminPagesController@attendance_view');
Route::post('/admin/attendance-report/{level_id}/{subject_id}/{year}/{month}','AdminPagesController@show_attendance');
