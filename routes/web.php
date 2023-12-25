<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BedController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;

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

Route::get('/', [FrontendController::class, 'index'])->middleware('guest');
Route::get('/registerpatient', [FrontendController::class, 'create'])->middleware('guest');
Route::post('/registerpatient', [FrontendController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);
// Route::get('/register', [RegisterController::class,'index'])->middleware('guest');
Route::post('/register', [RegisterController::class,'store']);

Route::resource('/user', UserController::class)->middleware('auth');
Route::resource('/user', UserController::class)->middleware('admin')->except('show');
Route::resource('/employee', EmployeeController::class)->middleware('admin');
Route::resource('/doctor', DoctorController::class)->middleware('admin');
Route::resource('/patient', PatientController::class)->middleware('auth');
Route::resource('/type', TypeController::class)->middleware('doctor');
Route::resource('/form', FormController::class)->middleware('doctor');
Route::resource('/drug', DrugController::class)->middleware('doctor');
Route::resource('/building', BuildingController::class)->middleware('employee');
Route::resource('/room', RoomController::class)->middleware('employee');
Route::resource('/bed', BedController::class)->middleware('employee');
Route::resource('/schedule', ScheduleController::class)->middleware('doctor');
Route::resource('/record', RecordController::class)->middleware('auth');
