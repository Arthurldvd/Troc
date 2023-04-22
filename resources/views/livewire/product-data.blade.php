<div>
<div>
    @if( $product[0]->statutproduit == 'invisible')
    Le produit n'existe plus
    @endif

    @if (Auth::check() && Auth::user()->statut == 'Acceuil' || $product[0]->statutproduit == 'visible')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="/categorieRecherche/{{ $product[0]->libellerayon }}">{{ $product[0]->libellerayon }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product[0]->nomproduit }}</li>
            </ol>
        </nav>
        <div class="container justify-content-center" id="sameProducts">
            <div class="row">
                <p id="nomProduit">{{ $product[0]->nomproduit }}</p>
            </div>

            <div class="row">
                <img class="img-fluid col rounded d-flex justify-content-center " src="{{ $photo[0]->lienimage }}"
                    alt="{{ $product[0]->nomproduit }}" style="aspect-ratio: 3/2; object-fit: cover; max-width: 50%;
    height: auto;">

                <div class="col">
                    <p id="prixProduit" class="text-center" style="font-size: 500%;">{{ $product[0]->prixproduit }} €</p>
                    @if (Auth::check() && Auth::user()->statut == 'Acceuil')
                    <!-- Bouton changer de prix  -->
                        <button id="btnSuivre" data-toggle="modal" data-target="#changerPrix" class="btn btn-sm">Changer le prix</button>
                        
                        <div class="modal fade" id="changerPrix" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Changer le prix</h5>
                                    </div>
                                    <div class="modal-body text-center">
                                        <div class="text">
                                            <p>Entrez le nouveau prix du produit</p>
                                            <input type="text" wire:model.debounce.10000ms="price">
                                            <button id="btnSuivre" data-dismiss="modal" class="btn btn-sm"
                                                wire:click="changePrice">Changer le prix</button>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bouton retirer/mettre article en vente -->
                        @if ($product[0]->statutproduit == 'visible')
                        <button id="btnSuivre" class="btn btn-sm" wire:click="removeFromSale">Retirer de la vente</button>
                        @else ($product[0]->statutproduit == 'invisible')
                        <button id="btnSuivre" class="btn btn-sm" wire:click="putOnSale">Mettre en vente</button>
                        @endif
                        
                    @endif
                    {{--  Début  --}}
                    @if (Auth::check() && Auth::user()->statut == 'Service Marketing')
                    <button id="btnSuivre"  data-toggle="modal" data-target="#modif" >Modifier</button>
                        
                    <div class="modal fade" id="modif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Changer le prix</h5>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="text">
                                        <p>Entrez le nouveau nom du produit :</p>
                                        <input type="text" wire:model.debounce.100000ms="name">
                                    </div>

                                    <div class="text">
                                        <p>Entrez la nouvelle description du produit :</p>
                                        <input type="text" wire:model.debounce.100000ms="description">
                                    </div>

                                    <div class="text">
                                        <p>Entrez le lien de la nouvelle image :</p>
                                        <input type="text" wire:model.debounce.100000ms="link">
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-primary" wire:click="changes({{ $product[0]->refproduit }})">Appliquer les changements</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    {{-- fin --}}
                    <div class="col">

                        @if (Auth::check())
                                            <button id="btnSuivre" data-toggle="modal" data-target="#suivre" class="btn btn-sm"
                                wire:click="showFavoritesList({{ Auth::user()->idclient }})" title="Suivre le produit">Suivre le produit</button>
                                <p class="helpModal" data-toggle="modal" data-target="#AideSuivre" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AideSuivre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide pour le bouton Suivre le produit</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Ce bouton ci, une fois cliqué, va vous proposer une liste de vos listes de favoris. Vous pourrez alors choisir la liste dans laquelle vous voulez ajouter le produit.<br>
                          Si vous ne possedez pas encore de liste de produits, vous pouvez vous en creez une dans <a href="/ProduitsSuivis">l'onglet favoris</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
                        @else
                            <button id="btnSuivre" class="btn btn-sm" title="Suivre le produit">Suivre le produit</button>
                            <p><i>Vous devez être connecté pour suivre un produit.</i></p>

                        @endif

                    </div>

                    <button id="btnSuivre" class="btn btn-sm" wire:click="addToCart" title="Ajouter au panier">Ajouter au panier</button>
                    <p class="helpModal" data-toggle="modal" data-target="#AideAjout" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AideAjout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide pour le bouton Ajouter au panier</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Ce bouton ci, une fois cliqué, va ajouter l'objet au panier. Vous pourrez ensuite le retirer ou le valider depuis <a href="/Panier">l'onglet panier</a>.<br>

                        </div>
                    </div>Vous avez ajouté un objet à votre panier et vous ne le voyez pas apparaître dedans ?<br>
Vérifiez que votre panier est vide, ou que l'objet que vous essayez d'ajouter provient bien du même magasin que le  produit déjà présent dans le panier.

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
                    <p> Donnez quantité: </p>
                    <input type="text" wire:model="qty" style="width: 10%;" />

                    <p style="font-size: 130%;">Article(s) en sotck : <b>{{ $product[0]->quantiteproduit }}</b></p>
                    <p style="font-size: 120%">Description: "<i>{{ $product[0]->descriptionproduit }}</i>"</p>


                    @if(Auth::check())
                    <b><p style="font-size: 120%">Déposer un avis :</p></b>
                    <textarea style="font-size: 12px" name="" id="" cols="50" rows="10" wire:model.debounce.10000ms="opinion"></textarea>
                    <br>
                    <br>
                            <button id="btnSuivre" wire:click="productOpinion({{Auth::user()->idclient}})">Déposer l'avis</button>
                            <p class="helpModal" data-toggle="modal" data-target="#AideAvis" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AideAvis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide pour le bouton Déposer l'avis</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Après avoir acheté l'objet, vous pouvez déposer un avis sur celui-ci. Cet avis sera visible par tous les utilisateurs du site.<br>
                          il suffit d'écrire votre avis dans la zone de texte et de cliquer sur le bouton déposer l'avis.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
                            
                    @else
                    <div class="text">
                        <p>Vous devez être connecté pour déposer un avis</p>
                    @endif

                    @if ($acquired == true)
                                    Votre avis a bien été déposé.
                    @elseif ($acquired == false)
                                    Vous devez avoir acheté cet objet pour déposer un avis.
                    @endif
                    <div class="modal fade" id="suivre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajoutez ce produit à la liste de votre
                                        choix :</h5>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="text">
                                        <h1>Vos listes :</h1>

                                        @foreach ($favoritesList as $aFav)
                                            <p><button class="btn btn-primary" data-dismiss="modal"
                                                    wire:click="sendToFavorites({{ $aFav->idlistefavorisclient }})">{{ $aFav->libellelistefavorisclient }}</button>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Continuer mes
                                        achats</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if (Auth::check() && Auth::user()->statut == 'Responsable')
                    <br>
                        <a
                            href="mailto:{{ $product[0]->emailclient }}?subject=Information concernant : {{ $product[0]->nomproduit }}
                &body=Bonjour Monsieur {{ $product[0]->nomclient }},
                %0A%0AJe vous informe que le prix de votre produit va être réduit car cela fait maintenant plus de deux semaines qu'il reste invendu.
                %0A%0ACordialement,
                %0A{{ Auth::user()->nomclient }} {{ Auth::user()->prenomclient }}
            ">
                            Informer le vendeur que le prix va être réduit.
                        </a>
                        <br>
                        <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modify">
                            Modifier les horaires
                        </button> 

                        <div class="modal fade" id="Modify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modifier les horaires</h5>
                                    </div>
                                    <div class="modal-body text-center">
                                        <div class="text">
                                                Sélectionnez la demi-journée : 
                                                    <br><br>
                                                    <select name="day" wire:model.debounce.100000ms="day">
                                                        @foreach ($days as $key => $aDay)
                                                            @if( ($key % 2)  == 0)
                                                            <option value="{{ $aDay->iddemijournee }}|{{ $aDay->idjour }}">{{ $aDay->libellejour }} matin</option>  
                                                            @else
                                                            <option value="{{ $aDay->iddemijournee }}|{{ $aDay->idjour }}">{{ $aDay->libellejour }} après-midi</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <br><br>
                                                    Ouverture : 
                                                    <br><br>
                                                    <input type="time" value="00:00:00" wire:model.debounce.100000ms="openingHour">
                                                    <br><br>
                                                    Fermeture : 
                                                    <br><br>
                                                    <input type="time" value="00:00:00" wire:model.debounce.100000ms="closingHour">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary" wire:click="scheduleChanges({{$key}})" data-dismiss="modal" >Enregistrer</button>
                                        <button type="submit" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($add === true)
                        <div class="toast bg-success align-items-center" role="alert" aria-live="assertive"
                            aria-atomic="true" style="max-height: 20%">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Votre produit a été ajouté au panier.
                                </div>
                                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                        </div>

                      

                        <!-- script -->
                        <script>
                            $(function() {
                                $('.toast').toast('show');
                            });
                        </script>
                    @elseif($error === true && $add === false)
                        <div class="toast bg-warning align-items-center" role="alert" aria-live="assertive"
                            aria-atomic="true" style="max-height: 20%">
                            <div class="d-flex">
                                <div class="toast-body">
                                    Votre quantité n'est pas valide ou cet objet n'est pas dans le même magasin que l'objet de votre panier.
                                </div>
                                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                        <script>
                            $(function() {
                                $('.toast').toast('show');
                            });
                        </script>
                    @endif
                </div>
            </div>
            <div class="p-4">
            </div>
            <div class="row">
            </div>
        </div>
    </div>
    <div class="m-3">


        <h3>Infos sur le magasin</h3>
        <div class="text">
            <p>{{ $product[0]->nommagasin }}</p>
            <a href="mailto:Troc{{ $product[0]->adresseville }}@troc.com">Contactez nous ici.</a>

            <p>Retrouvez ce produit dans votre magasin à {{ $product[0]->adresseville }}.</p>
            <p>Adresse du magasin : {{ $product[0]->adressenumero }} {{ $product[0]->adresserue }},
                {{ $product[0]->adressecodepostal }}, {{ $product[0]->adresseville }}.</p>
        </div>

        <!-- button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#horaireModal" title="Voir les horaires">
            Horaires
        </button>

        <!-- openable modal-->
        <div class="modal fade" id="horaireModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Horaires</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                            <p><b>{{ $days[0]->libellejour }}</b> Ouvert de : <b>{{ date("H:i", strtotime($days[0]->horaireouverture)) }}</b>
                                jusqu'à <b>{{ date("H:i", strtotime($days[0]->horairefermeture)) }}</b> et de
                                <b>{{ date("H:i", strtotime($days[1]->horaireouverture)) }}</b> à <b>{{ date("H:i", strtotime($days[1]->horairefermeture)) }}</b>
                            </p>
                            <p><b>{{ $days[2]->libellejour }}</b> Ouvert de : <b>{{ date("H:i", strtotime($days[2]->horaireouverture)) }}</b>
                                jusqu'à <b>{{ date("H:i", strtotime($days[2]->horairefermeture)) }}</b> et de
                                <b>{{ date("H:i", strtotime($days[3]->horaireouverture)) }}</b> à <b>{{ date("H:i", strtotime($days[3]->horairefermeture)) }}</b>
                            </p>
                            <p><b>{{ $days[4]->libellejour }}</b> Ouvert de : <b>{{ date("H:i", strtotime($days[4]->horaireouverture)) }}</b>
                                jusqu'à <b>{{ date("H:i", strtotime($days[4]->horairefermeture)) }}</b> et de
                                <b>{{ date("H:i", strtotime($days[5]->horaireouverture)) }}</b> à <b>{{ date("H:i", strtotime($days[5]->horairefermeture)) }}</b>
                            </p>
                            <p><b>{{ $days[6]->libellejour }}</b> Ouvert de : <b>{{ date("H:i", strtotime($days[6]->horaireouverture)) }}</b>
                                jusqu'à <b>{{ date("H:i", strtotime($days[6]->horairefermeture)) }}</b> et de
                                <b>{{ date("H:i", strtotime($days[7]->horaireouverture)) }}</b> à <b>{{ date("H:i", strtotime($days[7]->horairefermeture)) }}</b>
                            </p>
                            <p><b>{{ $days[8]->libellejour }}</b> Ouvert de : <b>{{ date("H:i", strtotime($days[8]->horaireouverture)) }}</b>
                                jusqu'à <b>{{ date("H:i", strtotime($days[8]->horairefermeture)) }}</b> et de
                                <b>{{ date("H:i", strtotime($days[9]->horaireouverture)) }}</b> à <b>{{ date("H:i", strtotime($days[9]->horairefermeture)) }}</b>
                            </p>
                            <p><b>{{ $days[10]->libellejour }}</b> Ouvert de : <b>{{ date("H:i", strtotime($days[10]->horaireouverture)) }}</b>
                                jusqu'à <b>{{ date("H:i", strtotime($days[10]->horairefermeture)) }}</b> 
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Continuer mes achats</button>
                    </div>
                </div>
            </div>
        </div>


      

        
       
        @if(count($allOpinions) > 0)
            <h3>Avis des clients</h3>
            <div class="text">
                <p>Voici les avis des clients sur ce produit
        @endif
        
        @foreach($allOpinions as $anOpinion)

            <div class="text">
                <p>Client : {{ $anOpinion->nomclient }} {{ $anOpinion->prenomclient }}</p>
                <p>Commentaire : {{ $anOpinion->contenuavisproduit}}</p>
                <p>Date : {{$anOpinion->dateavisproduit}} </p>
                @if($anOpinion->commentaire != null)
                    <p>Commentaire du responsable : {{ $anOpinion->commentaire }}</p>
                @endif
            </div>

            @if(Auth::check() && Auth::user()->statut == 'Responsable')
            <br>
            {{$anOpinion->idavisproduit}}
            <button wire:click="deleteOpinion({{$anOpinion->idavisproduit}})"  id="btnSuivre">Retirer l'avis</button>
            <br>
            @if($anOpinion->commentaire == null)
            Faire un commentaire :
            <br>
            <textarea style="font-size: 12px" name="" id="" cols="50" rows="10" wire:model.debounce.10000ms="aComment"></textarea>
            <br>
                <button wire:click="comment({{$anOpinion->idavisproduit}})" id="btnSuivre">Envoyer</button>
            @endif
        @endif
            
            
            
            @if(Auth::check() && Auth::user()->statut != 'Responsable') 
            <textarea wire:model="aReport" style="font-size: 12px" cols="50" rows="3"></textarea>
            <br>
            <button wire:click="reportOpinion({{$anOpinion->idavisproduit}})" id="btnSuivre">Signaler l'avis</button>
            <p class="helpModal" data-toggle="modal" data-target="#AideSignalement" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AideSignalement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide pour la fonction de signalement</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Lorsqu'un commentaire vous semble inapproprié, vous pouvez le signaler en cliquant sur le bouton "Signaler l'avis" et vous pouvez indiquez pourquoi il est déplacé dans la zone de texte au dessus du bouton.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
            
            <!-- <button id="btnSuivre" data-toggle="modal" data-target="#report">Signaler l'avis</button> -->

        <!-- <div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Signaler un avis</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                            <p>Faites votre signalement</p>
                            <textarea type="text" wire:model.debounce.10000ms="aReport">
                            <button id="btnSuivre" data-dismiss="modal" class="btn btn-sm"
                            wire:click="reportOpinion({{$anOpinion->idavisproduit}})" >Envoyer le signalement</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>  -->
            @endif

           
        
        @endforeach


    
        {{-- @if(Auth::check() && Auth::user()->statut == 'Responsable')
        <h4>Vérifications avis</h4>
        @foreach ($allOpinions as $anOpinion)
        @if($anOpinion->statut == 'invisible')
            <div class="text">
                <p>Client : {{ $anOpinion->nomclient }} {{ $anOpinion->prenomclient }}</p>
                <p>Commentaire : {{ $anOpinion->contenuavisproduit}}</p>
            </div>
            <button></button>
            @endif

        @endforeach
        @endif --}}


                {{-- <h3>Contacter le vendeur : <h3>

                        <div class="text">
                            <p>Nom client : <b>{{ $product[0]->nomclient }} </b></p>
                            <p>Prénom client : <b>{{ $product[0]->prenomclient }} </b></p>
                            <p>Téléphone : <b>+{{ $product[0]->numtelmobileclient }}</b></p>
                        </div> --}}

                        <h3>Plus d'informations : <h3>
                            <div class="text">
                                <p>Date de dépot du produit : {{ $product[0]->datedepotproduit }}</p>
                                <p>Largeur du roduit : {{ $product[0]->largeurdimensions }} cm </p>
                                <p>Hauteur du produit : {{ $product[0]->hauteurdimensions }} cm</p>
                                {{ $product[0]->longueurproduit }}
                                {{ $product[0]->profondeurproduit }}
            
                                @if (is_null($product[0]->profondeurproduit) && is_null($product[0]->longueurproduit))
                                    <p>Pas de profondeur ni de longueur</p>
                                @elseif(is_null($product[0]->profondeurproduit))
                                    <p> Longueur du produit : $product[0]->longueurproduit cm. </p>
                                @elseif(is_null($product[0]->longueurproduit))
                                    <p>Profondeur du produit : $product[0]->profondeurproduit cm.</p>
                                @endif
                            </div>
            
            <h2>Produits similaires :</h2>
    </div>
    </div>


    <!-- {{-- Ici --}} -->
    <div class="container" id="sameProducts">

        <div class="carousel slide carousel-fade" id="carousel-similar-products" data-interval="4000">
            <div class="carousel-inner carousel-item-3 d-flex flex-row flex-wrap">
                @foreach ($similarProducts as $aProduct)
                    @if ($aProduct->statutproduit == 'visible')
                        <div class="carousel-item{{ $loop->first ? ' active' : '' }}">
                            <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                                <div class="card text-center" style="height: 100%">
                                    <img src="{{ $aProduct->lienimage }}" alt="{{ $aProduct->nomproduit }}"
                                        class="card-img-top" style="aspect-ratio: 3/2; object-fit: contain;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size: 140%;"><b>{{ $aProduct->nomproduit }}</b>
                                        </h5>
                                        <p class="card-text" style="font-size: 120%;"><b>{{ $aProduct->prixproduit }}€</b>
                                        </p>
                                        <p class="card-text" style="font-size: 100%;">{{ $aProduct->descriptionproduit }}</p>
                                        <a href="/afficheProduit/{{ $aProduct->refproduit }}"
                                            class="btn btn-primary btn-block btn-round border-0 stretched-link">Voir le
                                            produit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <a href="#carousel-similar-products" class="carousel-control-prev" data-slide="prev" >
                <span class="carousel-control-prev-icon" style=" margin-left: -150%"></span>
            </a>
            <a href="#carousel-similar-products" class="carousel-control-next" data-slide="next" >
                <span class="carousel-control-next-icon" style="margin-right: -150%"></span>
            </a>
        </div>
    </div>


    <!-- Il faudrait un .css et un .js c'est plus propre voila -->

    <script>
    let items = document.querySelectorAll('.carousel .carousel-item')
    let displayedElements = new Set()
    let nextIcon = document.querySelector('.carousel-control-next-icon')
    let prevIcon = document.querySelector('.carousel-control-prev-icon')
    nextIcon.style.display = 'block'
    prevIcon.style.display = 'block'
    function updateCarousel() {
        if (items.length === 0) {
            h4 = document.createElement('h4')
            h4.innerText = 'Aucun produit similaire'
            document.querySelector('.carousel').appendChild(h4)
            nextIcon.style.display = 'none'
            prevIcon.style.display = 'none'
            nextIcon.style.pointerEvents = 'none'
            prevIcon.style.pointerEvents = 'none'
            nextIcon.style.cursor = 'default'
            prevIcon.style.cursor = 'default'
            nextIcon.style.opacity = '0'
            prevIcon.style.opacity = '0'
            
            return
        }


    items.forEach((el) => {
        // number of slides per carousel-item
        const maxPerSlide = 4

        let next = el.nextElementSibling
        for (var i = 1; i < maxPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }

        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        displayedElements.add(next)
        next = next.nextElementSibling
        }

        
    })
    }

    // update the carousel when the page is loaded
    updateCarousel()

    // add event listeners for the next and prev icons
    nextIcon.addEventListener('click', () => {
    displayedElements.clear()
    updateCarousel()
    })
    prevIcon.addEventListener('click', () => {
    displayedElements.clear()
    updateCarousel()
    })







    </script>
    <style>
    #carousel-similar-products .carousel-item {
        display: flex;
    }
    .carousel-control-next-icon, 
    .carousel-control-prev-icon {
        background-color: black;
        height: 15%;
        width: 40%;
        border-radius: 20%;
        background-size: 100%, 100%;
        border: 1px solid black;	
        color: black;
        z-index: 1;
        display: block !important;
        
    }

    .carousel-control-next-icon:hover,
    .carousel-control-prev-icon:hover {
        transform: scale(1.05);
    }
    /* neumophism effect  */
    #sameProducts {
        background: #f5f5f5;
        box-shadow: 4px 4px 3px rgb(0 0 0 / 8%),
                    -4px -4px 3px hsl(0 0% 100% / 40%);
    }

    .card {
    transition: transform 0.5s;
    }

    .card:hover {
    transform: scale(1.03);
    }
    </style>
    <!-- <div class="container">
        <h3>Produits similaires :
    <div>
        <div class="d-flex flex-row flex-wrap">
            @foreach ($similarProducts as $aProduct)
                @if ($aProduct->statutproduit == 'visible')
                    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                        <div class="card text-center" style="height: 100%">
                            <img src="{{ $aProduct->lienimage }}" alt="{{ $aProduct->nomproduit }}"
                                class="card-img-top" style="aspect-ratio: 3/2; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title
    [...]
        
                                    <p class="card-text">{{ $aProduct->descriptionproduit }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div> -->



    <!-- <div class="container">
        <h3>Produits similaires :
    <div>
        <div class="d-flex flex-row flex-wrap">
            @foreach ($similarProducts as $aProduct)
                @if ($aProduct->statutproduit == 'visible')
                    <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                        <div class="card text-center" style="height: 100%">
                            <img src="{{ $aProduct->lienimage }}" alt="{{ $aProduct->nomproduit }}"
                                class="card-img-top" style="aspect-ratio: 3/2; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 160%;"><b>{{ $aProduct->nomproduit }}</b>
                                </h5>
                                <p class="card-text">{{ $aProduct->descriptionproduit }}</p>
                                <p class="card-text" style="font-size: 200%;"><b>{{ $aProduct->prixproduit }}€</b>
                                </p>
                                <p class="card-text">Disponible dans le magasin : <b>{{ $aProduct->nommagasin }}</b>
                                </p>
                                <a href="/afficheProduit/{{ $aProduct->refproduit }}"
                                    class="btn btn-primary btn-block btn-round border-0 stretched-link">Voir le
                                    produit</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div> -->
    @endif
</div>


</div>



