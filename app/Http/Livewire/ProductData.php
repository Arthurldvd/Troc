<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produit;
use App\Models\Photo;
use App\Models\Jour;
use App\Models\A;
use App\Models\EstFormeDe;
use App\Models\Horaires;
use App\Models\DemiJournee;
use App\Models\Ouvre_le;
use App\Models\Avisproduit;
use App\Models\Deposeavis;
use App\Models\Signalement;
use App\Models\Achete;

class ProductData extends Component
{

    public string $idProduct;
    public $product =[];
    public $favoritesList =[];
    public $idMagasin;
    public $qty = 1;
    public $error = false;
    public $add = false;
    public $price = 0;
    public $similarProducts;
    public $name;
    public $description;
    public $link;
    public $day;
    public $openingHour;
    public $closingHour;

    public $opinion;
    public $allOpinions;
    public $aComment;
    public $aReport;
    public $allReports;

    public $acquired;
    public $errorShop;


    public function mount($idProduct){
        $this->idProduct = $idProduct;
        $this->product = Produit::where('refproduit',$this->idProduct)
        ->join('rayon', 'rayon.idrayon', '=', 'produit.idrayon')
        ->join('client', 'client.idclient', '=', 'produit.idclient')
        ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
        ->join('dimensions', 'dimensions.iddimensions', '=', 'produit.iddimensions')
        ->join('longueurdimensions', 'dimensions.iddimensions', '=', 'longueurdimensions.iddimensions')
        ->join('profondeurdimensions', 'dimensions.iddimensions', '=', 'profondeurdimensions.iddimensions')
        ->join('adresse','magasin.idadresse','=','adresse.idadresse')
        ->get();

        $this->allOpinions = Avisproduit::where('refproduit',$this->idProduct)
        ->leftjoin('depose_avis', 'avisproduit.idavisproduit', '=', 'depose_avis.idavisproduit')
        ->leftjoin('client','client.idclient',"=",'depose_avis.idclient')
        ->get();

        

        // $this->allOpinions = Deposeavis::where('avisproduit.refproduit',$this->idProduct)
        // ->join('avisproduit', 'avisproduit.idavisproduit', '=', 'depose_avis.idavisproduit')
        // ->get();
        // dd($this->allOpinions);


        
        $this->idMagasin = $this->product[0]->idmagasin;
        $this->getSimilarProducts();
        if(!(session()->has('cart')))
        {
            session(['cart' => []]);
        }
    }
    public function test()
    {
        session()->pull('cart');
    }
   
    public function changePrice()
    {
        Produit::where('refproduit',$this->idProduct)->update(['prixproduit' => $this->price]);
    }

    public function removeFromSale()
    {
        Produit::where('refproduit',$this->idProduct)->update(['statutproduit' => 'invisible']);
    }

    public function putOnSale()
    {
        Produit::where('refproduit',$this->idProduct)->update(['statutproduit' => 'visible']);
    }

    public function addToCart()
    {

        if(session('cart') != null) // vérification si le produit est du même magasin que les autres produits du panier
        {
            $cart = session('cart');
            $refproduit = $cart[0][0];
            $cartProduct = Produit::where('refproduit',$refproduit)
            ->join('magasin','magasin.idmagasin','=','produit.idmagasin')
            ->get();

            if($cartProduct[0]->idmagasin != $this->product[0]->idmagasin)
            {
                $this->error = true;
                $this->errorShop = true;
                return;
            }
        }

        if ($this->qty> $this->product[0]->quantiteproduit){
            $this->error = true;
            return;
        }
            
        else if($this->qty <= 0)
        {
            $this->error = true;
            return;
        }
        $sessionCart = session('cart');

        foreach($sessionCart as $item)  // vérificication si le produit est déjà dans le panier
        {
            if($item[0] == $this->idProduct)
                return;
        }

        $this->add = true;
        $this->error = false;
        session()->push('cart',[$this->idProduct,$this->qty]);
       
    }



    public function showFavoritesList($idClient)
    {
        $this->favoritesList = A::where('a.idclient',$idClient)
        ->join('listefavorisclient', 'listefavorisclient.idlistefavorisclient', '=', 'a.idlistefavorisclient')
        ->join('client','client.idclient','a.idclient')
        ->get();
    }

    public function sendToFavorites($idList)
    {
        EstFormeDe::insert(['refproduit' => $this->idProduct,'idlistefavorisclient' => $idList]);
    }

    public function getSimilarProducts(){
        $firstWord = explode(" ",strtolower(Produit::where('refproduit',$this->idProduct)->first(['nomproduit'])->nomproduit));
        
        $this->similarProducts = Produit::select("*")
        ->join('photo', 'photo.refproduit', '=', 'produit.refproduit')
        ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
        ->join('adresse', 'adresse.idadresse', '=', 'magasin.idadresse')
        ->where(Produit::raw('lower(nomproduit)'),'LIKE','%'.$firstWord[0].'%')
        ->where('produit.refproduit','!=',$this->idProduct)
        ->orderBy('nomproduit')
        ->get();
        // explode(" ",strtolower($this->search));
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
        if($this->link != null)
        {
            Photo::where('refproduit',$idProduct)->update(['lienimage' => $this->link]);
        }
    }

    public function scheduleChanges()
    {
        $exploded_day = explode("|",$this->day);
        $idDay = $exploded_day[1];
        $getIdSemidDay = $exploded_day[1];
        dd($idDay,$getIdSemidDay);

        if($this->day != null)
        {
            Horaires::insert(['horaireouverture' => $this->openingHour,'horairefermeture' => $this->closingHour]);
            $idTime=Horaires::where('horairefermeture',$this->closingHour)->first(['idhoraires'])->idhoraires;
            DemiJournee::insert(['libelledemijournee' => 'jour','idhoraires' => $idTime]); // faire une séquence pour les id
            $idSemiDay = DemiJournee::where('idhoraires',$idTime)->first(['iddemijournee'])->iddemijournee;
            Ouvre_le::where('idjour',$idDay)
                     ->where('iddemijournee',$getIdSemidDay)
                     ->delete();
            Ouvre_le::insert(['idjour' => $idDay,'iddemijournee' => $idSemiDay]);
        }

    }

    public function productOpinion($UserID)
    {
        
       $acquiredProducts = Achete::where('achete.refproduit',$this->idProduct)
         ->where('achete.idclient',$UserID)
         ->join('produit','produit.refproduit','achete.refproduit')
         ->join('client','client.idclient','achete.idclient')
         ->get();
         if ($acquiredProducts->isEmpty())
         {
             $this->acquired = false;
             return;
         }
         else
         {
            $idavis = Avisproduit::insertGetId(['refproduit' => $this->idProduct,'contenuavisproduit' => $this->opinion,'dateavisproduit' => now(),'statut' => 'visible','idclient'=>$UserID],'idavisproduit');
            DeposeAvis::insert(['idclient' => $UserID,'idavisproduit' => $idavis]);
            $this->mount($this->idProduct);
            $this->product = Produit::where('refproduit',$this->idProduct)->get();
            $this->mount($this->idProduct);
            $this->acquired = true;
         }


    }
    public function deleteOpinion($idOpinion)
    {
        $report = Signalement::where('idavisproduit',$idOpinion)->delete();
        // if($report)
        // {
        //     Signalement::where('idavisproduit',$idOpinion)->delete();
        // }
        Deposeavis::where('idavisproduit',$idOpinion)->delete();
        Avisproduit::where('idavisproduit',$idOpinion)->delete();
        $this->mount($this->idProduct);
    }

    public function reportOpinion($idOpinion)
    {
        Signalement::insert(['idavisproduit' => $idOpinion,'libellesignalement' => $this->aReport,'refproduit' => $this->idProduct]);
        $this->mount($this->idProduct);
    }

    public function comment($idOpinion){
        Avisproduit::where('idavisproduit',$idOpinion)->update(['commentaire' => $this->aComment]);
        $this->mount($this->idProduct);
    }

    public function render()
    {
        
        $this->product = Produit::where('refproduit',$this->idProduct)
        ->join('rayon', 'rayon.idrayon', '=', 'produit.idrayon')
        ->join('client', 'client.idclient', '=', 'produit.idclient')
        ->join('magasin', 'magasin.idmagasin', '=', 'produit.idmagasin')
        ->join('dimensions', 'dimensions.iddimensions', '=', 'produit.iddimensions')
        ->join('adresse','magasin.idadresse','=','adresse.idadresse')
        ->get();

        return view('livewire.product-data',['product' => $this->product,
        'photo' => Photo::where('refproduit',$this->idProduct)
        -> get(),
        
        'days' => Jour::where('magasin.idmagasin',$this->idMagasin)
        ->join('est_ouvert','est_ouvert.idjour','=','jour.idjour')
        ->join('magasin', 'magasin.idmagasin', '=', 'est_ouvert.idmagasin')
        ->join('ouvre_le','ouvre_le.idjour','=','jour.idjour')
        ->join('demijournee','demijournee.iddemijournee','=','ouvre_le.iddemijournee')
        ->join('horaires','demijournee.idhoraires','=','horaires.idhoraires')
        ->get()
        ]);
    }
}
