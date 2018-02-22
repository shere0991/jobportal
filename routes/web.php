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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('profile/{username}', 'MainController@profile')->name('profile');
Route::post('profile/upload_cv', 'MainController@upload_cv');
Route::post('profile/upload_photo', 'MainController@upload_photo');
Route::post('profile/update_profile_info', 'MainController@update_profile_info');
Route::get('{user_id}/{username}/applied-online', 'MainController@applied_online');
Route::get('search','HomeController@search')->name('search');
// Route::post('search/{search}','HomeController@searching')->name('searching');
Route::post('{user_id}/{username}/application_archived', 'MainController@application_archived');
Route::get('/{companyId}/{company}/company-base-job','HomeController@company_base_job_list');
Route::post('search_job','HomeController@search_job');
Route::get('{user_id}/{jobId}/{JobTitle}','MainController@job_preview');
Route::get('{jobId}/{JobTitle}/home/single-job','HomeController@single_job');

Route::post('{username}/{id}/{JobTitle}/employee_application', 'MainController@employee_application');
Route::get('{username}/application/{id}/{JobTitle}', 'MainController@application')->name('application');
Route::get('application', 'MainController@application')->name('application');
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace'=>'Dashboard'],function(){
// Authentication Routes...
Route::get('admin/login', 'LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'LoginController@login');
Route::post('admin/logout', 'LoginController@logout')->name('admin.logout');

// Registration Routes...
Route::get('admin/register', 'RegisterController@showRegistrationForm')->name('admin.register');
Route::post('admin/register', 'RegisterController@register');
Route::post('admin/deleteApplicants','Main@deleteApplicants');

// Password Reset Routes...
Route::get('admin-passwords/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-passwords/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-passwords/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin-passwords/reset', 'ResetPasswordController@reset');
Route::get('admin/editor', 'EditorController@index')->name('admin.editor');
Route::get('admin/test', 'EditorController@test')->name('admin.test');


/*Company*/
Route::get('admin/single-company/{company}/{JobTitle}','Main@single_company');
Route::get('admin/job-preview/{jobIds}/{JobTitle}','Main@jobPreview');
Route::get('admin/add-company','Main@companyPage');
Route::post('admin/addCompany','Main@addCompany');
Route::post('admin/editCompany','Main@editCompany');
Route::post('admin/updateCompany','Main@updateCompany');
Route::post('admin/deleteCompany','Main@deleteCompany');
Route::resource('admin/job-post','JobPostController');

Route::get('admin/create-user','Main@createUserForm');
Route::post('admin/createUser','Main@createUser');
Route::post('admin/editUser','Main@editUser');
Route::post('admin/updateUser','Main@updateUser');
Route::post('admin/deleteUser','Main@deleteUser');

Route::get('admin/register-user','Main@registerUser');

Route::get('admin/add-role','Main@roleForm');
Route::post('admin/createRole','Main@createRole');
Route::post('admin/editRole','Main@editRole');
Route::post('admin/updateRole','Main@updateRole');
Route::post('admin/deleteRole','Main@deleteRole');
Route::post('admin/assignRole','Main@assignRole');
/*Download Excel File*/
Route::get('admin/company/downloadExcelFromApplication/{jobIds}','Main@downloadExcelFromApplication');
Route::get('admin/company/downloadExcelFromShortList/{jobIds}','Main@downloadExcelFromShortList');
Route::get('admin/company/downloadExcelFromInterview/{jobIds}','Main@downloadExcelFromInterview');
Route::get('admin/company/downloadExcelFromFinalList/{jobIds}','Main@downloadExcelFromFinalList');

/*Application,ShortList,Intevirw,FinalList*/
Route::get('admin/company/application/{jobIds}/{JobTitle}','Main@application');

Route::get('admin/company/short-list/{jobIds}/{JobTitle}','Main@shortList');
Route::get('admin/company/interview/{jobIds}/{JobTitle}','Main@interview');
Route::get('admin/company/final-list/{jobIds}/{JobTitle}','Main@finalList');

Route::get('admin/company/reject-from-application/{jobIds}/{JobTitle}','Main@reject_applicants_list_from_application');
Route::get('admin/company/reject-from-shortlist/{jobIds}/{JobTitle}','Main@reject_applicants_list_from_shortlist');
Route::get('admin/company/reject-from-interview/{jobIds}/{JobTitle}','Main@reject_applicants_list_from_interview');
Route::get('admin/company/reject-from-finallist/{jobIds}/{JobTitle}','Main@reject_applicants_list_from_finallist');

Route::post('admin/company/application/{jobIds}/send_mail','Main@send_mail');
Route::post('admin/company/application/{jobIds}/reject_mail','Main@reject_mail');
Route::post('admin/company/{joblist}/{jobIds}/ShortListing','Main@ShortListing');
Route::post('admin/company/{joblist}/{jobIds}/InterviewListing','Main@InterviewListing');
Route::post('admin/company/{joblist}/{jobIds}/FinalListing','Main@FinalListing');
/*Rejection Or Delete*/
Route::post('admin/company/{joblist}/{jobIds}/rejectFromApplication','Main@rejectFromApplication');
Route::post('admin/company/{joblist}/{jobIds}/rejectFromShortList','Main@rejectFromShortList');
Route::post('admin/company/{joblist}/{jobIds}/rejectFromInterview','Main@rejectFromInterview');
Route::post('admin/company/{joblist}/{jobIds}/rejectFromFinalList','Main@rejectFromFinalList');

Route::post('admin/company/{joblist}/{jobIds}/application_restoring_reject_list','Main@application_restoring_reject_list');
Route::post('admin/company/{joblist}/{jobIds}/shortlist_restoring_reject_list','Main@shortlist_restoring_reject_list');
Route::post('admin/company/{joblist}/{jobIds}/interview_restoring_reject_list','Main@interview_restoring_reject_list');
Route::post('admin/company/{joblist}/{jobIds}/finallist_restoring_reject_list','Main@finallist_restoring_reject_list');

Route::get('admin/job-list','Main@jobList');
Route::post('admin/archive_job','Main@archive_job');
Route::post('admin/delete_job','Main@delete_job');
Route::get('admin/archive-job','Main@archive_job_list');
Route::post('admin/restore_job_from_archive','Main@restore_job_from_archive');


Route::get('admin/registration','Main@registration');
Route::post('admin/registratering','Main@registration');
Route::get('admin/short-list','Main@shortList');
Route::get('admin/interview','Main@interview');
Route::get('admin/confirm','Main@confirm');
Route::get('admin/reject','Main@reject');
 
// archive
Route::get('admin/job-archive','Main@jobArchive');
Route::get('admin/archive','Main@archive');


// Report Generate
Route::get('admin/recruitment-requisition','ReportGenerateController@recruitment_requisition');
Route::get('admin/interview-ratings','ReportGenerateController@interview_ratings');
Route::get('admin/summary-for-cv-shorting','ReportGenerateController@summary_for_cv_shorting');
Route::get('admin/candidate-information_score','ReportGenerateController@candidate_information_score');
Route::get('admin/interview-final-approval','ReportGenerateController@interview_final_approval');
Route::get('admin/recruitment-final-approval-dmd','ReportGenerateController@recruitment_final_approval_dmd');
Route::get('admin/recruitment-final-approval-director','ReportGenerateController@recruitment_final_approval_director');
Route::get('admin/final-status-report','ReportGenerateController@final_status_report');
Route::get('admin/recruitment-status-report','ReportGenerateController@recruitment_status_report');
Route::post('admin/submit_requisition_form_1','ReportGenerateController@submit_requisition_form_1');
Route::post('admin/submit_requisition_form_2','ReportGenerateController@submit_requisition_form_2');
Route::post('admin/submit_requisition_form_3','ReportGenerateController@submit_requisition_form_3');
// Route::get('admin','AdminHome@index');
Route::get('admin', 'AdminHome@index')->name('admin.home');
});

