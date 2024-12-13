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

//customer menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

//staff menu
Route::get('/staff-menu', [MenuController::class, 'staffMenu']);
Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menu.show');
Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::get('/staff-menu', [MenuController::class, 'staffMenu'])->name('staff-menu');
Route::get('/add-menu', [MenuController::class, 'addMenu'])->name('add-menu');


//order

// Route::get('/orderCustomization', [OrderController::class, 'showCustomization'])->name('customize.order');
Route::get('/orderCustomization/{menu}', [OrderController::class, 'showCustomization'])->name('customize.order');
Route::post('/order/store', [OrderController::class, 'storeToCart'])->name('order.store');
Route::get('/deleteCart/{order}', [OrderController::class, 'destroyOrder'])->name('order.destroy');
Route::get('/cartList', [OrderController::class, 'showCartList'])->name('order.cart');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/order-confirmation', [OrderController::class, 'showOrderConfirmation'])->name('order.confirmation');
Route::post('/confirm-order/{order}', [OrderController::class, 'confirmOrder'])->name('order.confirm');
Route::post('/confirm-order/{orderId}', [OrderController::class, 'confirmOrder'])->name('confirmOrder');
Route::get('/order-status/{orderId}', [OrderController::class, 'orderStatus'])->name('orderStatus');
Route::get('/editCart/{order}', [OrderController::class, 'updateCustomization'])->name('order.edit');
Route::put('/order/{order}', [OrderController::class, 'update'])->name('order.update');







Route::get('/orderHistory', [OrderController::class, 'showHistory'])->name('order.history');

