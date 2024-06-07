<?php

use App\Http\Controllers\Instructor\QuestionController;
use App\Http\Controllers\Instructor\AwardController;
use App\Http\Controllers\Instructor\NoticeController;
use App\Http\Controllers\Instructor\DashboardController;
use App\Http\Controllers\Instructor\EventController;
use App\Http\Controllers\Instructor\ExamController;
use App\Http\Controllers\Instructor\ExpenseController;
use App\Http\Controllers\Instructor\PackageController;
use App\Http\Controllers\Instructor\ProfileController;
use App\Http\Controllers\Instructor\StudentController;
use App\Models\MultiLanguage;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Instructor Routes
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

Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('list', [StudentController::class, 'list'])->name('list');
    Route::get('view/{id}', [StudentController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'packages', 'as' => 'packages.'], function () {
    Route::get('list', [PackageController::class, 'list'])->name('list');
    Route::get('view/{id}', [PackageController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'notice', 'as' => 'notice.'], function () {
    Route::get('list', [NoticeController::class, 'list'])->name('list');
    Route::get('details/{id}', [NoticeController::class, 'details'])->name('details');
});

Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('view/{id}', [EventController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'award', 'as' => 'award.'], function () {
    Route::get('list', [AwardController::class, 'list'])->name('list');
});

Route::group(['prefix' => 'expense', 'as' => 'expense.'], function () {
    Route::get('list', [ExpenseController::class, 'list'])->name('list');
    Route::post('store', [ExpenseController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ExpenseController::class, 'edit'])->name('edit');
    Route::get('view/{id}', [ExpenseController::class, 'view'])->name('view');
    Route::post('delete/{id}', [ExpenseController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'question', 'as' => 'question.'], function () {
    Route::get('list', [QuestionController::class, 'list'])->name('list');
    Route::post('store', [QuestionController::class, 'store'])->name('store');
    Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('edit');
    Route::get('view/{id}', [QuestionController::class, 'view'])->name('view');
    Route::post('delete/{id}', [QuestionController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'exam', 'as' => 'exam.'], function () {
    Route::get('list', [ExamController::class, 'list'])->name('list');
    Route::get('get-student', [ExamController::class, 'getStudent'])->name('get-student');
    Route::post('store', [ExamController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ExamController::class, 'edit'])->name('edit');
    Route::get('view/{id}', [ExamController::class, 'view'])->name('view');
    Route::get('print/{id}', [ExamController::class, 'print'])->name('print');
    Route::get('mark-assign/{id}', [ExamController::class, 'markAssign'])->name('mark-assign');
    Route::get('mark-assign-edit/{id}', [ExamController::class, 'markAssignEdit'])->name('mark-assign-edit');
    Route::post('mark-update', [ExamController::class, 'markUpdate'])->name('mark-update');
    Route::post('delete/{id}', [ExamController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::post('update', [ProfileController::class, 'update'])->name('update');
    Route::post('password-update', [ProfileController::class, 'passwordUpdate'])->name('password-update');
});
