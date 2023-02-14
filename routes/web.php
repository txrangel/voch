<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{
    CreateUnidades,
    EditUnidades,
    DeleteUnidades,
    CreateFuncionarios,
    EditFuncionarios,
    DeleteFuncionarios
};
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

Route::get('/', CreateUnidades::class);

Route::get('/create-unidades', CreateUnidades::class)->name('create-unidades');
Route::get('/edit-unidades', EditUnidades::class)->name('edit-unidades');
Route::get('/delete-unidades', DeleteUnidades::class)->name('delete-unidades');

Route::get('/create-funcionarios', CreateFuncionarios::class)->name('create-funcionarios');
Route::get('/edit-funcionarios', EditFuncionarios::class)->name('edit-funcionarios');
Route::get('/delete-funcionarios', DeleteFuncionarios::class)->name('delete-funcionarios');
