<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\WebGuard;

use Illuminate\Http\Request;


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

// GET METHOD : URL mate
// Route::get('/demo', function(){ // Route class chhe get method chhe
//     echo "Hello World";
// });

// POST METHOD : data store mate
// Route::post('/test', function(){ // Route class chhe post method chhe
//     echo "Route Testing";
// });

// Route::get('/demo', function(){
//     return view('demo');
// });

// GET K POST Koi b method thi leva mate
// Route::any('/test', function(){
//     echo "Route Testing by any....";
// });

// PUT METHOD :
// Route::put('users/{/id}',function($id){
// });

// PATCH METHOD :
// Route::patch();

// DELETE METHOD :
// Route::delete();

// Route::get('/{name?}',function($name = null){
//     $demo ="<h3>Tutorial-1</h3>";
//     $data = compact('name','demo'); // data URL mathi fatch karva mate compact use thay....
//         return view('1_home')->with($data);
// });


// Route::get('/', function(){
//     return view('layouts/home');
//  });

// Route::get('/about', function(){
//     return view('about');
//  });

// controller ni help thi redirect krva page pr
Route::get('/', [DemoController::class,'index']); // Democontroller ma index name na class ni madad thi home vada page ma jase...

// controller ni help thi redirect krva page pr - 2nd method
Route::get('/about','App\Http\Controllers\DemoController@about'); // akhi namespace btavo to j

//Single Action controller thi route krva mate
Route::get('/course',SingleActionController::class);

//Resource controller - readymade routes and resources which can be predefinned at a controller making time
Route::resource('photo',PhotoController::class);

// Form routes mate
Route::get('/register',[RegistrationController::class,'index']);
Route::post('/register',[RegistrationController::class,'register']); // data insert mate

//table and database
// Route::get('/customer', function(){
//      $customers = Customers::all();
//      echo "<pre>";
//      print_r($customers->toArray());
// });

//Insert Query to DB
Route::get('/', [DemoController::class,'index'])->name('home');
Route::get('/customer',[CustomerController::class,'index'])->name('customer.add');
Route::post('/customer',[CustomerController::class,'store']);
Route::get('/customer/delete/{id}', [CustomerController::class,'delete'])->name('customer.delete'); // id ne hit krva mate id add kryu
Route::get('/customer/edit/{id}', [CustomerController::class,'edit'])->name('customer.edit'); // id ne hit krva mate id add kryu
Route::post('/customer/edit/{id}', [CustomerController::class,'edit'])->name('customer.edit'); // id ne hit krva mate id add kryu
//update data mate
Route::post('/customer/update/{id}', [CustomerController::class,'update'])->name('customer.update'); // id ne hit krva mate id add kryu
Route::get('/customer/view',[CustomerController::class,'view'])->name('customer.view');
Route::get('/customer/trash',[CustomerController::class,'trash']);
Route::get('/customer/restore/{id}', [CustomerController::class,'restore'])->name('customer.restore');
Route::get('/customer/forcedelete/{id}', [CustomerController::class,'forcedelete'])->name('customer.forcedelete'); // id ne hit krva mate id add kryu

//session
Route::get('get-all-session',function(){
    $session = session()->all(); // session mathi bdho data retry krva mate global functon
    p($session);
});

//session ma potani rite value moklva mate
Route::get('set-session',function(Request $request){
    $request->session()->put('user-name','Mayur');
    $request->session()->put('user-id','12345');
    return redirect('get-all-session');
});

//delete data using session
Route::get('destroy-session', function(){
    session()->forget('user-name'); // 1st method alag alag value mate
    session()->forget('user-id');
    // session()->forget(['user-name','user-id']);    ---- 2nd method - eksathe

    return redirect('get-all-session');
});


// Laravel Route Grouping
// Route::group(['prefix' =>'/customer'],function () {
//     Route::get('/',[CustomerController::class,'index'])->name('customer.add');
//     Route::post('/',[CustomerController::class,'store']);
//     Route::get('delete/{id}', [CustomerController::class,'delete'])->name('customer.delete'); // id ne hit krva mate id add kryu
//     Route::get('edit/{id}', [CustomerController::class,'edit'])->name('customer.edit'); // id ne hit krva mate id add kryu
//     Route::post('edit/{id}', [CustomerController::class,'edit'])->name('customer.edit'); // id ne hit krva mate id add kryu
//     Route::post('update/{id}', [CustomerController::class,'update'])->name('customer.update'); // id ne hit krva mate id add kryu
//     Route::get('view',[CustomerController::class,'view'])->name('customer.view');
//     Route::get('trash',[CustomerController::class,'trash']);
//     Route::get('restore/{id}', [CustomerController::class,'restore'])->name('customer.restore');
//     Route::get('forcedelete/{id}', [CustomerController::class,'forcedelete'])->name('customer.forcedelete'); // id ne hit krva mate id add kryu
// });

// Route::get('/data',[IndexController::class,'index'])->middleware('guard');
// Route::get('/group',[IndexController::class,'group'])->middleware('guard');

Route::get('/data',[IndexController::class,'index']);
Route::get('/group',[IndexController::class,'group']);

Route::get('/profile',function(){
    return "Welcome to Mayur coding";
});

Route::get('/no-access', function(){
    echo "You are not authorised to login...!";
    die;
});

?>

