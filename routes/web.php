<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\empController;
use App\Http\Controllers\attendController;
use App\Http\Controllers\eventController;

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

// USER CONTROLLER

Route::get('/', [userController::class, 'welcome'])->name('welcome');

Route::get('/login', [userController::class, 'login'])->name('login');

Route::post('/checkEmail', [userController::class, 'checkEmail'])->name('checkEmail');

Route::get('/logout', [userController::class, 'logout'])->name('logout');

Route::post('/acceptRegistration', [userController::class, 'saveRegistration'])->name('saveRegistration');

Route::get('/signup', [userController::class, 'signup'])->name('signup');

Route::post('/userAuth', [userController::class, 'userAuth'])->name('userAuth');

// EMPLOYEE CONTROLLER

Route::post('/acceptMember', [empController::class, 'saveEmployee'])->name('saveEmployee');

Route::get('/employee', [empController::class, 'employee'])->name('employee');

Route::patch('/update/{id}', ['as' => 'employee.update', 'uses' => 'empController@update']);
 
Route::delete('/delete/{id}', ['as' => 'employee.delete', 'uses' => 'empController@delete']);

//Route::get('/makeQR', [memberController::class, 'makeQR'])->name('makeQR');

// ATTENDANCE CONTROLLER

Route::get('/attendance/morning', [attendController::class, 'morning'])->name('morning');

Route::get('/attendance/afternoon', [attendController::class, 'afternoon'])->name('afternoon');

Route::get('/dtr', [attendController::class, 'dtr'])->name('dtr');

Route::get('count', 'attendController@getCount')->name('count');

// EVENT CONTROLLER

Route::post('/savingevent', [eventController::class, 'saveEvent'])->name('saveEvent');

Route::get('/event', [eventController::class, 'event'])->name('event');

Route::get('/event/eventmodify', [eventController::class, 'modify'])->name('modify');

Route::patch('/updateevent/{id}', ['as' => 'event.update', 'uses' => 'eventController@update']);
 
Route::delete('/deleteevent/{id}', ['as' => 'event.delete', 'uses' => 'eventController@delete']);

Route::get('/events/{id}', function ($id) {
    // Query the database for the event with the specified ID
    $event = DB::table('events')->where('idevent', $id)->first();
  
    // Return the data for the event as a JSON response
    return response()->json($event);
});

Route::get('/getValue/{id}', 'eventController@getValue');

//

Route::get('/get-data-for-table', function() {
    // query the database to retrieve the data
    $data = DB::table('attendances')->get();
  
    // return the data as a JSON response
    return response()->json($data);
});
