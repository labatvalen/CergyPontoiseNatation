<?php
// fichier nécessaire
require("core.php");

function remplirBDD($fic){

// variables globales
$GLOBALS["server"]="localhost";
$GLOBALS["user"]="fromentfel";
$GLOBALS["mdp"]="Shaizajah3Sh";


// Connection à la BDD
$db = connecterBDD();
$boolRes = mysqli_select_db($db, 'projet');


// 1 : on ouvre les fichiers
//$fic = 'DONNEES/rankings_natcourse_25.csv';
$fichier = fopen($fic, 'r+');

//$fic1 = './Uploads/donnéesBDDprojet.sql';
//$fichier1 = fopen($fic1, "w+");



// 2 : on fera ici nos opérations sur le fichier...
$fileLines = file($fic);
$n = count($fileLines);
$txt="";
$mot=[];
$taille=0;
$x=1;

for ($i = 1; $i <= $n; $i++){
  $txt = fgets($fichier);
  $mot = explode("\"", $txt);

  $taille = count($mot);
  $txt = "";
  $txt1="";
  $txt2="";
  $idnage="";
  $idnageur="";
  $iddistance=0;
  $idclub="";
  $idnation="";
  $idsaison="";
  $idlieu="";
  $date=date('Y');
  $temps="";

  if ($mot[5]!="lastname") {
    $date=$date-$mot[9];
    // vérification si la personne est dans la base de données
    $query51="SELECT id FROM Nageur WHERE nom=\"".$mot[5]."\" AND prenom=\"".$mot[7]."\" AND age=".$date." AND sexe='".$mot[3]."'";
    $res51 = mysqli_query($db, $query51) or die('Request error : '.$query51);
    while ($row=mysqli_fetch_assoc($res51)) {
      $idnageur=$row['id'];
    }

    // si elle n'y est pas
    if (mysqli_num_rows($res51) == 0) {
      // insertion des données dans la table nageur
      $query5="INSERT INTO Nageur (nom,prenom,age,sexe) VALUES (\"".$mot[5]."\",\"".$mot[7]."\",".$date.",'".$mot[3]."')";
      $res5 = mysqli_query($db, $query5) or die('Request error : '.$query5);

      // on récupère l'id du nageur
      $query52="SELECT id FROM Nageur WHERE nom=\"".$mot[5]."\" AND prenom=\"".$mot[7]."\" AND age=".$date." AND sexe='".$mot[3]."'";
      $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
      while ($row=mysqli_fetch_assoc($res52)) {
        $idnageur=$row['id'];
      }
    }

    //echo $idnageur;


    // Nage
    $dEtN=$mot[1];                      // distance + nage
    $tabdEtN = explode(" ", $dEtN);    // tableau avec distance et nage
    $distance=$tabdEtN[0];             // Distance
    $nage=$tabdEtN[1];                  // nage

    if ($tabdEtN[1]=="Nage" || $tabdEtN[1]=="4") {
      $nage=$nage." ".$tabdEtN[2];
    }


      // vérification si la nage est dans la base de données
      $query51="SELECT id FROM TypeNage WHERE nom='".$nage."'";
      $res51 = mysqli_query($db, $query51) or die('Request error : '.$query51);
      while ($row=mysqli_fetch_assoc($res51)) {
        $idnage=$row['id'];
      }
      // si elle n'y est pas
      if (mysqli_num_rows($res51) == 0) {
        // insertion des données dans la table nageur
        $query5="INSERT INTO TypeNage (nom) VALUES ('".$nage."')";
        $res5 = mysqli_query($db, $query5) or die('Request error : '.$query5);

        // on récupère l'id du nageur
        $query52="SELECT id FROM TypeNage WHERE nom='".$nage."'";
        $res52 = mysqli_query($db, $query51) or die('Request error : '.$query51);
        while ($row=mysqli_fetch_assoc($res52)) {
          $idnage=$row['id'];
        }
      }


      // vérification si la distance est dans la base de données
      $query51="SELECT id FROM Distance WHERE longueur=".$distance;
      $res51 = mysqli_query($db, $query51) or die('Request error : '.$query51);
      while ($row=mysqli_fetch_assoc($res51)) {
        $iddistance=$row['id'];
      }
      // si elle n'y est pas
      if (mysqli_num_rows($res51) == 0) {
        // insertion des données dans la table distance
        $query5="INSERT INTO Distance (longueur) VALUES (".$distance.")";
        $res5 = mysqli_query($db, $query5) or die('Request error : '.$query5);

        // on récupère l'id du nageur
        $query52="SELECT id FROM Distance WHERE longueur=".$distance;
        $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
        while ($row=mysqli_fetch_assoc($res52)) {
          $iddistance=$row['id'];
        }
      }


      // vérification si le club est dans la base de données
      $query51="SELECT id FROM Club WHERE code=".$mot[11];
      $res51 = mysqli_query($db, $query51) or die('Request error : '.$query51);
      while ($row=mysqli_fetch_assoc($res51)) {
        $idclub=$row['id'];
      }
      // si elle n'y est pas
      if (mysqli_num_rows($res51) == 0) {
        // insertion des données dans la table distance
        $query5="INSERT INTO Club (nom,code) VALUES (\"".$mot[13]."\",\"".$mot[11]."\")";
        $res5 = mysqli_query($db, $query5) or die('Request error : '.$query5);

        // on récupère l'id du club
        $query52="SELECT id FROM Club WHERE code=".$mot[11];
        $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
        while ($row=mysqli_fetch_assoc($res52)) {
          $idclub=$row['id'];
        }
      }


      // vérification si la nation est dans la base de données
      $query51="SELECT id FROM Nation WHERE nom=\"".$mot[15]."\"";
      $res51 = mysqli_query($db, $query51) or die('Request error : '.$query51);
      while ($row=mysqli_fetch_assoc($res51)) {
        $idnation=$row['id'];
      }
      // si elle n'y est pas
      if (mysqli_num_rows($res51) == 0) {
        // insertion des données dans la table distance
        $query5="INSERT INTO Nation (nom) VALUES (\"".$mot[15]."\")";
        $res5 = mysqli_query($db, $query5) or die('Request error : '.$query5);

        // on récupère l'id de la nation
        $query52="SELECT id FROM Nation WHERE nom=\"".$mot[15]."\"";
        $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
        while ($row=mysqli_fetch_assoc($res52)) {
          $idnation=$row['id'];
        }
      }


      // vérification si la saison est dans la base de données
      $query51="SELECT id FROM Saison WHERE annee=".$mot[25];
      $res51 = mysqli_query($db, $query51) or die('Request error : '.$query51);
      while ($row=mysqli_fetch_assoc($res51)) {
        $idsaison=$row['id'];
      }
      // si elle n'y est pas
      if (mysqli_num_rows($res51) == 0) {
        // insertion des données dans la table distance
        $query5="INSERT INTO Saison (annee) VALUES (".$mot[25].")";
        $res5 = mysqli_query($db, $query5) or die('Request error : '.$query5);

        // on récupère l'id de la saison
        $query52="SELECT id FROM Saison WHERE annee=".$mot[25];
        $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
        while ($row=mysqli_fetch_assoc($res52)) {
          $idsaison=$row['id'];
        }
      }


      // vérification si la ville est dans la base de données
      $query51="SELECT id FROM Lieu WHERE ville=\"".$mot[23]."\"";
      $res51 = mysqli_query($db, $query51) or die('Request error : '.$query51);
      while ($row=mysqli_fetch_assoc($res51)) {
        $idlieu=$row['id'];
      }
      // si elle n'y est pas
      if (mysqli_num_rows($res51) == 0) {
        // insertion des données dans la table distance
        $query5="INSERT INTO Lieu (ville) VALUES (\"".$mot[23]."\")";
        $res5 = mysqli_query($db, $query5) or die('Request error : '.$query5);

        // on récupère l'id du lieu
        $query52="SELECT id FROM Lieu WHERE ville=\"".$mot[23]."\"";
        $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
        while ($row=mysqli_fetch_assoc($res52)) {
          $idlieu=$row['id'];
        }
      }

    $idperf="";

    //echo " ".$iddistance;
    //echo " ".$idnage;
    //echo " ".$idclub."<br/>";

    $temps = explode(":", $mot[19]);
    $h=$temps[0];
    $min=$temps[1];
    $sec=$temps[2];
    $sc=explode(".", $sec);
    $s=$sc[0];
    $c=$sc[1];
    $temps=$h*3600+$min*60+$sec;
    //echo 'temps: '.$temps." ";


    $temps25=$temps;
    // conversion des données en bassin de 25M
    if ($mot[17]==50) {
      if ($mot[3]=="F") {
        if ($distance==50) {
          if ($nage=="Nage Libre" || $nage=="Brasse") {
            $temps25=$temps25-0.70;
          } else if ($nage=="Dos") {
            $temps25=$temps25-1.30;
          } else if ($nage=="Papillon") {
            $temps25=$temps25-0.60;
          }
        } else if ($distance==100) {
          if ($nage=="Nage Libre") {
            $temps25=$temps25-1.20;
          } else if ($nage=="Dos") {
            $temps25=$temps25-2.30;
          } else if ($nage=="Brasse") {
            $temps25=$temps25-1.90;
          } else if ($nage=="Papillon") {
            $temps25=$temps25-1.40;
          }
        } else if ($distance==200) {
          if ($nage=="Nage Libre") {
            $temps25=$temps25-2.90;
          } else if ($nage=="Dos") {
            $temps25=$temps25-5.40;
          } else if ($nage=="Brasse") {
            $temps25=$temps25-4.50;
          } else if ($nage=="Papillon") {
            $temps25=$temps25-3.30;
          } else if ($nage=="4 Nages") {
            $temps25=$temps25-3.40;
          }
        } else if ($distance==400) {
          if ($nage=="Nage Libre") {
            $temps25=$temps256-6.20;
          } else if ($nage=="4 Nages") {
            $temps25=$temps25-7.50;
          }
        } else if ($distance==800) {
          $temps25=$temps25-12.90;
        } else {
          $temps25=$temps25-24.50;
        }
      } else {
        if ($distance==50) {
          if ($nage=="Nage Libre") {
            $temps25=$temps25-0.70;
          } else if ($nage=="Dos") {
            $temps25=$temps25-1.50;
          } else if ($nage=="Brasse") {
            $temps25=$temps25-1.10;
          } else if ($nage=="Papillon") {
            $temps25=$temps25-0.70;
          }
        } else if ($distance==100) {
          if ($nage=="Nage Libre") {
            $temps25=$temps25-1.50;
          } else if ($nage=="Dos") {
            $temps25=$temps25-3.00;
          } else if ($nage=="Brasse") {
            $temps25=$temps25-2.50;
          } else if ($nage=="Papillon") {
            $temps25=$temps25-1.40;
          }
        } else if ($distance==200) {
          if ($nage=="Nage Libre") {
            $temps25=$temps25-3.60;
          } else if ($nage=="Dos") {
            $temps25=$temps25-6.90;
          } else if ($nage=="Brasse") {
            $temps25=$temps25-5.90;
          } else if ($nage=="Papillon") {
            $temps25=$temps25-3.30;
          } else if ($nage=="4 Nages") {
            $temps25=$temps25-4.10;
          }
        } else if ($distance==400) {
          if ($nage=="Nage Libre") {
            $temps25=$temps256-7.70;
          } else if ($nage=="4 Nages") {
            $temps25=$temps25-9.00;
          }
        } else if ($distance==800) {
          $temps25=$temps25-15.90;
        } else {
          $temps25=$temps25-30.10;
        }
      }
    }
    $query="INSERT INTO Performance (idNage,idDistance,idNageur,idClub,idNation,bassin,date,idSaison,idLieu,heures,minutes,secondes,centiemes,temps,temps25) VALUES (".$idnage.",".$iddistance.",".$idnageur.",".$idclub.",".$idnation.",".$mot[17].",\"".$mot[21]."\",".$idsaison.",".$idlieu.",".$h.",".$min.",".$s.",".$c.",".$temps.",".$temps25.")";
    $res = mysqli_query($db, $query) or die('Request error : '.$query);

    $query52="SELECT id FROM Performance WHERE idNage=".$idnage." AND idDistance=".$iddistance." AND idNageur=".$idnageur." AND heures=".$h." AND minutes=".$min." AND secondes=".$s." AND centiemes=".$c." AND idClub=".$idclub." AND idNation=".$idnation." AND bassin=".$mot[17]." AND date=\"".$mot[21]."\" AND idSaison=".$idsaison." AND idLieu=".$idlieu;
    $res52 = mysqli_query($db, $query52) or die('Request error : '.$query52);
    while ($row=mysqli_fetch_assoc($res52)) {
      $idperf=$row['id'];
      //echo $idperf;
    }
  }


}
deconnecterBDD($db);
}
//gestion des doublons
// potentiellement : enlever les "or die with request"
?>
