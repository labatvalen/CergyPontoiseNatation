<?php

// fichier nécessaire
    require_once("core.php");



    //rajouter le onclick sur le bouton de recherche + faire un beau CSS (cases en face, transparence, etc.)


    function affNageur($nom,$prenom) {
        // variables globales
        $GLOBALS["server"]="localhost";
        $GLOBALS["user"]="fromentfel";
        $GLOBALS["mdp"]="Shaizajah3Sh";

        // Connection à la BDD
        $db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
        $boolRes = mysqli_select_db($db, 'projet');

        echo "<div class='tableau card-deck content_page font-weight-light'><div class='table-responsive'><caption><h4>Informations</h4></caption>";
        
        //affichage des informations sur le nom
        $query="SELECT * FROM Nageur WHERE nom='".$nom."' AND prenom='".$prenom."'";
        $res = mysqli_query($db, $query) or die('Request error : '.$query);
        
        while ($row=mysqli_fetch_assoc($res)) {
          echo "<table class='table'><tr><th scope='row'>Nom</th><td>".$row['nom']."</td></tr><tr><th scope='row'>Prénom</th><td>".$row['prenom']."</td></tr><tr><th scope='row'>Age</th><td>".$row['age']." ans</td></tr><tr><th scope='row'>Sexe</th><td>".$row['sexe']."</td></tr></table></div>";
        }

        echo "<div class='table-responsive'><caption><h4>Records globaux</h4></caption>
                <table class='table'><thead>
                    <tr>
                        <th class='font-weight'scope='col'>Distance</th>
                        <th scope='col'>Nage</th>
                        <th scope='col'>Temps</th>
                    </tr>
                </thead>
                <tbody>";
        
        $query1="SELECT * FROM TypeNage WHERE id IN
                  (SELECT idNage FROM Performance WHERE idNageur=
                        (SELECT id FROM Nageur WHERE nom='".$nom."' AND prenom='".$prenom."'))";
        $res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);
        while ($row1=mysqli_fetch_assoc($res1)) {
          $query2="SELECT * FROM Distance";
          $res2 = mysqli_query($db, $query2) or die('Request error : '.$query2);
          while ($row2=mysqli_fetch_assoc($res2)) {
            $query="SELECT * FROM Performance WHERE temps=
                      (SELECT Min(temps) FROM Performance WHERE idNage=".$row1['id']." AND idDistance=".$row2['id']." AND idNageur=
                            (SELECT id FROM Nageur WHERE nom='".$nom."' AND prenom='".$prenom."'))";
            $res = mysqli_query($db, $query) or die('Request error : '.$query);
            while ($row=mysqli_fetch_assoc($res)) {

              echo "<tr><th class='font-weight-light' scope='row'>".$row2['longueur']."</th><th class='font-weight-light' scope='row'>".$row1['nom']."</th><th class='font-weight-light' scope='row'>".$row['minutes']." min ".$row['secondes']." s ".$row['centiemes']." ms</th></tr>";
            }
          }
        }

        echo "</tbody></table></div>
                <div class='table-responsive'>
                <caption><h4>Records saisonniers</h4></caption>";
        
        $query3="SELECT * FROM Saison";
        $res3 = mysqli_query($db, $query3) or die('Request error : '.$query3);
        while ($row3=mysqli_fetch_assoc($res3)) {
          echo "<caption><h4>".$row3['annee']."</h4></caption>";
          echo "<table class='table'><thead>
                    <tr>
                        <th class='font-weight'scope='col'>Distances</th>
                        <th scope='col'>Nages</th>
                        <th scope='col'>Temps</th>
                    </tr>
                </thead>
                <tbody>";
            $query1="SELECT * FROM TypeNage WHERE id IN
                    (SELECT idNage FROM Performance WHERE idNageur=
                          (SELECT id FROM Nageur WHERE nom='".$nom."' AND prenom='".$prenom."'))";
            $res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);
         
            while ($row1=mysqli_fetch_assoc($res1)) {
                $query2="SELECT * FROM Distance";
                $res2 = mysqli_query($db, $query2) or die('Request error : '.$query2);
                while ($row2=mysqli_fetch_assoc($res2)) {

                    $query="SELECT * FROM Performance WHERE temps=
                        (SELECT Min(temps) FROM Performance WHERE idNage=".$row1['id']." AND idDistance=".$row2['id']." AND idNageur=(SELECT id FROM Nageur WHERE nom='".$nom."' AND prenom='".$prenom."') AND idSaison=".$row3['id'].")";
                    $res = mysqli_query($db, $query) or die('Request error : '.$query);
                    while ($row=mysqli_fetch_assoc($res)) {

                        echo "<tr><th class='font-weight-light' scope='row'>".$row2['longueur']."</th><th class='font-weight-light' scope='row'>".$row1['nom']."</th><th class='font-weight-light' scope='row'>".$row['minutes']." min ".$row['secondes']." s ".$row['centiemes']." ms</th></tr>";
              }
            }
          }
            echo "</tbody></table>";
        }
        echo "</div>";
        
        echo "<div class='table-responsive'>
            <caption><h4>Résultats Détaillés</h4></caption>";
        $query3="SELECT * FROM Saison";
        $res3 = mysqli_query($db, $query3) or die('Request error : '.$query3);
        while ($row3=mysqli_fetch_assoc($res3)) {
            echo "<caption><h4>".$row3['annee']."</h4></caption>";
                      echo "<table class='table'><thead>
                    <tr>
                        <th class='font-weight'scope='col'>Distances</th>
                        <th scope='col'>Nages</th>
                        <th scope='col'>Temps</th>
                    </tr>
                </thead>
                <tbody>";
            $query1="SELECT * FROM TypeNage WHERE id IN
                    (SELECT idNage FROM Performance WHERE idNageur=
                          (SELECT id FROM Nageur WHERE nom='".$nom."' AND prenom='".$prenom."'))";
            $res1 = mysqli_query($db, $query1) or die('Request error : '.$query1);
            while ($row1=mysqli_fetch_assoc($res1)) {
                $query2="SELECT * FROM Distance";
                $res2 = mysqli_query($db, $query2) or die('Request error : '.$query2);
                while ($row2=mysqli_fetch_assoc($res2)) {

                $query="SELECT * FROM Performance WHERE idNage=".$row1['id']." AND idDistance=".$row2['id']." AND idNageur=(SELECT id FROM Nageur WHERE nom='".$nom."' AND prenom='".$prenom."') AND idSaison=".$row3['id'];
                $res = mysqli_query($db, $query) or die('Request error : '.$query);
                while ($row=mysqli_fetch_assoc($res)) {

                    echo "<tr><th class='font-weight-light' scope='row'>".$row2['longueur']."</th><th class='font-weight-light' scope='row'>".$row1['nom']."</th><th class='font-weight-light' scope='row'>".$row['minutes']." min ".$row['secondes']." s ".$row['centiemes']." ms</th></tr>";
              }
            }
          }
            echo "</tbody></table>";
        }
        echo "</div>";
        
        deconnecterBDD($db);
    }

    if (!empty($_GET)){

        affNageur($_GET['nom'],$_GET['prenom']);
        unset($_GET);

    }
    

?>
