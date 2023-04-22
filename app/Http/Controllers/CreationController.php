<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;
use App\Models\Adresse;
use App\Models\Habite;


class CreationController extends Controller
{
    public function add(){
        return view('creation.add.add', []);
    }

    public function save(Request $request)
    {
        
        $date = date_create($request->input ("datenaissanceclient"));
        $reeldate = date_format($date,'Y/m/d');
         $user = new Client;
         $user->timestamps = false;
         $user->nomclient = $request->input("nomclient");
         $user->prenomclient = $request->input("prenomclient");
         $user->datenaissanceclient = $reeldate;
         $user->emailclient = $request->input ("emailclient");
         $user->numtelfixeclient = $request->input ("numtelfixeclient");
         $user->numtelmobileclient = $request->input ("numtelmobileclient");
         $user->civilite = $request->input ("civilite");
         $user->statut= $request->input ("statut");
         $user->password = Hash::make($request->input ("password")) ;
         $password = $request->input("password");
         $passwordRegex = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{12,}$/';
         if (!preg_match($passwordRegex, $password)) {
            return redirect()->back()->with('success', 'Le mot de passe doit contenir au moins 1 chiffre, 1 majuscule, 1 minuscule et 1 caractère spécial et être de longueur minimum caractères');
        }
         $user->save();

        $adresse = new Adresse;
        $adresse->timestamps = false;
        $adresse->indicatiftelpays = 33  ;
        $adresse->adresseville = $request->input("adresseville");
        $adresse->adressecodepostal = $request->input("adressecodepostal");
        $adresse->adresserue = $request->input("adresserue");
        $adresse->adressenumero = $request->input("adressenumero");
        $adresse->save();

        $id = Adresse::select('idadresse')->orderby('idadresse','desc')->take(1)->get();
        $idcli = Client::select('idclient')->orderby('idclient','desc')->take(1)->get();
        $idcli1 = substr($idcli,13,-2);
        $id1 = substr($id,14,-2);
        $hab = new Habite;
        $hab->timestamps = false;
        $hab->idclient = $idcli1;
        $hab->idadresse = $id1;
        $hab->save();

       

         return redirect()->back()->with('success','Votre compte a bien été créé');
    } 
    



}