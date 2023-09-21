<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\News\NewsController;
use App\Http\Controllers\Admin\Activity\ActivityController;
use App\Http\Controllers\Admin\Committee\CommitteeController;
use App\Http\Controllers\Admin\Image\ImageController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\Video\VideoController;
use App\Http\Controllers\Admin\Service\ServiceController;
use App\Http\Controllers\Admin\Partner\PartnerController;
use App\Http\Controllers\Admin\Achievement\AchievementController;
use App\Http\Controllers\Admin\News\ErezCrossingController;
use App\Http\Controllers\Admin\News\KeremShalomCrossingController;
use App\Http\Controllers\Admin\News\RafahCrossingController;
use App\Http\Controllers\Admin\OfficialAgency\OfficialAgencyController;
use App\Http\Controllers\Admin\TradeDelegation\TradeDelegationController;
use App\Http\Controllers\Admin\Generalization\GeneralizationController;
use App\Http\Controllers\Admin\Program\ProgramController;
use App\Http\Controllers\Admin\AdministrationMember\AdministrationMemberController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\ConventionLaw\ConventionLawController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Donate\DonateController;
use App\Http\Controllers\Admin\GoalAndValue\GoalController;
use App\Http\Controllers\Admin\GoalAndValue\ValueController;
use App\Http\Controllers\Admin\Version\VersionController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SMS\SMSController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin/')->middleware('guest')->group(function(){
    // Login routes
    Route::get('login', [LoginController::class, 'create'])->name('login.create');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

    // Reset Password routes
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

});

// Admin Routes
Route::prefix('admin/')->middleware('auth')->group(function(){

    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::resource('slider', SliderController::class);

    Route::resource('support-us', DonateController::class);

    Route::resource('users', UserController::class);
    Route::get('logUser', [UserController::class, 'logUser'])->name('logUser');

    Route::resource('news', NewsController::class);

    Route::any('image/delete/{id}', [NewsController::class, 'deleteImage'])->name('admin.image.delete');

    Route::get('media_center_logs/{id}', [NewsController::class, 'media_center_logs'])->name('media_center_logs');
    Route::get('media_center_Archive_logs/{id}', [NewsController::class, 'media_center_Archive_logs'])->name('media_center_Archive_logs');
    Route::any('news/ForceDelete/{id}', [NewsController::class, 'confirmForceDelete'])->name('news.confirmForceDelete');
    Route::any('news/restore/{id}', [NewsController::class, 'restore'])->name('news.restore');
    Route::get('archive_news', [NewsController::class, 'archive_news'])->name('archive_news');


    Route::resource('activities', ActivityController::class);

    Route::resource('images', ImageController::class);

    Route::resource('contact-us', ContactController::class);

    Route::resource('videos', VideoController::class);

    Route::resource('committees', CommitteeController::class);

    Route::resource('services', ServiceController::class);

    Route::resource('partners', PartnerController::class);

    Route::resource('achievements', AchievementController::class);

    Route::resource('officialAgencies', OfficialAgencyController::class);

    Route::resource('tradeDelegations', TradeDelegationController::class);

    Route::resource('programs', ProgramController::class);

    Route::resource('rafahCrossing', RafahCrossingController::class);

    Route::get('archive_erez', [ErezCrossingController::class, 'archive_erez'])->name('archive_erez');
    Route::get('archive_rafah', [RafahCrossingController::class, 'archive_rafah'])->name('archive_rafah');
    Route::get('archive_keremShalom', [KeremShalomCrossingController::class, 'archive_keremShalom'])->name('archive_keremShalom');
    Route::get('archive_image', [ImageController::class, 'archive_image'])->name('archive_image');
    Route::get('archive_activity', [ActivityController::class, 'archive_activity'])->name('archive_activity');



    Route::resource('erezCrossing', ErezCrossingController::class);

    Route::resource('keremShalomCrossing', KeremShalomCrossingController::class);

    Route::resource('generalizations', GeneralizationController::class);

    Route::resource('administrationMembers', AdministrationMemberController::class);

    Route::get('members', [AdministrationMemberController::class, 'members'])->name('members');

    Route::resource('conventionLaw', ConventionLawController::class);

    Route::resource('goals', GoalController::class);

    Route::resource('values', ValueController::class);

    Route::resource('versions', VersionController::class);

    Route::get('information-contacts', [SettingController::class, 'informationContacts'])->name('information-contacts');
    Route::post('information-contacts', [SettingController::class, 'informationContactsStore'])->name('information-contacts-store');

    Route::get('information-payment', [SettingController::class, 'informationPayment'])->name('information-payment');
    Route::post('information-payment', [SettingController::class, 'informationPaymentStore'])->name('information-payment-store');


    Route::get('information-public', [SettingController::class, 'informationPublic'])->name('information-public');
    Route::post('information-public', [SettingController::class, 'informationPublicStore'])->name('information-public-store');

    Route::get('sms', [SMSController::class, 'index'])->name('sms.index');
    Route::post('sendSMS', [SMSController::class, 'sendSMS'])->name('sendSMS');
    Route::post('settingsSMS', [SMSController::class, 'settingsSMS'])->name('settingsSMS');

});




// Route::get('userAgent', function(){
//     $request = request();
//     return $request->header('user-agent');
// });
