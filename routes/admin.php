<?php

use App\Http\Controllers\Admin\AwardAssignController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnrolmentController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\IncomeExpenseController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PackagesController;
use App\Http\Controllers\Admin\PartialController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PaymentGatewayController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\RoleAndPermisionController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\StudentPackagesController;
use App\Http\Controllers\FrontendSetting\FaqController;
use App\Http\Controllers\FrontendSetting\FrontendSettingController;
use App\Http\Controllers\FrontendSetting\GalleryCategoryController;
use App\Http\Controllers\FrontendSetting\GalleryController;
use App\Http\Controllers\FrontendSetting\SectionConfigurationController;
use App\Http\Controllers\FrontendSetting\TestimonialController;
use App\Models\MultiLanguage;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
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
Route::get('revenue-chart', [DashboardController::class, 'revenueChart'])->name('revenue-chart');
Route::get('student-chart', [DashboardController::class, 'studentChart'])->name('student-chart');
Route::get('recent-enrolment-history', [DashboardController::class, 'recentEnrolmentHistory'])->name('recent-enrolment-history');
Route::get('recent-payment-history', [DashboardController::class, 'recentPaymentHistory'])->name('recent-payment-history');


Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
    Route::get('/', [SettingsController::class, 'index'])->name('index');
    Route::post('profile-update', [SettingsController::class, 'profileUpdate'])->name('profile.update');
    Route::post('password-update', [SettingsController::class, 'passwordUpdate'])->name('password-update');
    Route::get('configuration-status-change', [SettingsController::class, 'configurationStatusChange'])->name('configuration.status.change');
    Route::get('configuration-modal-render', [SettingsController::class, 'configurationModalRender'])->name('configuration.modal.render');
    Route::post('configuration-data-update', [SettingsController::class, 'configurationDataUpdate'])->name('configuration.data.update');
    Route::post('configuration-test-email', [SettingsController::class, 'configurationTestEmail'])->name('configuration.test.email');
    Route::post('application-setting', [SettingsController::class, 'applicationSetting'])->name('application.setting');
    Route::post('maintenance-mode-update', [SettingsController::class, 'maintenanceModeUpdate'])->name('maintenance.mode.update');
    Route::post('storage-driver-update', [SettingsController::class, 'storageDriverUpdate'])->name('storage.driver.update');
    Route::get('storage-storage-link', [SettingsController::class, 'storageLink'])->name('storage.link');
    Route::get('cache-clear/{id}', [SettingsController::class, 'cacheClear'])->name('cache.clear');

    Route::post('add-new-language', [SettingsController::class, 'addNewLanguage'])->name('add.new.language');

    Route::group(['prefix' => 'language', 'as' => 'languages.'], function () {
        Route::post('store', [LanguageController::class, 'store'])->name('store');
        Route::get('edit/{id}/{iso_code?}', [LanguageController::class, 'edit'])->name('edit');
        Route::post('delete/{id}', [LanguageController::class, 'delete'])->name('delete');
        Route::get('translate/{id}', [LanguageController::class, 'translateLanguage'])->name('translate');
        Route::get('update-translate/{id}', [LanguageController::class, 'updateTranslate'])->name('update.translate');
    });

    Route::group(['prefix' => 'currency', 'as' => 'currency.'], function () {
        Route::get('/', [CurrencyController::class, 'index'])->name('index');
        Route::post('store', [CurrencyController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CurrencyController::class, 'edit'])->name('edit');
        Route::post('delete/{id}', [CurrencyController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'gateway', 'as' => 'gateway.'], function () {
        Route::get('edit/{id}', [PaymentGatewayController::class, 'edit'])->name('edit');
        Route::post('update', [PaymentGatewayController::class, 'update'])->name('update');
    });

    Route::group(['prefix' => 'time-schedule', 'as' => 'time-schedule.'], function () {
        Route::post('store', [SettingsController::class, 'timeScheduleStore'])->name('store');
    });

    Route::group(['prefix' => 'frontend-setting', 'as' => 'frontend-setting.'], function () {
        Route::group(['prefix' => 'section-configuration', 'as' => 'section-configuration.'], function () {
            Route::get('list', [FrontendSettingController::class, 'list'])->name('list');
            Route::get('edit/{id}', [FrontendSettingController::class, 'edit'])->name('edit');
            Route::post('update', [FrontendSettingController::class, 'update'])->name('update');
        });
        Route::post('update', [FrontendSettingController::class, 'frontendSettingUpdate'])->name('update');

        Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
            Route::get('list', [FaqController::class, 'list'])->name('list');
            Route::post('store', [FaqController::class, 'store'])->name('store');
            Route::get('edit/{id}', [FaqController::class, 'edit'])->name('edit');
            Route::post('delete/{id}', [FaqController::class, 'destroy'])->name('delete');
        });
        Route::group(['prefix' => 'testimonial', 'as' => 'testimonial.'], function () {
            Route::get('list', [TestimonialController::class, 'list'])->name('list');
            Route::post('store', [TestimonialController::class, 'store'])->name('store');
            Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
            Route::post('delete/{id}', [TestimonialController::class, 'destroy'])->name('delete');
        });
        Route::group(['prefix' => 'gallery-category', 'as' => 'gallery-category.'], function () {
            Route::get('list', [GalleryCategoryController::class, 'list'])->name('list');
            Route::post('store', [GalleryCategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [GalleryCategoryController::class, 'edit'])->name('edit');
            Route::post('delete/{id}', [GalleryCategoryController::class, 'destroy'])->name('delete');
        });
        Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
            Route::get('list', [GalleryController::class, 'list'])->name('list');
            Route::post('store', [GalleryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [GalleryController::class, 'edit'])->name('edit');
            Route::post('delete/{id}', [GalleryController::class, 'destroy'])->name('delete');
        });
    });

});

Route::group(['prefix' => 'role-and-permission', 'as' => 'role-and-permission.'], function () {
    Route::get('/', [RoleAndPermisionController::class, 'index'])->name('index');
    Route::post('store', [RoleAndPermisionController::class, 'store'])->name('store');
    Route::get('permission-edit/{id}', [RoleAndPermisionController::class, 'permissionEdit'])->name('permission-edit');
    Route::post('permission-update', [RoleAndPermisionController::class, 'permissionUpdate'])->name('permission-update');
    Route::post('delete/{id}', [RoleAndPermisionController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('list', [StudentController::class, 'list'])->name('list');
    Route::get('add', [StudentController::class, 'add'])->name('add');
    Route::post('store', [StudentController::class, 'store'])->name('store');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [StudentController::class, 'destroy'])->name('delete');
    Route::get('view/{id}', [StudentController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'instructor', 'as' => 'instructor.'], function () {
    Route::get('list', [InstructorController::class, 'list'])->name('list');
    Route::get('add', [InstructorController::class, 'add'])->name('add');
    Route::post('store', [InstructorController::class, 'store'])->name('store');
    Route::get('edit/{id}', [InstructorController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [InstructorController::class, 'destroy'])->name('delete');
    Route::get('view/{id}', [InstructorController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
    Route::get('list', [CategoryController::class, 'list'])->name('list');
    Route::post('store', [CategoryController::class, 'store'])->name('store');
    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'packages', 'as' => 'packages.'], function () {
    Route::get('list', [PackagesController::class, 'list'])->name('list');
    Route::post('store', [PackagesController::class, 'store'])->name('store');
    Route::get('edit/{id}', [PackagesController::class, 'edit'])->name('edit');
    Route::get('view/{id}', [PackagesController::class, 'view'])->name('view');
    Route::post('delete/{id}', [PackagesController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'notice', 'as' => 'notice.'], function () {
    Route::get('list', [NoticeController::class, 'list'])->name('list');
    Route::post('store', [NoticeController::class, 'store'])->name('store');
    Route::get('edit/{id}', [NoticeController::class, 'edit'])->name('edit');
    Route::get('details/{id}', [NoticeController::class, 'details'])->name('details');
    Route::post('delete/{id}', [NoticeController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'student-packages', 'as' => 'student-packages.'], function () {
    Route::get('list', [StudentPackagesController::class, 'list'])->name('list');
    Route::post('store', [StudentPackagesController::class, 'store'])->name('store');
    Route::get('edit/{id}', [StudentPackagesController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [StudentPackagesController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::post('store', [EventController::class, 'store'])->name('store');
    Route::get('view/{id}', [EventController::class, 'view'])->name('view');
    Route::post('delete/{id}', [EventController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'staff', 'as' => 'staff.'], function () {
    Route::get('list', [StaffController::class, 'list'])->name('list');
    Route::get('add', [StaffController::class, 'add'])->name('add');
    Route::post('store', [StaffController::class, 'store'])->name('store');
    Route::get('edit/{id}', [StaffController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [StaffController::class, 'destroy'])->name('delete');
    Route::get('view/{id}', [StaffController::class, 'view'])->name('view');
});

Route::group(['prefix' => 'enrolment', 'as' => 'enrolment.'], function () {
    Route::get('list', [EnrolmentController::class, 'list'])->name('list');
    Route::post('store', [EnrolmentController::class, 'store'])->name('store');
    Route::get('edit/{id}', [EnrolmentController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [EnrolmentController::class, 'destroy'])->name('delete');
    Route::get('print/{id}', [EnrolmentController::class, 'print'])->name('print');
});

Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
    Route::get('list', [PaymentController::class, 'list'])->name('list');
    Route::get('add', [PaymentController::class, 'add'])->name('add');
    Route::post('store', [PaymentController::class, 'store'])->name('store');
    Route::get('edit/{id}', [PaymentController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [PaymentController::class, 'destroy'])->name('delete');
    Route::get('view/{id}', [PaymentController::class, 'view'])->name('view');
    Route::get('get-total-paid-amount', [PaymentController::class, 'getTotalPaidAmount'])->name('get-total-paid-amount');
});

Route::group(['prefix' => 'award', 'as' => 'award.'], function () {
    Route::get('list', [AwardController::class, 'list'])->name('list');
    Route::post('store', [AwardController::class, 'store'])->name('store');
    Route::get('edit/{id}', [AwardController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [AwardController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'award-assign', 'as' => 'award-assign.'], function () {
    Route::get('list', [AwardAssignController::class, 'list'])->name('list');
    Route::post('store', [AwardAssignController::class, 'store'])->name('store');
    Route::get('edit/{id}', [AwardAssignController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [AwardAssignController::class, 'destroy'])->name('delete');
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

Route::group(['prefix' => 'income-expense', 'as' => 'income-expense.'], function () {
    Route::get('list', [IncomeExpenseController::class, 'list'])->name('list');
    Route::post('store', [IncomeExpenseController::class, 'store'])->name('store');
    Route::get('edit/{id}', [IncomeExpenseController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [IncomeExpenseController::class, 'destroy'])->name('delete');
});

Route::group(['prefix' => 'certificate', 'as' => 'certificate.'], function () {
    Route::get('list', [CertificateController::class, 'list'])->name('list');
    Route::get('configer', [CertificateController::class, 'certificateConfiger'])->name('configer');
    Route::post('store', [CertificateController::class, 'store'])->name('store');
    Route::get('edit/{id}', [CertificateController::class, 'edit'])->name('edit');
    Route::post('delete/{id}', [CertificateController::class, 'destroy'])->name('delete');
    Route::get('print/{id}', [CertificateController::class, 'print'])->name('print');
});

Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::post('generation', [ReportController::class, 'generation'])->name('generation');
});

Route::group(['prefix' => 'partial', 'as' => 'partial.'], function () {
    Route::get('document-section-content', [PartialController::class, 'documentSectionContent'])->name('document-section-content');
});

Route::group(['prefix' => 'common', 'as' => 'common.'], function () {
    Route::get('user-document-list', [CommonController::class, 'userDocumentList'])->name('user-document-list');
    Route::get('user-activity-log', [CommonController::class, 'userActivityLog'])->name('user-activity-log');
});
