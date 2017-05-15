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

Route::get('/', 'Frontend\HomeOlympiaController@index');

Route::resource('home-olympia', 'Frontend\HomeOlympiaController');

Route::resource('about-us', 'Frontend\AboutUsController');

Route::resource('event', 'Frontend\EventController');

Route::resource('menu_frontend', 'Frontend\MenusController');

Route::get('course', 'Frontend\HomeOlympiaController@showCourse')->middleware('student');

Route::resource('login1', 'Frontend\LoginController');

Route::get('managerCourse/{id}', 'Frontend\ManagerController@show')->middleware('student')->name('viewCourse');

Route::get('learn/{id}', 'Frontend\ManagerController@viewLearn')->middleware('student')->name('viewLearn');

Route::get('lesson/{id_lesson}', 'Frontend\ManagerController@viewLesson')->middleware('student')->name('viewLesson');

Route::post('registerCouser/{id}', 'Frontend\ManagerController@registerCourse')->name('registerCourse')->middleware('student');

Route::get('viewRegis', 'Frontend\ManagerController@viewRegis')->middleware('student')->name('viewRegister');

Route::get('transaction', 'Frontend\ManagerController@learn')->middleware('student')->name('transaction');

Route::get('learn', 'Frontend\ManagerController@learnEnglish')->middleware('student')->name('learnEnglish');

Route::post('back', 'Frontend\ManagerController@comeBack')->middleware('student')->name('comeback');

Route::get('logout1', 'Frontend\LoginController@logout')->name('logout1');

Route::resource('register1', 'Frontend\RegisterController');

Route::get('catalog/{category}', ['as' => 'catalog.filter', 'uses' => 'Frontend\CatalogsController@filter']);

Route::get('news/{new_filter}', ['as' => 'new.filter', 'uses' => 'Frontend\NewsController@filter']);

Auth::routes();

Route::get('/home', ['as' => 'home.index', 'uses' => 'Backend\HomeController@index']);


Route::resource('abouts', 'Backend\AboutController');

Route::resource('feedback', 'Backend\FeedbackController');

Route::resource('supports', 'Backend\SupportController');

Route::resource('catalogs', 'Backend\CatalogController');

Route::resource('menus', 'Backend\MenuController');

Route::resource('lessons', 'Backend\LessonController');

Route::resource('students', 'Backend\StudentController');

Route::resource('events', 'Backend\EventController');

Route::resource('news', 'Backend\NewsController');

Route::resource('images', 'Backend\ImagesController');

Route::resource('teachers', 'Backend\TeachersController');

Route::resource('times', 'Backend\TimesController');

Route::resource('users', 'Backend\UserController'); 