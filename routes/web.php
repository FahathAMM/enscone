<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\CustomersController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\ServicesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\About\AboutUs;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Admin\Message\ViewMessage;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\frontend\cashier\CashierController;
use App\Http\Livewire\Frontend\Portfolio\Portfolio;
use App\Http\Controllers\Manage\DashboardController;
use App\Http\Livewire\Admin\Contact\ContactLivewire;
use App\Http\Controllers\manage\PermissionController;
use App\Http\Livewire\Admin\Project\ProjectsLivewire;
use App\Http\Livewire\Admin\Service\ServicesLivewire;
use App\Http\Livewire\Admin\Settings\SettingLivewire;
use App\Http\Livewire\Admin\Skills\SkillsLivewire;
use App\Http\Livewire\Admin\Education\EducationLivewire;
use App\Http\Livewire\Admin\Dashboard\UserDashboardLivewire;
use App\Http\Livewire\Admin\Experiences\ExperiencesLivewire;
use App\Http\Livewire\Admin\Dashboard\AdminDashboardLivewire;
use App\Http\Livewire\Bill\BillLivewire;








Route::redirect('/', 'login', 301);




Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/logout-user', [LoginController::class, 'logoutUser']);

Route::prefix('google')->name('google.')->group(function () {
    Route::get('login', [GoogleAuthController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleAuthController::class, 'callbackFromGoogle'])->name('callback');
});

//permission
Route::group(['middleware' => ['role:developer|admin', 'auth'], 'prefix' => 'admin'], function () {
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/permissions/{userId}', [PermissionController::class, 'permissionView'])->name('permission.view');
    Route::post('/role-permission/{role}', [PermissionController::class, 'setPermissionToRole'])->name('role.set');
    Route::post('/roles', [PermissionController::class, 'createRole'])->name('role.create');
    Route::get('/view-users/{role}', [PermissionController::class, 'viewUsers'])->name('view.users');
    Route::post('/assign-role/{user}', [PermissionController::class, 'setRolesToUser'])->name('assign.role');
    Route::get('/users', [PermissionController::class, 'userList'])->name('user.list');
    Route::get('/remove-role/{user}/{role}', [PermissionController::class, 'removeRoleFromUser'])->name('remove.role');
});

// Route::group(['middleware' => ['auth', 'isAdmin','role:super-admin'], 'prefix' => 'admin'], function () {
Route::group(['middleware' => ['role:developer|admin|user', 'auth'], 'prefix' => 'admin'], function () {


    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('services', ServicesController::class);

    Route::get('/', [DashboardController::class, 'index']);

    //  dashboard
    Route::get('admin-dashboard', AdminDashboardLivewire::class)->name('admin.dashboard');
    Route::get('user-dashboard', UserDashboardLivewire::class)->name('user.dashboard');

    //  view-Setting
    Route::get('settings', SettingLivewire::class)->name('Portfolio.settings');
});


Route::view('/notaccess', 'notaccess');

Route::get('bill', BillLivewire::class)->name('bill');
Route::get('/generateInvoice/{orderNumber}', [ReportController::class, 'generateInvoice'])->name('generate.invoice');
Route::get('/invoice', [ReportController::class, 'index'])->name('invoice');
Route::get('/invoice-edit/{id}', [ReportController::class, 'edit'])->name('invoice.edit');
Route::put('/invoice-update/{id}', [ReportController::class, 'update'])->name('invoice.update');
