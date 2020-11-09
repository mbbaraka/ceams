<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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

Auth::routes();

// Route::get('/', 'WebsiteController@index')->name('index');
// Route::get('category/{slug}', 'WebsiteController@category')->name('category');
// Route::get('post/{slug}', 'WebsiteController@post')->name('post');
// Route::get('page/{slug}', 'WebsiteController@page')->name('page');
// Route::get('contact', 'WebsiteController@showContactForm')->name('contact.show');
// Route::post('contact', 'WebsiteController@submitContactForm')->name('contact.submit');
// Route::get('/send-mail', function () {

//     Mail::to('newuser@example.com')->send(new Samplemail());

//     return 'A message has been sent to Mailtrap!';

// });
Route::get('/pending-registration', 'HomeController@pending')->name('pending');

Route::group(['prefix' => '/', 'middleware' => 'auth', 'namespace' => 'Home'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    // notoficationss
    Route::get('/notifications/{id}/marked', 'HomeController@markRead')->name('mark-as-read');
    Route::get('/notifications/{id}/delete', 'HomeController@deleteNotification')->name('notification.delete');
    Route::get('/notifications/{id}/view', 'HomeController@viewNotification')->name('notification.view');


    Route::resource('studies', 'StudyController', ['except' => 'create', 'edit', 'show']);
    Route::resource('courses', 'CourseController', ['except' => 'create', 'edit', 'show']);
    Route::resource('community', 'CommunityServiceController', ['except' => 'create', 'edit', 'show']);
    Route::resource('analysis', 'AnalysisController', ['except' => 'create', 'edit', 'show']);
    Route::resource('lectures', 'LectureController', ['except' => 'create', 'edit', 'show']);
    Route::resource('meetings', 'MeetingController', ['except' => 'create', 'edit', 'show']);
    Route::resource('skills', 'SkillController', ['except' => 'create', 'edit', 'show']);
    Route::resource('researchactivities', 'ResearchActivityController', ['except' => 'create', 'edit', 'show']);
    Route::resource('researchgrants', 'ResearchGrantController', ['except' => 'create', 'edit', 'show']);
    Route::resource('publications', 'PublicationController', ['except' => 'create', 'edit', 'show']);
    Route::resource('responsibilities', 'AdministrativeController', ['except' => 'create', 'edit', 'show']);
    Route::resource('particulars', 'ParticularsController');
    Route::resource('community-service', 'CommunityServiceController', ['except' => 'create', 'edit', 'show']);
    // Route::resource('responsibilities', 'AdministrativeController', ['except' => 'create', 'edit', 'show']);

    // Achievement Assessment
    Route::get('/achievement-assessment', 'AchievementController@index')->name('achievement-assessment');
    Route::post('/achievement-assessment/{id}/store', 'AchievementController@storeTarget')->name('achievement-assessment.store');
    Route::get('/achievement-assessment/{id}/reset', 'AchievementController@resetTarget')->name('achievement-assessment.reset');

    // Appraiser routes
    Route::get('/appraiser', 'AppraiserController@index')->name('achievement-assessment');
    Route::get('/apraisee-list', 'AppraiserController@listAppraisee')->name('appraisee-list');
    Route::get('/appraiser/{id}/staff', 'AppraiserController@staff')->name('appraiser-staff');
    Route::get('/appraiser/{id}/achievements', 'AppraiserController@achievement')->name('staff-achievements');
    Route::get('/appraiser', 'AppraiserController@index')->name('achievement-assessment');

});


//Hr routes
Route::group(['prefix' => '/hr', 'middleware' => 'can:isHR, hr', 'namespace' => 'Hr'], function (){
    Route::get('/', 'HomeController@index')->name('hr.index');

    // MAnage staffs
    Route::get('/staffs', 'PageController@staffs')->name('hr.staffs');
    Route::get('/staffs/new', 'StaffController@createStaff')->name('hr.staffs.create');
    Route::post('/staffs/create', 'StaffController@store')->name('staff-store');
    Route::post('/staffs/{id}/edit', 'StaffController@editStaff')->name('hr.staffs.edit');
    Route::post('/staffs/{id}/delete', 'StaffController@deleteStaff')->name('hr.staffs.delete');
    Route::get('/appraisals', 'PageController@appraisals')->name('hr.appraisals');
    Route::get('/staff/roles', 'PageController@roles')->name('hr.roles');
    Route::get('/staff/pending', 'StaffController@pendingStaff')->name('hr.staffs.pending');
    Route::post('/staff/update/{id}/pending', 'StaffController@updatePending')->name('hr.staffs.pending.approve');

    //  Manage roles
    Route::post('/roles/new', 'StaffController@roleStore')->name('hr.roles.new');
    Route::get('/roles', 'StaffController@roles')->name('hr.roles.create');
    Route::post('/roles/{id}', 'StaffController@deleteRole')->name('hr.roles.delete');
    Route::get('/roles/assign', 'StaffController@assignRole')->name('hr.roles.assign');
    Route::post('/roles/assign/store/{id}', 'StaffController@assignStoreRole')->name('hr.store.assign');
    Route::get('/roles/staff', 'StaffController@roleStaff')->name('hr.roles.staff');
    Route::post('/roles/{id}/de-assign', 'StaffController@deassignRole')->name('hr.role.deassign');
    // Route::get('/', 'HomeController@index')->name('hr.index');


    // Manage Appraisers

    Route::get('/appraisers', 'PageController@appraisers')->name('hr.appraisers');
    Route::get('/appraisers/list', 'AppraiserController@list')->name('hr.appraiser.list');
    Route::get('/appraisers/new', 'AppraiserController@new')->name('hr.appraiser.new');
    Route::get('/appraisers/{id}/create', 'AppraiserController@store')->name('hr.appraiser.create');
    Route::get('/appraisers/{id}/delete', 'AppraiserController@delete')->name('hr.appraiser.delete');
    Route::get('/appraisers/{id}/appraisees', 'AppraiserController@appraisees')->name('hr.appraiser.appraisees');
    Route::post('/appraisers/{id}/assign-appraisees', 'AppraiserController@appraiseeAssign')->name('hr.appraiser.assign');
    Route::get('/appraisers/{id}/de-assign-appraisee', 'AppraiserController@appraiseeDeassign')->name('hr.appraisee.deassign');

    // Manage Jobs and Job Descriptions
    Route::get('/jobs', 'PageController@jobs')->name('hr.jobs');
    Route::post('/jobs/new/store', 'JobController@store')->name('hr.jobs.store');
    Route::get('/jobs/{id}/delete', 'JobController@deleteJob')->name('hr.jobs.delete');
    Route::get('/jobs/{id}/descriptions', 'JobController@jobDescription')->name('hr.jobs.description');
    Route::post('/jobs/descriptions/store', 'JobController@jobDescriptionStore')->name('hr.jobs.description.store');
    Route::get('/jobs/descriptions/{id}/delete', 'JobController@descriptionDelete')->name('hr.jobs.description.delete');



});

//Appraiser routes
Route::group(['prefix' => '/appraiser', 'middleware' => 'can:isAppraiser, 1', 'namespace' => 'Appraiser'], function (){
    Route::get('/', 'HomeController@index')->name('appraiser.index');
    // Route::get('/jobs', 'PageController@jobs')->name('hr.jobs');
    // Route::get('/staffs', 'PageController@staffs')->name('hr.staffs');
    // Route::get('/appraisers', 'PageController@appraisers')->name('hr.appraisers');
    // Route::get('/appraisals', 'PageController@appraisals')->name('hr.appraisals');
    // Route::get('/', 'HomeController@index')->name('hr.index');
});


//Achievements routes
//Route::get('/achievements/studies', 'AchievementsController@studies')->name('studies');

