<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Magasin;
use App\Models\Adresse;
use App\Models\Pays;

class ProductValidation extends Component
{
    public $products;

    public $name;
    public $description;
    public $price;
    public $qty;

    public function mount(){
        $this->getProducts();
    }

    public function goToShop($idProduct)
    {
        Produit::where('refproduit',$idProduct)->update(['statutproduit' => 'visible']);
    }

    public function dontGoToShop($idProduct)
    {
        Produit::where('refproduit',$idProduct)->update(['statutproduit' => 'invisible']);
    }

    public function getProducts()
    {
       $this->products = Produit::where('statutproduit','enattente')
                        ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
                        ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
                        ->join('adresse', 'adresse.idadresse', '=', 'magasin.idadresse')
                        ->get();
    }

    public function changes($idProduct)
    {
        if($this->name != null)
        {
            Produit::where('refproduit',$idProduct)->update(['nomproduit' => $this->name]);
        }
        if($this->description != null)
        {
            Produit::where('refproduit',$idProduct)->update(['descriptionproduit' => $this->description]);
        }
        if($this->price != null)
        {
            Produit::where('refproduit',$idProduct)->update(['prixproduit' => $this->price]);
        }
        if($this->qty != null)
        {
            Produit::where('refproduit',$idProduct)->update(['quantiteproduit' => $this->qty]);
        }

    }

    public function render()
    {
        $this->getProducts();
        return view('livewire.product-validation');
    }
}
