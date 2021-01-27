<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactListController;
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

Route::prefix('api')->group( function(){
    Route::post('/addcontact', function (){
        #TODO
    });
    Route::post('/addcontacts', function (){
        #TODO
    });

});
