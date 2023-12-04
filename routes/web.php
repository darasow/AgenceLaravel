<?php

use App\Http\Controllers\Acceuill\ControllerAcceuil;
use App\Http\Controllers\Admin\ControllerOption;
use App\Http\Controllers\Admin\ControllerPropriete;
use App\Http\Controllers\Contact\ControllerContact;
use App\Http\Controllers\Listing\ControllerProprieteListing;
use App\Http\Controllers\Auth\ControllerAuthenticate;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [ControllerAcceuil::class, 'index']);

Route::prefix('auth')->name('auth.')->group(function(){

    Route::get('login', [ControllerAuthenticate::class, 'login'])->middleware('guest')->name('login');
    Route::get('profile', [ControllerAuthenticate::class, 'profile'])->middleware('auth')->name('profile');
    Route::post('login', [ControllerAuthenticate::class, 'dologin'])->name('dologin');
    Route::delete('logout', [ControllerAuthenticate::class, 'logout'])->middleware('auth')->name('logout');

});


Route::prefix('listing')->name('listing.')->group(function(){
    Route::get('/biens', [ControllerProprieteListing::class, 'index'])->name('index');
    Route::post('/biens/{propriete}/contact', [ControllerContact::class, 'contact'])->name('contact')->where([
        'propriete' => '[0-9]+',
    ]);;

    Route::get('/biens/{slug}-{propriete}', [ControllerProprieteListing::class, 'show'])->name('show')->where([
        'propriete' => '[0-9]+',
        'slug' => '[0-9aA-zZ\-]+'
    ]);
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){

    Route::resource("propriete", ControllerPropriete::class)->except(['show']);
    Route::resource("option", ControllerOption::class)->except(['show']);

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
