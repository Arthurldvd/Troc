<?php

namespace App\Http\Controllers;
use App\Models\Produit;
use App\Models\Photo;
use App\Models\Adresse;

use Illuminate\Http\Request;

class ProduitController extends Controller
{

    public function searchProduct($search){
        return view('produits.searchPage',['search' => $search]);
     }

    public function showProduct($idProduct)
    {
        return view('produits.productPage',['idProduct' => $idProduct]);
    }

    public function showCategory($categoryName)
    {
        return view('produits.categoryPage',['categoryName' => $categoryName]);
    }
    public function showSpecial($specialID)
    {
        return view('produits.specialPage',['specialID' => $specialID]);
    }
    public function showFollowedProducts()
    {
        return view('produits.productsFollowed');
    }

    public function showCart()
    {
        return view('produits.cartPage');
    }

    public function buyProduct()
    {
        return view('produits.buyProducts');
    }
}