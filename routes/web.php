<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\PaymentController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::group(['middleware' => 'auth'], function () {

    //Profile Student
    Route::get('/student',[\App\Http\Controllers\StudentController::class,'index'])->name('student');
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    Route::get('/student/{student}/edit',[\App\Http\Controllers\StudentController::class,'edit'])->name('student.edit');
    Route::put('/students/{student}',[\App\Http\Controllers\StudentController::class,'studentprofile'])
        ->name('student.profile');
    Route::get('schools/{student}/edit', [\App\Http\Controllers\StudentController::class,'editsekolah'])
        ->name('editsekolah');
    Route::put('/schools/{student}',[\App\Http\Controllers\StudentController::class,'updatesekolah'])
        ->name('updatesekolah');
    Route::get('parents/{student}/edit', [\App\Http\Controllers\StudentController::class,'editparent'])
        ->name('editparent');
    Route::put('/parents/{student}',[\App\Http\Controllers\StudentController::class,'updateparent'])
        ->name('updateparent');
    Route::get('photos/{student}/edit', [\App\Http\Controllers\StudentController::class,'editphoto'])
        ->name('editphoto');
    Route::put('/photos/{student}',[\App\Http\Controllers\StudentController::class,'uploadphoto'])
        ->name('uploadphoto');
    Route::post('/prestasi/{student}',[\App\Http\Controllers\StudentController::class,'addprestasi'])
        ->name('addprestasi');
    Route::get('/prestasi/{student}/edit',[\App\Http\Controllers\StudentController::class,'prestasi'])
        ->name('prestasi');
    Route::PUT('prestasi/{item}', [\App\Http\Controllers\StudentController::class,'updateprestasi'])
        ->name('updateprestasi');
    Route::Delete('prestasi/{item}', [\App\Http\Controllers\StudentController::class,'deleteprestasi'])
        ->name('deleteprestasi');
    Route::get('/verifikasisiswa/{student}',[\App\Http\Controllers\StudentController::class,'verifikasisiswa'])
        ->name('verifikasisiswa');
    Route::PUT('confirm/{student}', [\App\Http\Controllers\StudentController::class,'confirm'])
        ->name('confirm');
    Route::get('/confirmall', [\App\Http\Controllers\StudentController::class,'confirmall'])
        ->name('confirmall');

    //PRINT
    Route::get('printkartu/{student}',[\App\Http\Controllers\PrintController::class,'printkartu'])
        ->name('printkartu');
    Route::get('printformulir/{student}',[\App\Http\Controllers\PrintFormulirController::class,'printformulir'])
        ->name('printformulir');
    Route::get('kwitansi/{item}',[\App\Http\Controllers\PrintKwitansiController::class,'kwitansi'])
        ->name('kwitansi');
    //PAYMENT STUDENT
    Route::get('/payments/{student}/edit',[\App\Http\Controllers\PaymentController::class,'index'])
        ->name('payments');
    Route::PUT('/addpayment/{student}',[\App\Http\Controllers\PaymentController::class,'create'])
        ->name('addpayment');
    Route::post('/editbayar/{payment}',[\App\Http\Controllers\PaymentController::class,'update'])
        ->name('editbayar');
    Route::PUT('/updatebayar/{item}',[\App\Http\Controllers\PaymentController::class,'updatebayar'])
        ->name('updatebayar');
    Route::Delete('payment/{item}', [\App\Http\Controllers\PaymentController::class,'hapusbayar'])
        ->name('hapusbayar');
    Route::put('sendwa/{item}', [\App\Http\Controllers\PaymentController::class,'sendwa'])
        ->name('sendwa');




    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/admin', [\App\Http\Controllers\AdminController::class,'index'])->name('admin');



    Route::resource('semesters', \App\Http\Controllers\SemesterController::class);

    //DASHBOARD
    Route::get('dashboard',[\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    //DASHBOARD CALON SISWA
    Route::resource('student', StudentController::class);
    Route::get('/abort',[StudentController::class, 'abort'])->name('abort');
    Route::get('/belumverifikasi',[StudentController::class, 'belumverifikasi'])->name('belumverifikasi');
    //Payment Calon Siswa
    Route::get('/vp',[\App\Http\Controllers\Admin\PaymentController::class,'vp'])->name('vp');
    Route::get('/du',[\App\Http\Controllers\Admin\PaymentController::class,'du'])->name('du');
    Route::get('/tp',[\App\Http\Controllers\Admin\PaymentController::class,'tp'])->name('tp');
    Route::get('/allpayment',[\App\Http\Controllers\Admin\PaymentController::class,'allpayment'])
        ->name('allpayment');
    Route::get('/tambahpembayaran',[PaymentController::class,'tambahpembayaran'])
        ->name('tambahpembayaran');
    Route::PUT('/verifikasipayment/{item}',[PaymentController::class,'verifikasipayment'])
        ->name('verifikasipayment');
    Route::put('/storebayar',[PaymentController::class,'storebayar'])->name('storebayar');
    //TEST AKADEMIK
    Route::controller(\App\Http\Controllers\TestController::class)->group(function (){
        Route::get('pesertatest','index')->name('pesertatest');
        Route::get('lulustest','lulustest')->name('lulustest');
        Route::get('mundur', 'mundur')->name('mundur');
        Route::get('tdklulustest','tdklulustest')->name('tdklulustest');
        Route::get('print','print')->name('print');
        Route::put('lulus/{item}','lulus')->name('lulus');
        Route::put('tdklulus/{item}','tdklulus')->name('tdklulus');
        Route::put('delete/{item}','delete')->name('test.delete');
    });
    Route::post('/setgel',[\App\Http\Controllers\Admin\SettingController::class,'setgel'])->name('setgel');
    //User Management
    Route::get('/users', [\App\Http\Controllers\UserController::class,'index'])->name('users');
    Route::put('destroy/{user}',[\App\Http\Controllers\UserController::class,'destroy'])->name('destroy');
    Route::post('/createuser',[\App\Http\Controllers\UserController::class,'create'])->name('createuser');
    Route::post('/updateuser/{user}',[\App\Http\Controllers\UserController::class,'update'])->name('updateuser');
    Route::get('editpass/{id}',[\App\Http\Controllers\UserController::class,'editpass'])->name('editpass');
    Route::put('changepass/{user}',[\App\Http\Controllers\UserController::class,'changepass'])->name('changepass');
    //setting Whatsapp
    Route::controller(\App\Http\Controllers\WhatsappController::class)->group(function () {
         Route::get('/whatsapp','index')->name('whatsapp.index');
         Route::post('/whatsappstore','store')->name('wa.store');
         Route::post('/whatsapupdate/{whatsapp}','update')->name('wa.update');
         Route::PUT('/whatsappstore/{whatsapp}','destroy')->name('whatsapp.destroy');
     });
});

Route::get('testwa',[\App\Http\Controllers\TestWaController::class,'test'])->name('test');

