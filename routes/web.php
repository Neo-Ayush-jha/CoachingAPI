<?php

use App\Http\Controllers\{ProfileController,HomeController,AdminController,CourseController};
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';


Route::get('/' ,[HomeController::class,"index"])->name("homepage");
// Route::get('/contact' ,[HomeController::class,"contact"])->name("contact");
Route::match(['get','post'],'/apply' ,[HomeController::class,"apply"])->name("apply");
Route::get('/courses' ,[HomeController::class,"courses"])->name("courses");

Route::match(["get","post"],'/online-payment' ,[HomeController::class,"onlinePayment"])->name("onlinePayment");
Route::post("/online-payment/make-payment",[HomeController::class,"makePayment"])->name("makePayment");
Route::post("/online-payment/call-back",[HomeController::class,"paymentCallback"])->name("callback");

Route::get('payment', [HomeController::class, 'index2']);
Route::post('payment', [HomeController::class, 'store2']);



// Route::prefix("admin")->middleware(['auth'])->group(function(){
Route::prefix("admin")->group(function(){
    Route::get("/",[AdminController::class,"dashboard"])->name("admin.dashboard");
    Route::get("/approve-student/{id}", [AdminController::class,'approveStudent'])->name("admin.approve.student");

    Route::get("/passout-student/{id}", [AdminController::class,'deleteStudent'])->name("admin.passout.student");

    Route::get("/make-cash-payment/{std_id}/{id}", [AdminController::class,'makeCashPayment'])->name("admin.make.cashpayment");

    Route::get("/manage/payment/due", [AdminController::class,'managePayment'])->name("admin.manage.payment.due");

    Route::get("/manage/payment/paid", [AdminController::class,'managePayment'])->name("admin.manage.payment.paid");

    Route::get("/manage/student",[HomeController::class,"indexStudent"])->name("admin.manage.student.active");

    Route::get("/manage/student/new",[HomeController::class,"newAdmission"])->name("admin.manage.student.new");
    
    Route::get("/manage/student/passout",[HomeController::class,"passOut"])->name("admin.manage.student.passout");
    Route::get("/view-course/{id}",[CourseController::class,"addCourse"])->name("addCourse");
    Route::get("/course/insert",[CourseController::class,"create2"])->name("course.insert_course");
    Route::resource('course', CourseController::class); 
    // Route::post("/course/addCourse/{id}",[HomeController::class,"addCourse2"])->middleware(['auth'])->name("course.addCourse");
});
Route::get("/course/addCourse/{id}",[HomeController::class,"addCourse2"])->name("course.addCourse");