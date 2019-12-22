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

Route::get('/about', 'PagesController@about');

Route::get('/', function () {
    session(['name' => 'john']);
    return view('welcome');
});

Route::get('/contact', 'PagesController@contact');


/*Route::get('/projects', 'ProjectController@index');
Route::post('/projects', 'ProjectController@store');
Route::get('/projects/create', 'ProjectController@create');
Route::get('/projects/{project}', 'ProjectController@show');
Route::get('/projects/{project}/edit', 'ProjectController@edit');
Route::patch('/projects/{project}', 'ProjectController@update');
Route::delete('/projects/{project}', 'ProjectController@destroy');*/
/**вместо всего этого можно использовать resource()
 * :
 * */
Route::resource('projects', 'ProjectController');

Route::patch('/tasks/{task}', 'ProjectTaskController@update');
Route::post('/projects/{project}/tasks', 'ProjectTaskController@store');

/*Route::get('/about', function (){

   return view('about')->with([
       'tasks' => [
           'Go to the store',
           'Go to the market',
           'Go to work',
           'Go to the home'
         ],
       'foo' => request('title', 'foobar')
        ]);

});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
