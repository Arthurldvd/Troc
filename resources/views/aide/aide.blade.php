@extends('footer.footer')
@extends('layout.layout')


@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('/css/aide.css') }}"/>
<div id="page-aide">
<h1 class="Title">Guide utilisateur client</h1>

        <h3 class="summary">Mon compte</h3>

        <p class="summ"><a href="#cpt">Comment se créer un compte ?</a></p>
        <p class="summ"><a href="#con">Comment se connecter ?</a></p>
        <p class="summ"><a href="#acc">Comment accéder aux informations du compte une fois connecté ?</a></p>

        <h3 class="summary">Ma commande</h3>

        <p class="summ"><a href="#com">Comment acheter un produit ?</a></p>

        <h3 class="summary">Nos produits</h3>

        <p class="summ"><a href="#pro">Comment voir la page d’un produit ?</a></p>
        <p class="summ"><a href="#pan">Comment ajouter un produit au panier ?</a></p>
        <p class="summ"><a href="#pani">Comment voir le panier ?</a></p>
        <p class="summ"><a href="#fav">Comment créer une liste de favoris ?</a></p>
        <p class="summ"><a href="#favo">Comment ajouter un produit à une liste de favoris ?</a></p>

        <h3 class="summary">Divers</h3>

        <p class="summ"><a href="#coo">Comment configurer l'uttilisation des cookies ?</a></p>

        <br><br>
        <br><br>
        <br><br>
        <br><br>


    <li>
    <h1 class="Section" >Comment se créer un compte ?</h1>
    <div id="cpt">
    <h2>Pour se créer un compte :</h2>
    <p>Cliquer sur le bouton « connexion » en haut à droite de la page</p>
    <img class="resise" src="https://www.zupimages.net/up/23/03/tjcq.png" alt="">
    <p>Cliquer sur inscription </p>
    <img src="https://www.zupimages.net/up/23/03/9y90.png" alt="">
    <p>"Remplir les informations de compte<br>
        Cliquer sur valider en bas de la page"</p>
    </div>
    </li>

    <li>
    <h1 class="Section" id="con">Comment se connecter</h1>
    <div>
    <h2>Pour se connecter :</h2>
    <p>Cliquer sur le bouton « connexion » en haut à droite de la page</p>
    <img class="resise" src="https://www.zupimages.net/up/23/03/tjcq.png" alt="">
    <p>Remplir les informations de compte<br>
        (Si vous ne possedez pas de compte, <span class="Voir">Voir <a href="#cpt" class="ref">comment se créer un compte)</a></span><br>
        Cliquez sur le bouton connexion</p>
    </div>
    </li>

    <li>
    <h1  class="Section" id="acc">Comment accéder aux informations du compte une fois connecté ?</h1>
    <div>
    <p>Cliquer sur le bouton « bonjour » avec votre prénom mis lors de la création de compte</p>
    <img class="resise" src="https://www.zupimages.net/up/23/03/xb3g.png" alt="">
    <h2>A quoi servent les boutons sur cette page ?</h2>

    <h3>Se déconnecter :</h3>
    <p>Ce bouton permet à l’utilisateur de se déconnecter de son compte</p>
    <h3>Anonymiser :</h3>
    <p>Ce bouton permet à l’utilisateur d’anonymiser toutes ces données<br>
        ⚠ L’action n’est pas annulable</p>
    <h3>Modifier :</h3>
    <p>Ce bouton permet de modifier les informations du compte</p>
    </li>

    <li>
        <h1  class="Section" id="com">Comment acheter un produit ?</h1>
        <div>
        <p>Après avoir ajouté un produit dans son panier<br>
            (<span class="Voir">Voir <a href="#pan" class="ref">comment ajouter un produit dans son panier ?</a></span>)<br>
            Rendez vous dans votre panier<br>
            (<span class="Voir">Voir <a href="#pani" class="ref">comment accéder à son panier ?</a></span>)<br>
            Vous pouvez ensuite payer grâce au site de Paypal<br>
            Cliquer sur Payer avec Paypal </p>
        <img src="https://www.zupimages.net/up/23/03/3nv7.png" alt="">
        <p>Vous pouvez aussi payer sur le site
            Cliquez sur Carte Bancaire et remplissez les informations demandées
            </p>
        <img src="https://www.zupimages.net/up/23/03/0qr4.png" alt="">
        <p>Enfin, Cliquez sur Acheter</p>
        <img src="https://www.zupimages.net/up/23/03/77of.png" alt="">
        </div>
        </li>

        <li>
        <h1  class="Section" id="pro">Comment voir la page d’un produit ?</h1>
        <div>
        <h2>Il existe 4 moyens de voir des produits :</h2>
        <h3>La barre de recherche :</h3>
        <img src="https://www.zupimages.net/up/23/03/8kea.png" alt="">
        <p>La barre de recherches se trouve en haut au milieu de la page<br>
            il s’agit d’une recherche par mots clés</p>
        <h3>La sélection par catégorie : </h3>
        <img class="resise" src="https://www.zupimages.net/up/23/03/wekp.png" alt="">
        <p>Dans la barre de navigation, Cliquez sur Catégories<br>
            A partir de là, cliquez sur la catégorie souhaitée</p>
        <h3>Les Bons plans : </h3>
        <img class="resise" src="https://www.zupimages.net/up/23/03/ifwq.png" alt="">
        <p>Dans la barre de navigation, cliquez sur Bons Plans</p>
        <h3>Sélection Troc : </h3>
        <img class="resise" src="https://www.zupimages.net/up/23/03/bvmx.png" alt="">
        <p>Dans la barre de navigation, cliquez sur Sélection Troc<br>
            Après avoir cherché votre produit, cliquez sur celui-ci pour voir sa page</p>
        </div>
        </li>
        <li>
        <h1  class="Section" id="pan">Comment ajouter un produit dans son panier ?</h1>
        <div>
        <p>Tout en étant sur la page d'un produit, <br>
            (<span class="Voir">Voir <a href="#pro" class="ref">comment voire la page d'un produit ?</a></span>)<br>
            cliquez sur "ajouter au panier"</p>
        <img class="resise" src="https://www.zupimages.net/up/23/03/qd5j.png" alt="">
        </div>
        </li>
        <li>
            <h1  class="Section" id="pani">Comment accéder à son panier ?</h1>
            <div>
            <p>Après avoir ajouté des produits dans son panier <br>
                (<span class="Voir">Voir <a href="#pan" class="ref">comment ajouter un produit dans son panier ?</a></span>)<br>
                Allez dans la page Panier de la barre de navigation</p>
            </div>
            </li>

    <li>
    <h1  class="Section" id="fav">Comment créer une liste de favoris ?</h1>
    <p>Une fois connecté (<span class="Voir">Voir <a href="#con" class="ref">Comment se connecter</a></span>), Aller sur la page Favoris<br>
        Entrez dans la case le nom de la liste à créer<br>
        Une fois le nom rempli, la liste est créée, appuyez sur la touche F5 pour voir la liste</p>
    </div>
    </li>

    <li>
    <h1  class="Section" id="favo">Comment ajouter un produit a une liste de favoris ?</h1>
    <div>
    <p>Une fois sur une page produit (<span class="Voir">Voir <a href="#pro" class="ref">comment voir la page d’un produit ?</a></span>)<br>
        Cliquez sur le bouton Suivre le produit </p>
    <img class="resise" src="https://www.zupimages.net/up/23/03/nrg5.png" alt="">
    <p>Ensuite, cliquez sur la liste souhaitée parmi celles proposées</p>
    <img class="resise" src="https://www.zupimages.net/up/23/03/jq2t.png" alt="">
    </div>
    </li>

    <li>
    <h1  class="Section" id="coo">Comment configurer l'uttilisation des cookies ?</h1>
    <div>
    <p>Lors de la première arrivée sur le site de Troc, il y a un popup conscernant les cookies.<br>Libre a vous de l'accepter ou non, le bouton "changer mes préférences" va permettre de configurer les cookies</p>
    <img src="https://www.zupimages.net/up/23/03/4zod.png" alt="">
    </li>
</div>
@endsection
