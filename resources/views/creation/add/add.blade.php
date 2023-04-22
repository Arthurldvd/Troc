@extends('footer.footer')
@extends('layout.layout')

@section('content')
    @if(session()->has('success'))
        {{session()->get('success')}}
    @endif
    
<link rel="stylesheet" type="text/css" href="{{asset('/css/inscription.css') }}"/>


    <h1 class="title">Mes Coordonnées</h1>
    &nbsp
    <div class="bg">
        <form method="post" action="{{ url("/creation/save") }}" class=" champ" >
        {{ csrf_field() }}
        <div class="form-group">
         <h3 class="title3">Vos données personnelles</h3>

         <p class="helpModal" data-toggle="modal" data-target="#AideCreation" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AideCreation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide a la création de compte</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Après avoir rempli le formulaire de création de compte, appuyez sur valider et votre compte sera créé. <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

         <label >Selectionner le genre</label> <label class="obligatoire">*</label> <br>
         <div class="form-check form-check-inline">
            <input type="radio" id="homme" name="civilite" value="Homme" class="form-check-input radio" required>
            <label for="homme" class="form-check-label">Homme</label><br>
        </div>
        
       
        <div class="form-check form-check-inline">
            <input type="radio" id="femme" name="civilite" value="Femme" class="form-check-input radio" required>
             <label for="femmme" class="form-check-label">Femme</label><br>
        </div> <br>

         <label>Votre statut</label> <label class="obligatoire">*</label> <br>
         <div class="form-check form-check-inline">
            <input type="radio" id="particulier" name="statut" value="Particulier" class="form-check-input radio" required >
            <label for="particulier" class="form-check-label">Particulier</label><br>
        </div> <br> 

        <div class="form-check form-check-inline">
            <input type="radio" id="professionnel" name="statut" value="Professionnel" class="form-check-input radio" required >
             <label for="femmme" class="form-check-label">Professionnel</label><br>
        </div> <br>

            <label for="nom" class="form-label">Nom</label> <label class="obligatoire">*</label>
            <input type="text" name="nomclient"  class="form-control" id="nom" placeholder="Votre nom" required>
            <div class="invalid-feedback"> Ecrire votre nom</div>
            <br>

            <label for="prenom">Prénom</label> <label class="obligatoire">*</label>
            <input type="text" name="prenomclient"  class="form-control" id="prenom" placeholder="Votre prenom" required>
            <br>

            <label for="date">Votre date de naissance</label> <label class="obligatoire">*</label>
            <input type="date" name="datenaissanceclient"  class="form-control" id="date" required >
            <br>

            <label for="mail">Votre email</label>  <label class="obligatoire">*</label>
            <input type="email" name="emailclient"  class="form-control" id="mail" placeholder="Votre email" required >
            <small id="emailHelp" class="form-text text-muted">Entrer un format valide ex: exemple@gmail.com</small> <br>
             <br>
           
            <label for="fixe">Votre fixe</label> <label class="obligatoire">*</label>
            <input type="tel" name="numtelfixeclient"  class="form-control" id="fixe" placeholder="Votre numéro de tel fixe"  maxlength="10" required>
             <br>

            <label for="mobile">Votre mobile</label> <label class="obligatoire">*</label>
            <input type="tel" name="numtelmobileclient"  class="form-control" id="mobile" placeholder="Votre numéro de tel mobile" maxlength="10" required >
             <br>

             <label for="mdp">Votre mot de passe</label> <label class="obligatoire">*</label>
  <input type="password" name="password" class="form-control" id="mdp" placeholder="Votre mot de passe" required>
  <br>
  <div id="error-message" style="display:none; color:red;">Le mot de passe doit comprendre au moins 12 caractère avec: 1 chiffre, 1 majuscule, 1 minuscule et 1 caractère spécial</div>

        </div>

        <div class="form-group">
            <h3 class="title3">Votre adresse de domicile </h3>

            <label for="rue">Votre numéro de rue </label> <label class="obligatoire">*</label>
            <input type="text" name="adressenumero"  class="form-control" id="rue" placeholder="Votre numero de rue "  required>
            <br>

            <label for="adresse">Votre adresse</label> <label class="obligatoire">*</label>
            <input type="text" name="adresserue"  class="form-control" id="adresse" placeholder="Votre adresse" required >
           <br>

            <label for="postal">Votre code postal</label> <label class="obligatoire">*</label>
            <input type="text" name="adressecodepostal"  class="form-control" id="postal" placeholder="Votre code postal" required>
            <br>

            <label for="postal">La ville</label> <label class="obligatoire">*</label>
            <input type="text" name="adresseville"  class="form-control" id="postal" placeholder="Votre Ville" required>
            <br>

            <button type="submit" class="btnSave btn-primary btn">Valider</button> 

            <p class="hide">espace</p>
           
        </div>
        </form>
    </div>
    <script src="{{ asset('/js/passwordChek.js') }}"></script>

@endsection
