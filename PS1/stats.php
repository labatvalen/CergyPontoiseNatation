<?php
    
    require_once("core.php");
    


    $db = connecterBDD();
    
    $GLOBALS['db'] = $db;

    
function trouverId(){

        $boolRes = mysqli_select_db($GLOBALS['db'], 'projet');

        $req = "Select * FROM Nageur";
        $res = mysqli_query($GLOBALS['db'], $req) or die('Request error : '.$req);

        $tabId = array();

        while ($row = mysqli_fetch_assoc($res)){
    //        echo $row['id']."<br/>";
            $res1 = ($_GET['nom'] == $row['nom']);
            $res2 = ($_GET['prenom'] == $row['prenom']);

            if ($res1 && $res2){
                array_push($tabId, $row['id']);
            }
        }

        $n = count($tabId);

        for ($i = 0; $i < $n; $i++){
//            echo $tabId[$i];
        }
        return $tabId;
            
    }



    function trouverDate($idNageur){
        
        $tailleId = count($idNageur);
        for ($i = 0; $i < $tailleId; $i++){
            
            $boolRes = mysqli_select_db($GLOBALS['db'], 'projet');

            $req = "SELECT DISTINCT date, temps25 FROM Performance, Nageur WHERE idNageur =".$idNageur[$i];
            $res = mysqli_query($GLOBALS['db'], $req) or die('Request error : '.$req);

            $tabDate = array();
            $tabTemps25 = array();
            $j = 0;

            while ($row = mysqli_fetch_assoc($res)){
                array_push($tabDate, $row['date']);
                array_push($tabTemps25, $row['temps25']);

//                echo "<br/> date : ".$tabDate[$j];
//                echo "   temps : ".$tabTemps25[$j];
                $j++;
            }
        }
        
        $tab = array("date" => $tabDate,
                     "temps25" => $tabTemps25);
        
        return $tab;
        
    }

    
    function trouverNage($tab){
    
        $tailleTab = count($tab['date']);
        echo "<br/>taille tab : ".$tailleTab."<br/>";
            
        for ($i = 0; $i < $tailleTab; $i++){
            
            $j = 0;
            $boolRes = mysqli_select_db($GLOBALS['db'], 'projet');

            $req = "SELECT * FROM TypeNage n, Performance p WHERE p.idNage = n.id";
            $res = mysqli_query($GLOBALS['db'], $req) or die('Request error : '.$req);
    
            $tabNage = array();
            
            $res1 = false;
            $fait = 0;
            while ($row = mysqli_fetch_assoc($res)){
                
                if($tab['date'][$i] == $row['date']){
                    if ($tab['temps25'][$i] == $row['temps25']){
                        $res1 = true;
                    }  
                }
                
                    
                if ($res1 && ($fait == 0)){
                    array_push($tabNage, $row['nom']);
                    echo "<br/>Nage : ".$tabNage[$j];
                    $fait++;
                    $j++;
                }
            }
            
        }
        
        $n = count($tabNage);
        echo "n == ".$n; 
            for ($i = 0 ; $i < $n ; $i++){
                echo "<br/>nage triée : ".$tabNage[$i];
            }
            
        return $tabNage;
}


function trier_tableau($tabNage, $tab){
	$n = count($tabNage); 
    
     
    
	for ($i = 1 ; $i <= $n ; $i++){
		for ($j = 0 ; $j < $n-$i ; $j++){
            
			if ($tabNage[$j] > $tabNage[$j+1]){
				$temp = $tabNage[$j];
				$tabNage[$j] = $tabNage[$j+1];
				$tabNage[$j+1] = $temp;
			
                $temp = $tab[$j];
                $tab[$j] = $tab[$j+1];
				$tab[$j+1] = $temp;
            }
		}
	}
    
   
    
    
    
    $tab2 = array("nage" => $tabNage, 
                  "date" => $tab['date'],
                  "temps25" => $tab['temps25']);
    
	return $tab2;

}

    








    function menu(){
    
        $id = trouverId();
        $tab = trouverDate($id);
        $tabNage = trouverNage($tab);
        
        $tab = trier_tableau($tabNage, $tab);
    
        $n = count($tab['date']);
        for ($i = 0; $i < $n; $i++){
            
            echo "<br/>Nage : ".$tab['nage'][$i];
            echo "<br/>Date : ".$tab['date'][$i];
            echo "<br/>Temps : ".$tab['temps25'][$i];
        }
    
    }
    


    menu();

    deconnecterBDD($db);

?>