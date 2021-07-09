<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/offline', 'Offline')->name('offline');

require __DIR__.'/auth.php';
require __DIR__.'/staff.php';
require __DIR__.'/admin.php';