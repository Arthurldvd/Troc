<div>
    <h1>Objet(s) en attente de validation : </h1>


    @foreach ($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-2">
            <div class="card text-center" style="height: 100%">
                <img src="{{ $product->lienimage }}" alt="{{ $product->nomproduit }}" class="card-img-top"
                    style="aspect-ratio: 3/2; object-fit: contain;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 160%;"><b>{{ $product->nomproduit }}</b></h5>
                    <p class="card-text">{{ $product->descriptionproduit }}</p>
                    <p class="card-text" style="font-size: 200%;"><b>{{ $product->prixproduit }}€</b></p>
                    <p class="card-text">Le client en possède : <b>{{ $product->quantiteproduit }}</b></p>
                    <p class="card-text">Objet proposé à la vente le : <b>{{ $product->datedepotproduit }}</b></p>
                    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modif" >Modifier</button>
                    <br><br>
                    <button class="btn btn-primary btn-block" wire:click="dontGoToShop({{ $product->refproduit }})">Ne pas mettre en vente</button>
                    <br><br>
                    <button class="btn btn-primary btn-block" wire:click="goToShop({{ $product->refproduit }})">Mettre en vente</button>
                </div>
            </div>
        </div>

                    {{-- Modal --}}

                    <div class="modal fade" id="modif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Changer le prix</h5>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="text">
                                        <p>Entrez le nouveau prix du produit :</p>
                                        <input type="number" min="1"wire:model.debounce.100000ms="price">
                                    </div>

                                    <div class="text">
                                        <p>Entrez le nouveau nom du produit :</p>
                                        <input type="text" wire:model.debounce.100000ms="name">
                                    </div>

                                    <div class="text">
                                        <p>Entrez la nouvelle description du produit :</p>
                                        <input type="text" wire:model.debounce.100000ms="description">
                                    </div>

                                    <div class="text">
                                        <p>Entrez la nouvelle quantité du produit :</p>
                                        <input type="text" wire:model.debounce.100000ms="qty">
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-primary" wire:click="changes({{ $product->refproduit }})">Appliquer les changements</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>
         

    @endforeach

                    
                    
</div>
