<html>
 <head>
  <title>Ikaslearen perfila</title>
  <link href="src/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="src/css/style.css" rel="stylesheet">
  <script>
  function validateForm(){
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
    }else if(document.forms["perfilaEditatu"]["pasahitza1"].value != document.forms["perfilaEditatu"]["pasahitza2"].value){
        alert("Pasahitza eta pasahitz errepikatua ez datoz bat");
        return false;
    }
    var reg = new RegExp('^\\d+$');
    if (document.forms["perfilaEditatu"]["adina"].value == "") {
        alert("Adinak ezin du hutsa izan");
        return false;
    }else if (reg.test(document.forms["perfilaEditatu"]["adina"].value)!=true){
        alert("Adinak zenbakizkoa izan behar du");
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
        $ik=$_GET["ikaslea"];
        $sql="SELECT * FROM ikaslea WHERE idIkaslea='$ik'";
        $result=mysqli_query($link,$sql);
        if($result){
          while($row = mysqli_fetch_array($result))
          {
            $pasahitza=$row['pasahitza'];
            $izena=$row['izena'];
            $abizena=$row['abizena'];
            $adina=$row['adina'];
            $generoa=$row['generoa'];
            $eskuina=$row['eskuina'];
            if($eskuina == 'D'){
              $eskuinaBalioa='Eskuina';
            }else if($eskuina=='I'){
              $eskuinaBalioa='Ezkerra';
            }else $eskuinaBalioa='Biak';
            $email=$row['email'];

          }
        }
        ?>
        <form id="perfilaEditatu" style="visibility: hidden; display: none;" method="post" action="server/ikaslea_datuakGorde.php" onsubmit="return validateForm()">
           <span>Pasahitz berria :</span>&nbsp;
           <input type="password" name="pasahitza1" id="pasahitza1" value="<?=$pasahitza?>"><br>
           <span>Errepikatu pasahitza :</span>&nbsp;
           <input type="password" name="pasahitza2" id="pasahitza2" value="<?=$pasahitza?>"><br>
           <span>Izena :</span>&nbsp;
           <input type="text" name="izena" id="izena" value="<?=$izena?>"><br>
           <span>Abizena :</span>&nbsp;
           <input type="text" name="abizena" id="abizena" value="<?=$abizena?>"><br>
           <span>Email :</span>&nbsp;
           <input type="text" name="email" id="email" value="<?=$email?>"><br>
           <span>Adina :</span>&nbsp;
           <input type="text" name="adina" id="adina" value="<?=$adina?>"><br>
           <span>Generoa :</span>&nbsp;
           <select name="generoa" id="generoa" value="<?=$generoa?>">
              <option value="E">Emakumezkoa</option>
              <option value="G">Gizonezkoa</option>
              <option value="B">Bestelakoa</option>
            </select><br>
           <span>Zein eskuarekin idazten duzu? </span>&nbsp;
           <select type="text" name="eskuina" id="eskuina" value="<?=$eskuina?>"><br>
             <option value="D">Eskuina</option>
             <option value="I">Ezkerra</option>
             <option value="A">Biak</option>
           </select><br>
           <button class="btn-sample" type="submit">Bidali</button>
        </form>

        <div id="perfilaIkusi">
          <span>Pasahitza :</span>&nbsp;
          <input type="password"  value="<?=$pasahitza?>" readonly><br>
          <span>Izena :</span>&nbsp;
          <input type="text"  value="<?=$izena?>" readonly><br>
          <span>Abizena :</span>&nbsp;
          <input type="text"  value="<?=$abizena?>" readonly><br>
          <span>Email :</span>&nbsp;
          <input type="text"  value="<?=$email?>" readonly><br>
          <span>Adina :</span>&nbsp;
          <input type="text"  value="<?=$adina?>" readonly><br>
          <span>Generoa :</span>&nbsp;
          <input value="<?=$generoa?>"><br>
          <span>Zein eskuarekin idazten duzu?</span>&nbsp;
          <input type="text" value="<?=$eskuinaBalioa?>"><br>
          <button class="btn-sample" onclick="perfilaEditagarria()">Editatu</button>
        </div>

    </body>
</html>
