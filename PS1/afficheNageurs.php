<?php

    
    // fichier nécessaire
    require_once("core.php");
    


    // Connection à la BDD
    $db = connecterBDD();
    $boolRes = mysqli_select_db($db, 'projet');
    
    $query = "SELECT * FROM Nageur";
    $res = mysqli_query($db, $query) or die('Request error : '.$query);
    
    
    echo "<div class='table-responsive'>
            <caption><h4>Liste des nageurs</h4></caption>
            <table class='table'>
                <thead>
                    <tr>
                        <th class='font-weight'scope='col'>Nom</th>
                        <th scope='col'>Prénom</th>
                        <th scope='col'>Age</th>
                        <th scope='col'>Sexe</th>
                    </tr>
                </thead>
                <tbody>";
    
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr><th class='font-weight-light' scope='row'>".$row['nom']."</th><th class='font-weight-light' scope='row'>".$row['prenom']."</th><th class='font-weight-light' scope='row'>".$row['age']."</th><th class='font-weight-light' scope='row'>".$row['sexe']."</th></tr>";
    }
    
    echo "</tbody></table></div>";

    deconnecterBDD($db);


?>
