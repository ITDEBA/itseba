<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::resource('services', ServiceController::class)->only(['index','show']);
Route::resource('projects', ProjectController::class)->only(['index','show']);
Route::resource('blog', PostController::class)->parameters(['blog' => 'post'])->only(['index','show']);
Route::resource('notices', NoticeController::class)->only(['index','show']);
Route::resource('clients', ClientController::class)->only(['index']);
Route::resource('staff', StaffController::class)->only(['index']);
Route::get('contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

// Admin routes (requires auth; Laravel Breeze/other auth should be installed by you)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('services', AdminServiceController::class);
    // Add other admin resources similarly (projects, posts, notices, clients, staff, contacts)
});
