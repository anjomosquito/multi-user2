<?php

use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\AdminAuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Medicine;


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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/admin/dashboard', function () {
    $medicineCount = Medicine::count();  // Get the count of medicines
    return Inertia::render('Admin/Dashboard', [
        'medicineCount' => $medicineCount  // Pass the count to the Vue component
    ]);
})->middleware(['auth:admin', 'verified:admin'])->name('admin.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth:admin', 'verified:admin'])
        ->name('dashboard');
    
    // Other admin routes


    

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

});

    //Medicine
    /*Route::get('/admin.medicines', function () {
    return Inertia::render('Admin/Medicines/Index');
    })->name('admin.medicines');*/
    Route::get('/admin/medicines/index', [MedicineController::class, 'index'])->name('admin.medicines.index');
    Route::post('/admin/medicines/', [MedicineController::class, 'store'])->name('admin.medicines.store');
    Route::get('/admin/medicines/create', [MedicineController::class, 'create'])->name('admin.medicines.create');    
    Route::put('/admin/medicines/{medicine}', [MedicineController::class, 'update'])->name('admin.medicines.update');
    Route::get('/admin/medicines/{medicine}/edit', [MedicineController::class, 'edit'])->name('admin.medicines.edit');
    Route::delete('/admin/medicines/{medicine}', [MedicineController::class, 'destroy'])->name('admin.medicines.destroy');
    
    //Announcements
    Route::get('/admin/announcements/index', [AnnouncementController::class, 'index'])->name('admin.announcements.index');
    Route::post('/admin/announcements/', [AnnouncementController::class, 'store'])->name('admin.announcements.store');


    //Users

    Route::get('/medicines', [InventoryController::class, 'index'])->name('medicines.index');
    Route::post('/medicines/', [InventoryController::class, 'store'])->name('medicines.store');

    


require __DIR__.'/auth.php';
