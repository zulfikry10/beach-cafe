<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Models\Feedback;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('default');
});


Route::get('/dummydisplay', [FeedbackController::class, 'displaydummy'])->name('dummydisplay');
Route::get('/list_of_feedback/{id}', [FeedbackController::class, 'viewListOFeedback'])->name('view_all_feedback');
Route::get('/add_feedback/{menu_id}', [FeedbackController::class, 'viewAddFeedback'])->name('view_add_Feedback');
Route::post('/add_feedback/create', [FeedbackController::class, 'createFeedback'])->name('create_feedback');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');


//order
Route::get('/cartList', [OrderController::class, 'showCartList'])->name('cartList');
Route::get('/orderConfirmation', [OrderController::class, 'showCofirmOrder'])->name('confirmOrder');
Route::get('/orderCustomization', [OrderController::class, 'showCustomization'])->name('customizeOrder');
Route::get('/orderHistory', [OrderController::class, 'showHistory'])->name('historyOrder');
Route::get('/orderStatus', [OrderController::class, 'showStatus'])->name('statusOrder');
