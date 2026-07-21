<?php
use App\Http\Controllers\ApiPesertaController;
use App\Http\Controllers\ApiDashboardPembayaranController;
use App\Http\Controllers\ApiDashboardBerkasController;
use App\Http\Controllers\ApiDashboardJadwalController;
use App\Http\Controllers\ApiDashboardPresensiController;

use App\Http\Controllers\ApiAbsensiController;
use App\Http\Controllers\ApiArtikelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiPopularController;
use App\Http\Controllers\ApiOngoingController;
use App\Http\Controllers\ApiCertificateController;
use App\Http\Controllers\ApiScheduleController;
use App\Http\Controllers\ApiBannerController;
use App\Http\Controllers\ApiKelasController;
use App\Http\Controllers\ApiLokerController;
use App\Http\Controllers\ApiPerusahaanController;
use App\Http\Controllers\ApiProfileController;
use App\Http\Controllers\ApiRegistrasiController;
use App\Http\Controllers\ApiSertifikasiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ApiUserCodeController;
use App\Http\Controllers\ApiKontakController;
use App\Http\Controllers\ApiSearchController;
use App\Http\Controllers\ApiHomeController;
use App\Http\Controllers\ApiPembayaranController;
use App\Http\Controllers\Auth\ApiGoogleLoginController;
use App\Http\Controllers\ApiBerkasController;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login'])->middleware('authenticated');
Route::post('loginGoogle', [ApiGoogleLoginController::class, 'loginGoogle'])->middleware('authenticated');
Route::post('findAccount', [ApiProfileController::class,'findAccount']);
Route::post('otpResetPassword', [ApiProfileController::class,'otpResetPassword']);
Route::post('resetPassword', [ApiProfileController::class,'resetPassword']);

Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [ResetPasswordController::class, 'reset']);
Route::post('email/resend', [VerificationController::class, 'resend'])->middleware('auth:api');

Route::post('checkOtp', [ApiUserCodeController::class, 'store'])->name('store');
Route::get('checkOtp/reset', [ApiUserCodeController::class, 'resend'])->name('resend');
Route::get('/users', [AuthController::class, 'index'])->name('index');

Route::get('otp', [ApiUserCodeController::class, 'index'])->name('index');

Route::group(['prefix'=>'admin','middleware'=>['jwt_auth','admin']], function(){
    Route::resource('peserta',ApiPesertaController::class);
    Route::resource('pembayaran',ApiDashboardPembayaranController::class);
    Route::resource('berkas', ApiDashboardBerkasController::class);
    Route::resource('presensi', ApiDashboardPresensiController::class);
    Route::resource('jadwal', ApiDashboardJadwalController::class);
    Route::get('/data', [ApiHomeController::class, 'data'])->name('data');
});

Route::group(['middleware'=>'jwt_auth'], function(){
    Route::get('notify', [ApiHomeController::class,'notify']);
    Route::get('notifyRead/{id}', [ApiHomeController::class,'markAsRead']);
    Route::get('notifyDisplay', [ApiHomeController::class,'show']);
    Route::get('logout', [LoginController::class, 'logout']);
    Route::get('profile', [ApiProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ApiProfileController::class, 'update'])->name('profile.update');
    Route::post('/verifyPassword', [ApiProfileController::class, 'oldPassword'])->name('profile.oldPassword');
    Route::get('/hubungi-kami',[ApiProfileController::class,'contact'])->name('profile.contact');
    Route::get('/slider', [ApiBannerController::class, 'index']);
    Route::get('/sertifikasi/sub-kategori', [ApiSertifikasiController::class, 'showSubKategori']);
    Route::get('/sertifikasi-kategori/{id}', [ApiSertifikasiController::class, 'showKategori']);
    Route::get('/sertifikasi/{id}', [ApiSertifikasiController::class, 'index']);
    Route::get('/sertifikasi/detail/{id}', [ApiSertifikasiController::class, 'show']);
    Route::get('/sertifikasi-popular', [ApiPopularController::class, 'index']);
    Route::get('/sertifikasi-ongoing', [ApiOngoingController::class, 'index']);
    Route::get('/sertifikasi',[ApiPopularController::class, 'trainings'] );
    Route::post('/sertifikat', [ApiCertificateController::class, 'index']);
    Route::get('/jadwal/{type}', [ApiScheduleController::class, 'index']);
    Route::get('/jadwal/program/{id}', [ApiScheduleController::class, 'show']);
    Route::post('/pencarian', [ApiSearchController::class, 'index']);
    Route::post('/pencarian/artikel', [ApiSearchController::class, 'pencarianArtikel']); 
    Route::post('/pencarian/loker', [ApiSearchController::class, 'pencarianLoker']);
});

Route::group(['prefix'=>'registrasi','middleware'=>'jwt_auth'], function(){
    Route::post('getKategori', [ApiRegistrasiController::class,'getKategori']);
    Route::post('pendaftaran-kelas-pribadi', [ApiRegistrasiController::class,'pendaftaranKelasPribadi'])->name('pelatihan.pendaftaranKelasPribadi');
    Route::post('pendaftaran-kelas-perusahaan', [ApiRegistrasiController::class,'pendaftaranKelasPerusahaan'])->name('pelatihan.pendaftaranKelasPerusahaan');
    Route::post('pembayaran', [ApiPembayaranController::class,'store'])->name('pembayaran.store');
    Route::post('uploadBerkas', [ApiRegistrasiController::class,'uploadBerkas'])->name('pelatihan.uploadBerkas');
    Route::get('informasi-peserta/{id}', [ApiRegistrasiController::class,'informasi'])->name('pelatihan.informasi');
    Route::get('getBerkas', [ApiRegistrasiController::class,'getBerkas'])->name('pelatihan.getBerkas');
});

Route::group(['prefix'=>'absensi','middleware'=>'jwt_auth'], function(){
    Route::post('fill-absensi', [ApiAbsensiController::class,'create']);
    Route::get('user', [ApiAbsensiController::class,'userAbsensi']);
});

Route::group(['prefix'=>'berkas','middleware'=>'jwt_auth'], function(){
    Route::post('uploadBerkas', [ApiBerkasController::class,'uploadBerkas'])->name('berkas.uploadBerkas');
    Route::get('getBerkas', [ApiBerkasController::class,'getBerkas'])->name('berkas.getBerkas');
    Route::get('/{id}', [ApiBerkasController::class,'show'])->name('berkas.show');
    Route::delete('/{id}', [ApiBerkasController::class,'delete'])->name('berkas.delete');
});

Route::group(['prefix'=>'pembayaran','middleware'=>'jwt_auth'], function(){
    Route::post('', [ApiPembayaranController::class,'store'])->name('pembayaran.store');
    Route::get('/{id}',[ApiPembayaranController::class,'show']);
});

Route::group(['prefix'=>'kelas', 'middleware'=>'jwt_auth'], function(){
    Route::get('saya',[ApiKelasController::class,'index']);
    Route::post('saya/filter',[ApiKelasController::class,'filterKelas']);
    Route::get('saya/{id}',[ApiKelasController::class,'show']);
});

Route::group(['prefix'=>'artikel', 'middleware'=>'jwt_auth'], function(){
    Route::get('/',[ApiArtikelController::class,'index']);
    Route::get('kategori/{id}',[ApiArtikelController::class,'kategori']);
    Route::get('detail/{id}',[ApiArtikelController::class,'show']);
});

Route::group(['prefix'=>'loker', 'middleware'=>'jwt_auth'], function(){
    Route::get('/',[ApiLokerController::class,'index']);
    Route::get('/{loker:slug}', [ApiLokerController::class, 'show']);
});

Route::group(['prefix'=>'contact'], function(){
    Route::get('/whatsapp',[ApiKontakController::class,'index']);
});
