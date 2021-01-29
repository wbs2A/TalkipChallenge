<?php

use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactListController;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactListController::class,'index']);

Route::get('/newlist',[ContactListController::class, 'create'])->middleware('auth');

Route::get('/insertcontacts', [ContactController::class, 'show_contact_insert_form'])->name('insertcontacts');

Route::get('/remove_contactlist', [ContactListController::class, 'destroy']);


#TODO CSV
#Route::get('/', 'ImportController@getImport')->name('import');


Route::prefix('api')->group( function(){
    Route::post('/addlist', [ContactListController::class, 'store']);

    Route::post('/addcontacts', [ContactController::class, 'store']);

    #TODO CSV
    #Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
    #Route::post('/import_process', 'ImportController@processImport')->name('import_process');

});

Auth::routes();

Route::get('/logout', [LogoutController::class, 'logout']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
