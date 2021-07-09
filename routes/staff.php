<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\DashboardController;
use App\Http\Controllers\Staff\EventController;
use App\Http\Controllers\Staff\LeaveController;
use App\Http\Controllers\Staff\ProfileController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Staff\StudentController;
use App\Http\Controllers\Staff\TimetableController;


Route::middleware(['auth'])->prefix('dashboard')->name('staff.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/school-profile', [DashboardController::class, 'showSchoolProfile'])->name('school.profile');

    Route::inertia('/notification', 'Staff/Notification')->name('notification');
    // profile
    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');

    // password
    Route::inertia('/password', 'Staff/Password')->name('password');
    Route::post('/password', [ProfileController::class, 'resetPassword']);

    // teachers 
    Route::get('/teachers', [StaffController::class, 'teacherIndex'])->name('teachers.index');
    Route::get('/teachers/{user}', [StaffController::class, 'teacherShow'])->name('teachers.show');

    // staff 
    Route::get('/staff', [StaffController::class, 'staffIndex'])->name('index');
    Route::get('/staff/{user}', [StaffController::class, 'staffShow'])->name('show');

    // esp 
    Route::get('/esp', [StaffController::class, 'espIndex'])->name('esp.index');
    Route::get('/esp/{esp}', [StaffController::class, 'espShow'])->name('esp.show');

    // events 
    Route::get('/events', [EventController::class, 'index'])->name('events.index');

    // timetable 
    Route::get('/timetable', [TimetableController::class, 'index'])->name('timetables.index');
    Route::get('/timetable/{timetable}', [TimetableController::class, 'show'])->name('timetables.show');

    // classes
    Route::get('/classes-list', [StudentController::class, 'index'])->name('students.index');
    Route::get('/classes-list/{grade}', [StudentController::class, 'show'])->name('students.show');

    // students
    Route::prefix('students')->name('students.')->group(function () {
        Route::get('/{student}/profile', [StudentController::class, 'profile'])->name('profile');
        Route::get('/{student}/health-record', [StudentController::class, 'showHealthForm'])->name('health');
        Route::post('/{student}/health-record', [StudentController::class, 'storeHealthRecord']);
        Route::get('/{student}/disciplinary-record', [StudentController::class, 'showDisciplineForm'])->name('discipline');
        Route::post('/{student}/disciplinary-record', [StudentController::class, 'storeDisciplineRecord']);
        Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');
        Route::put('/{student}', [StudentController::class, 'update'])->name('update');
    });

    // leaves
    Route::prefix('leave')->name('leaves.')->group(function () {
        Route::get('/', [LeaveController::class, 'index'])->name('index');
        Route::inertia('/apply', 'Staff/Leave/Create')->name('create');
        Route::post('/apply', [LeaveController::class, 'store'])->name('store');
        Route::get('/manage', [LeaveController::class, 'show'])->name('show');
        Route::get('/manage/{leave}/edit', [LeaveController::class, 'edit'])->name('edit');
        Route::put('/manage/{leave}', [LeaveController::class, 'update'])->name('update');
    });

});