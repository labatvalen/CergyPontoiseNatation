<?php
// fichier nécessaire
require("core.php");


// variables globales
$GLOBALS["server"]="localhost";
$GLOBALS["user"]="fromentfel";
$GLOBALS["mdp"]="Shaizajah3Sh";


// Connection à la BDD
$db = connecterBDD($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["mdp"]);
$boolRes = mysqli_select_db($db, 'projet');


// record 50m Nage Libre
$idnage="";
$iddistance="";
$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,20,0,20.0,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);




$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,44,94,44.94,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);



$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,1,39,37,99.37,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=400";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,3,32,25,212.25,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=800";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,7,23,42,7*60+23.42,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=1500";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,14,08,06,14*60+08.06,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);





$query52="SELECT * FROM TypeNage WHERE nom='Dos'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,22,22,22.22,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

$query52="SELECT * FROM TypeNage WHERE nom='Dos'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,48,88,48.88,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

$query52="SELECT * FROM TypeNage WHERE nom='Dos'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,1,45,63,105.63,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);



$query52="SELECT * FROM TypeNage WHERE nom='Brasse'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,25,25,25.25,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Brasse'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,55,61,55.61,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Brasse'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,2,00,16,120.16,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);



$query52="SELECT * FROM TypeNage WHERE nom='Papillon'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,21,75,21.75,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Papillon'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,48,08,48.08,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Papillon'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,1,48,24,108.24,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='4 Nages'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,50,26,50.26,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

 $query52="SELECT * FROM TypeNage WHERE nom='4 Nages'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,1,49,63,109.63,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

 $query52="SELECT * FROM TypeNage WHERE nom='4 Nages'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,3,55,50,3*60+55.50,".$iddistance.",".$idnage.",'h')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);





$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,22,93,22.93,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);




$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,50,25,50.25,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);



$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,1,50,43,110.43,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=400";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,3,53,92,3*60+53.92,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=800";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,7,59,34,7*60+59.34,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

$query52="SELECT * FROM TypeNage WHERE nom='Nage Libre'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=1500";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,15,19,71,15*60+19.71,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);




$query52="SELECT * FROM TypeNage WHERE nom='Dos'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,25,67,25.67,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

$query52="SELECT * FROM TypeNage WHERE nom='Dos'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,54,89,54.89,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

$query52="SELECT * FROM TypeNage WHERE nom='Dos'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,1,59,23,119.23,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Brasse'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,28,56,28.56,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Brasse'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,1,02,36,62.36,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Brasse'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,2,14,39,134.39,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Papillon'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,24,38,24.38,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Papillon'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,54,61,54.61,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='Papillon'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,1,59,61,119.61,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);


$query52="SELECT * FROM TypeNage WHERE nom='4 Nages'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=50";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,0,56,51,56.51,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

 $query52="SELECT * FROM TypeNage WHERE nom='4 Nages'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=100";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,2,01,86,121.86,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

 $query52="SELECT * FROM TypeNage WHERE nom='4 Nages'";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $idnage=$row['id'];
}
$query52="SELECT * FROM Distance WHERE longueur=200";
$res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
while ($row=mysqli_fetch_assoc($res52)) {
  $iddistance=$row['id'];
}
$query="INSERT INTO Record (heures,minutes,secondes,centiemes,temps,idDistance,idNage,sexe) VALUES (0,4,18,96,4*60+18.96,".$iddistance.",".$idnage.",'f')";
$res = mysqli_query($db, $query) or die('Request error : '.$query);

deconnecterBDD($db);
?>
