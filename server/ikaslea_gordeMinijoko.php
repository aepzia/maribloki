<?php
$host="mysql.hostinger.es"; // Host name
$username="u942620627_marib"; // Mysql username
$password="aizpeagap"; // Mysql password
$db_name="u942620627_marib";

// Create connection
$conn = mysqli_connect("$host", "$username", "$password", "$db_name");
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
session_start();
$idMinijokoa = $_POST['idMinijokoa'];
$idIkaslea = $_SESSION['usr'];
$saiakeraKop= (int) $_POST['saiakeraKop'];
$denbora= (int) $_POST['denbora'];
$sql = "INSERT INTO emaitza (idMinijokoa,idIkaslea,saiakeraKop,denbora) VALUES ('$idMinijokoa','$idIkaslea','$saiakeraKop','$denbora')";
    echo "<script>console.log( '$sql' );</script>";
if (mysqli_query($conn,$sql) === TRUE) {
    echo "ondo";
} else {
   echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
