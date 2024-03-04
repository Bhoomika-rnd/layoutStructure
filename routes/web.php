<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LeadsController;
use App\Http\Controllers\Admin\ExcelImportController;


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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'leads','namespace' => 'Admin','middleware' => ['auth']],function(){

    Route::get('/', [LeadsController::class, 'index']);
    Route::get('/create', [LeadsController::class,'create'])->name('leads.create');
    Route::get('/{id}', [LeadsController::class, 'show']);

    Route::delete('/delete/{id}', [LeadsController::class, 'destroy'])->name('leads.destroy');



    Route::post('/store', [LeadsController::class,'store'])->name('leads.store');
    Route::get('/edit/{id}', [LeadsController::class,'edit'])->name('leads.edit');
    Route::put('/update/{id}', [LeadsController::class,'update'])->name('leads.update');
});


Route::group(['namespace' => 'Admin','middleware' => ['auth']],function(){
 
    Route::get('/import-excel', [ExcelImportController::class,'index'])->name('import.excel');
    Route::post('/import-excel', [ExcelImportController::class,'import']);
});


require __DIR__.'/auth.php';
