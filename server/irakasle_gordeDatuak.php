<?php
$host="mysql.hostinger.es"; // Host name
$username="u942620627_marib"; // Mysql username
$password="aizpeagap"; // Mysql password
$db_name="u942620627_marib";
$link = mysqli_connect("$host", "$username", "$password", "$db_name");

$izena = $_POST['izena'];
$abizena=$_POST['abizena'];
$pasahitza=$_POST['pasahitza1'];
$ikastetxea=$_POST['ikastetxea'];
$iniziala=strtolower($izena[0]);
$abizena2=strtolower($abizena);
$sql="SELECT * FROM irakaslea WHERE idIrakasle LIKE '$iniziala$abizena2%'";
$result=mysqli_query($link,$sql);
$count=$result->num_rows;
$sql="SELECT * FROM ikaslea WHERE idIkaslea LIKE '$iniziala$abizena2%'";
$result=mysqli_query($link,$sql);
// Mysql_num_row is counting table row
$count+=$result->num_rows;
$count++;
if($count<10){
  $count = "000".$count;
}else if($count<100){
  $count = "00".$count;
}else if($count<1000){
  $count = "0".$count;
}
$erabiltzailea=$iniziala.$abizena2.$count;
$conn = mysqli_connect("$host", "$username", "$password", "$db_name");
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO irakaslea (idIrakasle, pasahitza, izena, abizena, ikastetxea) VALUES ('$erabiltzailea','$pasahitza','$izena','$abizena','$ikastetxea')";

if (mysqli_query($conn,$sql)=== TRUE) {
  session_start();
  $_SESSION["usr"]=$erabiltzailea;
  header("location:../irakasle_nagusia.php");
} else {
   echo "Errore bat gertatu da: " . $conn->error;
}

$conn->close();
?>
