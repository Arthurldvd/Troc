<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Magasin;
use App\Models\Produit;
use App\Models\Rayon;
use App\Models\Dimensions;
use App\Models\ContratDepotVente;
use App\Models\Deposant;
use App\Models\Photo;
use App\Models\Profondeurdimensions;
use App\Models\Longueurdimensions;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;




class AddProduct extends Component
{
    public $shops;
    public $departments;

    public $productName;
    public $productPrice;
    public $productQty;
    public $productDescription;
    public $idClient;
    public $shopName;
    public $date;
    public $departmentName;
    public $lenght;
    public $height;
    public $imageLink;
    public $length;
    public $depth;    
    
    public function mount()
    {
        $this->visibility = "visible";
        $this->shopName ="Troc Annecy";
        $this->departmentName ="Meubles";

        $this->date = date('Y-m-d');

        $this->shops = Magasin::all();
        $this->departments = Rayon::all();
    }

    public function addProduct()
    {

        
        

        $deposantID = Deposant::where('idclient', $this->idClient)->first(['iddeposant'])->iddeposant;
        $shopID = Magasin::where("nommagasin", $this->shopName)->first(['idmagasin'])->idmagasin;
        $departmentID = Rayon::where("libellerayon",$this->departmentName)->first(['idrayon'])->idrayon;
        $idDimensions = Dimensions::insertGetId(['largeurdimensions' => $this->lenght,'hauteurdimensions' => $this->height],'iddimensions');
        $idContrat= ContratDepotVente::insertGetId(['prixmaxobjet' => $this->productPrice +20,'prixminobjet' => $this->productPrice - 20],'numerocontratdepotvente');

        if(empty($this->depth))
        {
            Profondeurdimensions::insert(['largeurdimensions'=>$this->lenght, 'hauteurdimensions'=> $this->height,'profondeurproduit'=> null ,'iddimensions'=> $idDimensions]);
        }
        else
        {
            Profondeurdimensions::insert(['largeurdimensions'=>$this->lenght, 'hauteurdimensions'=> $this->height,'profondeurproduit'=> $this->depth,'iddimensions'=> $idDimensions]);
        }
        if(empty($this->length))
        {
            Longueurdimensions::insert(['largeurdimensions'=>$this->lenght, 'hauteurdimensions'=> $this->height,'longueurproduit'=> null ,'iddimensions'=> $idDimensions]);
        }
        else
        {
            ProfLongueurdimensionsondeur::insert(['largeurdimensions'=>$this->lenght, 'hauteurdimensions'=> $this->height,'longueurproduit'=> $this->length,'iddimensions'=> $idDimensions]);
        }

        Produit::insert(['numerocontratdepotvente' => $idContrat,'idmagasin' => $shopID,'idclient' => $this->idClient,
        'iddeposant' => $deposantID,'iddimensions' => $idDimensions,'idrayon'=> $departmentID,'nomproduit' => $this->productName,
        'descriptionproduit' => $this->productDescription,'quantiteproduit' =>	$this->productQty,'prixproduit'=> $this->productPrice,'prixsolde' => $this->productPrice -10,
        'datedepotproduit'=> $this->date,'statutproduit'=> 'enattente']);

        $productID = Produit::where('descriptionproduit',$this->productDescription)->first(['refproduit'])->refproduit;

        if(!empty($this->imageLink))
        {
            Photo::insert(['lienimage'=> $this->imageLink,'refproduit' => $productID]);
        }
       
    }

    public function getPdf()
    {
        // return response()->streamDownload(function () {
        //     $pdf = App::make('dompdf.wrapper');
        //     $pdf->loadHTML('test');
        //     echo $pdf->stream();
        // }, 'test.pdf');

            return response()->streamDownload(function () {
            $pdf = Pdf::loadView('pdftest');
            $pdf->download();
            // echo $pdf->stream();
        }, 'test.pdf');

    }


    public function render()
    {
        return view('livewire.add-product');
    }
}
