<html>
 <head>
  <title>Ikasleak minijokoetan lortutako emaitzak</title>
 </head>
 <body>
   <link href="css/style.css" rel="stylesheet">
   <?php
   $host="mysql.hostinger.es"; // Host name
   $username="u942620627_marib"; // Mysql username
   $password="aizpeagap"; // Mysql password
   $db_name="u942620627_marib";
   $tbl_name="emaitza";
   $ik = $_GET['ikaslea'];
   $link = mysqli_connect("$host", "$username", "$password", "$db_name");

   session_start();
   if (! isset($_SESSION["usr"])){
     header("location:../index.html");
   }
   $sql="SELECT * FROM ikaslea WHERE idIkaslea='$ik'";
   $result=mysqli_query($link,$sql);
   $content="";
   if($result){
     while($row = mysqli_fetch_array($result))
     {
       $izena = $row['izena'];
       $abizena=$row['abizena'];
       $adina = $row['adina'];
       $generoa= $row['generoa'];
       $eskuina= $row['eskuina'];
       $tec=$row['teknologiaEzagutza'];
       $desg = $row['desgaitasunMaila'];
       $email= $row['email'];
     }
   }
   ?>
   <span>Izena :</span>&nbsp;
   <span><?=$izena?></span><br>
   <span>Abizena :</span>&nbsp;
   <span><?=$abizena?></span><br>
   <span>Email :</span>&nbsp;
   <span><?=$email?></span><br>
   <span>Adina :</span>&nbsp;
   <span><?=$adina?></span><br>
   <span>Generoa :</span>&nbsp;
   <span><?=$generoa?></span><br>
   <span>Zein eskuarekin idazten duzu?</span>&nbsp;
   <span><?=$eskuina?></span><br>
   <span>Desgaitasuna :</span>&nbsp;
   <span><?=$desg?></span><br>
   <span>Tecnologia ezagutza :</span>&nbsp;
   <span><?=$tec?></span><br>

    <table>
        <tr><th>Minijokoa</th><th>Behar izandako denbora</th><th>Egindako saiakera kopurua</th></tr>
      <?php

        // Connect to server and select databse.
        

        $sql="SELECT * FROM $tbl_name WHERE idIkaslea='$ik'";
        $result=mysqli_query($link,$sql);
        $content="";
        if($result){
          while($row = mysqli_fetch_array($result))
          {
            $mini=$row['idMinijokoa'];
            $milliseconds=$row['denbora'];
            $seconds = floor($milliseconds / 1000);
           $minutes = floor($seconds / 60);
           $hours = floor($minutes / 60);
           $milliseconds = $milliseconds % 1000;
           $seconds = $seconds % 60;
           $minutes = $minutes % 60;

           $format = '%u:%02u:%02u.%03u';
           $time = sprintf($format, $hours, $minutes, $seconds, $milliseconds);
           $denbora=rtrim($time, '0');
            $idOrain = $emarow['idIkaslea'];
            $saiakeraKop=$row['saiakeraKop'];
            $content.="<tr><th>'$mini'</th><th>'$denbora'</th><th>'$saiakeraKop'</th></tr>";
          }
        }
        $content.='</table>';
        echo $content; exit;
      ?>

    </body>
</html>
