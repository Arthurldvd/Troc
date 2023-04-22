<div>
    @if (Auth::check())
        @foreach ($favoritesList as $aList)
            <button type="submit" class="btnSave addList btn-primary btn"
                wire:click="getProducts({{ $aList->idlistefavorisclient }})">{{ $aList->libellelistefavorisclient }}</button>
        @endforeach
        <div class="addList">
            <h3>Créer une liste</h3>
            <p class="helpModal" data-toggle="modal" data-target="#AideListe" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AideListe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide a la création de liste</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Comment créer une liste : <br>
                            1. Entrez le nom de la liste dans le champ de texte.<br>
                            2. Cliquez sur le bouton "Créer". (appuyez sur F5 si vous ne la voyez pas)<br><br>
                          Comment voir ses listes : <br>
                            Cliquez sur la liste voulue pour voir les objets qu'elle contient.<br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
            <form>
                <input type="text" placeholder="Nom de la liste à créer" wire:model.debounce.10ms="listName">
            </form>
            <button type="submit" class="btnSave btn-primary btn"
                wire:click="AddList({{ Auth::user()->idclient }})">Créer</button>
            <p>

        </div>

        @foreach ($products as $product)
            <div>
                <div class="col-sm-6 col-md-4 col-lg-3 p-2">
                    <div class="card text-center" style="height: 100%">
                        <img src="{{ $product->lienimage }}" alt="{{ $product->nomproduit }}" class="card-img-top"
                            style="aspect-ratio: 3/2; object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 160%;"><b>{{ $product->nomproduit }}</b></h5>
                            <p class="card-text">{{ $product->descriptionproduit }}</p>
                            <p class="card-text" style="font-size: 200%;"><b>{{ $product->prixproduit }}€</b></p>
                            <p class="card-text">Disponible dans le magasin : <b>{{ $product->nommagasin }}</b></p>
                            <a href="/afficheProduit/{{ $product->refproduit }}"
                                class="btn btn-primary btn-block btn-round border-0 stretched-link">Voir le produit</a>
                        </div>
                    </div>
                </div>
                <button id="btnSuivre"
                    wire:click="deleteProduct({{ $product->refproduit }},{{ $aList->idlistefavorisclient }})">Supprimer
                    le produit de votre liste.</button>
            </div>
        @endforeach
        </p>
    @else
        <h2 style="margin-left: 5px;">Il faut être connecté pour avoir accès à votre liste.</h2>
    @endif

</div>
