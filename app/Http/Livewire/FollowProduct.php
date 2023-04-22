<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Listefavorisclient;
use App\Models\A;
use App\Models\EstFormeDe;
use App\Models\Produit;
use App\Models\Auth;
class FollowProduct extends Component
{
    public string $listName ='';
    public $favoritesList =[];
    public $products =[];
    public string $idList;
    // auth()->user()->idclient
    // récupérer la bonne liste de l'utilisateur connecté
    // faire une requête sur les items présents dans cette liste


    public function mount(){
        $this->requestList();
    }

    public function requestList(){

        if(auth()->check())
        {
        $this->favoritesList = A::where('a.idclient',auth()->user()->idclient)
        ->join('listefavorisclient', 'listefavorisclient.idlistefavorisclient', '=', 'a.idlistefavorisclient')
        ->join('client','client.idclient','a.idclient')
        ->get();
        }
    }

    public function AddList($idClient)
    {
        $this->requestList();
        if($this->listName === '')
            return;
        $idFavori= ListefavorisClient::insertGetId(['libellelistefavorisclient' => $this->listName],'idlistefavorisclient');
        A::insert(['idclient' => $idClient , 'idlistefavorisclient' => $idFavori]);
    }

   public function deleteProduct($refProduit){
       EstFormeDe::where('refproduit',$refProduit)
                      ->Where('idlistefavorisclient',$this->idList)
                      ->delete();
       $this->getProducts($this->idList);
   }

    public function getProducts($idListe){
        $this->requestList();
        $this->products = Listefavorisclient::where('listefavorisclient.idlistefavorisclient', $idListe)
                          ->join('est_formee_de','est_formee_de.idlistefavorisclient','listefavorisclient.idlistefavorisclient')
                          ->join('produit','est_formee_de.refproduit','produit.refproduit')
                          ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
                          ->get();
        $this->idList = $idListe;
    }




    public function render()
    {
        return view('livewire.follow-product');
    }
}
