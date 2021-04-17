<?php

    $server = "localhost";
    $user = "fromentfel";
    $pass = "Shaizajah3Sh";
    $base = "projet";

    function connecterBDD() {
    
        global $server,$user,$pass,$base;
            $DBconn = mysqli_connect($server, $user, $pass, $base);
            if (!$DBconn) {
                die("Erreur: " . mysqli_connect_error());
            }

            return $DBconn;
        }


    function deconnecterBDD($DBconn) {
            if (isset($DBconn)) {
                mysqli_close($DBconn);
            }
        }
    
    

?>