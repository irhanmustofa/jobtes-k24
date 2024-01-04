<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Member\MemberProfilController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
// Route::get('/admin', function () {
//     return view('admin.login');
// });

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register-process', [AuthController::class, 'registerProcess']);

Route::get('/admin', [AuthAdminController::class, 'login'])->name('loginAdmin');
Route::post('/admin-authenticate', [AuthAdminController::class, 'authenticate']);


Route::get('/logoutAdmin', [AuthAdminController::class, 'logout']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('only_admin')->group(function () {
    Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

    // data Admin
    Route::get('/data-admin', [AdminController::class, 'index']);
    Route::post('/data-admin', [AdminController::class, 'store']);
    Route::put('/data-admin/{id}', [AdminController::class, 'update']);
    Route::get('/data-admin/{id}', [AdminController::class, 'destroy']);

    // data Member
    Route::get('/data-member', [MemberController::class, 'index']);
    Route::get('/list-member', [MemberController::class, 'viewJson']);
    Route::post('/data-member', [MemberController::class, 'store']);
    Route::put('/data-member/{id}', [MemberController::class, 'update']);
    Route::get('/data-member/{id}', [MemberController::class, 'destroy']);


});

Route::middleware('only_member')->group(function () {
    Route::get('/member-profil', [MemberProfilController::class, 'index'])->name('member-profil');

    Route::put('/member-profil/{id}', [MemberProfilController::class, 'update']);
});