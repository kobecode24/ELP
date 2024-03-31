<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\instructor\ChapterController;
use App\Http\Controllers\instructor\CourseController As InstructorCourseController;
use App\Http\Controllers\user\CourseController As UserCourseController;
use App\Http\Controllers\instructor\ExerciseController As InstructorExerciseController;
use App\Http\Controllers\user\ExerciseController As UserExerciseController;
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
    $user = auth()->user();
    return view('welcome', compact('user'));
})->name('home');

Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');;
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::post('/user/profile-image', [UserController::class, 'uploadProfileImage'])->name('user.upload-profile-image');

Route::post('/user/become-instructor', [UserController::class, 'becomeInstructor'])->name('user.become-instructor');


Route::prefix('instructor')->name('instructor.')->middleware(['is_instructor'])->group(function () {
    Route::get('/dashboard', [InstructorCourseController::class, 'dashboard'])->name('dashboard');
    Route::resource('lessons', LessonController::class)->names('lessons');
    Route::resource('exercises', InstructorExerciseController::class)->names('exercises');
    Route::resource('courses', InstructorCourseController::class)->names('courses');
    Route::resource('chapters', ChapterController::class)->names('chapters');
    Route::post('/exercises/{exercise}/execute', [InstructorExerciseController::class, 'executeCode'])->name('exercises.execute');
});



Route::prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
    Route::get('/profile/stats' , [UserController::class, 'getStats'])->name('profile.stats');
        Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::get('/courses', [UserCourseController::class, 'index'])->name('courses');
    Route::get('/courses/{course}', [UserCourseController::class, 'show'])->name('courses.show');
});
