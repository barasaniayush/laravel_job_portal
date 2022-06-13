<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EmployerRegisterController;
use App\Http\Controllers\FavouriteController;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [JobController::class, 'index']);

Route::get('/jobs/{id}/show', [JobController::class, 'show'])->name('jobs.show');
Route::get('jobs/create', [JobController::class, 'create'])->name('jobs.create');
Route::post('jobs/create', [JobController::class, 'store'])->name('jobs.store');
Route::get('jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
Route::post('jobs/{id}/edit', [JobController::class, 'update'])->name('jobs.update');
Route::get('jobs/my-job', [JobController::class, 'myjob'])->name('jobs.myjob');
Route::get('jobs/alljobs', [JobController::class, 'allJobs'])->name('alljobs');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Company Route
Route::get('company/{id}/{company}', [CompanyController::class, 'index'])->name('company.index');
Route::get('company/create', [CompanyController::class, 'create'])->name('company.view');
Route::post('company/create', [CompanyController::class, 'store'])->name('company.store');
Route::post('company/logo', [CompanyController::class, 'changeLogo'])->name('logo');
Route::post('company/coverphoto', [CompanyController::class, 'changeCoverphoto'])->name('company.coverphoto');
Route::get('companies', [CompanyController::class, 'company'])->name('company');

//User Profile route
Route::get('user/profile', [UserProfileController::class, 'index'])->name('user.profile');
Route::post('user/profile/create', [UserProfileController::class, 'store'])->name('profile.create');
Route::post('user/attachment', [UserProfileController::class, 'attachment'])->name('profile.attachment');
Route::post('user/avatar', [UserProfileController::class, 'changeAvatar'])->name('avatar');

Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', [EmployerRegisterController::class, 'employerRegister'])->name('emp.register');

//Job Apply 
Route::post('/applications/{id}', [JobController::class, 'apply'])->name('apply');
Route::get('jobs/applications', [JobController::class, 'applicant'])->name('applicant');

//Job save route
Route::post('/save/{id}', [FavouriteController::class, 'saveJob']);
Route::post('/unsave/{id}', [FavouriteController::class, 'unsaveJob']);

//Search Route
Route::get('jobs/search', [JobController::class, 'searchJobs']);

//Category Route
Route::get('/category/{id}/jobs', [CategoryController::class, 'index'])->name('category.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
