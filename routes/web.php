<?php

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

use App\Contract;
use App\User;


use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Valuestore\Valuestore;


/*Route::get('/', function () {

    return view('welcome');
});*/




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
Route::prefix('admin')->group(function (){
//app()->setLocale('en');
        Route::get('/', function () {
            return view('dashboard.index');
        });//->middleware('permission:create users');
        /*
        |--------------------------------------------------------------------------
        | Users Routes
        |--------------------------------------------------------------------------|
        */
        Route::resource('/users', 'dashboard\UserController');
        /*
       |--------------------------------------------------------------------------
       | Albums Routes
       |--------------------------------------------------------------------------|
       */
        Route::resource('/albums', 'dashboard\AlbumController');

        /*
       |--------------------------------------------------------------------------
       | Playlists Routes
       |--------------------------------------------------------------------------|
       */
        Route::resource('/playlists', 'dashboard\PlaylistController');

        /*
        |--------------------------------------------------------------------------
        | Videos Routes
        |--------------------------------------------------------------------------|
*/
        Route::resource('/videos', 'dashboard\VideoController');

        /*
        |--------------------------------------------------------------------------
        | Images Routes
        |--------------------------------------------------------------------------
        */

        Route::resource('/Images', 'dashboard\ImageController');
        Route::post('Images/delete1', 'dashboard\ImageController@destroyOfAlbum')->name('Images.delete');
        Route::post('Images/getAllImages1', 'dashboard\ImageController@getAllImagesOfAlbum')->name('Images.getAllImages');

        Route::post('Images/delete2', 'dashboard\ImageController@destroyOfProduct')->name('Images.destroyOfProduct');
        Route::post('Images/store', 'dashboard\ImageController@storeProductImages')->name('ImagesOfProducts.store');
        Route::post('Images/getAllImages2', 'dashboard\ImageController@getAllImagesOfProduct')->name('Images.getAllImagesOfProduct');
        /*
       |--------------------------------------------------------------------------
       | Roles Routes
       |--------------------------------------------------------------------------|
       */
        Route::resource('/roles', 'dashboard\RoleController');

        /*
       |--------------------------------------------------------------------------
       | categories Routes
       |--------------------------------------------------------------------------|
       */
        Route::resource('/categories', 'dashboard\CategoryController');

        /*
       |--------------------------------------------------------------------------
       | posts Routes
       |--------------------------------------------------------------------------|
       */
        Route::resource('/posts', 'dashboard\PostController');
        /*
        |--------------------------------------------------------------------------
        | comments Routes
        |--------------------------------------------------------------------------|
        */
        Route::delete('/comments/{comment}', 'dashboard\CommentController@destroy')->name('comment.delete');

        /*
       |--------------------------------------------------------------------------
       | Courses Routes
       |--------------------------------------------------------------------------|
       */
        Route::resource('/courses', 'dashboard\CourseController');

        /*
        |--------------------------------------------------------------------------
        | Contracts Routes
        |--------------------------------------------------------------------------|
        */
        Route::resource('/contracts', 'dashboard\ContractController');
        Route::get('pdf/{id}', function ($id) {
             $contract = Contract::find($id);
            $pdf = PDF::loadView('dashboard.contract.contractPdf', compact('contract'));

            return $pdf->stream('invoice.pdf');
         })->name('pdf');
/*
      route::get('store',function(){

          $file = file_get_contents(route('pdf',1)) ;
          $file->storeAs('public','teststestst.pdf');
            return "true";


        });*/

        /*
       |--------------------------------------------------------------------------
       | Services Routes
       |--------------------------------------------------------------------------|
       */
        Route::resource('/services', 'dashboard\ServiceController');
        /*
        |--------------------------------------------------------------------------
        | Sliders Routes
        |--------------------------------------------------------------------------|
        */
        Route::resource('/sliders', 'dashboard\SliderController');
        /*
       |--------------------------------------------------------------------------
       | Types Routes
       |--------------------------------------------------------------------------|
       */
        Route::resource('/types', 'dashboard\TypeController');
        /*
        |--------------------------------------------------------------------------
        | Products Routes
        |--------------------------------------------------------------------------|
        */
        Route::resource('/products', 'dashboard\ProductController');

        /*
        |--------------------------------------------------------------------------
        | Requests Routes
        |--------------------------------------------------------------------------|
        */
        Route::resource('/requests', 'dashboard\RequestController');

        /*
        |--------------------------------------------------------------------------
        | Clients Routes
        |--------------------------------------------------------------------------|
        */
        Route::resource('/clients','dashboard\ClientController');

        /*
        |--------------------------------------------------------------------------
        | Orders Routes
        |--------------------------------------------------------------------------|
        */
        Route::resource('/orders','dashboard\OrderController');

        /*
        |--------------------------------------------------------------------------
        | Sayings Routes
        |--------------------------------------------------------------------------|
        */
        Route::resource('/sayings','dashboard\SayingController');
        /*
        |--------------------------------------------------------------------------
        | SocialMedias Routes
        |--------------------------------------------------------------------------
        */

        Route::get('/socialMedias','dashboard\SocialMediaController@index');
        Route::put('/socialMedias/update','dashboard\SocialMediaController@update')->name('socialMedias.update');
        /*
       |--------------------------------------------------------------------------
       | settings Routes
       |--------------------------------------------------------------------------
       */

        Route::get('/settings','dashboard\SettingController@index');
        Route::put('/settings/update','dashboard\SettingController@update')->name('settings.update');

        /*
        |--------------------------------------------------------------------------
        | contact_us Routes
        |--------------------------------------------------------------------------
        */

        Route::get('/contact_us','dashboard\ContactController@index');
        Route::put('/contact_us/update','dashboard\ContactController@update')->name('contact_us.update');

        /*
        |--------------------------------------------------------------------------
        | usage Routes
        |--------------------------------------------------------------------------
        */

        Route::get('/usage','dashboard\UsageController@index');
        Route::put('/usage/update','dashboard\UsageController@update')->name('usage.update');

    });
});




//Route::get('/posts/{post}', 'PostController@edit');

Route::get('/permissions', function () {


    $role = Role::create(['name'=>'admin']);


      $permission = new Permission();
      $permission->where('id','>',0)->delete();

      $permission->create(['name'=>'create users']);
      $permission->create(['name'=>'show users']);
      $permission->create(['name'=>'edit users']);
      $permission->create(['name'=>'delete users']);

      $permission->create(['name'=>'create roles']);
      $permission->create(['name'=>'show roles']);
      $permission->create(['name'=>'edit roles']);
      $permission->create(['name'=>'delete roles']);

     $permission->create(['name'=>'create albums']);
     $permission->create(['name'=>'show albums']);
     $permission->create(['name'=>'edit albums']);
     $permission->create(['name'=>'delete albums']);

      $permission->create(['name'=>'create categories']);
      $permission->create(['name'=>'show categories']);
      $permission->create(['name'=>'edit categories']);
      $permission->create(['name'=>'delete categories']);

      $permission->create(['name'=>'create posts']);
      $permission->create(['name'=>'show posts']);
      $permission->create(['name'=>'edit posts']);
      $permission->create(['name'=>'delete posts']);

      $permission->create(['name'=>'delete comments']);

     $permission->create(['name'=>'create courses']);
     $permission->create(['name'=>'show courses']);
     $permission->create(['name'=>'edit courses']);
     $permission->create(['name'=>'delete courses']);

     $permission->create(['name'=>'create playlists']);
     $permission->create(['name'=>'show playlists']);
     $permission->create(['name'=>'edit playlists']);
     $permission->create(['name'=>'delete playlists']);

    $permission->create(['name'=>'create videos']);
    $permission->create(['name'=>'show videos']);
    $permission->create(['name'=>'edit videos']);
    $permission->create(['name'=>'delete videos']);

    $permission->create(['name'=>'create services']);
    $permission->create(['name'=>'show services']);
    $permission->create(['name'=>'edit services']);
    $permission->create(['name'=>'delete services']);

    $permission->create(['name'=>'create contracts']);
    $permission->create(['name'=>'show contracts']);
    $permission->create(['name'=>'edit contracts']);
    $permission->create(['name'=>'delete contracts']);

    $permission->create(['name'=>'create sliders']);
    $permission->create(['name'=>'show sliders']);
    $permission->create(['name'=>'edit sliders']);
    $permission->create(['name'=>'delete sliders']);

        $permission->create(['name'=>'show home_page']);
        $permission->create(['name'=>'edit home_page']);

    $permission->create(['name'=>'create types']);
    $permission->create(['name'=>'show types']);
    $permission->create(['name'=>'edit types']);
    $permission->create(['name'=>'delete types']);

    $permission->create(['name'=>'create products']);
    $permission->create(['name'=>'show products']);
    $permission->create(['name'=>'edit products']);
    $permission->create(['name'=>'delete products']);


    $permission->create(['name'=>'show sayings']);
    $permission->create(['name'=>'delete sayings']);

    $permission->create(['name'=>'create clients']);
    $permission->create(['name'=>'show clients']);
    $permission->create(['name'=>'edit clients']);
    $permission->create(['name'=>'delete clients']);

    $permission->create(['name'=>'show orders']);
    $permission->create(['name'=>'delete orders']);

    $permission->create(['name'=>'show requests']);
    $permission->create(['name'=>'delete requests']);

    $permission->create(['name'=>'show settings']);
    $permission->create(['name'=>'edit settings']);



    $permission->create(['name'=>'show socialMedias']);
    $permission->create(['name'=>'edit socialMedias']);

    $permission->create(['name'=>'show contact_us']);
    $permission->create(['name'=>'edit contact_us']);

    $permission->create(['name'=>'show usages']);
    $permission->create(['name'=>'edit usages']);





      $role->givePermissionTo([
          'create users' , 'show users' , 'edit users' , 'delete users' ,
          'create roles' , 'show roles' , 'edit roles' , 'delete roles' ,
          'create albums' , 'show albums' , 'edit albums' , 'delete albums' ,
          'create categories' , 'show categories' , 'edit categories' , 'delete categories' ,
          'create posts' , 'show posts' , 'edit posts' , 'delete posts' ,
          'delete comments' ,
          'create courses' , 'show courses' , 'edit courses' , 'delete courses' ,
          'create playlists' , 'show playlists' , 'edit playlists' , 'delete playlists' ,
          'create videos' , 'show videos' , 'edit videos' , 'delete videos' ,
          'create services' , 'show services' , 'edit services' , 'delete services' ,
          'create contracts' , 'show contracts' , 'edit contracts' , 'delete contracts' ,
          'create sliders' , 'show sliders' , 'edit sliders' , 'delete sliders' ,
          'show home_page' , 'edit home_page' ,
          'create types' , 'show types' , 'edit types' , 'delete types' ,
          'create products' , 'show products' , 'edit products' , 'delete products' ,
          'create clients' , 'show clients' , 'edit clients' , 'delete clients' ,
          'show sayings' , 'delete sayings' ,
          'show orders' ,  'delete orders' ,
          'show requests' ,  'delete requests' ,
          'show settings' , 'edit settings' ,
          'show socialMedias' , 'edit socialMedias' ,
          'show contact_us' , 'edit contact_us' ,
          'show usages' , 'edit usages' ,
      ]);

      return $permission->all();

});

Route::get('/migrate', function () {

   Artisan::call('migrate:fresh');
    return true;
});


Route::get('/clear', function () {

    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');

    return "true";
});

Route::get('/storage', function () {

    Artisan::call('storage:link');

    return "true";
});


/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/


Route::post('/Contacts/sendMail','dashboard\ContactController@sendMail')->name('Contacts.sendMail');


Route::get('/posts/','front\PostController@index');
Route::get('/posts/{slug}','front\PostController@show');

Route::post('/comments/store','front\CommentController@store')->name('comments.store')->middleware('auth:client','client.verified');
Route::delete('/comments/destroy/{comment}','front\CommentController@destroy')->name('comments.destroy')->middleware('auth:client','client.verified');

Route::get('/categories/{slug}','front\CategoryController@show');


Route::get('/courses/','front\CourseController@index');
Route::get('/courses/{slug}','front\CourseController@show')->middleware('auth:client','client.verified');

Route::get('/playlists/','front\PlaylistController@index');//->middleware('auth:client');
Route::get('/playlists/{slug}','front\PlaylistController@show')->middleware('auth:client','client.verified');

Route::get('/services/','front\ServiceController@index');
Route::get('/services/{slug}','front\ServiceController@show');

Route::get('/order/{service}','front\OrdereController@index')->middleware('auth:client','client.verified');
Route::post('/orders/store','dashboard\OrderController@store')->name('orders.store')->middleware('auth:client','client.verified');
Route::get('/services/{slug}','front\ServiceController@show');

Route::get('/products/','front\ProductController@index');//->middleware('client');
Route::get('/products/{slug}','front\ProductController@show');

Route::post('/request','front\RequestController@store')->name('request.store')->middleware('auth:client','client.verified');

Route::get('/types/{slug}','front\TypeController@show');


Route::get('/contact_us','front\ContactController@index');

Route::get('/usage','front\UsageController@index');

/*
Route::get('/client','Home\ClientHomeController@index');
Route::post('/registerClient','dashboard\ClientController@create')->name('registerClient');
Route::get('/profile','dashboard\ClientController@show')->name('registerClient');*/
Route::get('email/verify', 'Auth\VerificationController@show')->name('client.verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('/login/client', 'Auth\LoginController@showClientLoginForm');
Route::post('/login/client', 'Auth\LoginController@clientLogin');
Route::get('/register/client', 'Auth\RegisterController@showClientRegisterForm');
Route::post('/register/client', 'Auth\RegisterController@createClient');
Route::view('/home', 'home')->middleware('auth');
Route::get('client/edit/{name}', 'front\ClientController@edit')->name('client.edit')->middleware('auth:client','client.verified');
Route::put('client/{id}/', 'front\ClientController@update')->name('client.update')->middleware('auth:client','client.verified');
Route::get('/clients', 'front\ClientController@index');
Route::get('/client/{id}/{name}', 'front\ClientController@show')->name('client');


Route::get('/sayings/','front\SayingController@index');
Route::post('/saying/store/{client}','front\SayingController@store')->name('saying.store')->middleware('auth:client','client.verified');
Route::get('/saying/delete','front\SayingController@destroy')->name('saying.delete')->middleware('auth:client','client.verified');
Route::get('/sayings/{slug}','front\SayingController@show');

Route::get('/calc',function (){
    return view('front.calc');
});




Route::get('pdf/{id}', function ($id) {
    $contract = Contract::find($id);
    $pdf = PDF::loadView('dashboard.contract.contractPdf', compact('contract'));
    return $pdf->stream('invoice.pdf');
})->name('pdf')->middleware('auth:client','client.verified');



Route::get('/change_lang', function () {
    $Valuestore = Valuestore::make(storage_path('app/settings.json'));

       if(App::getLocale()=="ar")
       {
           $Valuestore->put('lang','en');
       }else{
           $Valuestore->put('lang','ar');
       }

Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    
return redirect()->back();
});



 

Route::get('/', 'front\HomeController@index');



