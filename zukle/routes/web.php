<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReservoirController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>['auth']], function (){
    Route::resources([
        'reservoirs' =>ReservoirController::class,
        'members' => MemberController::class,
        'users'=>UsersController::class,
        
    ]);
    Route::get('reservoir/deleteReservoir/{reservoirId}', [ReservoirController::class, 'deleteReservoir'])->name('reservoirs.deleteReservoir');
    Route::get('delete/member/{id}', [MemberController::class, 'destroy'])->name('members.delete');
    Route::get('members/order/{field}/{order}', [MemberController::class, 'indexOrder'])->name('members.indexOrder');
    Route::get('reservoirs/order/{field}', [ReservoirController::class, 'indexOrder'])->name('reservoirs.indexOrder');
    
    Route::post('members/order/{field}/{order}', [MemberController::class, 'indexOrder'])->name('members.indexOrder');
    Route::post('reservoirs/order/{field}', [ReservoirController::class, 'indexOrder'])->name('reservoirs.indexOrder');
    
});

require __DIR__.'/auth.php';
