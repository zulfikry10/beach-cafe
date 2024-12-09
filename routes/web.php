<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MenuController;
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


Route::get('/staff-menu', [MenuController::class, 'staffMenu']);
// In your routes/web.php
Route::get('/menu/{menu}', [MenuController::class, 'show'])->name('menu.show');
Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
// In your routes/web.php file
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::get('/staff-menu', [MenuController::class, 'staffMenu'])->name('staff-menu');