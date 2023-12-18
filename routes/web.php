<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\ShowMarksController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

/*Route::get('/', function () {
    return view('auth.login');
});*/
Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, 'login']);
    Route::get('/register', [HomeController::class, 'register']);
});
Route::middleware(['auth'])->group(function () {

    Route::post('/post-requests/{teacher}', [StudentController::class, 'postRequests'])
        ->name('post-requests');
        Route::post('/accept-request/{requestId}', [TeacherController::class, 'postacceptRequest'])->name('accept.request.post');
});
Route::get('/sendrequest',[StudentController::class,'send'])->name('sendrequest');
Route::get('/acceptrequest',[TeacherController::class,'accept'])->name('acceptrequest');
Route::get('/query',[QueryController::class,'index'])->name('query');
//Route::get('/chat',[QueryController::class,'chat'])->name('chat');

Route::post('/submit/showmarks/{student_id}/{teacher_id}', [ShowMarksController::class, 'showmarks'])->name('submit.showmarks');

Route::get('/messaging/{teacher}', [QueryController::class, 'chat'])->name('messaging');
Route::post('/messages/{teacher}', [QueryController::class, 'postMessage'])->name('messages.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'teacher_dashboard'])->name('teacher.dashboard');
Route::get('/student/dashboard', [StudentController::class, 'student_dashboard'])->name('student.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
