<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Line Chart Test</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <script  src="http://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script>
  function displayLineChart(){
    var data = {
        labels : varlabels,
        datasets: [
            {
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: vardata1
          },
            {
                fillColor: "rgba(63, 191, 63,0)",
                strokeColor: "rgba(63, 191, 63,1)",
                pointColor: "rgba(63, 191, 63,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(63, 191, 63,1)",
                data: batezbestekoa1
          }
          ,
            {
                fillColor: "rgb(12, 38, 12,0)",
                strokeColor: "rgb(12, 38, 12,1)",
                pointColor: "rgb(12, 38, 12,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgb(12, 38, 12,1)",
                data: dentart1
          }
          ,
            {
                fillColor: "rgb(12, 38, 12,0)",
                strokeColor: "rgb(12, 38, 12,1)",
                pointColor: "rgb(12, 38, 12,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgb(12, 38, 12,1)",
                data: dentart2
          }
        ]
    };
    var ctx = document.getElementById("lineChart").getContext("2d");
    var options = { };
    var lineChart = new Chart(ctx).Line(data, options);
    var data = {
        labels : varlabels,
        datasets: [
            {
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: vardata2
          },
          {
              fillColor: "rgba(63, 191, 63,0)",
              strokeColor: "rgba(63, 191, 63,1)",
              pointColor: "rgba(63, 191, 63,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(63, 191, 63,1)",
              data: batezbestekoa2
        },
          {
              fillColor: "rgb(12, 38, 12,0)",
              strokeColor: "rgb(12, 38, 12,1)",
              pointColor: "rgb(12, 38, 12,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgb(12, 38, 12,1)",
              data: kliktart1
        }
        ,
          {
              fillColor: "rgb(12, 38, 12,0)",
              strokeColor: "rgb(12, 38, 12,1)",
              pointColor: "rgb(12, 38, 12,1)",
              pointStrokeColor: "#fff",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgb(12, 38, 12,1)",
              data: kliktart2
        }
      ]
    };
    var ctx = document.getElementById("lineChart2").getContext("2d");
    var options = { };
    var lineChart = new Chart(ctx).Line(data, options);

    var dataPointsTemp = [];
		for( var i = 0; i < vardata1.length; i++) {
			dataPointsTemp.push({ x: vardata2[i], y: vardata1[i], name: varlabels[i]});
		}


    var chart = new CanvasJS.Chart("lineChart3",{
    	title :{
    		text: ""
    	},
    	axisX: {
    		title: "Saiakera kopurua"
    	},
    	axisY: {
    		title: "Behar izandako denbora"
    	},
    	data: [{
    		type: "scatter",
          toolTipContent: "<span style='\"'color: {color};'\"'><strong>{name}</strong></span> <br/> <strong>Behar izandako denbora</strong> {y}<br/> <strong>Saiakera kopurua</strong> {x} ",
    		dataPoints : dataPointsTemp
    	}]
    });

    chart.render();
  }
  function aldatuTabla(){
    var aukera = document.getElementById("minijokoAukera").value;
    window.location = "irakaslea_ikasleEstatistikak.php?minijokoa="+aukera;
  }
 </script>
</head>
<body>
<div class="container">
  <select onchange="aldatuTabla()" id='minijokoAukera' name='minijokoAukera' value=<?php echo $_GET['minijokoa']?>>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
  <table>
    <td>
       <?php
       $host="mysql.hostinger.es"; // Host name
       $username="u942620627_marib"; // Mysql username
       $password="aizpeagap"; // Mysql password
       $db_name="u942620627_marib"; // Database name
       $tbl_name="ikaslea"; // Table name

       // Connect to server and select databse.
       $link = mysqli_connect("$host", "$username", "$password", "$db_name");

       session_start();
       $erab=$_SESSION['usr'];
       $content="";
       $emaitzaKop=0;
       $emaitzaDen=0;
       $minijokoa=$_GET['minijokoa'];

           $sql="SELECT * FROM ikaslea INNER JOIN emaitza on ikaslea.idIkaslea=emaitza.idIkaslea WHERE idirakasle='$erab' AND idMinijokoa=$minijokoa";
           $ema1=mysqli_query($link,$sql);
           if($ema1){
             while($emarow = mysqli_fetch_array($ema1))
             {
               $emaitzaKop++;
               $emaitzaDen+= (int) $emarow['denbora'];
             }
             $batezbestekoa1 =$emaitzaDen /$emaitzaKop;
             $batukari=0;

             mysqli_data_seek($ema1, 0);
             while($emarow = mysqli_fetch_array($ema1))
             {
               $batukari+= ($emarow['denbora']-$batezbestekoa1)**2;
             }
             $bariantza1= $batukari / $emaitzaKop;
             $desbideratzeEstandarra = sqrt($bariantza1);
             $tarteaMin1 = $batezbestekoa1 - 2*$desbideratzeEstandarra;
             $tarteaMax1 = $batezbestekoa1 + 2*$desbideratzeEstandarra;
             $idIkasleLista = array();
             $emaitzakDenLista = array();
             $denBatezb = array();
             $dentart1 = array();
             $dentart2= array();

             echo "<table>
                 <tr><th>Minijokoa</th><th>Ikaslea</th><th>Behar izandako denbora</th></tr>";
             mysqli_data_seek($ema1, 0);
             $count = 0;
             while($emarow = mysqli_fetch_array($ema1))
             {
               $dengraf = $emarow['denbora'];
               $milliseconds=$emarow['denbora'];
               $seconds = floor($milliseconds / 1000);
              $minutes = floor($seconds / 60);
              $hours = floor($minutes / 60);
              $milliseconds = $milliseconds % 1000;
              $seconds = $seconds % 60;
              $minutes = $minutes % 60;

              $format = '%u:%02u:%02u.%03u';
              $time = sprintf($format, $hours, $minutes, $seconds, $milliseconds);
              $emaOrain=rtrim($time, '0');
               $idOrain = $emarow['idIkaslea'];
               $idIkasleLista[$count]=$idOrain;
               $emaitzakDenLista[$count] = (int) $dengraf;
               $denBatezb[$count] = $batezbestekoa1;
               $dentart1[$count] =$tarteaMin1;
               $dentart2[$count]=$tarteaMax1;

               if((int) $dengraf < $tarteaMin1){
                 echo "<tr bgcolor='#006600'><th>$minijokoa</th><th><a href='ikaslea_emaitzaLista.php?ikaslea=$idOrain'>$idOrain</a></th><th>$emaOrain</th></tr>";
               }else if((int) $dengraf > $tarteaMax1){
                 echo "<tr bgcolor='#FF0000'><th>$minijokoa</th><th><a href='ikaslea_emaitzaLista.php?ikaslea=$idOrain'>$idOrain</a></th><th>$emaOrain</th></tr>";
               } else{
                 echo "<tr bgcolor='Silver'><th>$minijokoa</th><th><a href='ikaslea_emaitzaLista.php?ikaslea=$idOrain'>$idOrain</a></th><th>$emaOrain</th></tr>";
               }
               $count++;
             }
             echo '</table>';
           }
       ?>
     </td>
 <td>
   <div class="box">
     <canvas id="lineChart" height="400" width="450"></canvas>
   </div>
 </td>

</table>
<table>
  <td>
     <?php
     $emaitzaKop=0;
     $emaitzaDen=0;
     mysqli_data_seek($ema1, 0);
         if($ema1){
           while($emarow = mysqli_fetch_array($ema1))
           {
             $emaitzaKop++;
             $emaitzaDen+= (int) $emarow['saiakeraKop'];
           }
           $batezbestekoa1 =$emaitzaDen /$emaitzaKop;
           $batukari=0;

           mysqli_data_seek($ema1, 0);
           while($emarow = mysqli_fetch_array($ema1))
           {
             $batukari+= ($emarow['saiakeraKop']-$batezbestekoa1)**2;
           }
           $bariantza1= $batukari / $emaitzaKop;
           $desbideratzeEstandarra = sqrt($bariantza1);
           $tarteaMin1 = $batezbestekoa1 - 2*$desbideratzeEstandarra;
           $tarteaMax1 = $batezbestekoa1 + 2*$desbideratzeEstandarra;
           $idIkasleLista = array();
           $emaitzakKlikLista = array();
           $batezKlik = array();
           $kliktart1 = array();
           $kliktart2 = array();
           echo "<table>
               <tr><th>Minijokoa</th><th>Ikaslea</th><th>Egindako saiakera kopurua</th></tr>";
           mysqli_data_seek($ema1, 0);
           $count = 0;
           while($emarow = mysqli_fetch_array($ema1))
           {
             $emaOrain=$emarow['saiakeraKop'];
             $idOrain = $emarow['idIkaslea'];
             $idIkasleLista[$count]=$idOrain;
             $emaitzakKlikLista[$count] = (int) $emaOrain;
             $batezKlik[$count] = $batezbestekoa1;
             $kliktart1[$count] = $tarteaMin1;
             $kliktart2[$count] = $tarteaMax1;

             if((int) $emaOrain < $tarteaMin1){
               echo "<tr bgcolor='#006600'><th>$minijokoa</th><th><a href='ikaslea_emaitzaLista.php?ikaslea=$idOrain'>$idOrain</a></th><th>$emaOrain</th></tr>";
             }else if((int) $emaOrain > $tarteaMax1){
               echo "<tr bgcolor='#FF0000'><th>$minijokoa</th><th><a href='ikaslea_emaitzaLista.php?ikaslea=$idOrain'>$idOrain</a></th><th>$emaOrain</th></tr>";
             } else{
               echo "<tr bgcolor='Silver'><th>$minijokoa</th><th><a href='ikaslea_emaitzaLista.php?ikaslea=$idOrain'>$idOrain</a></th><th>$emaOrain</th></tr>";
             }
             $count++;
           }
           echo '</table>';
         }
     ?>
   </td>
<td>
 <div class="box">
   <canvas id="lineChart2" height="400" width="450"></canvas>
 </div>
</td>
</table>
<div id="lineChart3"></div>
</body>
<script>
 varlabels = <?php echo json_encode($idIkasleLista);?>;
 vardata1 = <?php echo json_encode($emaitzakDenLista);?>;
 vardata2 = <?php echo json_encode($emaitzakKlikLista);?>;
 batezbestekoa1 = <?php echo json_encode($denBatezb); ?>;
 batezbestekoa2 = <?php echo json_encode($batezKlik);?>;
 dentart1 = <?php echo json_encode($dentart1);?>;
 dentart2 = <?php echo json_encode($dentart2);?>;
 kliktart1 = <?php echo json_encode($kliktart1);?>;
 kliktart2 = <?php echo json_encode($kliktart2);?>;
 displayLineChart();
</script>
</html>
