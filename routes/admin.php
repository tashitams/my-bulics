<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EspController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TimetableController;

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::inertia('/password', 'Admin/Password')->name('password');
    Route::post('/password', [ProfileController::class, 'resetPassword']);
    
    // staff
    Route::prefix('staff')->name('staff.')->group(function () {
        Route::get('/', [StaffController::class, 'index'])->name('index');
        Route::inertia('/register', 'Admin/Staff/Create')->name('create');
        Route::post('/register', [StaffController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [StaffController::class, 'edit'])->name('edit');
        Route::put('/{user}', [StaffController::class, 'update'])->name('update');
        Route::get('/{user}/reset-password', [StaffController::class, 'showPasswordForm'])->name('password');
        Route::put('/{user}/reset-password', [StaffController::class, 'updatePassword']);
        Route::delete('/{user}', [StaffController::class, 'delete'])->name('delete');
        Route::inertia('/upload', 'Admin/Staff/Upload')->name('upload');
        Route::post('/upload', [StaffController::class, 'uploadStaff']);
    });


    // esp
    Route::prefix('esp')->name('esp.')->group(function () {
        Route::get('/', [EspController::class, 'index'])->name('index');
        Route::inertia('/register', 'Admin/Esp/Create')->name('create');
        Route::post('/register', [EspController::class, 'store'])->name('store');
        Route::get('/{esp}/edit', [EspController::class, 'edit'])->name('edit');
        Route::put('/{esp}', [EspController::class, 'update'])->name('update');
        Route::delete('/{esp}', [EspController::class, 'delete'])->name('delete');
        Route::inertia('/upload', 'Admin/Esp/Upload')->name('upload');
        Route::post('/upload', [EspController::class, 'uploadEsp']);
    });


    // classes
    Route::prefix('classes')->name('classes.')->group(function () {
        Route::get('/', [ClassesController::class, 'index'])->name('index');
        Route::get('/register', [ClassesController::class, 'create'])->name('create');
        Route::post('/register', [ClassesController::class, 'store'])->name('store');
        Route::get('/{grade}/edit', [ClassesController::class, 'edit'])->name('edit');
        Route::put('/{grade}', [ClassesController::class, 'update'])->name('update');
        Route::delete('/{grade}', [ClassesController::class, 'delete'])->name('delete');
        Route::inertia('/upload', 'Admin/Class/Upload')->name('upload');
        Route::post('/upload', [ClassesController::class, 'uploadClass']);
    });


    // students
    Route::prefix('students')->name('students.')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('/register', [StudentController::class, 'create'])->name('create');
        Route::post('/register', [StudentController::class, 'store'])->name('store');
        Route::inertia('/upload', 'Admin/Student/Upload')->name('upload');
        Route::post('/upload', [StudentController::class, 'uploadStudent']);
        Route::get('/{grade}', [StudentController::class, 'show'])->name('show');
        Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');
        Route::put('/{student}', [StudentController::class, 'update'])->name('update');
        Route::delete('/{student}', [StudentController::class, 'delete'])->name('delete');
    });


    // events
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::inertia('/upload', 'Admin/Event/Upload')->name('upload');
        Route::post('/upload', [EventController::class, 'uploadEvent']);
        Route::inertia('/create', 'Admin/Event/Create')->name('create');
        Route::post('/create', [EventController::class, 'store'])->name('store');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('destroy');
    });


    // timetable 
    Route::prefix('timetable')->name('timetables.')->group(function () {
        Route::get('/', [TimetableController::class, 'index'])->name('index');
        Route::get('/create', [TimetableController::class, 'create'])->name('create');
        Route::post('/create', [TimetableController::class, 'store'])->name('store');
        Route::inertia('/upload', 'Admin/Timetable/Upload')->name('upload');
        Route::post('/upload', [TimetableController::class, 'uploadTimetable']);
        Route::get('/{timetable}/edit', [TimetableController::class, 'edit'])->name('edit');
        Route::put('/{timetable}', [TimetableController::class, 'update'])->name('update');
        Route::delete('/{timetable}', [TimetableController::class, 'destroy'])->name('destroy');
    });
});