<?php

use App\Http\Controllers\backend\GroupController;
use App\Http\Controllers\backend\MarksController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\SubjectsController;
use App\Http\Controllers\MultipleStudentImportController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('subjects',SubjectsController::class);
Route::resource('marks',MarksController::class);

Route::resource('students',StudentController::class);
Route::resource('groups',GroupController::class);
Route::get('show',[ShowController::class,'show'])->name('single.student');
Route::get('details/{details}',[ShowController::class,'details'])->name('details.student');
Route::get('student/create',[MultipleStudentImportController::class,'create'])->name('multiple.import');
Route::post('student/import',[MultipleStudentImportController::class,'store'])->name('student.import');
Route::post("marks/import",[MarksController::class,'marksImport'])->name('marks.import');
Route::get("/selectstudent/{id}",[MarksController::class,'select']);

require __DIR__.'/auth.php';
