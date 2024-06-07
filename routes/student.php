<?php

use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\AwardController;
use App\Http\Controllers\Student\CertificateController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\EnrolmentController;
use App\Http\Controllers\Student\EventController;
use App\Http\Controllers\Student\ExamController;
use App\Http\Controllers\Student\NoticeController;
use App\Http\Controllers\Student\PaymentController;
use App\Models\MultiLanguage;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::get('/local/{ln}', function ($ln) {
    $language = MultiLanguage::where('iso_code', $ln)->first();
    if (!$language) {
        $language = MultiLanguage::where('default', 1)->first();
        if ($language) {
            $ln = $language->iso_code;
        }
    }
    session()->put('local', $ln);
    return redirect()->back();
})->name('local');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'enrolment', 'as' => 'enrolment.'], function () {
    Route::get('/', [EnrolmentController::class, 'index'])->name('index');
    Route::get('view/{id}', [EnrolmentController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::get('view/{id}', [PaymentController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('view/{id}', [EventController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'notice', 'as' => 'notice.'], function () {
    Route::get('/', [NoticeController::class, 'index'])->name('index');
    Route::get('details/{id}', [NoticeController::class, 'details'])->name('details');
});

Route::group(['prefix' => 'exam', 'as' => 'exam.'], function () {
    Route::get('/', [ExamController::class, 'index'])->name('index');
    Route::get('view/{id}', [ExamController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'certificate', 'as' => 'certificate.'], function () {
    Route::get('/', [CertificateController::class, 'index'])->name('index');
    Route::get('print/{id}', [CertificateController::class, 'print'])->name('print');
});

Route::group(['prefix' => 'award', 'as' => 'award.'], function () {
    Route::get('/', [AwardController::class, 'list'])->name('index');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::post('update', [ProfileController::class, 'update'])->name('update');
    Route::post('password-update', [ProfileController::class, 'passwordUpdate'])->name('password-update');
});
