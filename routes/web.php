<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UnitusahaController;
use Illuminate\Support\Facades\Route;
use App\Models\LogActivity;
use App\Models\Datakaryawan;

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

Route::get('/dashboard', function () {
    $log = LogActivity::select('name', 'log_activities.created_at', 'activity', 'ip')->join('users', 'log_activities.user_id', 'users.id')->latest('log_activities.created_at')->take(5)->get()->toArray();
    $totalPegawai = Datakaryawan::count();
    return view('dashboard', compact('log', 'totalPegawai'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('/master-karyawan', KaryawanController::class);
    Route::resource('/unit-usaha', UnitusahaController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
