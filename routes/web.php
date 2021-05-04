<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\cardcontroller;
use App\Http\Controllers\skillcontroller;
use App\Http\Controllers\socialcontroller;
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




Route::view('/send-mail','email.emailverify');
Auth::routes();

/* Route::get('not-allowed',function(){
	return view('errors.500');
}); */

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
 */
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
/* Route::group(['middleware' =>['auth','adminmiddleware','Subscription','permissionauth']], function () { */
Route::group(['middleware' =>['auth','adminmiddleware','permissionauth']], function () {
	//product
	Route::post('create_product', [ProductController::class,'create_product']);
	Route::post('tmpimage', [ProductController::class,'tmpimage']);
	Route::get('product', [ProductController::class,'productlist']);
	Route::get('productadd',[ProductController::class,'productadd'])->name('addproduct');
	Route::post('update_product',[ProductController::class,'update_product']);
	Route::get('deleteproduct/{id}',[ProductController::class,'deleteproduct'])->name('deleteproduct');
	Route::get('productedit/{id}',[ProductController::class,'productedit'])->name('editproduct');
	Route::post('deletesideimage',[ProductController::class,'deletesideimage']);
	
	//testimonials
	Route::view('addtestimonials','pages.Testimonials.addtestimonials')->name('addtestimonials');
	Route::post('create_testimonials',[HomeController::class,'create_testimonials']);
	Route::post('update_testimonials',[HomeController::class,'update_testimonials']);
	Route::get('testimonialslist',[HomeController::class,'testimonialslist']);
	Route::get('testimonialedit/{id}',[HomeController::class,'testimonialedit'])->name('edittestimonials');
	Route::get('deletetestimonials/{id}',[HomeController::class,'deletetestimonials'])->name('deletetestimonials');
	//services
	Route::view('addservices','pages.services.addservices')->name('addservices');;
	Route::post('create_services',[HomeController::class,'create_services']);
	Route::post('update_services',[HomeController::class,'update_services']);
	Route::get('serviceslist',[HomeController::class,'serviceslist']);
	Route::get('servicesedit/{id}',[HomeController::class,'servicesedit'])->name('editservices');
	Route::get('deleteservices/{id}',[HomeController::class,'deleteservices'])->name('deleteservices');

	//abouts
	Route::view('addabouts','pages.abouts.addabouts')->name('addabout');
	Route::post('create_abouts',[HomeController::class,'create_abouts'])->name('addabout');
	Route::post('update_abouts',[HomeController::class,'update_abouts']);
	Route::get('aboutslist',[HomeController::class,'aboutslist']);
	Route::get('aboutsedit/{id}',[HomeController::class,'aboutsedit'])->name('editabout');
	Route::get('deleteabouts/{id}',[HomeController::class,'deleteabouts'])->name('deleteabout');
	
	//category
	Route::post('addmaincategory', [categoryController::class,'addmaincategory']);
	Route::post('addsubcategory', [categoryController::class,'addsubcategory']);
	Route::get('addcategory',[categoryController::class,'addcategory']);
	Route::get('maincategorylist',[categoryController::class,'maincategorylist']);
	Route::get('viewsubcategory/{id}',[categoryController::class,'viewsubcategory']);
	Route::get('deletemaincategory/{id}',[categoryController::class,'deletemaincategory']);
	Route::get('deleteservices/{id}',[HomeController::class,'deleteservices']);

	//skills
	Route::get('/addskill',[skillcontroller::class,'addskill']);
	Route::get('/skill_list',[skillcontroller::class,'skill_list']);
	Route::post('/addnewskill',[skillcontroller::class,'addnewskill']);
	Route::post('/userskills',[skillcontroller::class,'userskill']);
	Route::get('editskill/{id}',[skillcontroller::class,'editskill']);
	Route::post('updateskill/{id}',[skillcontroller::class,'updateskill']);

	//social

	Route::view('/addsociallink','pages.sociallinks.addsociallinks');
	Route::post('/addsocial',[socialcontroller::class,'addsocial']);
	Route::get('/sociallinklist',[socialcontroller::class,'sociallinklist']);

	//Route::get('subcategorylist',[categoryController::class,'subcategorylist']);
	
	//superadmin
	
});
Route::group(['middleware' =>'auth'], function () {
	Route::get('/all_Subscription_plan',[UserController::class,'Subscription_plan']);
	Route::get('/select_plan/{id}',[UserController::class,'select_plan']);
	Route::post('payment',[UserController::class,'initiate']);
	Route::post('pay',[UserController::class,'pay']);
	Route::get('profile/setting', ['as' => 'profile.setting', 'uses' => 'App\Http\Controllers\ProfileController@setting']);
	Route::post('profile/updatesetting', ['as' => 'profile.updatesetting', 'uses' => 'App\Http\Controllers\ProfileController@updatesetting']);
	Route::view('profile/editpassword','profile.editpassword');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::post('profile', ['as' => 'profile.socialupdate', 'uses' => 'App\Http\Controllers\ProfileController@socialupdate']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	
});
Route::group(['middleware' => ['auth','superadminmiddleware']], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::post('permisstions/{id}',[UserController::class,'setpermission']);
	Route::view('/Subscription_plan','users.Create_Subscription_plan');
	Route::post('/add_Subscription_plan',[UserController::class,'add_Subscription_plan']);
	Route::get('/planlist',[UserController::class,'planlist']);
	Route::get('/editplan/{id}',[UserController::class,'editplan']);
	Route::post('/update_plan',[UserController::class,'add_Subscription_plan']);
	
});

Route::get('/{username}',[cardcontroller::class,'usercard']);	


