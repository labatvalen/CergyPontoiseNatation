<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--  Commandes pour ouvrir : -->
<!--  php -S localhost:8080   -->
<!--  http://localhost:8080/  -->

<?php

    session_start ();

    if(empty($_SESSION)){
        header ('location: page_connexion.php');
    }

?>


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">

<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title> Affichage </title>
</head>

<body class="font-weight-light">

<!--    Fond d'ecran de la page home  -->
    <img class="wallpaper_pages" src="Contents/piscine.jpg" alt="walpaper">

<!--    Barre de navigation avec les lien vers les autres pages  -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4478e3;">
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">

            </a>
<!--        Icon dans la barre de navigation  -->
        <a class="navbar-brand" href="#" style="color:white">
            <img src="Contents/nageur_glyphicon.png" style="width: 35px ; height: 35px ; border-radius: 4px; margin-right: 20px;" class="d-inline-block align-top" alt="icon de nageur">

            Cergy - Pontoise Natation
        </a>

<!--        Liens pour les differentes pages avec class liens_navbar pour les decaler  -->
        <div class="collapse navbar-collapse liens_navbar" id="navbarTogglerDemo01">
            <!--        Liens pour recharger la page  -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="Cergy-Pontoise%20Natation.php" style="color:white">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php" style="color:white">Déconnexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="donnees.php" style="color:white">Données</a>
                </li>
            </ul>
        </div>
    </nav>


    <!--    Taille du bloc du contenu de la page  -->
    <div class="mx-auto bloc_donnees taille_boutons_donnees">
<!--        Taille du bloc de boutons  -->
<!--            boutons  -->
            <ul class="nav nav-pills nav-fill justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action active" id="pills-recherche-tab" data-toggle="pill" href="#pills-recherche" role="tab" aria-controls="pills-recherche" aria-selected="true">Informations nageur</a>
                </li>
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action" id="pills-liste-tab" data-toggle="pill" href="#pills-liste" role="tab" aria-controls="pills-liste" aria-selected="true">Liste des nageurs</a>
                </li>
            </ul>
    </div>

    <div class="font-weight-light text-light">
<!--        Bloc dynamique avec le contenu qui apparait en fonction du bouton  -->
        <div class="tab-content" id="pills-tabContent">
<!--            texte du bouton ajouter  -->
            <div class="tab-pane fade show active" id="pills-recherche" role="tabpanel" aria-labelledby="pills-recherche-tab">

                <div class="content_page font-weight-light text-light">

                    <div class="row">
                    <div class="col-sm-6">
                        <div style="height: 80px;">
                            <h4 class="font-weight-light text-light" style="margin-bottom:20px;">Rechercher des informations</h4>
                        </div>
                        <form class="border-right" method="get" action="affichage.php">
                                <div class="form-group row">
                                    <label for="colFormLabel" class="col-sm-2 col-form-label">Prénom</label>
                                    <div class="col-sm-6">
                                        <input name="prenom" id="prenom" class="form-control" type="text" placeholder="Prénom">
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                    <div class="col-sm-6">
                                        <input name="nom" id="nom" class="form-control" type="text" placeholder="Nom">
                                    </div>
                                </div>

                                <br/>
                                <br/>
                                <br/>

                            <button class="btn btn-light" type="summit" >
                                Valider
                            </button>

                        </form>
                    </div>

                    <div class="col-sm-6">
                        <div style="height: 80px;">
                            <a class="btn btn-light" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="position: relative; margin-bottom:20px;">
                                Recherches supplémentaires
                            </a>
                        </div>

                        <div class="collapse" id="collapseExample">
                            <form>
                                <div class="btn-group">

                                    <div class="dropdown " style="margin: 0 10px 0 0;">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Bassins
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                            <?php
                                                require_once("dropdown.php");
                                                $req = "SELECT DISTINCT bassin FROM Performance";

                                                $id = "bassin";
                                                $name = "bassin";

                                                dropdown($req, $id, $name);


                                            ?>

                                        </div>
                                    </div>

                                    <div class="dropdown" style="margin: 0 10px 0 0;">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Sexe
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <option value="femme">Femme</option>
                                            <option value="homme">Homme</option>

                                        </div>
                                    </div>

                                    <div class="dropdown" style="margin: 0 10px 0 0;">
                                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Groupe
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">


                                             <?php
                                                require_once("dropdown.php");
                                                $req = "SELECT nom, id FROM Groupe";

                                                $id = "id";
                                                $name = "nom";

                                                dropdown($req, $id, $name);

                                            ?>

                                        </div>

                                    </div>

                                </div>
                        <button class="btn btn-light" type="summit" >
                            Valider
                        </button>
                    </form>
                        </div>
                    </div>
                        </div>


                </div>




                                <?php

                                    include_once("affichageNageur.php");
                                    echo "</div>";

                                ?>
            </div>

            <!--     text du bouton modifier  -->
        <div class="tab-pane fade" id="pills-liste" role="tabpanel" aria-labelledby="pills-liste-tab">

            <div class="tableau card-deck content_page font-weight-light">
                <?php
                    include_once("afficheNageurs.php");
                    echo "</div>";
                ?>
            </div>

        </div>
        </div>

        </div>




    <footer class="vague">
        <svg viewBox="0 0 120 28">
            <defs>

                <feGaussianBlur in="SourceGraphic" stdDeviation="1" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="
                        1 0 0 0 0
                        0 1 0 0 0
                        0 0 1 0 0
                        0 0 0 13 -9" result="goo" />
                <xfeBlend in="SourceGraphic" in2="goo" />
                <path id="wave" d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
            </defs>

            <use id="wave3" class="wave" xlink:href="#wave" x="0" y="-2" ></use>
            <use id="wave2" class="wave" xlink:href="#wave" x="0" y="0" ></use>
            <use id="wave1" class="wave" xlink:href="#wave" x="0" y="1" />

            <path   id="wave1"  class="wave" d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15  180,15 210,15 210,10 240,10 v 28 h -240 z" />

        </svg>
    </footer>

    <div style="background-color: #4478e3; opacity:1; position: relative;">
        <div class="content_page font-weight-light text-light">

        </div>


        <div class="row" style="position: bottom; width: 100%; padding-bottom: 10px;">
            <div class="col-6 text-right text-light">
                Junior Cap'Eisti 2019-2020
            </div>
            <div class="col-3 text-left text-light">
                © Copyright
            </div>

            <div class="icons col-2">
                    <a href="https://www.facebook.com/" class="rounded fa fa-facebook"></a>
                    <a href="" class="rounded fa fa-twitter"></a>
                    <a href="https://www.instagram.com/" class="rounded fa fa-instagram"></a>
            </div>
        </div>

    </div>




</body>
</html>
