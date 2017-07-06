<html>
 <head>
  <title>Ikaslearen perfila</title>
  <script>
  function validateForm() {

    if (document.forms["perfilaEditatu"]["izena"].value == "") {
        alert("Izenak ezin du hutsa izan");
        return false;
    }
    if (document.forms["perfilaEditatu"]["abizena"].value == "") {
        alert("Abizenak ezin du hutsa izan");
        return false;
    }
    if (document.forms["perfilaEditatu"]["pasahitza1"].value == "") {
        alert("Pasahitzak ezin du hutsa izan");
        return false;
    }else if(document.forms["perfilaEditatu"]["pasahitza1"].value != document.forms["galdetegia"]["pasahitza2"].value){
        alert("Pasahitza eta pasahitz errepikatua ez datoz bat");
        return false;
    }
    return true;
  }

  function perfilaEditagarria(){
    var page=document.getElementById('perfilaIkusi');
    if (!page) return false;
    page.style.visibility='hidden';
    page.style.display='none';

    page=document.getElementById('perfilaEditatu');

        if (!page) return false;
        page.style.display='block';
        page.style.visibility='visible';

        return true;
  }

  </script>
 </head>
 <body>
   <link href="css/style.css" rel="stylesheet">
      <?php
      $host="mysql.hostinger.es"; // Host name
      $username="u942620627_marib"; // Mysql username
      $password="aizpeagap"; // Mysql password
      $db_name="u942620627_marib";
      $tbl_name="emaitza";
        // Connect to server and select databse.
        $link = mysqli_connect("$host", "$username", "$password", "$db_name");

        session_start();
        if(! isset($_SESSION["usr"])){
          header("location:../index.html");
        }
        $irak=$_SESSION['usr'];
        $sql="SELECT * FROM irakaslea WHERE idIrakasle='$irak'";
        $result=mysqli_query($link,$sql);
        if($result){
          while($row = mysqli_fetch_array($result))
          {
            $pasahitza=$row['pasahitza'];
            $izena=$row['izena'];
            $abizena=$row['abizena'];
            $ikastetxea=$row['ikastetxea'];
          }
        }
        ?>
        <form id="perfilaEditatu" style="visibility: hidden; display: none;" method="post" action="server/ikasle_datuakGorde.php" onsubmit="return validateForm()">
           <span>Pasahitz berria :</span>&nbsp;
           <input type="password" name="pasahitza" id="pasahitza1" value="<?=$pasahitza?>"><br>
           <span>Errepikatu pasahitza :</span>&nbsp;
           <input type="password" name="pasahitza" id="pasahitza2" value="<?=$pasahitza?>"><br>
           <span>Izena :</span>&nbsp;
           <input type="text" name="izena" id="izena" value="<?=$izena?>"><br>
           <span>Adina :</span>&nbsp;
           <input type="text" name="abizena" id="abizena" value="<?=$abizena?>"><br>
           <span>Ikastetxea :</span>&nbsp;
           <input type="text" name="ikastetxea" id="adina" value="<?=$ikastetxea?>"><br>
           <button class="btn-sample" type="submit">Bidali</button>
        </form>

        <div id="perfilaIkusi">
          <span>Pasahitza :</span>&nbsp;
          <input type="password"  value="<?=$pasahitza?>" readonly><br>
          <span>Izena :</span>&nbsp;
          <input type="text"  value="<?=$izena?>" readonly><br>
          <span>Abizena :</span>&nbsp;
          <input type="text"  value="<?=$abizena?>" readonly><br>
          <span>Ikastetxea :</span>&nbsp;
          <input type="text"  value="<?=$ikastetxea?>" readonly><br>
          <button class="btn-sample" ondblclick="perfilaEditagarria()">Editatu</button>
        </div>

    </body>
</html>
