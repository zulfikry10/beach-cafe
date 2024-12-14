<?php

use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User list management routes
    Route::get('/profile/list', [ProfileController::class, 'viewListofUsers'])->name('profile.index');
    Route::delete('/profile/list/delete/{id}', [ProfileController::class, 'deleteUser'])->name('profile.delete');

    // Role editing routes
    Route::get('/profile/list/edit-role/{id}', [ProfileController::class, 'editRole'])->name('profile.editRole');
    Route::patch('/profile/list/edit-role/{id}', [ProfileController::class, 'updateRole'])->name('profile.updateRole'); // Changed name to avoid duplication
  
  Route::get('/list_of_feedback/{id}', [FeedbackController::class, 'viewListOFeedback'])->name('view_all_feedback');
  Route::get('/add_feedback/{menu_id}', [FeedbackController::class, 'viewAddFeedback'])->name('view_add_Feedback');
  Route::post('/add_feedback/create', [FeedbackController::class, 'createFeedback'])->name('create_feedback');
  Route::get('/menu', [MenuController::class, 'index'])->name('menu');
});

require __DIR__.'/auth.php';

Route::get('/dummydisplay', [FeedbackController::class, 'displaydummy'])->name('dummydisplay');

