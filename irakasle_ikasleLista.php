<html>
 <head>
  <title>Prueba de PHP</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
 <body>
    <script src="../jsPDF/dist/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script>
     function ikasleakGehituAgertu(){
       var page=document.getElementById('ikasleLista');
       if (!page) return false;
       page.style.visibility='hidden';
       page.style.display='none';

       page=document.getElementById('ikasleakGehitu');
       if (!page) return false;
       page.style.display='block';
       page.style.visibility='visible';

       return true;
     }
     function gehituFila(){
       var table = document.getElementById("ikasleakGehituTabla");
       var row = table.insertRow(-1);
       var cell1 = row.insertCell(0);
       cell1.contentEditable = true;
       var cell2 = row.insertCell(1);
       cell2.contentEditable = true;
       cell1.innerHTML = "Idatzi IZENA";
       cell2.innerHTML = "Idatzi ABIZENA";
     }
    function gordeTablaDB(){
         var doc = new jsPDF();
         doc.setFontSize(22);
         doc.text(20, 20, 'Ikasle berrien erabiltzaile eta pasahitzak');
         doc.setFontSize(12);
         var oTable = document.getElementById('ikasleakGehituTabla');
         doc.text(20, 30, "Izena");
         doc.text(60, 30, "Abizena");
         doc.text(100, 30, "Erabiltzailea");
         doc.text(140, 30, "Pasahitza");
          var rowLength = oTable.rows.length;
          x=40;
          for (i = 1; i < rowLength; i++){
             var oCells = oTable.rows.item(i).cells;
             var cellLength = oCells.length;
             var izena= oCells.item(0).innerHTML;
             izena= izena.replace(/<br>/g,'');
             doc.text(20, x, izena);
             var abizena= oCells.item(1).innerHTML;
             abizena= abizena.replace(/<br>/g,'');
             doc.text(60, x, abizena);
             var postData = {};
              postData.izena = izena.replace(/ /g,'.');
              postData.abizena = abizena.replace(/ /g,'.');
              $.ajax({
                type: 'POST',
                dataType: 'json',
                data: postData,
                url: 'server/irakasle_gehituIkasleakDB.php',
                async: false,
                success: function(data){
                  //alert("success");
                  doc.text(100, x, data.erabiltzailea);
                  doc.text(140, x, data.pasahitza);

                },
                error: function(data){
                  //alert("failed")
                }
              });
             x=x+10;
           }
        doc.output('dataurlnewwindow');
        location.reload();
     }
     </script>
   <div id="ikasleakGehitu" <?php if ($_SERVER['REQUEST_METHOD'] != "POST"){?> style="visibility: hidden; display: none;"<?php } ?>>
     <form action='irakasle_ikasleLista.php' method='post' enctype="multipart/form-data">
       <input id='filePath' name='filePath' type='file'>
       <input type='submit' value='kargatu'>
     </form>
     <h1>Ikasleen erabiltzaile eta pasahitzak</h1>
      <table calss="table-editable" id="ikasleakGehituTabla">
          <tr><th>Izena</th><th>Abizena</th></tr>
     <?php
     if ($_SERVER['REQUEST_METHOD'] == "POST"){

            $file = $_FILES['filePath']['tmp_name'];
             $fila = 1;
         if (($gestor = fopen($file, "r")) !== FALSE) {
              while (($datos = fgetcsv($gestor, 1000, "\r")) !== FALSE) {
                $numero = count($datos);
                $fila++;
                $content="";
                for ($c=0; $c < $numero; $c++) {
                   $zatiak = explode(";", $datos[$c]);
                   $content.="<tr><td contenteditable='true'>$zatiak[0]</td><td contenteditable='true'>$zatiak[1]</td></tr>";
                }
              }

            }
            echo $content;
            fclose($gestor);
          }
       ?>
     </table>

     <button id="tablaGorde" onclick="gordeTablaDB()">Gorde</button>
     <button id="gehituFila" onclick="gehituFila()">Ikasle berria</button>
 </div>

  <div id="ikasleLista" <?php if ($_SERVER['REQUEST_METHOD'] == "POST"){?> style="visibility: hidden; display: none;"<?php } ?>>
   <h1>Ikasleen erabiltzaile eta pasahitzak</h1>
   <button id="ikBerria" onclick="ikasleakGehituAgertu()">Ikasleak gehitu</button>
    <table>
        <tr><th>Izena</th><th>Abizena</th><th>Erabiltzailea</th><th>Pasahitza</th><th></th></tr>
      <?php
      $host="mysql.hostinger.es"; // Host name
      $username="u942620627_marib"; // Mysql username
      $password="aizpeagap"; // Mysql password
      $db_name="u942620627_marib";
      $tbl_name="ikaslea";
        // Connect to server and select databse.
        $link = mysqli_connect("$host", "$username", "$password", "$db_name");

        session_start();
        $erab=$_SESSION["usr"];
        $sql="SELECT * FROM $tbl_name WHERE idirakasle='$erab'";
        $result=mysqli_query($link,$sql);
        $content="";
        if($result){
          while($row = mysqli_fetch_array($result))
          {
            $izena=$row['izena'];
            $abizena=$row['abizena'];
            $id=$row['idIkaslea'];
            $passw=$row['pasahitza'];
            $content.="<tr><th>$izena</th><th>$abizena</th><th><a href='ikaslea_emaitzaLista.php?ikaslea=$id'>$id</a></th><th>$passw</th><th><a style='color: red;' href='server/irakasle_ikasleaEzabatu.php?ikaslea=$id'>X</a></th></tr>";
          }
        }
        echo $content; exit;
      ?>
    </table>
    </div>

    </body>
</html>
