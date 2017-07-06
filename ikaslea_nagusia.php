<!DOCTYPE html>
<html lang="en">

<head>
    <title>Orri nagusia</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Temporary navbar container fix -->
    <style>
    .navbar-toggler {
        z-index: 1;
    }

    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
</head>

<body class="index" id="page-top">
  <?php  session_start(); if(! isset($_SESSION["usr"])){
    header("location:/index.html");
  }else $erab=$_SESSION["usr"]?>

      <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="fa fa-bars"></i>
        </button>
        <div class="container">
            <a class="navbar-brand">MARI-BLOKI</a>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ikaslea_perfila.php?ikaslea=<?=$erab?>" target="iframe_nagusia" ><?=$erab?></a>
                    </li>
                    <li class="nav-item">
                        <a id ="minijoko" class="nav-link" href="#" onclick="jokoIrisgarria();" target="iframe_nagusia">Jolastu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ikaslea_emaitzaLista.php?ikaslea=<?=$erab?>" target="iframe_nagusia">Lortutako emaitzak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Saioa amaitu</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->


    <!-- Body -->
    <section>
      <?php
      $host="mysql.hostinger.es";
      $username="u942620627_marib";
      $password="aizpeagap";
      $db_name="u942620627_marib";
      $tbl_name="ikaslea";

      $link = mysqli_connect("$host", "$username", "$password", "$db_name");
      $myusername= $_SESSION['usr'];
      $sql="SELECT * FROM $tbl_name WHERE idIkaslea='$myusername'";
      $result=mysqli_query($link,$sql);
      if($result){
        while($row = mysqli_fetch_array($result))
        {
          $adina=$row['adina'];
          if($adina!=0){
            echo '<iframe src="ikaslea_azalpena.php"  name="iframe_nagusia" allowfullscreen="" scrolling="no" style="transform: scale(1); transform-origin: 50px 50px 50px;" width="100%" height="1500px" frameborder="0" width="880px"></iframe>';
        }else
            echo '<iframe src="ikaslea_datuEskaria.html"  name="iframe_nagusia" allowfullscreen="" scrolling="no" style="transform: scale(1); transform-origin: 50px 50px 50px;" width="100%" height="1500px" frameborder="0" width="880px"></iframe>';
        }
      }
      ?>
    </section>

  </body>

    <!-- Bootstrap core JavaScript -->
    <script>
    function jokoIrisgarria(){
      confirmar=confirm("Tekla bidezko hartu-emana erabili behar duzu?");
      if (confirmar){
        document.getElementById("minijoko").href = "blockly/demos/accessible/index.html";
        document.getElementById("minijoko").target = "iframe_nagusia";
      }
      else{
      document.getElementById("minijoko").href = "maze.html";
      document.getElementById("minijoko").target = "iframe_nagusia";
      }
    }
    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
