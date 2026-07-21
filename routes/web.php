<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BnspController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebLoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KemnakerController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SoftskillController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\BnspRegisterController;
use App\Http\Controllers\DashboardAdsController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\DashboardBnspController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardAboutController;
use App\Http\Controllers\DashboardAbsensiController;
use App\Http\Controllers\DashboardBerkasController;
use App\Http\Controllers\DashboardEventController;
use App\Http\Controllers\DashboardStaffController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardReviewController;
use App\Http\Controllers\DashboardSliderController;
use App\Http\Controllers\DashboardMessageController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\KemnakerRegisterController;
use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardCertificateController;
use App\Http\Controllers\DashboardFacilityController;
use App\Http\Controllers\DashboardKemnakerController;
use App\Http\Controllers\DashboardScheduleController;
use App\Http\Controllers\DashboardTrainingController;
use App\Http\Controllers\SoftskillRegisterController;
use App\Http\Controllers\DashboardSoftskillController;
use App\Http\Controllers\DashboardUpdatePasswordController;
use App\Http\Controllers\DashboardCustomerServiceController;
use App\Http\Controllers\DashboardGalleryCategoryController;
use App\Http\Controllers\DashboardGalleryDetailController;
use App\Http\Controllers\DashboardInhouseController;
use App\Http\Controllers\DashboardInstructorController;
use App\Http\Controllers\DashboardLayananController;
use App\Http\Controllers\DashboardPlaceController;
use App\Http\Controllers\DashboardVideoController;
use App\Http\Controllers\DashboardOngoingTrainingController;
use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\DashboardLainnyaController;
use App\Http\Controllers\DashboardLokerController;
use App\Http\Controllers\DashboardPembayaranController;
use App\Http\Controllers\DashboardPesertaController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\KategoriSertifikasiController;
use App\Http\Controllers\LainnyaController;
use App\Http\Controllers\LainnyaRegisterController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\SearchController;

Route::get('/linkstorage', function () {
    $targetFolder = base_path() . '/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    symlink($targetFolder, $linkFolder);
});

Route::get('/clear-config-cache', function () {
    Artisan::call('route:clear');
    return 'Config route has clear successfully !';
});
Route::get('/clear-route', function () {
    Artisan::call('route:clear');
    return 'Config route has clear successfully !';
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// GoogleLoginController redirect and callback urls
Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);
/*
|--------------------------------------------------------------------------
| Client View
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/demo-page', [DemoController::class, 'index']);
Route::get('/tentang-kami', [AboutController::class, 'index']);
Route::get('/lokasi-kami', [AboutController::class, 'location']);
Route::get('instruktur', [InstructorController::class, 'index']);
Route::get('/sertifikasi-kemnaker-ri', [KemnakerController::class, 'index']);
Route::get('/sertifikasi-kemnaker-ri/{kategori_sertifikasi}', [KemnakerController::class, 'kategori']);
Route::get('/training-softskill', [SoftskillController::class, 'index']);
Route::get('/training-softskill/{kategori_sertifikasi}', [SoftskillController::class, 'kategori']);
Route::get('/sertifikasi-bnsp', [BnspController::class, 'index']);
Route::get('/sertifikasi-bnsp/{kategori_sertifikasi}', [BnspController::class, 'kategori']);

Route::get('/pelatihan', [SearchController::class, 'index']);
Route::get('/pelatihan/{training:slug}/checkKemnakerSlug', [TrainingController::class, 'checkKemnakerSlug']);
Route::get('/pelatihan/{training:slug}/checkBnspSlug', [TrainingController::class, 'checkBnspSlug']);
Route::get('/pelatihan/{training:slug}/checkSoftskillSlug', [TrainingController::class, 'checkSoftskillSlug']);
Route::get('/pelatihan/{training:slug}/checkInhouseSlug', [TrainingController::class, 'checkInhouseSlug']);
Route::post('/pelatihan/{training:slug}', [TrainingController::class, 'store']);
Route::post('/pelatihan/{training:slug}/inhouse', [TrainingController::class, 'save'])->name('training.save');
Route::post('/pelatihan/kemnaker', [TrainingController::class, 'storeKemnaker'])->name('training.storeKemnaker');
Route::get('/pelatihan/{training:slug}', [TrainingController::class, 'show']);

Route::get('/pendaftaran-sertifikasi-inhouse', [TrainingController::class, 'inhouse'])->name('training.inhouse');
Route::post('/pendaftaran-sertifikasi-inhouse', [TrainingController::class, 'save'])->name('training.save');
Route::get('/pendaftaran-sertifikasi-inhouse/checkSlug', [TrainingController::class, 'checkInhouseSlug']);

Route::get('/pendaftaran-sertifikasi-kemnaker-ri', [KemnakerRegisterController::class, 'index']);
Route::post('/pendaftaran-sertifikasi-kemnaker-ri', [KemnakerRegisterController::class, 'store']);
Route::get('/pendaftaran-sertifikasi-kemnaker-ri/checkSlug', [KemnakerRegisterController::class, 'checkSlug']);

Route::get('/pendaftaran-sertifikasi-bnsp', [BnspRegisterController::class, 'index']);
Route::post('/pendaftaran-sertifikasi-bnsp', [BnspRegisterController::class, 'store']);
Route::get('/pendaftaran-sertifikasi-bnsp/checkSlug', [BnspRegisterController::class, 'checkSlug']);

Route::get('/pendaftaran-sertifikasi-lainnya', [LainnyaRegisterController::class, 'index']);
Route::post('/pendaftaran-sertifikasi-lainnya', [LainnyaRegisterController::class, 'store']);
Route::get('/pendaftaran-sertifikasi-lainnya/checkSlug', [LainnyaRegisterController::class, 'checkSlug']);

Route::match(['get', 'post'], '/pendaftaran-training-softskill', [SoftskillRegisterController::class, 'index', 'store']);

Route::get('/pendaftaran-training-softskill', [SoftskillRegisterController::class, 'index']);
Route::post('/pendaftaran-training-softskill', [SoftskillRegisterController::class, 'store']);
Route::get('/pendaftaran-training-softskill/checkSlug', [SoftskillRegisterController::class, 'checkSlug']);

Route::get('/sertifikat', [CertificateController::class, 'index']);

Route::get('/jadwal', [ScheduleController::class, 'index']);
Route::get('/jadwal/download', [ScheduleController::class, 'download']);
Route::get('/company-profile/download', [AboutController::class, 'download']);

Route::get('/lokasi-training', [LocationController::class, 'index']);
Route::get('/lokasi-training/region/{place}', [LocationController::class, 'showRegion']);
Route::get('/lokasi-training/{location:slug}', [LocationController::class, 'show']);

Route::get('/kontak-kami/checkSlug', [ContactController::class, 'checkSlug']);
Route::resource('/kontak-kami', ContactController::class);
Route::resource('/loker', LokerController::class);
Route::get('/loker/{loker:slug}', [LokerController::class, 'show']);
Route::get('/loker-arsa-detail', function () {
    return view('loker-arsa-detail');
});
Route::get('/kontak-kami-home/checkSlug', [ContactController::class, 'checkSlug']);
Route::post('/kontak-kami-home',  [ContactController::class, 'contact']);
Route::get('/kontak-thanks', [ContactController::class, 'contactThanks']);
Route::get('/perpanjangan-sio-lisensi-skp', [LainnyaController::class, 'index']);

Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/tags/{tag:slug}', [PostController::class, 'fetch']);
Route::get('/blog/{post:slug}', [PostController::class, 'show']);

Route::resource('/galeri', GalleryController::class)->except('create', 'store', 'edit', 'update', 'destroy');

Route::get('/loginUser', [WebLoginController::class, 'index'])->name('loginUser')->middleware('guest');
Route::post('/loginUser', [WebLoginController::class, 'authenticate']);
Route::post('/logoutUser', [WebLoginController::class, 'logout']);

Route::get('/proposal-penawaran-kerjasama', [ScheduleController::class, 'proposal']);
Route::get('/company-profile', [ScheduleController::class, 'companyProfile']);
Route::get('/JadwalTraining2025', [ScheduleController::class, 'jadwalTahunan']);
Route::get('/JadwalTraining2026', [ScheduleController::class, 'jadwalTahunan2026']);
Route::get('/legalitas', [DashboardBerkasController::class, 'legalitas']);

// iklan
Route::get('/popal', [TrainingController::class, 'popal',])->name('popal');

/*
|--------------------------------------------------------------------------
| Administrator View
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

Route::resource('/dashboard/messages', DashboardMessageController::class)->except(['create', 'store'])->middleware(['auth', 'verified']);

Route::resource('/dashboard/kemnaker', DashboardKemnakerController::class)->except(['create', 'store', 'destroy'])->middleware(['auth', 'verified']);
Route::resource('/dashboard/softskill', DashboardSoftskillController::class)->middleware(['auth', 'verified']);
Route::resource('/dashboard/bnsp', DashboardBnspController::class)->except(['create', 'store', 'destroy'])->middleware(['auth', 'verified']);
Route::resource('/dashboard/inhouse', DashboardInhouseController::class)->except(['create', 'store', 'destroy'])->middleware(['auth', 'verified']);
Route::resource('/dashboard/lainnya', DashboardLainnyaController::class)->except(['create', 'store', 'destroy'])->middleware(['auth', 'verified']);

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('admin');
Route::post('/dashboard/posts/upload', [DashboardPostController::class, 'upload'])->name('posts.upload');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('admin');
Route::get('/dashboard/posts/restore/{id}', [DashboardPostController::class, 'restore'])->name('posts.restore')->middleware('admin');
Route::get('/dashboard/posts/force-delete/{id}', [DashboardPostController::class, 'forceDelete'])->name('posts.force-delete')->middleware('admin');

Route::get('/dashboard/categories/checkSlug', [DashboardCategoryController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/categories', DashboardCategoryController::class)->except('show')->middleware(['admin']);

Route::get('/dashboard/instructors/checkSlug', [DashboardInstructorController::class, 'checkSlug'])->middleware('admin');
Route::resource('/dashboard/instructors', DashboardInstructorController::class)->middleware(['admin']);

Route::resource('/dashboard/users', DashboardUserController::class)->middleware(['admin']);
Route::get('/dashboard/users/perusahaan/show/{id}', [DashboardUserController::class, 'showPerusahaan'])->middleware(['admin']);
Route::delete('/dashboard/users/perusahaan/{id}', [DashboardUserController::class, 'deletePerusahaan'])->middleware(['admin']);
Route::resource('/dashboard/peserta', DashboardPesertaController::class)->middleware(['admin']);
Route::resource('/dashboard/pembayaran', DashboardPembayaranController::class)->middleware(['admin']);
Route::resource('/dashboard/berkas', DashboardBerkasController::class)->middleware(['admin']);

Route::resource('/dashboard/absensi', DashboardAbsensiController::class)->middleware(['admin']);

Route::get('/dashboard/trainings/checkSlug', [DashboardTrainingController::class, 'checkSlug']);
Route::resource('/dashboard/trainings', DashboardTrainingController::class)->middleware('admin');
Route::get('/dashboard/trainings/restore/{id}', [DashboardTrainingController::class, 'restore'])->name('trainings.restore')->middleware('admin');
Route::get('/dashboard/trainings/force-delete/{id}', [DashboardTrainingController::class, 'forceDelete'])->name('trainings.force-delete')->middleware('admin');
Route::get('/dashboard/training/archieve', [DashboardTrainingController::class, 'archieve'])->middleware('admin');
Route::post('/dashboard/training/{training:slug}', [DashboardTrainingController::class, 'storeEvent'])->middleware('admin');
Route::get('/dashboard/training/{training:slug}/{id}', [DashboardTrainingController::class, 'destroyEvent'])->middleware('admin');

Route::resource('dashboard/ongoing', DashboardOngoingTrainingController::class)->middleware('admin');
Route::get('/dashboard/ongoing/restore/{id}', [DashboardOngoingTrainingController::class, 'restore'])->name('ongoing.restore')->middleware('admin');
Route::get('/dashboard/ongoing/force-delete/{id}', [DashboardOngoingTrainingController::class, 'forceDelete'])->middleware('admin');
Route::get('/dashboard/ongoing/archieve', [DashboardOngoingTrainingController::class, 'archieve'])->middleware('admin');
Route::get('/data-peserta', [DashboardOngoingTrainingController::class, 'peserta'])->name('ongoing.peserta');

Route::resource('dashboard/client', DashboardClientController::class)->middleware('admin');

Route::post('/dashboard/events', [DashboardEventController::class, 'store'])->middleware('admin');
Route::delete('/dashboard/events/{id}', [DashboardEventController::class, 'destroy'])->middleware('admin');

Route::get('/dashboard/schedules/checkSlug', [DashboardScheduleController::class, 'checkSlug']);
Route::resource('/dashboard/schedules', DashboardScheduleController::class)->middleware('admin');

Route::get('/dashboard/certificates/checkSlug', [DashboardCertificateController::class, 'checkSlug']);
Route::resource('/dashboard/certificates', DashboardCertificateController::class)->middleware('admin');

Route::get('/dashboard/places/checkSlug', [DashboardPlaceController::class, 'checkSlug']);
Route::resource('/dashboard/places', DashboardPlaceController::class)->middleware('admin');
Route::get('/dashboard/places/{slug}', [DashboardPlaceController::class, 'show'])->middleware('admin');
Route::get('/dashboard/places/place-images/{id}', [DashboardPlaceController::class, 'images'])->name('place.images')->middleware('admin');
Route::get('/dashboard/places/remove-image/{id}', [DashboardPlaceController::class, 'removeImage'])->middleware('admin');
Route::post('/dashboard/places/add-images/{id}', [DashboardPlaceController::class, 'addImages'])->middleware('admin');
Route::delete('/deleteimage/{id}', [DashboardPlaceController::class, 'deleteimage'])->middleware('admin');
Route::delete('/dashboard/places/{id}', [DashboardPlaceController::class, 'destroy'])->middleware('admin');

Route::get('/dashboard/gallery-categories/checkSlug', [DashboardGalleryCategoryController::class, 'checkSlug']);
Route::resource('/dashboard/gallery-categories', DashboardGalleryCategoryController::class)->except(['show', 'edit', 'update'])->middleware('admin');
Route::get('/dashboard/galleries/checkSlug', [DashboardGalleryDetailController::class, 'checkSlug']);
Route::resource('/dashboard/galleries', DashboardGalleryDetailController::class)->except('show')->middleware('admin');
Route::get('/dashboard/galleries/delete/{id}', [DashboardGalleryDetailController::class, 'delete'])->middleware('admin');
Route::get('/dashboard/galleries/edit/{id}', [DashboardGalleryDetailController::class, 'edit'])->middleware('admin');

Route::resource('/dashboard/video', DashboardVideoController::class)->except('show')->middleware('admin');

Route::get('/dashboard/sliders/checkSlug', [DashboardSliderController::class, 'checkSlug']);
Route::resource('/dashboard/sliders', DashboardSliderController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/layanan', DashboardLayananController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/kategoriSertifikasi', KategoriSertifikasiController::class)->middleware('admin');
Route::get('/dashboard/kategoriSertifikasi/create', [KategoriSertifikasiController::class, 'create'])->middleware('admin');

Route::resource('/dashboard/facilities', DashboardFacilityController::class)->except('show')->middleware('admin');

Route::resource('/dashboard/lokers', DashboardLokerController::class)->middleware('admin');
Route::get('/dashboard/lokers/{loker:slug}', [DashboardLokerController::class, 'show'])->middleware('admin');
// Route::get('/dashboard/lokers/{loker:slug}/edit', [DashboardLokerController::class, 'edit'])->middleware('admin');

Route::resource('/dashboard/about', DashboardAboutController::class)->except('show')->middleware('admin');
Route::prefix('/dashboard/about/document/')->group(function () {
    Route::get('', [DashboardAboutController::class, 'showDocuments'])->middleware('admin');
    Route::get('/show/{id}', [DashboardAboutController::class, 'showDocument'])->middleware('admin');
    Route::get('create', [DashboardAboutController::class, 'createDocuments'])->middleware('admin');
    Route::post('store', [DashboardAboutController::class, 'storeDocument'])->middleware('admin');
    Route::get('{id}/edit', [DashboardAboutController::class, 'editDocument'])->middleware('admin');
    Route::put('update/{id}', [DashboardAboutController::class, 'updateDocument'])->middleware('admin');
    Route::put('{id}/delete', [DashboardAboutController::class, 'destroyDocument'])->middleware('admin');
});

Route::get('/dashboard/reviews/checkSlug', [DashboardReviewController::class, 'checkSlug']);
Route::resource('/dashboard/reviews', DashboardReviewController::class)->except('show')->middleware('admin');

Route::get('/dashboard/ads/checkSlug', [DashboardAdsController::class, 'checkSlug']);
Route::resource('/dashboard/ads', DashboardAdsController::class)->except('show')->middleware('admin');

Route::prefix('/dashboard/profile/')->group(function () {
    Route::get('edit', [DashboardProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
    Route::put('update', [DashboardProfileController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::get('password/edit', [DashboardUpdatePasswordController::class, 'edit'])->name('password.edit')->middleware('auth');
    Route::put('password/edit', [DashboardUpdatePasswordController::class, 'update'])->name('password.update')->middleware('auth');
});

Route::resource('/dashboard/staff', DashboardStaffController::class)->except('show')->middleware('admin');
Route::get('/dashboard/staff/{id}/resend-email', [DashboardStaffController::class, 'resend'])->middleware('admin');
Route::get('/dashboard/staff/forget-password', [DashboardStaffController::class, 'showForgetPasswordForm'])->middleware('admin')->name('forget.password.get');
Route::post('/dashboard/staff/forget-password', [DashboardStaffController::class, 'submitForgetPasswordForm'])->middleware('admin')->name('forget.password.post');

Route::post('/dashboard/resend', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

Route::get('/dashboard/customer-service/checkSlug', [DashboardCustomerServiceController::class, 'checkSlug']);
Route::resource('/dashboard/customer-service', DashboardCustomerServiceController::class)->except('show')->middleware('admin');
Route::get('generate-pdf', [PDFController::class, 'generatePendaftarKemnaker']);
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/need-verification', [VerificationController::class, 'notice'])->name('verification.notice');
Route::get('/email/verification-notification', [VerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ResetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// export pdf
Route::get('/kemnaker-excel', [ExportExcelController::class, 'export_kemnaker']);
Route::get('/bnsp-excel', [ExportExcelController::class, 'export_bnsp']);
Route::get('/softskill-excel', [ExportExcelController::class, 'export_softskill']);
Route::get('/lainnya-excel', [ExportExcelController::class, 'export_lainnya']);
Route::get('/inhouse-excel', [ExportExcelController::class, 'export_inhouse']);

// broken link fix
Route::get('/blog/{post:slug}', [PostController::class, 'show']);
