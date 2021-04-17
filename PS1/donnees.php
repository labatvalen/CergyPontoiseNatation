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
	<title> Données </title>
</head>
    
<body class="overflow-auto font-weight-light">
 
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
                    <a class="list-group-item list-group-item-action" id="pills-ajouter-tab" data-toggle="pill" href="#pills-ajouter" role="tab" aria-controls="pills-ajouter" aria-selected="true">Ajouter</a>
                </li>
            
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action active" id="pills-importer-tab" data-toggle="pill" href="#pills-importer" role="tab" aria-controls="pills-importer" aria-selected="true">Importer</a>
                </li>
            </ul>
        </div>
    <div class="deck_menu">
<!--        Bloc dynamique avec le contenu qui apparait en fonction du bouton  -->
        <div class="tab-content" id="pills-tabContent">
<!--            texte du bouton ajouter  -->
            <div class="tab-pane fade" id="pills-ajouter" role="tabpanel" aria-labelledby="pills-ajouter-tab">
                
                
                <form method="get" action="ajouterBDD.php">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nom">Nom</label>
                            <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="age">Age</label>
                            <input name="age" type="text" class="form-control" id="age" placeholder="Année de naissance">
                        </div>
                    </div>
                    <br/>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                                <label for="club">Club</label>
                                <input  type="text" class="form-control" id="club" name="club" placeholder="Club">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="code">Code du club</label>
                            <input  type="text" class="form-control" id="code" name="code" placeholder="Code du club">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="nage">Type de nage</label>
                            <input  type="text" class="form-control" id="nage" name="nage" placeholder="Nage">
                        </div>
                        
                         <div class="form-group col-md-4">
                            <label for="longueur">Longeur</label>
                            <input  type="text" class="form-control" id="longueur" name="longueur" placeholder="longueur">
                        </div>
                        
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="sexe">Sexe</label>
                            <select id="sexe" name="sexe" class="form-control">
                                <option>H</option>
                                <option>F</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="pays">Pays</label>
                            <select id="pays" name="pays" class="form-control">
                                <option>FRA</option>
                                <option>AUTRE</option>
                            </select>
                        </div>
                        
    
                        
                        <div class="form-group col-md-4">
                            <label for="bassin">Bassin</label>
                            <select id="bassin" name="bassin" class="form-control">
                                <option>25</option>
                                <option>50</option>
                            </select>
                        </div>
                        
                    </div>
                     
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="min">Temps</label>
                            <input name="min" type="text" class="form-control" id="min" placeholder="Temps en minutes">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="s">Seconde</label>
                            <input type="text" class="form-control" id="s" name="s" placeholder="Temps en seconde">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ms">Milliseconde</label>
                            <input type="text" class="form-control" id="ms" name="ms" placeholder="Temps en Miliseconde">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="date">Date</label>
                            <input name="date" type="date" class="form-control" id="date" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ville">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
                        </div>
                        <div class="form-group col-md-4">
                        <label for="saison">Saison</label>
                            <input type="text" class="form-control" id="saison" name="saison" placeholder="Saison">
                        </div>
                    </div>

                       
                        
                  <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
                
            
                
                
                
                
        
                <div style='height:350px;'></div>
                
            </div>


            
            
<!--            texte du bouton importer  -->
            <div class="tab-pane fade show active" id="pills-importer" role="tabpanel" aria-labelledby="pills-importer-tab">    
    
                
                <!-- Le type d'encodage des données, enctype, DOIT être spécifié comme ce qui suit -->
                <form class="needs-validation" enctype="multipart/form-data" action="donnees.php" method="post">
                    
                    <h6 class="text-xl-left font-weight-light">Attention toute importation de fichier écrasera l'ancienne</h6>
                    
                    <div class="row">
                        <div class="custom-file col-4" style="width : 36em;">
                                <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
                                
                                <label class="custom-file-label" for="filename">Entrer de fichiers csv</label>
                                <input class="custom-file-input" id="filename" name="filename" type="file" accept=".csv" required/>
                        </div>
                        <div class="col-2">

                            <button type="summit" class="btn btn-primary" value="valider" >Importer</button>
                        </div>
                    </div>
            
                </form>
                
                <br/>
                
                
                <div class="">
                    <h5 class="text-xl-left font-weight-light">Attention les fichiers volumineux prennent du temps à se charger</h5>
                    
                    <br/>
                    <?php

    
                        function lireFichier($name){
                                
                                echo $name."<br/>";
                                // 1 : on ouvre le fichier
                                $fic = "Uploads/".$name;
                                $fichier = fopen($fic, 'r+');

                                // 2 : on fera ici nos opérations sur le fichier...
                                $fileLines = file($fic);
                                $n = count($fileLines);

                                for ($i = 1; $i <= $n; $i++){        
                                    $txt = fgets($fichier);
                                    //echo $txt."<br/>";
                                    $mot = explode("\"", $txt);


                                    $taille = count($mot);
                                    $txt = "";

                                    for ($j = 1; $j < $taille; $j++){
                                        if ($j % 2 == 1){
                                            $txt = $txt." ".$mot[$j] ;
                                        }
                                    }
                                    echo $txt."<br/>";
                                }

                                // 3 : quand on a fini de l'utiliser, on ferme le fichier
                                fclose($fichier);
                            }



                        function uploadFichier(){

                            $uploadDir = "./Uploads/";

                            if ($_FILES['filename']['error']  > 0 ) {
                                echo 'Erreur:'.$_FILES['filename']['error'].'<br/>';
                            } 
                            else {
                                $res = move_uploaded_file($_FILES['filename']['tmp_name'],$uploadDir.$_FILES['filename']['name']);
                                //echo $res;
                            }
                            header ('location: donnees.php');

                        }
                        
                        require_once("util.php");
                        
                        if (!empty($_FILES)){
                            uploadFichier();
                            remplirBDD("./Uploads/".$_FILES['filename']['name']);
                            lireFichier($_FILES['filename']['name']);
                            unset($_FILES);

                        }
                        else{
                            echo "<div style='height:200px;'></div>";
                        }

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
    </div>
    
</body>
</html>