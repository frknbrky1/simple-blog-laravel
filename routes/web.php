<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/
Route::get('site-bakimda',function () {
    return view('front.offline');
});

Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function() {
    Route::get('giris', 'App\Http\Controllers\Back\AuthController@login')->name('login');
    Route::post('giris', 'App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function() {
    Route::get('panel', 'App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    //MAKALE ROUTE
    Route::get('/makaleler/silinenler','App\Http\Controllers\Back\ArticleController@trashed')->name('trashed.article');
    Route::resource('makaleler','App\Http\Controllers\Back\ArticleController');
    Route::get('/switch','App\Http\Controllers\Back\ArticleController@switch')->name('switch');
    Route::get('/deletearticle/{id}','App\Http\Controllers\Back\ArticleController@delete')->name('delete.article');
    Route::get('/harddeletearticle/{id}','App\Http\Controllers\Back\ArticleController@hardDelete')->name('hard.delete.article');
    Route::get('/recoverarticle/{id}','App\Http\Controllers\Back\ArticleController@recover')->name('recover.article');
    //KATEGORİ ROUTE
    Route::get('/kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
    Route::post('/kategoriler/create','App\Http\Controllers\Back\CategoryController@create')->name('category.create');
    Route::post('/kategoriler/update','App\Http\Controllers\Back\CategoryController@update')->name('category.update');
    Route::post('/kategoriler/delete','App\Http\Controllers\Back\CategoryController@delete')->name('category.delete');
    Route::get('/kategori/status','App\Http\Controllers\Back\CategoryController@switch')->name('category.switch');
    Route::get('/kategori/getData','App\Http\Controllers\Back\CategoryController@getData')->name('category.getdata');
    //SAYFA ROUTE
    Route::get('/sayfalar','App\Http\Controllers\Back\PageController@index')->name('page.index');
    Route::get('/sayfalar/olustur','App\Http\Controllers\Back\PageController@create')->name('page.create');
    Route::get('/sayfalar/guncelle/{id}','App\Http\Controllers\Back\PageController@update')->name('page.edit');
    Route::post('/sayfalar/guncelle/{id}','App\Http\Controllers\Back\PageController@updatePost')->name('page.edit.post');
    Route::post('/sayfalar/olustur','App\Http\Controllers\Back\PageController@post')->name('page.create.post');
    Route::get('/sayfa/switch','App\Http\Controllers\Back\PageController@switch')->name('page.switch');
    Route::get('/sayfa/sil/{id}','App\Http\Controllers\Back\PageController@delete')->name('page.delete');
    Route::get('/sayfa/siralama','App\Http\Controllers\Back\PageController@orders')->name('page.orders');
    //AYARLAR ROUTE
    Route::get('/ayarlar', 'App\Http\Controllers\Back\ConfigController@index')->name('config.index');
    Route::post('/ayarlar/update', 'App\Http\Controllers\Back\ConfigController@update')->name('config.update');
    Route::get('/ayarlar/deleteLogo','App\Http\Controllers\Back\ConfigController@deleteLogo')->name('config.deleteLogo');
    Route::get('/ayarlar/deleteFavicon','App\Http\Controllers\Back\ConfigController@deleteFavicon')->name('config.deleteFavicon');
    //MESAJLAR ROUTE
    Route::get('/mesajlar','App\Http\Controllers\Back\ContactController@index')->name('contact.index');
    Route::get('/mesajlar/goruntule/{id}','App\Http\Controllers\Back\ContactController@read')->name('contact.read');
    Route::get('/deletemessage/{id}','App\Http\Controllers\Back\ContactController@delete')->name('delete.contact');
    //KULLANICI ROUTE
    Route::get('/kullanicilar','App\Http\Controllers\Back\AdminController@index')->name('user.index');
    Route::get('/kullanicilar/olustur','App\Http\Controllers\Back\AdminController@create')->name('user.create');
    Route::post('/kullanicilar/olustur','App\Http\Controllers\Back\AdminController@post')->name('user.create.post');
    Route::get('/kullanicilar/sil/{id}','App\Http\Controllers\Back\AdminController@delete')->name('user.delete');
    Route::get('/kullanicilar/yetki','App\Http\Controllers\Back\AdminController@authority')->name('user.authority');
    Route::get('/kullanicilar/switch','App\Http\Controllers\Back\AdminController@switch')->name('user.switch');
    //ADMİN ROUTE
    Route::get('/guncelle/{id}','App\Http\Controllers\Back\AdminController@update')->name('admin.edit');
    Route::post('/guncelle/{id}','App\Http\Controllers\Back\AdminController@updatePost')->name('admin.edit.post');
    Route::get('cikis', 'App\Http\Controllers\Back\AuthController@logout')->name('logout');
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

/*Route::get('/', function () {
    return view('front/homepage');
});*/

//Route::get('/', 'Front\Homepage@index');

Route::get('/', 'App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('sayfa', 'App\Http\Controllers\Front\Homepage@index');
Route::get('/iletisim', 'App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletisim', 'App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::get('/kategori/{category}', 'App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}', 'App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}', 'App\Http\Controllers\Front\Homepage@page')->name('page');

