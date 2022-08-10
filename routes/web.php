<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
/**
 * C'est une fonction qui permet de regrouper les routes
 * Route::controller(HomeController::class)->group(function(){})
 */


Route::get('/',[HomeController::class,'home'])->name('app_home');


Route::get('/about',[HomeController::class,'about'])->name('app_about');
/**
 * La méthode get pour afficher la page et la méthode post pour envoyer les données du formulaire dans la base de donne
 */
Route::match(['get', 'post'],'/dashboard',
[HomeController::class,'dashboard'])->middleware('auth')
                                    ->name('app_dashboard');
Route::get('/logout',[LoginController::class,'logout'])->name('app_logout');

Route::post('/exist_email',[LoginController::class,'existEmail'])->name('app_exist_email');

Route::match(['get', 'post'], '/activation_code/{token}',[LoginController::class,'activationCode'])->name('app_activation_code');

Route::get('/user_checher',[LoginController::class,'userChecker'])->name('app_user_checher');

Route::get('/resend_activation_code/{token}',[LoginController::class,'resendActivationCode'])->name('app_resend_activation_code');

Route::get('/activation_account_link/{token}',[LoginController::class,'activationAccountLink'])
        ->name('app_activation_account_link');
Route::match(['get', 'post'], '/activation_account_change_email/{token}',
 [LoginController::class,'activationAccountChangeEmail'])
 ->name('app_activation_account_change_email');
