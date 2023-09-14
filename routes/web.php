<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\PengirimController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BidangController;

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

Route::get('/storage-link', function () {
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder);
});

Route::get('/clear-cache', function () {
    Artisan::call('route:cache');
});

Route::get('/', [LoginController::class, 'index']);

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//superAdmin & Admin
Route::prefix('admin')
        ->middleware('auth')
        ->group(function(){
            Route::get('/dashboard',[DashboardController::class, 'index'])->name('admin-dashboard');
            Route::resource('/bidang', BidangController::class);
            Route::resource('/pengirim', PengirimController::class);
            Route::resource('/surat', SuratController::class, [
			    'except' => [ 'show' ]
		    ]);
            Route::get('surat/surat-pm', [SuratController::class, 'surat_perintah_membayar'])->name('surat-pm');
            Route::get('surat/surat-pp', [SuratController::class, 'surat_permintaan_pembayaran'])->name('surat-pp');
            Route::get('surat/surat-p2d', [SuratController::class, 'surat_perintah_pencairan_dana'])->name('surat-p2d');

            Route::get('surat/surat/{id}', [SuratController::class, 'show'])->name('detail-surat');
            Route::get('surat/download/{id}', [SuratController::class, 'download_surat'])->name('download-surat');

            //print
            Route::get('print/surat-pm', [PrintController::class, 'index'])->name('print-surat-pm');
            Route::get('print/surat-pp', [PrintController::class, 'print_spp'])->name('print-surat-pp');
            Route::get('print/surat-p2d', [PrintController::class, 'print_sp2d'])->name('print-surat-p2d');


            Route::resource('setting', SettingController::class, [
			    'except' => [ 'show' ]
		    ]);
            Route::get('setting/password',[SettingController::class, 'change_password'])->name('change-password');
            Route::post('setting/upload-profile', [SettingController::class, 'upload_profile'])->name('profile-upload');
            Route::post('change-password', [SettingController::class, 'update_password'])->name('update.password');
        });

        Route::group(['middleware' => ['auth','ceklevel:superAdmin']], function () {
            Route::resource('user', UserController::class);
        });
