<?php
                
                    require_once("core.php");
                
                    $db = connecterBDD();    
                
                    if(!empty($_GET)){
                        
                        echo " ".$_GET['nage']." ".$_GET['sexe']." ".$_GET['nom']." ".$_GET['prenom']." ".$_GET['age']." ".$_GET['code']." ".$_GET['club']." ".$_GET['pays']." ".$_GET['bassin']."   00:".$_GET['min'].":".$_GET['s'].":".$_GET['ms']." ".$_GET['date']." ".$_GET['ville']." ".$_GET['saison']."<br/> "; 
                        
                        
                        
                        $req = "INSERT INTO Distance (longueur) VALUES ( ".$_GET['longueur'].")";
                        
                        $req1 = "INSERT INTO Nageur (nom, prenom, age, sexe) VALUES ('".$_GET['nom']."','".$_GET['prenom']."',".$_GET['age'].",'".$_GET['sexe']."')";
                        
                        
                        $req3 = "INSERT INTO Club (code, nom) VALUES (".$_GET['code'].",'".$_GET['club']."')";
                        
                        $req4 = "INSERT INTO Nation (nom) VALUES ('".$_GET['pays']."')";
                    
                        $req5 = "INSERT INTO Performance (minutes, secondes, centiemes, bassin) VALUES (".$_GET['min'].",".$_GET['s'].",".$_GET['ms'].",".$_GET['bassin'].")";
                    
                        $req6 = "INSERT INTO Lieu (ville) VALUES ('".$_GET['ville']."')";
                    
                        $req7 = "INSERT INTO Saison (annee) VALUES ('".$_GET['saison']."')";
                    
                    
                        $res = mysqli_query($db, $req) or die('Pb req :  '.$req);
                        $res1 = mysqli_query($db, $req1) or die('Pb req :  '.$req1);
                        
                                            
                        $res3 = mysqli_query($db, $req3) or die('Pb req :  '.$req3);
                        $res4 = mysqli_query($db, $req4) or die('Pb req :  '.$req4);
                        $res5 = mysqli_query($db, $req5) or die('Pb req :  '.$req5);
                        $res6 = mysqli_query($db, $req6) or die('Pb req :  '.$req6);
                        $res7 = mysqli_query($db, $req7) or die('Pb req :  '.$req7);
                    
                        
                        echo "done";
                        header ('location: Cergy-Pontoise Natation.php');    
                        
                        
                    }
                
                    deconnecterBDD($db);
                
                
                ?>