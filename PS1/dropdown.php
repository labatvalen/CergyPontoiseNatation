<?php
    header( 'content-type: text/html; charset=UTF-8' );                                
    // fichier nécessaire
    require_once("core.php");

    
    function dropdown($req, $id, $name){

        // variables globales
        $GLOBALS["server"]="localhost";
        $GLOBALS["user"]="fromentfel";
        $GLOBALS["mdp"]="Shaizajah3Sh";

        // Connection à la BDD
        $db = connecterBDD();
        $boolRes = mysqli_select_db($db, 'projet');
        $res = mysqli_query($db, $req) or die('Request error : '.$req);

        $tab = array();
        
        while ($row = mysqli_fetch_assoc($res)) {
                echo "<option value='".$row[$id]."'>".$row[$name]."</option>";
      
        }
        
        mysqli_free_result($res);
        
        deconnecterBDD($db);

    }

    
//"SELECT id FROM Groupe WHERE nom=".$nom;





?>
