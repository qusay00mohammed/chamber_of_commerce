<?php

use App\Http\Controllers\Payment\BankPalestineController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\CommitteeController;
use App\Http\Controllers\Website\ServiceController;
use App\Http\Controllers\Website\AgreementsAndLawsController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\crossingNewsController;
use App\Http\Controllers\Website\MediaCenterController;
use App\Http\Controllers\Website\GeneralizationController;
use App\Http\Controllers\Website\ProgramController;
use App\Models\GoalAndValue;
use App\Models\MediaCenter\MediaCenter;
use App\Models\Member;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, 'index'])->name('website.home');
Route::get('chamberCommitteesPage', [CommitteeController::class, 'chamberCommitteesPage'])->name('chamberCommitteesPage');
Route::get('commissionsPage/{id}', [CommitteeController::class, 'commissionsPage'])->name('commissionsPage');
Route::get('servicesPage', [ServiceController::class, 'servicesPage'])->name('servicesPage');
Route::get('serviceDetailsPage/{id}', [ServiceController::class, 'serviceDetailsPage'])->name('serviceDetailsPage');

Route::get('mediaCenterNews', [MediaCenterController::class, 'mediaCenterNews'])->name('mediaCenterNews');
Route::get('mediaCenterEvents', [MediaCenterController::class, 'mediaCenterEvents'])->name('mediaCenterEvents');
Route::get('mediaCenterImage', [MediaCenterController::class, 'mediaCenterImage'])->name('mediaCenterImage');
Route::get('mediaCenterVideo', [MediaCenterController::class, 'mediaCenterVideo'])->name('mediaCenterVideo');
Route::get('newsDetails/{id}', [MediaCenterController::class, 'newsDetails'])->name('website.newsDetails');
Route::get('mediaCenterVersions', [MediaCenterController::class, 'mediaCenterVersions'])->name('website.mediaCenterVersions');

Route::get('agreementsAndLaws', [AgreementsAndLawsController::class, 'agreementsAndLaws'])->name('agreementsAndLaws');
Route::get('agreementsAndLawsDetails/{id}', [AgreementsAndLawsController::class, 'agreementsAndLawsDetails'])->name('agreementsAndLawsDetails');

Route::get('generalizations', [GeneralizationController::class, 'generalizations'])->name('website.generalizations');
Route::get('generalizationsDetails/{id}', [GeneralizationController::class, 'generalizationsDetails'])->name('generalizationsDetails');

Route::get('crossingsNews', [crossingNewsController::class, 'crossingsNews'])->name('website.crossingsNews');
Route::get('crossingNews/{name}', [crossingNewsController::class, 'crossingNews'])->name('website.crossingNews');

Route::get('roomPrograms', [ProgramController::class, 'roomPrograms'])->name('website.roomPrograms');
Route::get('roomProgramsDetails/{id}', [ProgramController::class, 'roomProgramsDetails'])->name('website.roomProgramsDetails');

Route::get('getNewsCalendat', [MediaCenterController::class, 'getNewsCalendat'])->name('getNewsCalendat');


Route::get('contact-us', [ContactController::class, 'create'])->name('website.contact.create');
Route::post('contact-us', [ContactController::class, 'store'])->name('website.contact.store');


Route::get('chairmanSpeech', function () {

    return view('website.council.chairmanSpeech');
})->name('chairmanSpeech');

Route::get('boardOfDirectors', function () {

    $members = Member::where('type', 'council')->get();
    return view('website.council.boardOfDirectors', compact('members'));
})->name('boardOfDirectors');

Route::get('gazaCityPage', function () {

    return view('website.about_gaza.gazaCityPage');
})->name('gazaCityPage');


Route::get('donate', [PaymentController::class, 'index'])->name('supportUs');
Route::post('donate', [PaymentController::class, 'store'])->name('supportUs.post');

Route::get('success/{id}', [PaymentController::class, 'success'])->name('success');
Route::get('cancel/{id}', [PaymentController::class, 'cancel'])->name('cancel');

Route::post('responseBankPalestine', [PaymentController::class, 'responseBankPalestine'])->name('responseBankPalestine');


Route::get('about-us', function () {

    return view('website.about.about-us');
})->name('about-us');



Route::get('rss/news', function () {

    $data = MediaCenter::orderBy('id', 'desc')->whereIn('type', ['news', 'rafah', 'erez', 'keremShalom'])->whereIn('status', ['scheduled', 'active'])->where('publication_at', '<=', now())->take(20)->get();

    return response()->view('website.rss', [
        'data' => $data
    ])->header('Content-Type', 'text/xml');
})->name('news.rss');



Route::get('valuesRoom', function () {
    $values = GoalAndValue::where('type', 'value')->orderBy('id', 'desc')->get();
    return view('website.goals-and-values.valuesRoom', compact('values'));
})->name('valuesRoom');


Route::get('chamberObjectives', function () {
    $goals = GoalAndValue::where('type', 'goal')->orderBy('id', 'desc')->get();
    return view('website.goals-and-values.chamberObjectives', compact('goals'));
})->name('chamberObjectives');











Route::get('test', function () {
    return view('website.arbitrationCentre');
});

Route::get('test1', function () {
    return view('website.electronicServicesNotFound');
});
