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


// headTeacher routes
// the employee routes for the headTeacher
Route::controller(App\Http\Controllers\headTeacher\EmployeeController::class)->group(function () {
    Route::get('/employee_recycle', 'employee_recycle')->name('employee_recycle');
    Route::get('/employee/form', 'add_employee')->name('add_employee');
    Route::get('/form/{employee}', 'employeeFormEdit')->name('employeeFormEdit');
    Route::get('/employees/{employee}', 'viewEmployee')->name('viewEmployee');
    Route::get('/all-employees', 'allEmployees')->name('allEmployees');
});


// class routes 
Route::controller(App\Http\Controllers\headTeacher\classController::class)->group(function () {
    Route::get('/CreateClass', 'classForm')->name('classCreate');
    Route::get('/classDeck', 'classDeck')->name('classDeck');
    Route::get('/Class_recycle', 'Class_recycle')->name('classRecycle');
    Route::get('/class/{class}', 'viewClass')->name('viewClass');
    Route::get('/editClass/{_class}', 'editClass')->name('editClass');
});




// student routes here
Route::controller(App\Http\Controllers\headTeacher\studentController::class)->group(function () {
    Route::get('/student_recycle', 'recycleBin')->name('recycleBin');
    Route::get('/form', 'form')->name('studentForm');
    Route::get('/form/{student}', 'studentFormEdit')->name('studentFormEdit');
    Route::get('/all-students', 'allStudents')->name('allStudents');
    Route::get('/students/{admin_student}', 'adminStudent')->name('adminStudent');
});
// end of headTeacher routes




// teacher routes for the report card