<?php

use App\Http\Controllers\StudentController;
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

//Home page
Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::post('/', [StudentController::class, 'index'])->name('search');

//Add student
Route::get('/add', [StudentController::class, 'create'])->name('student.add');
Route::post('/add', [StudentController::class, 'store'])->name('student.store');

//Edit student
Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/edit/{student}', [StudentController::class, 'update'])->name('student.update');

Route::delete('/delete/{student}', [StudentController::class, 'destroy'])->name('student.delete');
