<?php

use App\Http\Controllers\admin\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\RegisterController;
use App\Http\Controllers\admin\RolesPermissionsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\LeadController;
use App\Http\Controllers\admin\SaleController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\LogController;
use App\Http\Controllers\admin\ProductCategoryController;
use App\Http\Controllers\admin\ProductServicesController;
use App\Http\Livewire\LeadForm;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\checkPermission;
use Illuminate\Support\Facades\Artisan;


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

Route::group(['middleware' => [RedirectIfAuthenticated::class]], function () {
    Route::post('loginAction', [LoginController::class, 'loginAction'])->name('loginAction');
    Route::post('registerAction', [LoginController::class, 'registerAction'])->name('registerAction');
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::get('register', [RegisterController::class, 'register']);
});

Route::group(['middleware' => [Authenticate::class]], function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');



    Route::get('/register', [RegisterController::class, 'userRegisterPage'])->name('user_register');




    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('users', [UserController::class, 'users'])->name('user_list');
    Route::post('assign-role', [RolesPermissionsController::class, 'assignRole']);
    Route::post('user-role', [RolesPermissionsController::class, 'userRoles']);
    Route::get('roles', [RegisterController::class, 'roles']);
    Route::post('adminUserRegister', [RegisterController::class, 'userRegister'])->name('adminUserRegister');
    Route::post('delete_user', [UserController::class, 'destroy']);
    Route::post('update_user', [RegisterController::class, 'update']);
    Route::get('user/{id}', [UserController::class, 'getUser']);



    Route::post('/upload_lead', [UploadController::class, 'upload_lead'])->name('upload_lead');
    Route::post('/upload_sale', [UploadController::class, 'upload_sale'])->name('upload_sale');
    Route::post('/upload_employee', [UploadController::class, 'upload_employee'])->name('upload_employee');


    Route::get('leads', [LeadController::class, 'show'])->name('lead_list');
    Route::post('create_lead', [LeadController::class, 'store'])->name('create_lead');
    Route::get('lead_index', [LeadController::class, 'index'])->name('lead_index');
    Route::post('lead_delete', [LeadController::class, 'destroy'])->name('lead_delete');
    Route::post('lead_delete_multiple', [LeadController::class, 'destroy_multiple'])->name('lead_delete_multiple');
    Route::post('lead_update', [LeadController::class, 'update'])->name('lead_update');
    Route::post('lead_edit', [LeadController::class, 'edit'])->name('lead_edit');
    Route::get('/download-csv', [LeadController::class, 'download_csv'])->name('download-csv');
    Route::get('lead_edit_2/{id}', [LeadController::class, 'edit_2'])->name('lead_edit_2');
    // Route::post('/lead-form', LeadForm::class);



    Route::get('employees', [EmployeeController::class, 'show'])->name('employee_list');
    Route::post('create_employee', [EmployeeController::class, 'store'])->name('create_employee');
    Route::get('employee_index', [EmployeeController::class, 'index'])->name('employee_index');
    Route::post('employee_delete', [EmployeeController::class, 'destroy'])->name('employee_delete');
    Route::post('employee_update', [EmployeeController::class, 'update'])->name('employee_update');
    Route::post('employee_edit', [EmployeeController::class, 'edit'])->name('employee_edit');
    Route::get('/download-csv-employee', [EmployeeController::class, 'download_csv'])->name('download-csv-employee');




    Route::get('sales', [SaleController::class, 'show'])->name('sale_list');
    Route::post('create_sale', [SaleController::class, 'store'])->name('create_sale');
    Route::get('sale_index', [SaleController::class, 'index'])->name('sale_index');
    Route::post('sale_delete', [SaleController::class, 'destroy'])->name('sale_delete');
    Route::post('sale_delete_multiple', [SaleController::class, 'destroy_multiple'])->name('sale_delete_multiple');
    Route::post('sale_update', [SaleController::class, 'update'])->name('sale_update');
    Route::post('sale_edit', [SaleController::class, 'edit'])->name('sale_edit');
    Route::get('/download-csv-sale', [SaleController::class, 'download_csv'])->name('download-csv-sale');
    Route::get('sale_edit_2/{id}', [SaleController::class, 'edit_2'])->name('sale_edit_2');



    Route::post('user_delete', [UserController::class, 'destroy'])->name('user_delete');
    Route::post('user_delete_multiple', [UserController::class, 'destroy_multiple'])->name('user_delete_multiple');
    Route::post('user_update', [UserController::class, 'update'])->name('user_update');
    Route::post('user_edit', [UserController::class, 'edit'])->name('user_edit');

    Route::get('/log', [LogController::class, 'index'])->name('log.index');

    Route::get('create_role', [RolesPermissionsController::class, 'create_role'])->name('create_role');
    Route::post('store_role', [RolesPermissionsController::class, 'store_role'])->name('store_role');
    Route::post('store_permission', [RolesPermissionsController::class, 'store_permissions'])->name('store_permission');
    Route::get('role_delete/{id}', [RolesPermissionsController::class, 'distroy_role'])->name('role_delete');
    Route::get('permission_delete/{id}', [RolesPermissionsController::class, 'distroy_permission'])->name('permission_delete');
    Route::post('assign_permission', [RolesPermissionsController::class, 'assign_permission'])->name('assign_permission');
    Route::post('assign_role', [RolesPermissionsController::class, 'assign_role'])->name('assign_role');
    Route::get('check_role_permission', [RolesPermissionsController::class, 'check_role_permission'])->name('check_role_permission');
    Route::post('check_role_permission_post', [RolesPermissionsController::class, 'check_role_permission_post'])->name('check_role_permission_post');
    Route::post('revoke_permission', [RolesPermissionsController::class, 'revoke_permission'])->name('revoke_permission');

    // livewire searchbar
    Route::get('/search', function () {
        return view('search');
    });
// livewire searchbar ends
    // ---------------------------------- product and services ----------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------------------
    Route::get('product_service', [ProductServicesController::class, 'index'])->name('product_service.index');
    Route::get('product', [ProductServicesController::class, 'create_product'])->name('create_product');
    Route::get('service', [ProductServicesController::class, 'create_services'])->name('create_services');

    // ------------------------------------------------ Product Category --------------------------------------------------
    Route::get('category_edit/{id}', [ProductCategoryController::class, 'edit_category'])->name('product_categories.edit');
    Route::post('category_update', [ProductCategoryController::class, 'update_category'])->name('product_categories.update');
    Route::post('category_create', [ProductCategoryController::class, 'create_category'])->name('product_categories.create');
    Route::get('category_delete/{id}', [ProductCategoryController::class, 'destroy_category'])->name('product_categories.delete');
    Route::get('category', [ProductCategoryController::class, 'index'])->name('product_categories.index');

    Route::post('product_store', [ProductServicesController::class, 'store_product'])->name('product_store');
    Route::post('product_update', [ProductServicesController::class, 'update_product'])->name('product_update');
    Route::get('product_delete/{id}', [ProductServicesController::class, 'destroy_product'])->name('product_destroy');
    Route::get('product_edit/{id}', [ProductServicesController::class, 'edit_product'])->name('product_edit');

    Route::post('service_store', [ProductServicesController::class, 'store_service'])->name('service_store');
    Route::post('service_update', [ProductServicesController::class, 'update_service'])->name('service_update');
    Route::get('service_delete/{id}', [ProductServicesController::class, 'destroy_service'])->name('service_destroy');
    Route::get('service_edit/{id}', [ProductServicesController::class, 'edit_service'])->name('service_edit');
    // ------------------------------------------------------------------------------------------------------------------



    Route::get('settings', [SettingController::class, 'index'])->name('settings');
    Route::post('settings_save', [SettingController::class, 'store'])->name('settings_save');
    Route::get('maintenance_mode_down', function () {
        Artisan::call('down');
    })->name('maintenance_on');
});
Route::get('maintenance_mode_up', function () {
    Artisan::call('up');
    return view('home');
})->name('maintenance_off');
Route::get('lead_register', [LeadController::class, 'frontend_lead'])->name('frontend_lead');
Route::post('create_frontend_lead', [LeadController::class, 'frontend_store'])->name('create_frontend_lead');
Route::get('thankyou', function () {
    return view('frontend.thankyou');
})->name('thankyou');
