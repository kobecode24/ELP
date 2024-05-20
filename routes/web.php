<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\instructor\ChapterController as InstructorChapterController;
use App\Http\Controllers\instructor\CourseController As InstructorCourseController;
use App\Http\Controllers\user\CourseController As UserCourseController;
use App\Http\Controllers\instructor\ExerciseController As InstructorExerciseController;
use App\Http\Controllers\user\ExerciseController As UserExerciseController;
use App\Http\Controllers\instructor\LessonController As InstructorLessonController;
use App\Http\Controllers\user\LessonController As UserLessonController;
use App\Http\Controllers\admin\CourseController As AdminCourseController;
use App\Http\Controllers\UserController;
use App\Services\Education\CourseService;
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

Route::get('login/github', [AuthController::class, 'redirectToGithub'])->name('login.github');
Route::get('login/github/callback', [AuthController::class, 'handleGithubCallback'])->name('login.github.callback');

Route::post('/user/profile-image', [UserController::class, 'uploadProfileImage'])->name('user.upload-profile-image');

Route::post('/user/become-instructor', [UserController::class, 'becomeInstructor'])->name('user.become-instructor');


Route::prefix('instructor')->name('instructor.')->middleware(['auth' , 'role:instructor,admin'])->group(function () {
    Route::get('/dashboard', [InstructorCourseController::class, 'dashboard'])->name('dashboard');
    Route::resource('lessons', InstructorLessonController::class)->names('lessons')->except(['index']);;
    Route::resource('exercises', InstructorExerciseController::class)->names('exercises')->except(['index']);;
    Route::resource('courses', InstructorCourseController::class)->names('courses');
    Route::resource('chapters', InstructorChapterController::class)->names('chapters')->except(['index']);;
    Route::post('/exercises/{exercise}/execute', [InstructorExerciseController::class, 'executeCode'])->name('exercises.execute');
    Route::get('/courses/{courseId}/items/{type}/{currentItemId}/next',  [CourseService::class , 'next'])->name('items.next');
    Route::get('/courses/{courseId}/items/{type}/{currentItemId}/prev', [CourseService::class , 'prev'])->name('items.prev');
});



Route::prefix('user')->name('user.')->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');
    Route::get('/profile/stats', [UserController::class, 'getStats'])->name('profile.stats')->middleware('auth');
    Route::put('/profile', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');

    Route::get('/courses', [UserCourseController::class, 'index'])->name('courses')->middleware(['auth.custom']);

    Route::get('/courses/{course}', [UserCourseController::class, 'show'])->name('courses.show')->middleware('auth');
    Route::post('/courses/{course}/enroll', [UserCourseController::class, 'enroll'])->name('courses.enroll')->middleware('auth');
    Route::get('/lessons/{lesson}', [UserLessonController::class, 'show'])->name('lessons.show')->middleware('auth');
    Route::get('/exercises/{exercise}', [UserExerciseController::class, 'show'])->name('exercises.show')->middleware('auth');
    Route::post('/exercises/{exercise}/execute', [UserExerciseController::class, 'executeCode'])->name('exercises.execute')->middleware('auth');
    Route::post('/lessons/{lesson}/complete', [UserLessonController::class, 'markAsCompleted'])->name('lessons.complete')->middleware('auth');
    Route::get('/courses/{courseId}/items/{type}/{currentItemId}/next', [CourseService::class, 'next'])->name('items.next')->middleware('auth');
    Route::get('/courses/{courseId}/items/{type}/{currentItemId}/prev', [CourseService::class, 'prev'])->name('items.prev')->middleware('auth');
});

Route::prefix('admin')->name('admin.')->middleware(['auth' , 'role:admin'])->group(function () {
    Route::get('/dashboard',[AdminCourseController::class, 'dashboard'])->name('dashboard');
    Route::get('/blacklist',[AdminCourseController::class, 'blacklist'])->name('blacklist');
    Route::post('/courses/{course}/approve', [AdminCourseController::class, 'approve'])->name('courses.approve');
    Route::get('/pulse', [AdminCourseController::class, 'pulse'])->name('pulse');
});

