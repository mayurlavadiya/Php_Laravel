<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;

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
Route::get('/customer/view',[CustomerController::class,'view'])->name('customer.view'); 


?>