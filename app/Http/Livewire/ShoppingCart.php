<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Achete;
use App\Models\Client;


class ShoppingCart extends Component
{
    public $cartMieuxList = [];
    public $products;
    public $sessionCart;
    public $price;
    public $cartValue;
    public $numberItem;

    public function mount()
    {
        if(!(session()->has('cart')))
        {
            session(['cart' => []]);
        }
        $this->sessionCart = session('cart');
        $this->request();

        $cart = session('cart');
        for ($i=0; $i < count($cart); $i++) {  // On boucle sur notre cart pour pouvoir mettre dans un CartMieux
            $cartMieux = new CartMieux();
            $cartMieux->id = $cart[$i][0];
            $cartMieux->quantity = $cart[$i][1];

            $currentProduit = Produit::where('refproduit', $cartMieux->id)->get()[0]; // on récupère le produit en cours.

            $cartMieux->name = $currentProduit->nomproduit;
            $cartMieux->unitPrice = $currentProduit->prixproduit;

            $this->cartMieuxList[] = $cartMieux;
        }

        $this->cartValue = $this->calculateOrderAmount();
        $this->numberItem = count($this->cartMieuxList);
    }

    public function calculateOrderAmount() {
        $total = 0;
        foreach ($this->cartMieuxList as $cartMieux) {
            $total += $cartMieux->computePrice(); // calcul du total
        }
        return $total;
    }

    

    public function request()
    {
        $this->products = Produit::WhereIn('produit.refproduit',array_map([$this, 'mapToId'], $this->sessionCart))// map appelle mapToId sur chaque élément de sessionCart et créer un nouveau tableau
        ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
        ->get(); 
    }

    public function setQty($index,$value)
    {
        $this->request();

        if($value < 1) // si qtt = 0 ou négatif on return
            return;
        else if ($value > $this->products[$index]->quantiteproduit) // si qtt > a la qtt disponible on return 
            return;
        $this->sessionCart[$index][1] = $value; // sinon on affecte la valeur dans le panier
        session()->pull('cart');
        session(['cart' => $this->sessionCart]);
    }

    public function mapToId($cartItem){
        return $cartItem[0]; // retourne l'id de cartItem
    }

    public function addOne($index){
        $this->setQty($index,$this->sessionCart[$index][1]+1); // on augmente la quantité 
        $this->price = $this->sessionCart[$index][1] * $this->products[$index]->prixproduit; // maj du prix
    }

    public function removeOne($index){
        $this->setQty($index,$this->sessionCart[$index][1]-1); // on baisse la quantité
        $this->price = $this->sessionCart[$index][1] * $this->products[$index]->prixproduit; // maj du prix
    }

    public function itemCount(){ // On compte le nombre d'items dans le panier
        $count = 0;
        foreach($this->sessionCart as $cartItem){
            $count += $cartItem[1];
        }
        return $count;
    }
   
    public function deleteProduct($index)
    {
        session()->pull('cart');
        unset($this->sessionCart[$index]);
        $this->sessionCart = array_values($this->sessionCart);
        session(['cart' => $this->sessionCart]);
        $this->request();
    }

    public function paymentSuccessful($clientID)
    {
        for ($i = 0; $i < $this->numberItem; $i++)
        {
            Achete::insert(['idclient' => $clientID, 'refproduit' => $this->sessionCart[$i][0], 'dateachat' => date('Y-m-d H:i:s')]);
            // retire un produit dans la base de données
            Produit::where('refproduit', $this->sessionCart[$i][0])->decrement('quantiteproduit', $this->sessionCart[$i][1]);
        }



        // vider le panier
        session()->pull('cart');
        $this->sessionCart = [];
        $this->request();

        // ajout de l'achat dans la base de données
        // foreach($this->sessionCart as $cartItem){
        //     Achete::insert(['idclient' => 1, 'refproduit' => $cartItem[0], 'dateachat' => date('Y-m-d H:i:s')]);
        // }


        // $cart = session('cart');
    }

    public function render()
    {
        return view('livewire.shopping-cart',['sessionCart'=>$this->sessionCart]);
    }
}

class CartMieux {
    public $id;
    public $quantity;
    public $name;
    public $unitPrice;

    public function computePrice() {
        return $this->quantity * $this->unitPrice;
    }
}