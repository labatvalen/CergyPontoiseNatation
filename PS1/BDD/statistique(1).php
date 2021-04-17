<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--  Commandes pour ouvrir : -->
<!--  php -S localhost:8080   -->
<!--  http://localhost:8080/  -->


<?php
    
    session_start ();
    
    if(!empty($_SESSION)){
        header ('location: page_connexion.php');
    }
    
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
   <script src="https://cdn.zingchart.com/zingchart.min.js"></script>

 



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

   
	<title> Statistiques </title>
</head>
    
<body>
 
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
    <div class="bloc_donnees">
<!--        Taille du bloc de boutons  -->
        <div class="taille_boutons_donnees">
<!--            boutons  -->        
            <ul class="nav nav-pills nav-fill" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action" id="pills-amelioration-tab" data-toggle="pill" href="#pills-amelioration" role="tab" aria-controls="pills-amelioration" aria-selected="true">Amélioration</a>
                </li>
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action" id="pills-moy-tab" data-toggle="pill" href="#pills-moy" role="tab" aria-controls="pills-moy" aria-selected="true">Moyennes /Médianes</a>
                </li>
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action" id="pills-stats-tab" data-toggle="pill" href="#pills-stats" role="tab" aria-controls="pills-stats" aria-selected="true">Données statistique</a>
                </li>
                <li class="nav-item">
                    <a class="list-group-item list-group-item-action" id="pills-com-tab" data-toggle="pill" href="#pills-com" role="tab" aria-controls="pills-com" aria-selected="true">Commentaires</a>
                </li>
            </ul>
        </div>
        
        
        
        
        
        
        
<!--        Bloc dynamique qui avec le contenu qui apparait en fonction du bouton  -->
        <div class="tab-content" id="list-tabContent">
    <!--            texte du bouton 1  -->
            <div class="tab-pane fade" id="pills-amelioration" role="tabpanel" aria-labelledby="pills-amelioration-tab">
                <div class="table table-bordered">
                    <table class="table">
                        <thead>
                            <tr class="text-center table-warning">
                                <th scope="col"></th>
                                <th colspan="6">Crawl</th>

                                <th colspan="3">Dos</th>
                                <th colspan="3">Brasse</th>
                                <th colspan="3">Papillion</th>
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
                            <tr>
                                <th scope="row">Saison</th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td></td>                                        
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2"></td>
                                <td>s</td>
                                </tr>
                            </tbody>



                    </table>
                </div>

            </div>
<!--            texte du bouton 2  -->
            <div class="tab-pane fade" id="pills-moy" role="tabpanel" aria-labelledby="pills-moy-tab">afficher les moyennes medianes .... d'un nageur

                <div id='myChart'>
    <script type="text/javascript">
    


    var myConfig = {
        "graphset":[
            {
                "type":"hboxplot",
                "plotarea":{
                    "margin":"100"
                },
                "scaleX":{
                    "guide":{
                        "visible":false
                    },
                    "label":{
                        "text":"Experiment No."
                    },
                    "values":["1"]
                },
                "scaleY":{
                    "label":{
                        "text":"Observations"
                    }
                },
                tooltip:{
                  paddingBottom:20
                },
                "options":{
                    "box":{
                        "barWidth":0.5,
                        "tooltip":{
                            "text":"<span style=\"font-style:italic;\">Experiment no. %scale-key-text</span><br><b style=\"font-size:15px;\">Observations:</b><br><br>Maximum: <b>%data-max</b><br>Upper Quartile: <b>%data-upper-quartile</b><br>Median: <b>%data-median</b><br>Lower Quartile: <b>%data-lower-quartile</b><br>Minimum: <b>%data-min</b>"
                        }
                    },
                    "outlier":{
                        "tooltip":{
                            "text":"<span style=\"font-style:italic;\">Experiment no. %scale-key-text</span><br><b style=\"font-size:15px;\">Observation: %node-value</b>"
                        },
                        "marker":{
                            "type":"circle"
                        }
                    }
                },
                "series":[
                    {
                        "dataBox":[[30,45,50,57,70]],
                        "dataOutlier":[[1,24]]
                    }
                ]
            }
        ]
    };
     
    zingchart.render({ 
        id : 'myChart', 
        data : myConfig, 
        height: "100%", 
        width: "100%"
    });


   

</script>
</div>


            </div>







<!--            texte du bouton 3  -->
            <div class="tab-pane fade" id="pills-stats" role="tabpanel" aria-labelledby="pills-stats-tab">afficher des stats complementaires d'un nageur

<div id="curve_chart" style="width: 900px; height: 500px"></div>



            </div>
<!--            texte du bouton 4  -->



      <div class="tab-pane fade" id="pills-com" role="tabpanel" aria-labelledby="pills-com-tab">Afficher des commentaires </div>
        </div>
    </div>

    
    
    
    
</body>
</html>