<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\Client;
use App\Models\Habite;
use App\Models\Adresse;


class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'emailclient' => ['required'],
            'password' => ['required'],
        ]);
        
        unset($credentials["password"]);
        $credentials["password"] = $request->password;

     
       if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');

        }
        else
        {
            return back()->withErrors([
                'emailclient' => 'Mauvais identifiant ou mot de passe.',]);
        }
    }
    public function dashboard()
    {
      
        if(Auth::check())
        {
    
            return view('dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return view('/creation/add/add');
    }


    function deleteData(){
        $user = Client::find(Auth::user()->idclient);
        $user->nomclient = null;
        $user->prenomclient = null;
        $user->datenaissanceclient = null;
        $user->emailclient = null;
        $user->numtelfixeclient = null;
        $user->numtelmobileclient = null;
        $user->civilite = null;
        $user->statut= null;
        $user->update();
        return redirect()->back()->with('success','Votre compte a bien été anonymisé');
    }

    public function update(Request $request)
    {  
            
            $user = Client::find(Auth::user()->idclient);

            $date = date_create($request->input ("datenaissanceclient"));
            $reeldate = date_format($date,'Y/m/d');

            $user->timestamps = false;
            $user->nomclient = $request->input("nomclient");
            $user->prenomclient = $request->input("prenomclient");
            $user->datenaissanceclient = $reeldate;
            $user->emailclient = $request->input ("emailclient");
            $user->numtelfixeclient = $request->input ("numtelfixeclient");
            $user->numtelmobileclient = $request->input ("numtelmobileclient");
            $user->civilite = $request->input ("civilite");
            $user->statut= $request->input ("statut");
            $user->update();

            $idadresse = Adresse::select('adresse.idadresse')->join('habite','adresse.idadresse','=','habite.idadresse')->where('idclient' , Auth::user()->idclient)->get();
            $idaddr = substr($idadresse,14,-2);
            $adresse = Adresse::find($idaddr);

            $adresse->timestamps = false;
            $adresse->indicatiftelpays = 33  ;
            $adresse->adresseville = $request->input("adresseville");
            $adresse->adressecodepostal = $request->input("adressecodepostal");
            $adresse->adresserue = $request->input("adresserue");
            $adresse->adressenumero = $request->input("adressenumero");
            $adresse->update();

            return redirect()->back()->with('success','Votre compte a bien été modifier');
            
           
        
    }
}