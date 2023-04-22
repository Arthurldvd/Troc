<div>
    <link rel="stylesheet" href="{{ URL::asset('css/add-product.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/print.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/facture.css') }}"/>
    <h1>Enregistrement d'un produit</h1>

    <form wire:submit.prevent="addProduct">
        Nom de l'objet : <input type="text" name="productName" wire:model="productName" required>
        <br><br>
        Description de l'objet : <input type="text" name="productDescription" wire:model="productDescription" required>
        <br><br>
        Quantité : <input type="number" min="1" name="productQty" wire:model="productQty" required>
        <br><br>
        Largeur en cm : <input type="number" min="1" name="lenght" wire:model="lenght" required>
        <br><br>
        Hauteur en cm : <input type="number" min="1" name="height" wire:model="height" required>
        <br><br>
        Profondeur en cm : <input type="number" min="1" name="height" wire:model="depth">
        <br><br>
        Longueur en cm : <input type="number" min="1" name="height" wire:model="length">
        <br><br>
        Prix de l'objet : <input type="text" name="productPrice" wire:model="productPrice" required>
        <br><br>

        <div class="dragAndDrop">
            <div id="drop-zone"></div>
            <img id="uploaded-image" href=""></img>
        </div>
        <br>
        Ou entrez le lien de l'image : <input id="inputImage" type="text" name="imageLink" wire:model="imageLink" required>    

        <br><br>
        Numéro du déposant : <input type="number" min="1" name="idClient" wire:model="idClient" required>
        <br><br>
        Magasin de vente : <select name="shop" wire:model="shopName">
            @foreach ($shops as $aShop)
                <option value="{{ $aShop->nommagasin }}">{{ $aShop->nommagasin }}</option>
            @endforeach
        </select>
        <br><br>
        Rayon de vente : <select name="department" wire:model="departmentName">
            @foreach ($departments as $aDepartment)
                <option value="{{ $aDepartment->libellerayon }}">{{ $aDepartment->libellerayon }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit">Enregister</button>
    </form>
    <!-- <a href="/generate-pdf"><button>PDF</button></a> -->
    <!-- <a wire:click="getPdf"><button>PDF</button></a> -->
    <script src="{{ asset('/js/dragAndDropPhotos.js') }}"></script>

    <!-- button to open a modal called contrat -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contrat">
        Contrat
    </button>

    <!-- Modal -->
    <!-- <div class="modal fade bd-exemple-modal-lg" id="contrat" tabindex="-1" aria-labelledby="contratLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contratLabel">Contrat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" id="section-to-print">
                    <p>{{ $productName }}</p>
                </div>
                <button onclick="window.print();return false;">Imprimer</button>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary">Enregistrer</button>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade" id="contrat" tabindex="-1" aria-labelledby="contratLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                    <div class="invoice-box" id="section-to-print">
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                <img src="https://www.troc.com/images/logo-troc.svg" style="width: 100px;" />
                                            </td>
            
                                            <td>
                                                <!-- Contrat #: <br /> -->
                                                <!-- Created: January 1, 2015<br />
                                                Due: February 1, 2015 -->
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
            
                            <tr class="information">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                Magasin :<br />
                                                {{ $shopName }}<br />
                                                <!-- Mettre adresse magasin -->
                                            </td>
            
                                            <td>
                                                Client :<br />
                                                {{ $idClient }}<br />
                                                <!-- mettre le nom du client -->
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
            
                            <tr class="heading">
                                <td>Objet vendu</td>
            
                                <td>Montant</td>
                            </tr>
            
                            <tr class="details">
                                <td>{{ $productName }} (Qté : {{ $productQty }})</td>
            
                                <td>{{ $productPrice }} €</td>
                            </tr>

                            <tr class="heading">
                                <td>Description</td>
                                <td></td>
                            </tr>
            
                            <tr class="details">
                                <td>{{ $productDescription }}</td>
                            </tr>

                            
                            <tr class="heading">
                                <td>Dimensions</td>
                                <td></td>
                            </tr>
            
                            <tr class="details">
                                <td>{{ $lenght }}x{{ $height }}x{{ $depth }} cm</td>
                            </tr>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" onclick="window.print();return false;">Imprimer</button>
                    </div>
            </div>
        </div>
    </div>


</div>


