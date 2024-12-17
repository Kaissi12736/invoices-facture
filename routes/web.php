<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoiceDetailsController;
use App\Http\Controllers\InvoicesReportController;
use App\Http\Controllers\CustomersReportController;
use App\Http\Controllers\InvoiceAttachmentsController;


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

Route::get('download/{invoice_number}/{file_name}', [InvoiceDetailsController::class, 'get_file']);

Route::get('View_file/{invoice_number}/{file_name}', [InvoiceDetailsController::class, 'open_file']);

Route::any('delete_file', [InvoiceDetailsController::class, 'destroy'])->name('delete_file');

Route::get('/edit_invoice/{id}', [InvoicesController::class, 'edit'])->name('invoices.edit');

Route::get('/Status_show/{id}', [InvoicesController::class,'show'])->name('Status_show');

Route::post('/Status_Update/{id}', [InvoicesController::class,'Status_Update'])->name('Status_Update');

Route::get('Invoice_Paid', [InvoicesController::class,'Invoice_Paid']);

Route::get('Invoice_UnPaid', [InvoicesController::class,'Invoice_UnPaid']);

Route::get('Invoice_Partial', [InvoicesController::class,'Invoice_Partial']);

Route::resource('Archive',InvoiceAchiveController::class);

Route::get('Print_invoice/{id}',[InvoicesController::class,'Print_invoice']);


Route::get('export_invoices', [InvoicesController::class, 'export']);



Route::get('/invoices_report', [InvoicesReportController::class, 'index']);

Route::post('/Search_invoices', [InvoicesReportController::class, 'Search_invoices']);



Route::get('customers_report', [CustomersReportController::class, 'index'])->name("customers_report");
Route::post('Search_customers', [CustomersReportController::class, 'Search_customers']);



Route::middleware(['auth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
 
});


Route::get('/{page}', [AdminController::class,'index']);













