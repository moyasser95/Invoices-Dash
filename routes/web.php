<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoicesReport;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomersReport;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\Auth\LoginCheckController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\InvoiceAttachmentsController;

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
//     return view('welcome');
// });
Route::middleware("AdminAuth")->group(function(){});



Route::get('/', function () {
    return redirect()->route('Home');
})->middleware("AdminAuth");

// Auth::routes();

Route::get('index',[AdminController::class,"index"])->middleware("AdminAuth")->name("Home");

Route::get('login',[LoginController::class,"login"])->name("login")->middleware('guest:web');
Route::post('login/check',[LoginCheckController::class,"check"])->name("login/check");
Route::get('logout',[LoginCheckController::class,"logout"])->name("logout");


Route::resource("invoices",InvoicesController::class);
Route::resource("sections",SectionController::class);
Route::resource("products",ProductController::class);

Route::get('/section/{id}',[InvoicesController::class,"getProducts"]);
Route::get('/edit_invoice/{id}', [InvoicesController::class,"edit"]);
Route::get('/Status_show/{id}', [InvoicesController::class,"show"])->name('Status_show');

Route::post('/Status_Update/{id}', [InvoicesController::class,"Status_Update"])->name('Status_Update');


Route::post('InvoiceAttachments', [InvoiceAttachmentsController::class,'store'])->name("InvoiceAttachments");

// Route::resource('InvoicesDetails/{id}', InvoicesDetails::class);
Route::controller(InvoicesDetailsController::class)->group(function(){

    Route::get('invDetails/{id}','edit')->name('invDetails');
    Route::get('View_file/{invoice_number}/{file_name}', 'openFile');
    Route::get('download/{invoice_number}/{file_name}', 'getFile')->name('download');
    Route::post('delete_file', 'destroy')->name('delete_file');
});

Route::get('Invoice_Paid',[InvoicesController::class,"Invoice_Paid"]);

Route::get('Invoice_UnPaid',[InvoicesController::class,"Invoice_UnPaid"]);

Route::get('Invoice_Partial',[InvoicesController::class,"Invoice_Partial"]);
Route::resource('Archive', InvoiceAchiveController::class);
Route::get('Print_invoice/{id}',[InvoicesController::class,"Print_invoice"]);


// Route::middleware('AdminAuth')->group(function () {
//     Route::resource('roles', RoleController::class);
//     Route::resource('users', UserController::class);
//     Route::resource('products', ProductController::class);
// });
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);



Route::get('invoices_report', [InvoicesReport::class,"index"]);
Route::Post('Search_invoices', [InvoicesReport::class,"Search_invoices"]);



Route::get('customers_report', [CustomersReport::class,"index"])->name("customers_report");
Route::Post('Search_customers', [CustomersReport::class,"Search_customers"]);





