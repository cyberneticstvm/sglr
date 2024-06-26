<?php

use App\Http\Controllers\WebController;
use App\Http\Middleware\AdminUser;
use App\Http\Middleware\Approver;
use App\Http\Middleware\PublicUser;
use App\Http\Middleware\Staff;
use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->group(function () {
    Route::controller(WebController::class)->group(function () {
        Route::get('/', 'loginForm')->name('login');
        Route::post('/', 'signin')->name('user.login');

        Route::get('/signup', 'signupForm')->name('signup');
        Route::post('/signup', 'signup')->name('user.signup');

        Route::get('/forgot/password', 'forgotPassword')->name('forgot.password');
        Route::post('/forgot/password', 'emailPasswordResetLink')->name('email.password.reset.link');
        Route::get('/reset/password/{token}', 'resetPassword')->name('reset.password');
        Route::post('/reset/password/update/{token}', 'resetPasswordUpdate')->name('reset.password.update');

        Route::get('ajax/lbody/{district}', 'getLocalBody')->name('district.lbody');
    });
});

Route::prefix('/')->middleware(['web', 'auth'])->group(function () {
    Route::controller(WebController::class)->group(function () {

        Route::get('logout', 'logout')->name('logout');
        Route::get('dashboard', 'dashboard')->name('dashboard');

        Route::get('survey', 'survey')->name('form.survey')->middleware([PublicUser::class]);
        Route::post('survey', 'surveySave')->name('survey.save')->middleware([PublicUser::class]);

        Route::get('survey/edit/{id}', 'surveyEdit')->name('form.survey.edit')->middleware([PublicUser::class]);
        Route::put('survey/edit/{id}', 'surveyUpdate')->name('survey.update')->middleware([PublicUser::class]);

        Route::get('survey/approve/{id}', 'surveyApprove')->name('form.survey.approve')->middleware([Approver::class]);
        Route::put('survey/approve/{id}', 'surveyApproveSave')->name('survey.approve')->middleware([Approver::class]);

        Route::get('password', 'password')->name('password');
        Route::put('password', 'passwordUpdate')->name('password.update');

        Route::get('survey/view/{id}', 'surveyView')->name('form.survey.view');

        Route::get('survey/delete/{id}', 'surveyDelete')->name('form.survey.delete')->middleware([AdminUser::class]);
        Route::get('survey/revoke/approval/{id}', 'revokeSurveyApproval')->name('form.survey.revoke.approval')->middleware([AdminUser::class]);
    });
});

Route::prefix('/')->middleware(['web', 'auth'])->group(function () {
    Route::controller(WebController::class)->group(function () {
        Route::get('user/register', 'userRegister')->name('user.register');
        Route::get('user/create', 'userForm')->name('form.user.create');
        Route::post('user/save', 'userSave')->name('user.save');
        Route::get('user/edit/{id}', 'userEditForm')->name('form.user.edit');
        Route::post('user/edit/{id}', 'userUpdate')->name('user.update');
        Route::get('user/delete/{id}', 'userDelete')->name('user.delete');
    });
});
