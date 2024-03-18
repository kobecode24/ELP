<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\instructor\ChapterController;
use App\Http\Controllers\instructor\CourseController;
use App\Http\Controllers\instructor\ExerciseController;
use App\Http\Controllers\instructor\LessonController;
use App\Http\Controllers\UserController;
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

Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');;
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::post('/user/profile-image', [UserController::class, 'uploadProfileImage'])->name('user.upload-profile-image');

Route::post('/user/become-instructor', [UserController::class, 'becomeInstructor'])->name('user.become-instructor');


Route::group(['prefix' => 'instructor', 'middleware' => ['is_instructor']], function () {
    Route::resource('lessons', LessonController::class);
    Route::resource('exercises', ExerciseController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('chapters', ChapterController::class);
    Route::post('/exercises/{exercise}/execute', [ExerciseController::class,'executeCode'])->name('execute.code');

});
