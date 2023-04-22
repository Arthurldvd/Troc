<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\ProductValidation;
use App\Http\Livewire\PdfController;
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
// route pour la page d'accueil

Route::get('/', function () {
    return view('accueil.accueil');
});

Route::get('/produitRecherche/{search}',[ProduitController::class,'searchProduct']);
Route::get('/afficheProduit/{idProduct}',[ProduitController::class,'showProduct']);
Route::get('/categorieRecherche/{categoryName}',[ProduitController::class,'showCategory']);
Route::get('/RechercheSpeciale/{specialId}',[ProduitController::class,'showSpecial']);
Route::get('/afficheContrat/{numerocontratdepotvente}', [ContratController::class], 'showContrat');


// Route::get('/Enregistrement',[ProduitController::class,'']);

Route::get('/Enregistrement', function () {
    return view('produits.addProductpage');
});
Route::get('/Panier',[ProduitController::class,'showCart']);

Route::get('/PaiementOK',function () {
    return view('livewire.paiement');
});
Route::get('/Aide',function () {
    return view('aide.aide');
});


Route::get('/Acheter',[ProduitController::class,'buyProduct']);

Route::get('/AttenteDeValidation',function(){
    return view('produits.productsvalidationpage');
});
Route::get('/ProduitsSuivis',[ProduitController::class,'showFollowedProducts']);


Route::get('/creation/add',[CreationController::class,'add']);
Route::post('/creation/save',[CreationController::class,'save']);

Route::post('post-login', [LoginController::class, 'authenticate'])->name('login.post'); 
Route::get('dashboard', [LoginController::class, 'dashboard']); 
Route::post('/creation/add', [LoginController::class, 'logout'])->name('logout.post'); 
Route::post('dashboard', [LoginController::class, 'update'])->name('update.post');
