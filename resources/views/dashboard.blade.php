@extends('layout.layout')
  
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('/css/dashboard.css') }}"/>

<script type="text/javascript"> 
function bascule(id) 
{ 
	if (document.getElementById(id).style.visibility == "hidden")
			document.getElementById(id).style.visibility = "visible"; 
	else	document.getElementById(id).style.visibility = "hidden"; 
} 

</script> 
    
<h2 class= "titre">Votre compte: </h2>

<?php
use App\Models\Adresse;

$adresse = Adresse::select('*')->join('habite','adresse.idadresse','=','habite.idadresse')->where('idclient' , Auth::user()->idclient)->get();

$ville = substr($adresse,55,-91);
$postal = substr($adresse,82,-63);
$rue = substr($adresse,103,-38);
$num = substr($adresse,131,-18);


?>
<div class="bg">
    <div>
        <h3>Vos données personnelles</h3>
        <ul>
            <li>Votre nom : <b> {{mb_strtoupper(Auth::user()->nomclient);}} </b> </li>
            <li>Votre prenom : <b> {{ucfirst(Auth::user()->prenomclient);}} </b></li>
            <li>Vous êtes un(e) <b> {{Auth::user()->civilite}} </b> </li>
            <li>Vous êtes un(e) <b> {{Auth::user()->statut}} </b> </li>
            <li>Votre numéro mobile est le <b> {{chunk_split(0 . Auth::user()->numtelmobileclient, 2, " ");}}</b> </li>
            <li>Votre numéro fixe est le <b> {{chunk_split(0 . Auth::user()->numtelfixeclient, 2, " ");}}</b> </li>
            <li>Votre adresse mail est <b> {{Auth::user()->emailclient}}</b> </li>
            <li> Votre adresse :  {{$adresse[0]->adressenumero ." ". $adresse[0]->adresserue." ,".$adresse[0]->adresseville." ".$adresse[0]->adressecodepostal	}}</li>
            <!-- <li>Votre date de naissance : {{Auth::user()->datenaissanceclient}}</li> -->
        </ul>

        
    </div>
    {{-- <form  method="post" action="{{route('deleteData.post')}}">
    <button type = "submit" class="btnsave btn-primary btn t">Supprimer mes données</button><br>
    @csrf 
    </form> --}}
    <br>
    <br>
    <br>
    <br>
    <div>
        <h3>Votre Adresse domicile</h3>
        <ul>
            <!-- use adresse table who has link with user -->

    </div>
    
    <form action="{{route('logout.post')}}" method="post" class = "t">
        @csrf
        <button class="btnsave btn-primary btn" >Se déconnecter</button>
    </form>

    <form action="" method = "post" class = "t">
        @csrf
        <button class="btnsave btn-primary btn" >Anonymiser</button>
        <p class="helpModal" data-toggle="modal" data-target="#AideAnon" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AideAnon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide a l'anonymation du compte</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Attention : Après avoir anonymisé votre compte, il n'y a pas de retour en arrière. <br>
                          Les données concernant vos données personnelles seront supprimées de notre base de données.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <button type = "button" class="btnsave btn-primary btn t" onclick="bascule('modifier')">Modifier</button>
    <p data-toggle="modal" data-target="#AideModif" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AideModif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide a la modification du compte</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Ce bouton permet de modifier les données de votre compte afin de les mettre à jour.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div> <br> &nbsp
    <div id="modifier" style = "visibility:hidden" >
        <form  method="post" action="{{route('update.post')}}" class=" champ" >
            @csrf
            <label >Selectionner le genre</label> <label class="obligatoire">*</label> <br>
            <div class="form-check form-check-inline">
                <input type="radio" id="homme" name="civilite" value="Homme" class="form-check-input radio" required>
                <label for="homme" class="form-check-label">Homme</label><br>
            </div>

            <div class="form-check form-check-inline">
                <input type="radio" id="femme" name="civilite" value="Femme" class="form-check-input radio" required >
                <label for="femmme" class="form-check-label">Femme</label><br>
            </div> <br>

            <label>Votre statut</label> <label class="obligatoire">*</label>  <br>
            <div class="form-check form-check-inline">
                <input type="radio" id="particulier" name="statut" value="Particulier" class="form-check-input radio" required >
                <label for="particulier" class="form-check-label">Particulier</label><br>
            </div> <br> 

            <div class="form-check form-check-inline">
                <input type="radio" id="professionnel" name="statut" value="Professionnel" class="form-check-input radio" required >
                <label for="femmme" class="form-check-label">Professionnel</label><br>
            </div> <br>

            <label for="nom" class="form-label">Nom</label> <label class="obligatoire">*</label> 
            <input type="text" name="nomclient"  class="form-control" id="nom" value = "{{Auth::user()->nomclient}}" required >
            <br>

            <label for="prenom">Prénom</label> <label class="obligatoire">*</label> 
            <input type="text" name="prenomclient"  class="form-control" id="prenom" value = "{{Auth::user()->prenomclient}}" required>
            <br>

            <label for="date">Votre date de naissance</label> <label class="obligatoire">*</label> 
            <input type="date" name="datenaissanceclient"  class="form-control" id="date" value="{{Auth::user()->datenaissanceclient}}" required>
            <br>

            <label for="mail">Votre email</label> <label class="obligatoire">*</label> 
            <input type="email" name="emailclient"  class="form-control" id="mail" value = "{{Auth::user()->emailclient}}"  required>
            <small id="emailHelp" class="form-text text-muted">Entrer un format valide ex: exemple@gmail.com</small> <br>
            <br>

            <label for="fixe">Votre fixe</label> <label class="obligatoire">*</label> 
            <input type="tel" name="numtelfixeclient"  class="form-control" id="fixe" value = "{{Auth::user()->numtelfixeclient}}" required>
            <br>

            <label for="mobile">Votre mobile</label> <label class="obligatoire">*</label> 
            <input type="tel" name="numtelmobileclient"  class="form-control" id="mobile" value = "{{Auth::user()->numtelmobileclient}}" required >
            <br>

            <label for="rue">Votre numéro de rue </label> <label class="obligatoire">*</label>
            <input type="text" name="adressenumero"  class="form-control" id="rue" value ={{$adresse[0]->adressenumero}}  required>
            <br>

            <label for="adresse">Votre adresse</label> <label class="obligatoire">*</label>
            <input type="text" name="adresserue"  class="form-control" id="adresse" value ={{$adresse[0]->adresserue}} required >
           <br>

            <label for="postal">Votre code postal</label> <label class="obligatoire">*</label>
            <input type="text" name="adressecodepostal"  class="form-control" id="postal" value ={{$adresse[0]->adressecodepostal}} required>
            <br>

            <label for="postal">La ville</label> <label class="obligatoire">*</label>
            <input type="text" name="adresseville"  class="form-control" id="postal" value ={{$adresse[0]->adresseville}} required>
            <br>
            
            <button type="submit" class="btnsave btn-primary btn">Modifier les infos</button> 
     
        </form>

    </div>
    
    
    

</div>
        
    

@endsection