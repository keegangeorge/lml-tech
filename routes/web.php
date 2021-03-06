<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AssessmentController;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::redirect('/', '/dashboard', 301);

// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('dashboard');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/assessments/create', [AssessmentController::class, 'create'])->name('assessments.create');

// Route::middleware(['auth:sanctum', 'verified'])->get('/assessments', [AssessmentController::class, 'index'])->name('assessments.index');


// Route::middleware(['auth:sanctum', 'verified'])->get('/assessments/{id}', [AssessmentController::class, 'show'])->name('assessments.show');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('assessments', AssessmentController::class);
    // Route::post('/assessments/{assessment}/tasks', [TasksController::class, 'store']);
});

// action ="/assessments/{{ $assessments->id }}/tasks