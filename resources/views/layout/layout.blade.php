<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat vente d'occasion en ligne ou en dépôt vente | Troc</title>
    <link rel="icon" href="https://www.troc.com/images/logo-troc.svg" type="image/x-icon"/>
    @livewireStyles
    <!-- Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.6.3.js"
  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/produit.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/list.css') }}"/>
    <script src="https://js.stripe.com/v3/"></script>

  </head>

</head>
<body>
<!-- <nav class="navbar bg-dark d-none d-md-block text-light">informations sur le paiement</nav> -->

<!-- <nav class="navbar navbar-expend-lg flex-nowrap d-flex justify-content-around"> -->
    <!-- Logo -->
    <!-- <div class="container justify-content-around">
      <a class="navbar-brand" href="/test">
        <img src="https://www.troc.com/images/logo-troc.svg" alt="Troc" width="140px">
      </a>
    </div> -->
      <!-- Barre de recherche -->
    <!-- <div class="container border border-dark justify-content-around" style="height: 50px; border-radius: 50px; width:fit-content;">
      <form class="d-flex align-self-center" role="search" action="/produitRecherche" >
        <input class="border-0" type="search" placeholder="Rechercher un produit" aria-label="Search">
        <button type="button" class="btn btn-dark rounded-circle" type="submit">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="25" fill="yellow" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
        </button>
      </form>
    </div> -->

    <!-- <div class="container justify-content-around">
    <button type="button" class = "btn btn-info border-0" id="btnConnexion" data-toggle = "modal" data-target = "#loginmodal">Connexion</button>
      <div class="modal fade " id="loginmodal" tabindex="-1" role = "dialog" aria-labelledby="ModalLabel" aria-hidden="true">
        <div class="modal-dialog" role = "document">
          <div class = "modal-content">
            <div class= "modal-header">
              <button type = "button" class="close" data-dismiss="modal" aria-label="Fermer">
                <span aria-hidden="true">x</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="text-center">
                <h4>Connexion</h4>
              </div>
              <div class="d-flex flex-column text-center">
                <form>
                <div class="form-group">
                  <input type="email" class="form-control" id="emailclient"placeholder="Votre email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" placeholder="Mot de passe" required>
                </div>
                <button type="button" class="btn btn-info btn-block btn-round border-0"  id="btnConnexion" >Connexion</button>
                <button type="button" onclick="window.location.href = 'http://51.83.36.122:8081/creation/add';" class="btn btn-info btn-block btn-round border-0" id="btnConnexion">Inscription</button>

                
                </form>
            </div>
          </div>
        </div>
      </div>
    </div> -->

   



  <!-- </nav>

  <nav class="navbar navbar-expand-lg" style="background-color: #ffed00;">
    <div class="container-fluid">

      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Catégories
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categorie?idRayon=131">Table basses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categorie?idRayon=132">Meubles TV HIFI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categorie?idRayon=133">Bars</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categorie?idRayon=134">Canapés - Salons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categorie?idRayon=135">Fauteuils - Sièges divers</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
    <!-- <div class="container">

      <div class="content">

    
      </div>

      
    </div> -->

    <!-- <button type="button" class="btn" data-toggle="modal" data-target="#modalCookies">cookies</button> -->

    <!-- modal -->
    <!-- <div class="modal fade" id="modalCookies" tabindex="-1" aria-labelledby="modalCookiesLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          cookies
        </div>
        <div class="modal-footer">
          <button id="btnAcceptCookies" type="button" class="btn btn-secondary" data-dismiss="modal">Accepter</button>
        </div>
      </div>
    </div> -->

    <!-- <script type="module" src="https://cookieconsent.popupsmart.com/js/CookieConsent.js" ></script>
<script type="text/javascript" src="https://cookieconsent.popupsmart.com/js/App.js"></script>
<script>
    popupsmartCookieConsentPopup({
        "siteName" : "Troc" ,
        "notice_banner_type": "popup",
        "consent_type": "e-privacy",
        "palette": "light",
        "language": "French",
        "privacy_policy_url" : "#" ,
        "preferencesId" : "#" ,
        "companyLogoURL" : "https://d2r80wdbkwti6l.cloudfront.net/FPmsYipMIb180BEU0uPobEoSQEN5As85.jpg"
    });
</script>

<noscript>Cookie Consent by <a href="https://popupsmart.com/" rel="nofollow noopener">Popupsmart Website</a></noscript>  -->

<script type="module" src="https://cookieconsent.popupsmart.com/js/CookieConsent.js" ></script>
<script type="text/javascript" src="https://cookieconsent.popupsmart.com/js/App.js"></script>
<script>
    popupsmartCookieConsentPopup({
        "siteName" : "Troc" ,
        "notice_banner_type": "popup",
        "consent_type": "gdpr",
        "palette": "light",
        "language": "French",
        "privacy_policy_url" : "#" ,
        "preferencesId" : "#" ,
        "companyLogoURL" : "https://d2r80wdbkwti6l.cloudfront.net/FPmsYipMIb180BEU0uPobEoSQEN5As85.jpg"
        
    });
</script>

<noscript>Cookie Consent by <a href="https://popupsmart.com/" rel="nofollow noopener">Popupsmart Website</a></noscript> 



    <livewire:layout>
    @yield('content')
    @livewireScripts
    


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>




</html>