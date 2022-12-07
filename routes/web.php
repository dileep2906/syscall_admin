<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CheckValidation;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RecuiterController;
use App\Http\Controllers\TeamLeadController;
use App\Http\Controllers\VarticalController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\JobDetailsController;
use App\Http\Controllers\NewVacancyController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ResumeUploadeController;
use App\Http\Controllers\AuthenticationController;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Round;

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
// Route::get('', [StaterkitController::class, 'frontend'])->name('frontend');


Route::get('', [AuthenticationController::class, 'login_cover']);
Route::get('dashboard', [StaterkitController::class, 'home'])->name('home');
// Route Components
Route::get('layouts/collapsed-menu', [StaterkitController::class, 'collapsed_menu'])->name('collapsed-menu');
Route::get('layouts/full', [StaterkitController::class, 'layout_full'])->name('layout-full');
Route::get('layouts/without-menu', [StaterkitController::class, 'without_menu'])->name('without-menu');
Route::get('layouts/empty', [StaterkitController::class, 'layout_empty'])->name('layout-empty');
Route::get('layouts/blank', [StaterkitController::class, 'layout_blank'])->name('layout-blank');


// locale Route
Route::group(['prefix' => ''], function () {
    Route::get('login', [AuthenticationController::class, 'login_cover'])->name('auth-login-cover');
    Route::post('login-form', [AuthController::class, 'login'])->name('auth-login-form');
    Route::post('register-form', [AuthController::class, 'register'])->name('auth-register-form');

    Route::get('forget-password', [AuthenticationController::class, 'forgot_password_cover'])->name('forget.password.get');
    Route::post('forget-password', [AuthController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [AuthController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    Route::post('reset-password-self', [AuthController::class, 'selfresetPassword'])->name('reset-password-self');
    Route::post('update-profile', [AuthController::class, 'updateProfile'])->name('update-profile');
    Route::post('admin-update-profile', [AuthController::class, 'adminupdateProfile'])->name('admin-update-profile');
});
//Logout ROute
Route::post('/logout', function(){
 Auth::logout();
 return Redirect::to('login');
})->name('logout');

Route::group(['prefix' => ''], function () {

    Route::post('checkEmail', [CheckValidation::class, 'checkEmail'])->name('checkEmail');

    Route::post('checkContact', [CheckValidation::class, 'checkContact'])->name('checkContact');

    Route::get('employees',[EmployeeController::class,'index'])->name('employees');

    Route::put('update-employee-form/{id}', [EmployeeController::class, 'update_employees'])->name('update-employees-form');

    Route::get('client', [CandidateController::class, 'index'])->name('client-list');

    Route::any('clientAdd', [CandidateController::class, 'assign_emp'])->name('clientAdd');

    Route::get('users', [StaterkitController::class, 'users_list'])->name('users-list');

    Route::get('user/profile', [StaterkitController::class, 'profile'])->name('profile');
  
    Route::any('user/profile/update/{id}', [StaterkitController::class, 'profile_update'])->name('profile-update');
  
    Route::get('user/security', [StaterkitController::class, 'security'])->name('security');

    Route::post('add-uploadexcelfile', [CandidateController::class, 'importExcel'])->name('add-uploadexcelfile');


});


Route::group(['prefix' => 'admin'], function () {

    // add-vartical   
    Route::get('employee/add', [StaterkitController::class, 'add_employee'])->name('add-employees');
    Route::any('update-employee', [EmployeeController::class, 'edit'])->name('update-employee');
    Route::get('employee/delete/{id}', [EmployeeController::class, 'destroy'])->name('delete-employee');

    Route::get('client/add', [StaterkitController::class, 'client_list'])->name('add-client');
    Route::get('candidate/show', [StaterkitController::class, 'candidate_show'])->name('show-candidate');
    // Route::get('candidate/update/{id}', [CandidateController::class, 'edit'])->name('update-candidate');
    Route::any('client-update', [CandidateController::class, 'clientUpdate'])->name('client-update');
    Route::get('candidate/delete/{id}', [CandidateController::class, 'destroy'])->name('delete-candidate');
    Route::post('fetch-candidate-details', [CandidateController::class, 'fetchCandidateDetails'])->name('fetch-candidate-details');

    Route::get('getCandidateData', [CandidateController::class, 'getCandidateData'])->name('getCandidateData');

});


Route::get('lang/{locale}', [LanguageController::class, 'swap']);
Route::group(['prefix' => 'api/'], function () {
    Route::post('add-employee-form', [EmployeeController::class, 'store'])->name('add-employee-form');

    Route::post('add-candidate-form', [CandidateController::class, 'store'])->name('add-candidate-form');

});
