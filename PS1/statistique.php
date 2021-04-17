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
    $GLOBALS["server"]="localhost";
    $GLOBALS["user"]="fromentfel";
    $GLOBALS["mdp"]="Shaizajah3Sh";
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
	<title> Statistiques </title>
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
                    <a class="list-group-item list-group-item-action active" id="pills-amelioration-tab" data-toggle="pill" href="#pills-amelioration" role="tab" aria-controls="pills-amelioration" aria-selected="true">Amélioration</a>
                </li>
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action" id="pills-moy-tab" data-toggle="pill" href="#pills-moy" role="tab" aria-controls="pills-moy" aria-selected="true">Moyennes /Médianes</a>
                </li>

            </ul>
    </div>





        <div class="deck_menu">
<!--        Bloc dynamique qui avec le contenu qui apparait en fonction du bouton  -->
        <div class="tab-content" id="list-tabContent">
    <!--            texte du bouton 1  -->
            <div class="tab-pane fade show active" id="pills-amelioration" role="tabpanel" aria-labelledby="pills-amelioration-tab">
                <div class="table table-bordered">
                    <table class="table">
                        <thead>
                            <tr class="text-center table-warning">
                                <th scope="col"></th>
                                <th colspan="6">Nage Libre</th>
                                <th colspan="3">Dos</th>
                                <th colspan="3">Brasse</th>
                                <th colspan="3">Papillon</th>
                                <th colspan="2">4 Nages</th>
                            </tr>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">50</th>
                                <th scope="col">100</th>
                                <th scope="col">200</th>
                                <th scope="col">400</th>
                                <th scope="col">800</th>
                                <th scope="col">1500</th>
                                <th scope="col">50</th>
                                <th scope="col">100</th>
                                <th scope="col">200</th>
                                <th scope="col">50</th>
                                <th scope="col">100</th>
                                <th scope="col">200</th>
                                <th scope="col">50</th>
                                <th scope="col">100</th>
                                <th scope="col">200</th>
                                <th scope="col">200</th>
                                <th scope="col">400</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          echo $_GET['nom']." ".$_GET['prenom'];
                            // Connection à la BDD
                            $db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
                            $boolRes = mysqli_select_db($db, 'Projet');

                            $annee="";
                            $idSaison="";

                            $query="SELECT * FROM Saison";
                            $res = mysqli_query($db, $query) or die('Request error : '.$query);
                            while ($row1=mysqli_fetch_assoc($res)) {

                                $nl50="-";
                                $nl100="-";
                                $nl200="-";
                                $nl400="-";
                                $nl800="-";
                                $nl1500="-";
                                $ds50="-";
                                $ds100="-";
                                $ds200="-";
                                $br50="-";
                                $br100="-";
                                $br200="-";
                                $pp50="-";
                                $pp100="-";
                                $pp200="-";
                                $n4200="-";
                                $n4400="-";
                              $annee=$row1['annee'];
                              $idSaison=$row1['id'];
                              echo '<tr>
                                  <th scope="row"> Saison '.$annee.'</th>';

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Nage Libre') AND idDistance=(SELECT id FROM Distance WHERE longueur='50') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $nl50=formatTemps($row['temps']);
                              }
                              echo "<td>".$nl50."</td>";

                                $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Nage Libre') AND idDistance=(SELECT id FROM Distance WHERE longueur='100') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $nl100=formatTemps($row['temps']);
                              }
                              echo "<td>".$nl100."</td>";

                                $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Nage Libre') AND idDistance=(SELECT id FROM Distance WHERE longueur='200') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison."";
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $nl200=formatTemps($row['temps']);
                              }
                              echo "<td>".$nl200."</td>";

                                $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Nage Libre') AND idDistance=(SELECT id FROM Distance WHERE longueur='400') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $nl400=formatTemps($row['temps']);
                              }
                              echo "<td>".$nl400."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Nage Libre') AND idDistance=(SELECT id FROM Distance WHERE longueur='800') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $nl800=formatTemps($row['temps']);
                              }
                              echo "<td>".$nl800."</td>";

                                $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Nage Libre') AND idDistance=(SELECT id FROM Distance WHERE longueur='1500') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $nl1500=formatTemps($row['temps']);
                              }
                              echo "<td>".$nl1500."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Dos') AND idDistance=(SELECT id FROM Distance WHERE longueur='50') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $ds50=formatTemps($row['temps']);
                              }
                              echo "<td>".$ds50."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Dos') AND idDistance=(SELECT id FROM Distance WHERE longueur='100') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $ds100=formatTemps($row['temps']);
                              }
                              echo "<td>".$ds100."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Dos') AND idDistance=(SELECT id FROM Distance WHERE longueur='200') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $ds200=formatTemps($row['temps']);
                              }
                              echo "<td>".$ds200."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Brasse') AND idDistance=(SELECT id FROM Distance WHERE longueur='50') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $br50=formatTemps($row['temps']);
                              }
                              echo "<td>".$br50."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Brasse') AND idDistance=(SELECT id FROM Distance WHERE longueur='100') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $br100=formatTemps($row['temps']);
                              }
                              echo "<td>".$br100."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Brasse') AND idDistance=(SELECT id FROM Distance WHERE longueur='200') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $br200=formatTemps($row['temps']);
                              }
                              echo "<td>".$br200."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Papillon') AND idDistance=(SELECT id FROM Distance WHERE longueur='50') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $pp50=formatTemps($row['temps']);
                              }
                              echo "<td>".$pp50."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Papillon') AND idDistance=(SELECT id FROM Distance WHERE longueur='100') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $pp100=formatTemps($row['temps']);
                              }
                              echo "<td>".$pp100."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Papillon') AND idDistance=(SELECT id FROM Distance WHERE longueur='200') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $pp200=formatTemps($row['temps']);
                              }
                              echo "<td>".$pp200."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='4 Nages') AND idDistance=(SELECT id FROM Distance WHERE longueur='200') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $n4200=formatTemps($row['temps']);
                              }
                              echo "<td>".$n4200."</td>";

                              $query52="SELECT Min(temps) as temps FROM Performance WHERE idNage=(SELECT id FROM TypeNage WHERE nom='Papillon') AND idDistance=(SELECT id FROM Distance WHERE longueur='400') AND idNageur=(SELECT id FROM Nageur WHERE nom='".$_GET['nom']."' AND prenom='".$_GET['prenom']."') AND idSaison=".$idSaison ;
                              $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
                              while ($row=mysqli_fetch_assoc($res52)) {
                                  $n4400=formatTemps($row['temps']);
                              }
                              echo "<td>".$n4400."</td>
                              </tr>";
                            }

                            //Après l'ensemble des temps minimum, on affiche le dernier temps

                            $nl50="-";
                            $nl100="-";
                            $nl200="-";
                            $nl400="-";
                            $nl800="-";
                            $nl1500="-";
                            $ds50="-";
                            $ds100="-";
                            $ds200="-";
                            $br50="-";
                            $br100="-";
                            $br200="-";
                            $pp50="-";
                            $pp100="-";
                            $pp200="-";
                            $n4200="-";
                            $n4400="-";

                            echo '<tr>
                                  <th scope="row"> Dernier temps </th>';


                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Nage Libre"),idDistance(50));
                            if($test>0){
                                $nl50=formatTemps($test);
                            }
                            echo "<td>".$nl50."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Nage Libre"),idDistance(100));
                            if($test>0){
                                $nl100=formatTemps($test);
                            }
                            echo "<td>".$nl100."</td>";


                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Nage Libre"),idDistance(200));
                            if($test>0){
                                $nl200=formatTemps($test);
                            }
                            echo "<td>".$nl200."</td>";


                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Nage Libre"),idDistance(400));
                            if($test>0){
                                $nl400=formatTemps($test);
                            }
                            echo "<td>".$nl400."</td>";


                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Nage Libre"),idDistance(800));
                            if($test>0){
                                $nl800=formatTemps($test);
                            }
                            echo "<td>".$nl800."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Nage Libre"),idDistance(1500));
                            if($test>0){
                                $nl1500=formatTemps($test);
                            }
                            echo "<td>".$nl1500."</td>";


                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Dos"),idDistance(50));
                            if($test>0){
                                $ds50=formatTemps($test);
                            }
                            echo "<td>".$ds50."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Dos"),idDistance(100));
                            if($test>0){
                                $ds100=formatTemps($test);
                            }
                            echo "<td>".$ds100."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Dos"),idDistance(200));
                            if($test>0){
                                $ds200=formatTemps($test);
                            }
                            echo "<td>".$ds200."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Brasse"),idDistance(50));
                            if($test>0){
                                $br50=formatTemps($test);
                            }
                            echo "<td>".$br50."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Brasse"),idDistance(100));
                            if($test>0){
                                $br100=formatTemps($test);
                            }
                            echo "<td>".$br100."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Brasse"),idDistance(200));
                            if($test>0){
                                $br200=formatTemps($test);
                            }
                            echo "<td>".$br200."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Papillon"),idDistance(50));
                            if($test>0){
                                $pp50=formatTemps($test);
                            }
                            echo "<td>".$pp50."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Papillon"),idDistance(100));
                            if($test>0){
                                $pp100=formatTemps($test);
                            }
                            echo "<td>".$pp100."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("Papillon"),idDistance(200));
                            if($test>0){
                                $pp200=formatTemps($test);
                            }
                            echo "<td>".$pp200."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("4 Nages"),idDistance(200));
                            if($test>0){
                                $n4200=formatTemps($test);
                            }
                            echo "<td>".$n4200."</td>";

                            $test=dernierTemps($db,$_GET['nom'],$_GET['prenom'],"Tous",idNage("4 Nages"),idDistance(400));
                            if($test>0){
                                $n4400=formatTemps($test);
                            }

                            echo "<td>".$n4400."</td></tr>";

                            //on passe aux marges

                            $nl50="-";
                            $nl100="-";
                            $nl200="-";
                            $nl400="-";
                            $nl800="-";
                            $nl1500="-";
                            $ds50="-";
                            $ds100="-";
                            $ds200="-";
                            $br50="-";
                            $br100="-";
                            $br200="-";
                            $pp50="-";
                            $pp100="-";
                            $pp200="-";
                            $n4200="-";
                            $n4400="-";

                            echo "<tr>
                                  <th scope='row'> Marge d'amélioration </th>";
                            $idNageur=idNageur($db,$_GET['nom'],$_GET['prenom']);


                            $idNage=idNage("Nage Libre");


                            $idDistance=idDistance(50);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $nl50=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$nl50."</td>";


                            $idDistance=idDistance(100);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $nl100=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$nl100."</td>";

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $nl200=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$nl200."</td>";

                            $idDistance=idDistance(400);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $nl400=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$nl400."</td>";

                            $idDistance=idDistance(800);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $nl800=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$nl800."</td>";

                            $idDistance=idDistance(1500);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $nl1500=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$nl1500."</td>";

                            $idNage=idNage("Dos");

                            $idDistance=idDistance(50);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $ds50=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$ds50."</td>";


                            $idDistance=idDistance(100);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $ds100=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$ds100."</td>";


                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $ds200=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$ds200."</td>";

                            $idNage=idNage("Brasse");

                            $idDistance=idDistance(50);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $br50=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$br50."</td>";

                            $idDistance=idDistance(100);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $br100=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }


                            echo "<td>".$br100."</td>";

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $br200=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$br200."</td>";

                            $idNage=idNage("Papillon");

                            $idDistance=idDistance(50);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $pp50=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$pp50."</td>";

                            $idDistance=idDistance(100);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $pp100=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$pp100."</td>";

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $pp200=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$pp200."</td>";

                            $idNage=idNage("4 Nages");

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $n4200=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$n4200."</td>";

                            $idDistance=idDistance(400);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $n4200=formatTaux(margeIntra($db,$idNageur,"Tous",$idNage,$idDistance));
                            }

                            echo "<td>".$n4400."</td></tr>";

                            //on passe aux objectifs

                            $nl50="-";
                            $nl100="-";
                            $nl200="-";
                            $nl400="-";
                            $nl800="-";
                            $nl1500="-";
                            $ds50="-";
                            $ds100="-";
                            $ds200="-";
                            $br50="-";
                            $br100="-";
                            $br200="-";
                            $pp50="-";
                            $pp100="-";
                            $pp200="-";
                            $n4200="-";
                            $n4400="-";

                            echo "<tr>
                                  <th scope='row'> Objectif </th>";

                            $idNage=idNage("Nage Libre");

                            $idDistance=idDistance(50);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $nl50=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$nl50."</td>";

                            $idDistance=idDistance(100);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $nl100=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$nl100."</td>";

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $nl200=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$nl200."</td>";

                            $idDistance=idDistance(400);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $nl400=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$nl400."</td>";

                            $idDistance=idDistance(800);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $nl800=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$nl800."</td>";

                            $idDistance=idDistance(1500);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $nl1500=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$nl1500."</td>";

                            $idNage=idNage("Dos");

                            $idDistance=idDistance(50);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $ds50=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$ds50."</td>";

                            $idDistance=idDistance(100);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $ds100=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$ds100."</td>";

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $ds200=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$ds200."</td>";

                            $idNage=idNage("Brasse");

                            $idDistance=idDistance(50);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $br50=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$br50."</td>";

                            $idDistance=idDistance(100);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $br100=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$br100."</td>";

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $br200=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$br200."</td>";

                            $idNage=idNage("Papillon");

                            $idDistance=idDistance(50);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $pp50=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$pp50."</td>";

                            $idDistance=idDistance(100);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $pp100=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$pp100."</td>";

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $pp200=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$pp200."</td>";

                            $idNage=idNage("4 Nages");

                            $idDistance=idDistance(200);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $n4200=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$n4200."</td>";

                            $idDistance=idDistance(400);
                            $test=testNbTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                            if($test>=2){
                                $dernierTemps=dernierTemps($db,$idNageur,"Tous",$idNage,$idDistance);

                                $n4400=formatTemps(tempsPostMarge($dernierTemps,margeIntra($db,$idNageur,"Tous",$idNage,$idDistance)));
                            }
                            echo "<td>".$n4400."</td></tr>";

                            deconnecterBDD($db);

                            ?>

                            </tbody></table>";

                </div>

            </div>
<!--            texte du bouton 2  -->
            <div class="tab-pane fade" id="pills-moy" role="tabpanel" aria-labelledby="pills-moy-tab">

                <div class="row">
                    <div class="col-sm-6">
                    <div style="height: 80px;">
                        <h4 class="font-weight-light text-light" style="margin-bottom:20px;">Rechercher des informations</h4>
                    </div>
                    <form class="border-right" method="get" action="stats.php">
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

                        <img src="Contents/stats.png">


                    </div>
                </div>


                <?php
                    //require_once("fonctionsStats.php");




//                    $dataPoints2 = array(
//                        array("label" => "Web Developer", "y" => array(83133, 91830, 115828, 128982, 101381)),
//                        array("label" => "System Analyst", "y" => array(51910, 60143, 115056, 135450, 85800)),
//                        array("label" => "Application Engineer", "y" => array(63364, 71653, 91120, 100556, 80757)),
//                        array("label" => "Aerospace Engineer", "y" => array(82725, 94361, 118683, 129191, 107142)),
////                        array("label" => "Dentist", "y" => array(116777, 131082, 171679, 194336, 146794))
//                    );
//
//                    $dataPoints = array();
//
                    ?>

                   <!-- <script>
                    window.onload = function () {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        title:{
                            text: "Annual Salary Range - USA"
                        },
                        axisY: {
                            title: "Annual Salary (in USD)",
                            prefix: "$",
                            interval: 40000,
                            labelFormatter: addSymbols
                        },
                        data: [{
                            type: "boxAndWhisker",
                            yValueFormatString: "$#,##0",
                            dataPoints:
                            <?php //echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                    chart.render();

                    function addSymbols(e){
                        var suffixes = ["", "K", "M", "B"];

                        var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);
                        if(order > suffixes.length - 1)
                            order = suffixes.length - 1;

                        var suffix = suffixes[order];
                        return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
                    }

                    }
                    </script>-->

<!--                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>-->
                    <!--
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
-->




                    </div>
<!--            texte du bouton 3  -->

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
                        0 0 0 13 -9" result="goo"/>
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
