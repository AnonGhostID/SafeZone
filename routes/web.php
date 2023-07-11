<?php

use App\Http\Controllers\BimbinganKonselingController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Diary;
use App\Models\BimbinganKonseling;
use App\Models\Report;


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

Route::get('menu', function () {
    return view('dashboard', [
        'karyawan' => Diary::latest()->get()
    ]);
})->name('menu');

Route::get('monitor', function () {
    return view('ConflictMonitor', [
        'karyawan' => Diary::latest()->get()
    ]);
})->name('monitor');


Route::get('Konseling', function () {
    return view('Konseling', [
        'konseling' => BimbinganKonseling::latest()->get()
    ]);
})->name('Konseling');


Route::controller(BimbinganKonselingController::class)->prefix('BimbinganKonseling')->group(function () {
    Route::get('', 'index')->name('dashboard');
    Route::get('insert', 'insert')->name('konseling.insert');
    Route::post('insert', 'insert_action')->name('konseling.insert.action');
    Route::get('edit/{id}', 'edit')->name('konseling.edit');
    Route::post('edit/{id}', 'update')->name('konseling.edit.update');
    Route::get('delete/{id}', 'delete')->name('konseling.delete');
});



Route::get('Report', function () {
    return view('Report', [
        'report' => Report::latest()->get()
    ]);
})->name('Report');

Route::controller(ReportController::class)->prefix('report')->group(function () {
    Route::get('', 'index')->name('report');
    Route::get('insert', 'insert')->name('report.insert');
    Route::post('insert', 'insert_action')->name('report.insert.action');
    Route::get('edit/{id}', 'edit')->name('report.edit');
    Route::post('edit/{id}', 'update')->name('report.edit.update');
    Route::get('delete/{id}', 'delete')->name('report.delete');
});



Route::get('diary', function () {
    return view('karyawan', [
        'karyawan' => Diary::latest()->get()
    ]);
})->name('diary');

Route::get('guestDashboard', function () {
    return view('guestDashboard');
})->name('guestDashboard');

Route::controller(KaryawanController::class)->prefix('karyawan')->group(function () {
    Route::get('', 'index')->name('dashboard');
    Route::get('insert', 'insert')->name('karyawan.insert');
    Route::post('insert', 'insert_action')->name('karyawan.insert.action');
    Route::get('edit/{id}', 'edit')->name('karyawan.edit');
    Route::post('edit/{id}', 'update')->name('karyawan.edit.update');
    Route::get('delete/{id}', 'delete')->name('karyawan.delete');
});

Auth::routes();

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('guestDashboard');
    }
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

