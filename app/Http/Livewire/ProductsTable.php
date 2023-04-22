<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Magasin;
use App\Models\Adresse;
use App\Models\Pays;
use App\Http\ProduitController;

class ProductsTable extends Component
{
    public string $search;
    public string $categoryName = "";
    public string $specialID = "";

    public $exploded_search;
    public $produits = [];
    
    public $adresses = [];

    public $pays = [];

    public function mount($search, $categoryName,$specialID)
    {
        $this->adresses = Adresse::select("*")
        ->join('magasin', 'magasin.idadresse', '=', 'adresse.idadresse')
        ->join('pays', 'pays.indicatiftelpays', '=', 'adresse.indicatiftelpays')
        ->get();
        
        $this->search = $search;
        $this->categoryName = $categoryName;
        $this->specialID = $specialID;
        $this->exploded_search = explode(" ",strtolower($this->search));
        $this->getRightSearch();
        // $this->searchShop();
    }


    public function getRightSearch()
    {
        if ($this->search != "")
        {
            $this->searchRequest();
        }
        if ($this->categoryName != "")
        {
            $this->searchCategory(); 
        }
        if ($this->specialID != "")
        {
            $this->searchSpecial(); 
        }
    }
    
    public function sortPrice(){
        $this->getRightSearch();
        $this->produits = $this->produits->sortBy('prixproduit');
    }

    
    public function sortPriceReverse(){
        $this->getRightSearch();
        $this->produits = $this->produits->sortByDesc('prixproduit');
    }

    public function displayByShop($id){
        $this->getRightSearch();
        $this->produits = $this->produits->filter(function($item)use($id){
            return $item->idmagasin == $id;
        })->values();
    }

    public function displayByCountry($idCountry){
        $this->getRightSearch();
        $this->produits = $this->produits->filter(function($item)use($idCountry){
            return $item->indicatiftelpays == $idCountry;
        })->values();

    }

    public function sortByShop(){
        $this->getRightSearch();
        $this->produits = $this->produits->sortBy('nommagasin');
    }

    public function searchCategory()
    {
        $this->produits = Produit::where('libellerayon',$this->categoryName)
        ->join('rayon', 'rayon.idrayon', '=', 'produit.idrayon')
        ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
        ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
        ->join('adresse', 'adresse.idadresse', '=', 'magasin.idadresse')
        ->orderBy('nomproduit')
        ->get();
        
    }

    public function searchSpecial()
    {
        $this->produits = Produit::where('idcategoriespecialeproduit',$this->specialID)
        ->join('appartient','appartient.refproduit','produit.refproduit')
        ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
        ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
        ->join('adresse', 'adresse.idadresse', '=', 'magasin.idadresse')
        ->orderBy('nomproduit')
        ->get();
    }

    public function searchRequest(){
        if(count($this->exploded_search) == 1)
        {
            $this->produits = Produit::select("*")
            ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
            ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
            ->join('adresse', 'adresse.idadresse', '=', 'magasin.idadresse')
            ->where(Produit::raw('lower(nomproduit)'),'LIKE','%'.$this->exploded_search[0].'%')
            ->orderBy('nomproduit')
            ->get();
        }
        else if(count($this->exploded_search) == 2){
            $this->produits = Produit::select("*")
            ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
            ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
            ->join('adresse', 'adresse.idadresse', '=', 'magasin.idadresse')
            ->where(Produit::raw('lower(nomproduit)'),'LIKE','%'.$this->exploded_search[0].'%')
            ->where(Produit::raw('lower(nomproduit)'),'LIKE','%'.$this->exploded_search[1].'%')
            ->orderBy('nomproduit')
            ->get();
        }
        else{
            $this->produits = Produit::select("*")
            ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
            ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
            ->join('adresse', 'adresse.idadresse', '=', 'magasin.idadresse')
            ->where(Produit::raw('lower(nomproduit)'),'LIKE','%'.$this->search.'%')
            ->orderBy('nomproduit')
            ->get();
        } 
    }

    public function render()
    {
        $this->adresses = Adresse::select("*")
        ->join('magasin', 'magasin.idadresse', '=', 'adresse.idadresse')->get();

        return view('livewire.products-table');
    }
}
////         return view('livewire.products-table',['produits',Produit::where('nomproduit','LIKE',"%{$this->search}%")]);
//Produit::where('nomproduit','LIKE',"%{$this->search}%")