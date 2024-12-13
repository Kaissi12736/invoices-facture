<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceAttachmentsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoiceDetailsController;

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('invoices',InvoicesController::class);

Route::resource('sections',SectionsController::class);

Route::resource('products',ProductsController::class);

Route::get('/section/{id}', [InvoicesController::class,'getproducts'])->name('getproducts');

Route::resource('InvoiceAttachments',InvoiceAttachmentsController::class);


Route::get('/InvoicesDetails/{id}', [InvoiceDetailsController::class,'edit'])->name('getproducts');

Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('Status_show');


Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');



Route::get('download/{invoice_number}/{file_name}', [InvoiceDetailsController::class, 'get_file']);

Route::get('View_file/{invoice_number}/{file_name}', [InvoiceDetailsController::class, 'open_file']);


Route::any('delete_file', [InvoiceDetailsController::class, 'destroy'])->name('delete_file');


Route::get('/edit_invoice/{id}', [InvoicesController::class, 'edit'])->name('invoices.edit');


Route::get('/{page}', [AdminController::class,'index']);








// Route::resource('invoices',InvoicesController::class);









