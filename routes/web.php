<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    //CheckUserRoles merupakan nama alias yang sudah kita daftarkan di bootsrap/app.php
    //super_admin sama siswa adalah parameter(nilai)
    'CheckUserRoles:super_admin',
    'CheckUserRoles:siswa',

])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //pkl
    Route::get('/dataPkl', App\Livewire\Pkl\Index::class)->name('pkl');
    Route::get('/tambahDataPkl', App\Livewire\Pkl\Create::class)->name('pklCreate');
    Route::get('/lihatDataPkl/{id}', App\Livewire\Pkl\View::class)->name('pklView');
    Route::get('/editDataPkl/{id}/edit', App\Livewire\Pkl\Edit::class)->name('pklEdit');

    //guru
    Route::get('/guru', App\Livewire\Guru\Index::class)->name('guru');
    
    //siswa
    Route::get('/siswa', App\Livewire\Siswa\Index::class)->name('siswa');

    //industri
    Route::get('/industri', App\Livewire\Industri\Index::class)->name('industri');
    Route::get('/industri/tambahIndustri', App\Livewire\Industri\Create::class)->name('industriCreate');


});

Route::get('/tungguAksesAdmin', App\Livewire\TungguAkses::class)
    ->middleware('auth')->name('tungguAdmin')
    ->name('MenungguAdmin');
