<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Préstations | TerraDouceurs</title> <!-- Ajoutez votre titre ici -->
    
    <!-- Lien vers votre fichier CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body>
<section id="container">
    <header>
        <div class="header-container">
            <div class="logo-menu">
                <div class="logo1">
                    <img src="{{ asset('images/logo-menu.webp') }}" alt="Logo1">
                </div>
                <hr> <!-- Ligne de séparation -->
                <nav class="menu-navigation">
                    <ul>
                        <!-- Ajoutez vos liens de navigation ici -->
                        <li><a href="#">La Conserverie</a></li>
                        <li><a href="#produits">Les Produits</a></li>
                        <li><a href="#pointsvente">Les points de vente</a></li>
                        <li><a href="#journal">Journal Douceur</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="auth">
                @if(auth()->check())
                    <a href="{{ route('profile.edit') }}">{{ decrypt(Auth::user()->name) }} {{ decrypt(Auth::user()->first_name) }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Déconnexion') }}
                    </x-dropdown-link>
                @else
                    <a href="{{ route('login') }}">Connexion</a>
                    <a href="{{ route('register') }}">Inscription</a>
                @endif
            </div>
        </div>
    </header>
</section>
<section class="carousel-section">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="4000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banniere-1-500-5.webp') }}" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banniere-1-500-6.webp') }}" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banniere-1-500-7.webp') }}" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banniere-1-500-8.webp') }}" class="d-block w-100" alt="Image 4">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banniere-1-500-9.webp') }}" class="d-block w-100" alt="Image 5">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banniere-1-500-10.webp') }}" class="d-block w-100" alt="Image 6">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banniere-1-500-11.webp') }}" class="d-block w-100" alt="Image 7">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banniere-1-500-12.webp') }}" class="d-block w-100" alt="Image 8">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Précédent</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Suivant</span>
        </a>
    </div>
    <script>
        $(document).ready(function(){
            $('.carousel').carousel();
        });
    </script>
</section>

<section class="travail_a_facon">
    <div class="container">
        <div class="row">
            <!-- Première section pour l'image -->
            <div class="col-md-6 image">
                <img src="{{ asset('images/IMG_1426-1-1024x683.webp') }}" alt="Image de la première section">
            </div>
            <!-- Deuxième section pour le texte -->
            <div class="col-md-6 texte">
                <h2>Le Travail à Façon</h2>
                <hr>
                <p>Le travail à façon, est le fait de fabriquer (cuisiner en ce qui nous concerne) pour le compte de tiers.
                <br><br>Chez Terra Douceurs, le travail à façon représente plusieurs dizaines de tonnes de fruits et légumes que vous nous confiez afin que nous les transformions en délicieuses conserves que vous pourrez ensuite commercialiser auprès de votre clientèle habituelle sans risque de la perdre.
                <br><br>Le travail à façon chez Terra Douceurs, c’est aussi et surtout la garantie pour vous, de retrouver dans vos bocaux, uniquement les fruits et légumes produits sur votre exploitation.
                <br><br>En effet, pas de mélange d’origine chez nous.</p>
            </div>
        </div>
    </div>
</section>

<section class="fabrique_a_lyon">
    <div class="container">
        <div class="row">
            <!-- Première section pour le logo -->
            <div class="col-md-4 logo">
                <!-- Remplacez 'logo_src' par le chemin de votre logo -->
                <img src="{{ asset('images/Logo_Label_FAL.webp') }}" alt="Logo Fabriqué à Lyon">
            </div>
            <!-- Deuxième section pour le texte 'Objectif' -->
            <div class="col-md-4 objectif">
                <h2>Objectif</h2>
                <hr>
                <ul>
                    <li>Vous gagnez du temps pour gérer vos autres activités.</li>
                    <li>Vous répondez aux normes sanitaires et d'étiquetage en vigueur.</li>
                    <li>Vous avez la garantie d'une traçabilité complète de vos produits transformés.</li>
                    <li>Vous diversifiez votre offre produit,</li>
                    <li>Vous avez jusqu'à 3 ans pour vendre votre production.</li>
                </ul>
            </div>
            <!-- Troisième section pour le texte 'D’Autres Points' -->
            <div class="col-md-4 autres_points">
                <h2>D’Autres Points</h2>
                <hr>
                <ul>
                    <li>Vous disposez d'une offre complémentaire pour vos circuits courts; par lot d'environ 70kg de produits bruts (selon recette et conditionnement).</li>
                    <li>Vous limitez le gaspillage de votre production agricole.</li>
                    <li>Vous limitez l'empreinte carbone en favorisant les circuits courts</li>
                    <li>Vous favorisez l'emploi de personnes porteuses de handicaps cognitifs.</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="co-financeurs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Nos Co-Financeurs</h2>
                <hr>
            </div>
            <div class="logo-cof">
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Sans-titre-4.webp') }}" alt="Logo de l'Union Européenne">
                </div>
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Sans-titre-5.webp') }}" alt="Logo de Rhône Développement Initiative">
                </div>
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Sans-titre-6.webp') }}" alt="Logo de RHÔNE LE DÉPARTEMENT">
                </div>
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Sans-titre-7.webp') }}" alt="Logo de Chambre de Métiers et de l'Artisanat">
                </div>
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Sans-titre-8.webp') }}" alt="Logo de L'EUROPE S'ENGAGE en region Auvergne-Rhône-Alpes">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partenaires">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Nos Partenaires</h2>
                <hr>
            </div>
            <div class="logo-part">
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Sans-titre-1.webp') }}" alt="Logo du partenaire 1">
                </div>
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Screenshot_2021-01-14-Actualits.webp') }}" alt="Logo du partenaire 2">
                </div>
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Sans-titre-2.webp') }}" alt="Logo du partenaire 3">
                </div>
                <div class="col-md-2 logo">
                    <img src="{{ asset('images/Sans-titre-3.webp') }}" alt="Logo du partenaire 4">
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright © Terra Douceurs, créé par Sonny Russo</p>
            </div>
        </div>
    </div>
</footer>


</body>
</html>