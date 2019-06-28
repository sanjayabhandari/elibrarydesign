<?php
use App\Http\Controllers\FrontendController;

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

// Route::get('/', function () {
//     return view('welcome');
// Route::get('/login', function(){
//     return view('uploadVideo.submitVideo');
// });
// Route::get('/signup', function(){
//     return view('uploadVideo.signup');
// });
// });



//frontendroutes
Route::get('/', 'FrontendController@index');
Route::get('/category-{id}', 'FrontendController@allcategory')->name('category.subcategory');
Route::get('/showproductbycategory', 'FrontendController@showproduct');
Route::get('/bookdetail/{id}', 'FrontendController@showbook');
Route::get('/subcategorybookdetail/{id}', 'FrontendController@showsubcategoryproduct');
Route::get('/searchproduct', 'FrontendController@searchproduct');
Route::get('/blogdetail/{id}', 'FrontendController@blogdetail');
Route::get('/searchresults/{search}', 'FrontendController@searchresult');
Route::resource('review', 'ReviewController');
Route::post('readbook', 'FrontendController@readbook');


Route::get('/detail', function () {
    return (view('Detail/detail'));
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/newscategory/{id?}',function(){
return(view('news/news'));
});













// Route::get('/login', function(){
//     return view('uploadVideo.submitVideo');
// });
// Route::get('/signup', function(){
//     return view('uploadVideo.signup');
// });
Route::get('/allcategory', 'TestController@index');







Route::get('/subcategory', function () {
    return view('subcategory.subcategory');
});










Route::group(['middleware' => ['isadmin', 'auth']], function () {
    Route::get('admin/dashboard', function () {
        return view('backend.pages.dashboard');
    });
    Route::get('admin/category', function () {
        return view('backend.pages.settings.category.category');
    });
    Route::get('admin/category/create/{id?}', function () {
        return view('backend.pages.settings.category.create');
    });
    Route::get('admin/setting', function () {
        return view('backend.pages.settings.index');
    });
    Route::get('admin/author', function () {
        return view('backend.pages.settings.author.index');
    });
    Route::get('admin/author/create/{id?}', function () {
        return view('backend.pages.settings.author.create');
    });


    Route::get('admin/language', function () {
        return view('backend.pages.settings.language.index');
    });
    Route::get('admin/language/create/{id?}', function () {
        return view('backend.pages.settings.language.create');
    });
    Route::get('admin/mediatype', function () {
        return view('backend.pages.settings.mediatype.index');
    });
    Route::get('admin/mediatype/create/{id?}', function () {
        return view('backend.pages.settings.mediatype.create');
    });

    Route::get('admin/publisher', function () {
        return view('backend.pages.settings.publisher.index');
    });
    Route::get('admin/publisher/create/{id?}', function () {
        return view('backend.pages.settings.publisher.create');
    });
    Route::get('admin/product', function () {
        return view('backend.pages.settings.product.index');
    });
    Route::get('admin/product/create/{id?}', function () {
        return view('backend.pages.settings.product.create');
    });
    Route::get('admin/blog', function () {
        return view('backend.pages.blog.index');
    });
    Route::get('admin/blog/create/{id?}', function () {
        return view('backend.pages.blog.create');
    });

    // Route::get('/admin', 'HomeController@index')->name('home');
    Route::resource('category', 'CategoryController');
    route::get('category/{id}/delete', 'CategoryController@destroy');
    // route::get('category/{id}/restore','CategoryController@restore');


    Route::resource('/author', 'AuthorController');
    route::get('author/{id}/delete', 'AuthorController@destroy');

    // Route::resource('author', 'AuthorController');
    // route::get('author/{id}/delete', 'AuthorController@destroy');

    Route::resource('/publisher', 'PublisherController');
    route::get('publisher/{id}/delete', 'PublisherController@destroy');



    Route::resource('language', 'LanguageController');
    Route::get('language/{id}/delete', 'LanguageController@destroy');
    Route::get('/media', 'ProductController@media');

    // Route::resource('language', 'LanguageController');
    // route::get('language/{id}/delete', 'LanguageController@destroy');

    Route::resource('product', 'ProductController');
    route::get('product/{id}/delete', 'ProductController@destroy');


    Route::resource('blog', 'BlogController');
    route::get('blog/{id}/delete', 'BlogController@destroy');


    Route::resource('productfile', 'ProductfileController');
    route::get('productfile/{id}/delete', 'ProductfileController@destroy');
});
