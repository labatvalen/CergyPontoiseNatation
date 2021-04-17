<?php
    session_start ();

    require "core.php";

    //fonction de comparaison de chainde de caracteres
    function compareChaines($chaine1, $chaine2){
        //compter la longueur des chaines
        $n1 = strlen($chaine1);
        $n2 = strlen($chaine2);
        
        //verifie que les deux chaines sont de meme taille
        if($n1 != $n2){
            $res = false;
        }
        else{
            $res = true;
            //parcours de chaque caractere pour verifier qu'il sont egaux
            for ($i = 0; $i < $n1; $i++){
                //et logique entre la reponse precedante et la comparaison
                $res = $res && ($chaine1[$i] == $chaine2[$i]);
            }
        }
        
        return $res;
    }


    // fonction qui cherche si la recherche appartient au contenu (texte de l'annonce)
    function rechercheLoginBDD(){
        $db = connecterBDD();

        $req = "Select * from Entraineur";
        //Exécution
        $res = mysqli_query($db, $req) or die('Pb req :  '.$req);

        $login = array();
        $password = array();

        while ($line = mysqli_fetch_assoc($res)){
            array_push($login, $line['login']);
            array_push($password, $line['mdp']);
        }
        
        mysqli_free_result($res);

        $n = count($login);
        echo $n;
        $i = 0; 
        $valid = false;
        
        while(($i < $n) && ($valid == false)){
            $valid = (compareChaines($_POST['login'], $login[$i]) && (compareChaines($_POST['pwd'], $password[$i]))); 
            echo "Problèmes...";
            $i++;
        }
        
        deconnecterBDD($db);
        
        return $valid;
    }
    




    
    if(!empty($_SESSION)){
            session_destroy();
            session_unset();
            header ('location: page_connexion.php');
    }
    else{
        
        if(!empty($_POST)){
            if(rechercheLoginBDD()){

                // on la démarre :)

                // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['pwd'] = $_POST['pwd'];

                unset($_POST);
                // on redirige notre visiteur vers une page de notre section membre
                header ('location: Cergy-Pontoise Natation.php');

            }
            else {
                unset($_POST);
                header ('location: page_connexion.php');    
            }
        }
        else {
            header ('location: page_connexion.php');    
        }
        
    }
    
        
        
        
    
    
    

?>