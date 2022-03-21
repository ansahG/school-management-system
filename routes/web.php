<?php

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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// claass routes 
Route::get('/CreateClass', [App\Http\Controllers\headTeacher\headTeacherController::class , 'classForm'])->name('classCreate');
Route::get('/classDeck', [App\Http\Controllers\headTeacher\headTeacherController::class , 'classDeck'])->name('classDeck');
Route::get('/Class_recycle', [App\Http\Controllers\headTeacher\headTeacherController::class , 'Class_recycle'])->name('classRecycle');
Route::get('/class/{class}', [App\Http\Controllers\headTeacher\headTeacherController::class , 'viewClass'])->name('viewClass');
Route::get('/editClass/{_class}', [App\Http\Controllers\headTeacher\headTeacherController::class , 'editClass'])->name('editClass');


Route::get('/student_recycle', [App\Http\Controllers\headTeacher\headTeacherController::class , 'recycleBin'])->name('recycleBin');
Route::get('/form', [App\Http\Controllers\headTeacher\headTeacherController::class , 'form'])->name('studentForm');
Route::get('/form/{student}', [App\Http\Controllers\headTeacher\headTeacherController::class , 'studentFormEdit'])->name('studentFormEdit');
Route::get('/all-students', [App\Http\Controllers\headTeacher\headTeacherController::class , 'allStudents'])->name('allStudents');
Route::get('/{admin_student}', [App\Http\Controllers\headTeacher\headTeacherController::class , 'adminStudent'])->name('adminStudent');



