<div class="m-1">
    <h3 >Voici votre panier :</h3>

    <p class="helpModal" data-toggle="modal" data-target="#AidePanier" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AidePanier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide pour le panier</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Voici votre panier, les produits que vous avez ajouté sont affichés ici.<br>
                          Vous pouvez supprimer un produit en cliquant sur le bouton supprimer.<br>
                          Vous pouvez également changer la quantité avec le bouton + et -.<br><br>
                          Vous avez ajouté un objet à votre panier et vous ne le voyez pas apparaît dedans ?
Vérifiez que votre panier est vide, ou que l'objet que vous essayez d'ajouter provient bien du même magasin que le  produit déjà présent dans le panier.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>

    @if(empty($products))
        <p>Votre panier est vide</p>
    @else
        <p>Vous avez <b>{{$products->count()}}</b> produit(s) dans votre panier</p>
    @endif

    @foreach($products as $index => $product)
    <div class="container">
            <div class="row">
                <div class="col">
                    <img class="img-fluid rounded w-75 m-3" src="{{$product->lienimage}}" alt="{{$product->nomproduit}}">
                </div>
               
                <div class="col">
                    <div class="row">
                        Nom du produit : {{$product->nomproduit}} 
                    </div>
                    <div class="row">
                        Quantité(s) disponible : {{$product->quantiteproduit}}
                    </div>
                    <div class="row" style="font-size: 250%">
                        {{$product->prixproduit}} €
                        {{$price}} €
                    </div>
                    
                    <div>
                    <button id ="btnSuivre" wire:click="removeOne({{$index}})">-</button>
                    <button id ="btnSuivre" wire:click="deleteProduct({{$index}})">Supprimer</button>
                    </div>
                    

                    <div class="row" style="font-size: 250%">
                        {{$sessionCart[$index][1]}}
                    </div>
                    <div>
                    <button id ="btnSuivre" wire:click="addOne({{$index}})">+</button>
                    </div>
                </div>
                </div>
                </div>

    @endforeach

    @if(!empty($cartMieuxList) && Auth::check())


    
    <div id="smart-button-container">
      <div style="text-align: center;">
      <p data-toggle="modal" data-target="#AidePayement" title="Aide" style="cursor: pointer">
  ﹖
</p>
<div class="modal fade" id="AidePayement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Aide pour le Payement</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="text">
                          Il y a 2 types de payement, le payement par paypal et le payement par carte bancaire.<br><br>
                          Pour le payement par paypal, vous devez cliquer sur le bouton paypal et vous connecter avec votre compte paypal.<br><br>
                          Pour le payement par carte bancaire, vous devez cliquer sur le bouton carte bancaire et renseignier vos informations bancaires ainsi qu'une adresse de facturation.

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="paypal-button-container"></div>
      </div>
    </div>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
  <script>

    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'pay',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"EUR","value":{{$cartValue}}}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';
            element.innerHTML = '<button>Finaliser le paiement</button>';

            // Or go to another URL:  
            // document.location.replace('https://www.youtube.com');
            // actions.redirect('thank_you.html');
            document.getElementById('btnPaymentSuccessful').click();
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>

<form id="formPaymentSuccessful" wire:submit="paymentSuccessful" style="display:none;">

</form>
<button id="btnPaymentSuccessful" wire:click="paymentSuccessful({{Auth::user()->idclient}})" type="submit" style="display: none;"></button>

</div>
@else
    <div class="m-1">
        <p>Vous devez être connecté pour pouvoir finaliser votre commande</p>
    </div>
@endif
