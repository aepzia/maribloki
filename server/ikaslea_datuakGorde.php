<?php
$host="mysql.hostinger.es"; // Host name
$username="u942620627_marib"; // Mysql username
$password="aizpeagap"; // Mysql password
$db_name="u942620627_marib"; // Database name
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$pasahitza = $_POST['pasahitza1'];
$izena = $_POST['izena'];
$abizena=$_POST['abizena'];
$adina=$_POST['adina'];
$generoa=$_POST['generoa'];
$eskuina=$_POST['eskuina'];
$email=$_POST['email'];
$tec = 0;
if($_POST['tec1']=='B'){
  $tec++;
}
$tec=$tec+intval($_POST['tec2']);
$tec=$tec+intval($_POST['tec3']);
if($_POST['tec4'] =='B'){
  $tec=$tec+2;
}
if($_POST['tec5']=='B'){
  $tec=$tec+4;
}
$desg = $_POST['desg'];
session_start();
$erab=$_SESSION['usr'];
if($tec==0){
  $sql = "UPDATE ikaslea SET pasahitza='$pasahitza', izena='$izena', abizena='$abizena', adina='$adina', generoa='$generoa', eskuina='$eskuina', email='$email' WHERE idIkaslea='$erab'";
} else $sql = "UPDATE ikaslea SET pasahitza='$pasahitza', izena='$izena', abizena='$abizena', adina='$adina', generoa='$generoa', eskuina='$eskuina', teknologiaEzagutza ='$tec', desgaitasunMaila='$desg', email='$email' WHERE idIkaslea='$erab'";

if ($conn->query($sql) === TRUE) {
  header("location:../ikaslea_azalpena.php");
} else {
   echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
