<div>
    <nav class="navbar navbar-expend-lg flex-nowrap d-flex justify-content-around">
        <!-- Logo  -->
        
        <div class="container justify-content-around">
            <a class="navbar-brand" href="/">
                <img src="https://www.troc.com/images/logo-troc.svg" class="img-fluid mx-auto d-block" alt="Troc"
                    style="width: 140px;" id="TrocLogo" title="Aller à l'accueil">
            </a>
        </div>

        <!-- search bar-->
        <div class="container border border-dark justify-content-around"
            style="height: auto; border-radius: 50px; width:auto">
            <form class="d-flex align-self-center" role="search" action="/produitRecherche/{{ $search }}">
                <input class="border-0" type="search" placeholder="Rechercher un produit" aria-label="Search"
                    wire:model.debounce.10ms="search" style="background-color: transparent">
                <button id="submit" type="submit" class="btn btn-sumit-icon shadow-btn btn-dark rounded-circle" title="Rechercher">
                    
                    <i class="fas fa-search"></i>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="yellow"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                    </a>
            </form>
        </div>
        <!-- Connexion buttom -->
        <div class="container justify-content-around">
            <div class="modal fade " id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <p class="helpModal" data-toggle="modal" data-target="#Aideconnexion" title="Aide" style="cursor: pointer">﹖</p>
                        <div class="modal fade" id="Aideconnexion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide a la connexion et a l'inscription</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Le bouton inscription permet de s'inscrire sur le site, le bouton connexion, une fois les informations de compte rentrées, permet de se connecter.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fermer" style="margin-left: auto;" >
                                <span aria-hidden="true" title="Fermer la fenêtre">x</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center" >
                                <h3>Connexion</h3>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form method="post" action="{{ route('login.post') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="form-control m-2" id="emailclient" name="emailclient"
                                            placeholder="Votre email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control m-2" id="password" name="password"
                                            placeholder="Mot de passe" required>
                                    </div>
                                    <button type="button"
                                        onclick="window.location.href = 'http://51.83.36.122:8082/creation/add';"
                                        class="btn btn-info btn-block btn-round border-0 m-3"
                                        id="btnConnexion" title="S'inscrire">Inscription</button>
                                    <button type="submit" class="btn btn-info btn-block btn-round border-0 m-3"
                                        id="btnConnexion" title="Valider la connexion">Connexion</button>
                                    
                                </form>
                                <!--  End of -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>




                @if (Auth::check())
                    <a href="{{ url('/dashboard') }}" class="btncompte" style="background-color: white;"> Bonjour {{ucfirst(Auth::user()->prenomclient);}}</a>
                @else
                    <button type="button" class="btn btn-info border-0" id="btnConnexion" data-toggle="modal"
                        data-target="#loginmodal" title="Se connecter ou s'inscrire">Connexion</button>
                @endif

    </nav>

    <!--  -->
    <nav class="navbar navbar-expand-lg" style="background-color: #ffed00;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <!-- dropdown menu -->
                    <li class="nav-item">
                        <a title="Aller à l'accueil" class="nav-link" aria-current="page" href="/">Accueil</a>

                    <li class="nav-item dropdown">
                        <a title="Voir les catégories" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Catégories
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">






                            <li class="nav-item">
                                <a class="nav-link" href="/categorieRecherche/Table basses">Table basses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/categorieRecherche/Meubles TV HIFI">Meubles TV HIFI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/categorieRecherche/Bars">Bars</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/categorieRecherche/Canapés - Salons">Canapés - Salons</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/categorieRecherche/Fauteuils - Sièges divers">Fauteuils -
                                    Sièges divers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/categorieRecherche/Livres">Livres</a>
                            </li>
                        </ul>
                    <li class="nav-item">
                        <a class="nav-link" href="/RechercheSpeciale/1" title="Voir les Bons plans">Bons Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/RechercheSpeciale/2" title="Voir les selection Troc">Selection Troc</a>
                    </li>
                    
                    @if (Auth::check() && Auth::user()->statut == 'Acceuil')
                    <li class="nav-item">
                        <a class="nav-link" href="/Enregistrement" title="Enregistrer un objet">Enregistrer un objet</a>
                    </li>
                    @endif
                    
                    @if (Auth::check() && Auth::user()->statut == 'Responsable')
                    <li class="nav-item">
                        <a class="nav-link" href="/AttenteDeValidation" title="Voir les objets en attente">Objet(s) en attente</a>
                    </li>
                    @endif
                    <li class="nav-item" id="FavLink">
                        <a class="nav-link" href="/ProduitsSuivis" title="Voir les favoris"><img src="https://freesvg.org/img/heart-15.png" alt="favoris" id="FavImg"><b>Favoris</a>
                    </li>
                    
                    <li class="nav-item" id="PanierLink">
                        <a class="nav-link" href="/Panier" title="Voir le panier"> <img src="https://cdn-icons-png.flaticon.com/512/118/118089.png" alt="panier" id="PanierImg"><b> Panier</a>
                    </li>

            </div>
        </div>
    </nav>
    
</div>




