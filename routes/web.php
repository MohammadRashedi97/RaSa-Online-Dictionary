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

/* WordController Routes */

// Resource Route for frontend dictionary
Route::resource('word', 'WordController');

// Route to the Main Page of wbsite
Route::get('/', [
    'uses' => 'WordController@index',
    'as' => 'index'
]);

// Frontend search route
Route::get('/search', [
    'uses' => 'WordController@search',
    'as' => 'search'
]);

// route for autocomplete functionality
Route::post('/fetch', [
    'uses' => 'WordController@fetch',
    'as' => 'fetch'
]);



/* Authentication Routes */
Auth::routes();



/* HomeController Routes */

// Dashboard Route(different dashboards based on role)
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// "About Us" Route
Route::get('/about', 'HomeController@about')->name('about');

// "Contact Us" Route
Route::get('/contact', 'HomeController@contactUs')->name('contact');



/* Backend Routes */

// Resource Route for the backend dictionary
Route::resource('/backend/dictionary', 'Backend\DictionaryController', [
    'as' => 'backend'
]);

// Alphabetical Navigaion Route
Route::get('/backend/alphabetnavigation/{char}', [
    'uses' => 'Backend\DictionaryController@AlphabetNavigation',
    'as' => 'backend.alphabetNavigation'
]);

// Resource Route for the backend categories
Route::resource('/backend/categories', 'Backend\CategoriesController', [
    'as' => 'backend'
]);

// Resource Route for the backend users
Route::resource('/backend/users', 'Backend\UsersController', [
    'as' => 'backend'
]);

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');

Route::resource('/word/{word}/persian', 'PersianDefinitionController');
Route::resource('/word/{word}/english', 'EnglishDefinitionController');
Route::resource('/word/{word}/example', 'ExampleController');

// Route responsible for liking a word
Route::post('/persian-definition/{id}/like', [
    'uses' => 'PersianDefinitionController@like',
    'as' => 'like'
]);

// Route responsible for liking a word
Route::post('/persian-definition/{id}/dislike', [
    'uses' => 'PersianDefinitionController@dislike',
    'as' => 'dislike'
]);

// Route responsible for liking a word
Route::post('/english-definition/{id}/like', [
    'uses' => 'EnglishDefinitionController@like',
    'as' => 'like'
]);

// Route responsible for liking a word
Route::post('/english-definition/{id}/dislike', [
    'uses' => 'EnglishDefinitionController@dislike',
    'as' => 'dislike'
]);

// Route responsible for liking a word
Route::post('/example/{id}/like', [
    'uses' => 'ExampleController@like',
    'as' => 'like'
]);

// Route responsible for liking a word
Route::post('/example/{id}/dislike', [
    'uses' => 'ExampleController@dislike',
    'as' => 'dislike'
]);