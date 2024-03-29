<?php

use App\Mail\Accountant\schoolFeeReceiptMail;

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
    return redirect()->route('dashboard');
});

Route::get('/mail', function () {
    return new schoolFeeReceiptMail();
});



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Administrator routes





//administration  -> student routes here
Route::middleware(['auth:sanctum', 'adminOnlyRoute'])->controller(App\Http\Controllers\Administrator\studentController::class)->group(function () {

    Route::get('/student_recycle', 'recycleBin')->name('recycleBin');

    Route::get('/form', 'form')->name('studentForm');

    Route::get('/form/{student}', 'studentFormEdit')->name('studentFormEdit');

    Route::get('/all-students', 'allStudents')->name('allStudents');

    Route::get('/students/{admin_student}', 'adminStudent')->name('adminStudent');
    Route::delete('/removePermanently/{student}' , 'removePermanently')->name('removePermanently');
    // report card view for admin
    Route::get('/report/{class}/{admin_student}', 'adminViewReportCard')->name('adminViewReportCard');

});






// class routes 
Route::middleware(['auth:sanctum', 'adminOnlyRoute'])->controller(App\Http\Controllers\Administrator\classController::class)->group(function () {
    Route::get('/CreateClass', 'classForm')->name('classCreate');
    Route::get('/classDeck', 'classDeck')->name('classDeck');
    Route::get('/Class_recycle', 'Class_recycle')->name('classRecycle');
    Route::get('/class/{class}', 'viewClass')->name('viewClass');
    Route::get('/editClass/{_class}', 'editClass')->name('editClass');
    Route::delete('/deletePermanently/{_class}', 'deletePermanently')->name('deleteClassPermanently');
});






// the employee routes for the Administrator
Route::middleware(['auth:sanctum', 'adminOnlyRoute'])->controller(App\Http\Controllers\Administrator\EmployeeController::class)->group(function () {
    Route::get('/employee_recycle', 'employee_recycle')->name('employee_recycle');
    Route::get('/employee/form', 'add_employee')->name('add_employee');
    Route::get('/employee/form/{employee}', 'employeeFormEdit')->name('employeeFormEdit');
    Route::get('/employees/{employee}', 'viewEmployee')->name('viewEmployee');
    Route::get('/all-employees', 'allEmployees')->name('allEmployees');
});





Route::middleware(['auth:sanctum', 'adminOnlyRoute'])->controller(App\Http\Controllers\Administrator\EventController::class)->group(function(){
    Route::get('/createEvent' , 'createEvent')->name('createEvent'); 
    Route::get('/Events' , 'loadEvents')->name('loadEvents'); 
    Route::get('/editEvent/{event}' , 'editEvent')->name('editEvent'); 
    Route::get('/event_archives' , 'archives')->name('eventArchives'); 
});





// admin accounting
Route::middleware(['auth:sanctum', 'adminOnlyRoute'])->controller(App\Http\Controllers\Administrator\expenseController::class)->group(function(){
    Route::get('/approved/expenses' , 'adminApproved')->name('adminApprovedExpenses');
    Route::get('/unapproved/expenses' , 'adminUnapproved')->name('adminUnapprovedExpenses');
        Route::get('/adminExpense/{expense}' , 'expenseView')->name('expenseView');
});


// subject route here




















// end of Administrator routes right here









// accountant routes starts here
Route::middleware(['auth:sanctum', 'accountantOnlyRoute'])->controller(App\Http\Controllers\accountant\expenseController::class)->group(function(){
    Route::get('/expenses_approved' , 'approvedExpenses')->name('approvedExpenses');

    Route::get('/expenses_unapproved' , 'unapprovedExpenses')->name('unapprovedExpenses');

       Route::get('/expenses/{expense}' , 'viewExpense')->name('viewExpense');
});


Route::middleware(['auth:sanctum' , 'accountantOnlyRoute'])->controller( App\Http\Controllers\accountant\schoolFeesController::class)->group(function(){
   Route::get('/selectClass', 'selectClass')->name('loadClassForFees');
   Route::get('/schoolFees/class/{class}', 'enterClass')->name('studentClassFee');
   Route::get('/payFee/{student}', 'payFee')->name('payFee');
   Route::post('/deptors/{class}', 'displayDeptors')->name('displayDeptors');
      Route::get('students/paidList/{class}', 'paidList')->name('paidList');
});










// teacher routes for the report card
Route::middleware(['auth:sanctum'])->controller(App\Http\Controllers\Teachers\teacherController::class)->group(function(){
    Route::get('/{class}/assessment' , 'classAssessment')->name('classAssessment');
    Route::get('/studentReport/{student}' , 'studentReport')->name('studentReport');
});


