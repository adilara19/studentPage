<?php

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

Route::get('/', [StudentController::class, 'index']);
Route::get('/student-add', [StudentController::class, 'create'])->name('student.add');
Route::post('/student-add', [StudentController::class, 'store'])->name('student.store');
Route::get('/student-detail/{student_id}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student-edit/{student_id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student-edit', [StudentController::class, 'update'])->name('student.update');
Route::get('/student-delete/{student_id}', [StudentController::class, 'destroy'])->name('student.delete');
