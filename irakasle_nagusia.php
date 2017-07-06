<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../blockly/blockly_compressed.js"></script>
    <script src="../blockly/blocks_compressed.js"></script>
    <script src="../blockly/msg/js/eu_es.js"></script>
    <script src="../blockly/javascript_compressed.js"></script>
    <script src="../blockly/blocks/functions.js"></script>
    <script src="../blockly/tests/generators/generators/javascript/functions.js"></script>
    <script src="js/minijokoak.js"></script>
    <script src="blockly_compressed.js"></script>
    <script src="javascript_compressed.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="prueba.css">-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Irakasle orri nagusia</title>

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

<body class="index" id="page-top" onload="sartuJokoa()">
    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="fa fa-bars"></i>
        </button>
        <div class="container">
            <a class="navbar-brand" href="#page-top">MARI-BLOKI</a>
            <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="irakaslea_perfila.php" target="iframe_nagusia"><?php  session_start(); if(! isset($_SESSION["usr"])){
                          header("location:../index.html");
                        }else echo $_SESSION["usr"]?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="irakasle_ikasleLista.php" target="iframe_nagusia">Ikasleen lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="irakaslea_ikasleEstatistikak.php?minijokoa=1" target="iframe_nagusia">Ikasleen emaitzak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="maze.html" target="iframe_nagusia">Jolastu</a>
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
      <div class="">
      </br>
        <iframe src="irakasle_azalpena.php"  name="iframe_nagusia" allowfullscreen="" scrolling="no" style="transform: scale(1); transform-origin: 50px 50px 50px;" width="100%" height="1500px" frameborder="0" width="880px"></iframe>
      </div>
    </section>

  </body>

    <!-- Bootstrap core JavaScript -->
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
