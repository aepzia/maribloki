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

$ik=$_GET['ikaslea'];
session_start();
$irak=$_SESSION['usr'];
$sql = "DELETE FROM ikaslea WHERE idIkaslea='$ik' AND idirakasle='$irak'";

if ($conn->query($sql) === TRUE) {
  $sql = "DELETE FROM emaitza WHERE idIkaslea='$ik'";
  if ($conn->query($sql) === TRUE) {
    header("location:../irakasle_ikasleLista.php");
  } else {
     echo "Error updating record: " . $conn->error;
  }
} else {
   echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
