<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ModelItemController;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['web'])->group(function () {
    Route::resource('brand', BrandController::class);
    Route::resource('model-item', ModelItemController::class);
    Route::resource('item', ItemController::class);

    Route::get('brand-fetch-ajax', [BrandController::class, 'fetchAjax'])->name('brand.fetch');
    Route::get('model-fetch-ajax', [ModelItemController::class, 'fetchAjax'])->name('model.fetch');
    Route::get('item-fetch-ajax', [ItemController::class, 'fetchAjax'])->name('item.fetch');
    Route::get('select-brand-ajax', [BrandController::class, 'brandAjaxForModel']);
    Route::get('select-model-ajax', [ModelItemController::class, 'modelAjaxForItem']);
});

require __DIR__.'/auth.php';
