<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Models\Mahasiswa;

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
    $mahasiswa = Mahasiswa::orderBy('nim', 'asc');

    if (request('search')) {
        $mahasiswa->where('nim', 'like', '%' . request('search') . '%')
                    ->orWhere('nama_mhs', 'like', '%' . request('search') . '%');
    }
    
    return view('index', ['mahasiswa' => $mahasiswa->paginate(5)->withQueryString()]);
});

Route::resource('mahasiswa', MahasiswaController::class);
