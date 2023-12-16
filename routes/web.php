<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',('LandingController@index'));
Route::get('/login',('AuthController@index'));
Route::post('loginProses',('AuthController@loginProses'));
Route::get('logout',('AuthController@logout'));
Route::get('/register',('AuthController@register'));
Route::post('registerProses',('AuthController@registerProses'));
Route::get('forgot-password',('AuthController@lupaPassword'));
Route::post('forgotProses',('AuthController@lupaProses'));

Route::middleware(['login'])->group(function () {

    Route::middleware(['Ketua'])->group(function () {
        // Route::resource('ketua/dashboard', ('Ketua\DashboardController'));
        Route::resource('ketua/ajukan-masuk',('Ketua\AjukanSuratController'));
        Route::resource('ketua/surat-all',('Ketua\SuratAllController'));
        Route::get('ketua/template-surat/{id}/download', 'Ketua\TemplateSuratController@download')->name('ketua.template-surat.download');
        Route::get('ketua/template-surat/', 'Ketua\TemplateSuratController@index')->name('ketua.template-surat.index');
        Route::delete('ketua/template-surat/{id}/destroy', 'Ketua\TemplateSuratController@destroy')->name('ketua.template-surat.destroy');
        Route::get('ketua/PDF/{id}','Ketua\PDFController@index');
        // {{ route('ketua.ajukansurat.tolak', ['id' => $p->id]) }}
        Route::resource('ketua/ajukan-surat/tolak/','Ketua\AjukanSuratController');
        Route::get('ketua/PDF/{id}/download', 'Ketua\PDFController@download')->name('ketua.pdf.download');

        Route::resource('ketua/rev-dashboard', ('Ketua\DashboardController'));
        Route::get('ketua/ajukan-surat/tolak/{id}',('Ketua\AjukanSuratTolakController@tolak'));
    });Route::put('ketua/ajukan-surat/tolak/{id}', ('Ketua\AjukanSuratTolakController@update'))->name('ketua.ajukan-surat.tolak.update');

    Route::middleware(['Sekretaris'])->group(function () {
        // Route::resource('sekretaris/dashboard', ('Sekretaris\SekretarisController'));
        // Route::resource('sekretaris/template-surat',('Sekretaris\TemplateSuratController'));
        // Route::get('sekretaris/template-surat/{id}/download', 'Sekretaris\TemplateSuratController@download')->name('sekretaris.template-surat.download');
        // Route::get('sekretaris/template-surat/', 'Sekretaris\TemplateSuratController@index')->name('sekretaris.template-surat.index');
        Route::delete('sekretaris/template-surat/{id}/destroy', 'Sekretaris\TemplateSuratController@destroy')->name('sekretaris.template-surat.destroy');

        // Route::resource('sekretaris/surat-masuk', ('Sekretaris\AjukanSuratController'));
        Route::resource('sekretaris/pengajuan-surat', ('Sekretaris\AjukanSuratController'));

        // rev 
        Route::resource('sekretaris/rev-dashboard', ('Sekretaris\RevSekretarisController')); 
        Route::resource('sekretaris/rev-surat-masuk', ('Sekretaris\RevAjukanSuratController'));  
        Route::resource('sekretaris/rev-surat-masuk-tolak', ('Sekretaris\RevAjukanTolakController')); 
        Route::get('sekretaris/surat/{id}/download', 'Sekretaris\RevAjukanSuratController@download')->name('sekretaris.surat.download');
        Route::get('sekretaris/rev-PDF/{id}','Sekretaris\PDFController@index');
        Route::resource('sekretaris/rev-template-surat',('Sekretaris\RevTemplateSuratController'));
        Route::get('sekretaris/rev-template-surat/{id}/download', 'Sekretaris\RevTemplateSuratController@download')->name('sekretaris.template-surat.download');
        Route::get('sekretaris/rev-template-surat/', 'Sekretaris\RevTemplateSuratController@index')->name('sekretaris.template-surat.index');
        Route::get('sekretaris/rev-status-surat','Sekretaris\StatusSuratController@index');
        Route::get('sekretaris/status-surat/{id}',('Sekretaris\StatusSuratController@show'));
    });

    Route::middleware(['Anggota'])->group(function () {
        // Route::resource('anggota/dashboard', ('Anggota\DashboardController'));
        // Route::resource('anggota/ajukan-surat', ('Anggota\AjukanSuratController'));
        // Route::resource('anggota/template-surat', ('Anggota\TemplateSuratController'));
        // Route::get('anggota/template-surat/{id}/download', 'Anggota\TemplateSuratController@download')->name('anggota.template-surat.download');
        // Route::get('anggpta/template-surat/', 'Anggota\TemplateSuratController@index')->name('anggota.template-surat.index');
        Route::delete('anggota/template-surat/{id}/destroy', 'Anggota\TemplateSuratController@destroy')->name('anggota.template-surat.destroy');

        Route::get('anggota/ajukan-surat/{id}/download','Anggota\AjukanSuratController@download')->name('anggota.ajukan-surat.download');
        Route::delete('anggota/ajukan-surat/{id}/destroy','Anggota\AjukanSuratController@destroy')->name('anggota.ajukan-surat.destroy');
        // Route::get('anggota/ajukan-surat/','Anggota\AjukanSuratController@index')->name('anggota.ajukan-surat.index');

        // rev
        Route::resource('anggota/rev-dashboard',('Anggota\RevDashboardController'));
        Route::resource('anggota/rev-ajukan-surat',('Anggota\RevAjukanSuratController'));
        Route::resource('anggota/rev-template-surat', ('Anggota\RevTemplateSuratController'));
        Route::get('anggota/rev-template-surat/{id}/download', 'Anggota\RevTemplateSuratController@download')->name('anggota.rev-template-surat.download');
    });

});
