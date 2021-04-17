        <?php
        require('fonctionsStats.php');
        $tab=tabGlobal("Tous","Tous","Tous","Tous","Tous","Tous",1,1);
        $a=array(50,58,52,45);
        echo $tab[3];

    $dataPoints = array(
        array("label" => "             ", "y" => array(140,156,160,50,58,52,45,150))
    );

    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,

        title:{
            text: "Répartition des temps"
        },
        axisY: {
            title: "Temps",
            suffix: "s",
            interval: 1,
            minimum: 0
        },
        data: [{
            color: "black",
            type: "boxAndWhisker",
            yValueFormatString: "###s",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();


    }
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>
    </html>
