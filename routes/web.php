<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => '/', 'middleware' => 'auth', 'namespace' => 'Home'], function () {
	Route::get('/', 'HomeController@index')->name('index');
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
    // Route::resource('pages', 'PageController');
    // Route::resource('galleries', 'GalleryController');



});


//Hr routes
Route::group(['prefix' => '/hr', 'middleware' => 'auth', 'namespace' => 'Hr'], function (){
    Route::get('/', 'HomeController@index')->name('hr.index');
    Route::get('/jobs', 'PageController@jobs')->name('hr.jobs');
    Route::get('/staffs', 'PageController@staffs')->name('hr.staffs');
    Route::get('/appraisers', 'PageController@appraisers')->name('hr.appraisers');
    Route::get('/appraisals', 'PageController@appraisals')->name('hr.appraisals');
    // Route::get('/', 'HomeController@index')->name('hr.index');
});




//Achievements routes
//Route::get('/achievements/studies', 'AchievementsController@studies')->name('studies');

