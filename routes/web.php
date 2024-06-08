<?php

use App\Http\Controllers\PrintSuratController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController, PengajuanController, HomepageController};
use App\Http\Middleware\AuthLoginMiddleware;

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

// Route::get('/', function () {
//     return view('login', ["judul" => "login"]);
// });
// Route::post('/', function () {
//     return view('homepage', ['judul'=> 'Halaman Utama']);
// });

Route::resource('/', LoginController::class)->only([
    'index',// GET 
    'store',
     // POST
])->names(
        [    // Named route
            'index' => 'login.auth',
            
        ]
    );
Route::get('/logout',[LoginController::class,'logout'])->middleware(AuthLoginMiddleware::class)->name('login.logout');
Route::get('/homepage', [HomepageController::class, 'index'])->middleware(AuthLoginMiddleware::class)->name('login.homepage');
Route::get('/printSurat/{id}', [PrintSuratController::class, 'index'])->middleware(AuthLoginMiddleware::class)->name('print.index')->where('id', '.*');
Route::get('/pengajuan/{id}/edit', [PengajuanController::class, 'edit'])->middleware(AuthLoginMiddleware::class)->name('pengajuan.edit')->where('id', '.*');
Route::resource('/pengajuan', PengajuanController::class)
    ->only([
        'index', // GET
        'store', // POST
        'show',  // GET by id
        'update', // PUT / PATCH
    ])
    ->middleware(AuthLoginMiddleware::class)
    ->parameters(
        [
            'pengajuan' => 'id'
        ]
    )
    ->names(
        [
            'index' => 'pengajuan.index',
            'store' => 'pengajuan.save',
            'show' => 'pengajuan.show',
            'update' => 'pengajuan.update',
        ]
    )->where(['id' => '.*']);
