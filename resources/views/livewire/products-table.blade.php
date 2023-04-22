
<div>
    <div class="container w-75">
        <div class="row margintop">
            <div class="col-sm">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownTriPrix" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" title="Trier les produits par prix">
                        Tri par prix
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownTriPrix">
                        <a class="dropdown-item" wire:click="sortPrice">Croissant</a>
                        <a class="dropdown-item" wire:click="sortPriceReverse">Décroissant</a>
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownTriPays"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Sélectionner la ville">
                        Sélectionner la ville
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownTriMagasin">
                        @foreach ($adresses as $adress)
                            <a class="dropdown-item"
                                wire:click="displayByShop({{ $adress->idmagasin }})">{{ $adress->adresseville }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownTriMagasin"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Sélectionner le magasin">
                        Sélectionner le magasin
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownTriMagasin">
                        @foreach ($adresses as $adress)
                            <a class="dropdown-item"
                                wire:click="displayByShop({{ $adress->idmagasin }})">{{ $adress->nommagasin }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-sm">
                <button class="btn border btn-dark" wire:click="sortByShop" title="Trier les produits par magasins">Tri par magasins</button>
            </div>

            <div>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle margintop" type="button" id="dropdownTriCounry"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Sélectionner le pays">
                        Sélectionner le pays
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownTriCountry">
                        <a class="dropdown-item" wire:click="displayByCountry('33')">France</a>
                        <a class="dropdown-item" wire:click="displayByCountry('32')">Belgique</a>
                        <a class="dropdown-item" wire:click="displayByCountry('41')">Suisse</a>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row flex-wrap">
                @foreach ($produits as $product)
                    @if ($product->statutproduit == 'visible' && $product->quantiteproduit > 0)
                        <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                            <div class="card text-center" style="height: 100%">
                                <img src="{{ $product->lienimage }}" alt="{{ $product->nomproduit }}"
                                    class="card-img-top" style="aspect-ratio: 3/2; object-fit: contain;">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 160%;"><b>{{ $product->nomproduit }}</b>
                                    </h5>
                                    <p class="card-text">{{ $product->descriptionproduit }}</p>
                                    <p class="card-text" style="font-size: 200%;"><b>{{ $product->prixproduit }}€</b>
                                    </p>
                                    <p class="card-text">Disponible dans le magasin : <b>{{ $product->nommagasin }}</b>
                                    </p>
                                    <a href="/afficheProduit/{{ $product->refproduit }}"
                                        class="btn btn-primary btn-block btn-round border-0 stretched-link">Voir le
                                        produit</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Affichage des produits non visibles pour les membres du service accueil -->
            @if (Auth::check() && Auth::user()->statut == 'Acceuil')
                <hr class="featurette-divider">
                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">Produits retirés de la vente</h2>
                    </div>
                </div>

                <div class="d-flex flex-row flex-wrap">
                    @foreach ($produits as $product)
                        @if ($product->statutproduit == 'invisible' || $product->quantiteproduit == 0)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                                <div class="card text-center" style="height: 100%">
                                    <img src="{{ $product->lienimage }}" alt="{{ $product->nomproduit }}"
                                        class="card-img-top" style="aspect-ratio: 3/2; object-fit: contain;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size: 160%;">
                                            <b>{{ $product->nomproduit }}</b>
                                        </h5>
                                        <p class="card-text">{{ $product->descriptionproduit }}</p>
                                        <p class="card-text" style="font-size: 200%;">
                                            <b>{{ $product->prixproduit }}€</b>
                                        </p>
                                        <p class="card-text">Disponible dans le magasin :
                                            <b>{{ $product->nommagasin }}</b>
                                        </p>
                                        <a href="/afficheProduit/{{ $product->refproduit }}"
                                            class="btn btn-primary btn-block btn-round border-0 stretched-link">Voir le
                                            produit</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>


   