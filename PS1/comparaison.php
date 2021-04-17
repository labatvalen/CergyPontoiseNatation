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
	<title> Comparaison </title>
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
    
        
        <div class="border-right" method="" action="" id="cacherform">
    
        <div class="content_page row">
            <div class="col-sm-6">
                <div style="height: 80px;">
                    <h4 class="font-weight-light text-dark" style="margin-bottom:20px;">Comparer : </h4>
                </div>
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
                        
                        <div class="form-group row">
                            <label for="nom" class="col-2 col-form-label">Age</label>
                            
                            <div class="form-group col-3">
                                    <select id="inputState" class="form-control">
                                        <option selected value=""></option>
                                        <?php
                                        
                                            for($i = 4; $i <= 80; $i++){
                                                echo "<option>".$i."</option>";
                                            }
                                            
                                        ?>
                                        
                                    </select>
                                </div>  
                        </div>
                    
                        
                    
                        <div class="form-group row">
                            <div class="col-1"></div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="sexe" class="custom-control-input" value="femme">
                                <label class="custom-control-label" for="customRadioInline1">Femme</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" name="sexe" class="custom-control-input" value="homme">
                              <label class="custom-control-label" for="customRadioInline2">Homme</label>
                            </div>
                        </div>
                        
        
                    
                        <br/>
                        <br/>
                        <br/>
                    
            </div>
            
            <div class="col-sm-6">
                <div style="height: 80px;">
                    <h4 class="font-weight-light text-dark" style="margin-bottom:20px;">à :</h4>
                </div>
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
                        
                        <div class="form-group row">
                            <label for="nom" class="col-2 col-form-label">Age</label>
                            
                            <div class="form-group col-3">
                                    <select id="inputState" class="form-control">
                                        <option selected value=""></option>
                                        <?php
                                        
                                            for($i = 4; $i <= 80; $i++){
                                                echo "<option>".$i."</option>";
                                            }
                                            
                                        ?>
                                        
                                    </select>
                                </div>  
                        </div>
                    
                        
                    
                        <div class="form-group row">
                            <div class="col-1"></div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="sexe" class="custom-control-input" value="femme">
                                <label class="custom-control-label" for="customRadioInline1">Femme</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" name="sexe" class="custom-control-input" value="homme">
                              <label class="custom-control-label" for="customRadioInline2">Homme</label>
                            </div>
                        </div>
                        
        
                    
                        <br/>
                        <br/>
                        <br/>
                        
                    <button class="btn btn-light" type="" onclick="cacher()">
                        Valider
                    </button>
                    
            </div>
        </div>
    </div>
    
    <div id="returnRefres" class="content_page" style="position: relative;" hidden> <img src="Contents/compa.JPG"> </div>
                    
                    <script type="text/javascript">
                        function cacher(){
                            var form = document.getElementById('cacherform');
                            form.setAttribute("hidden","");

                            var afficher = document.getElementById('returnRefres');
                            afficher.removeAttribute("hidden");

                        }
                    </script>

    
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