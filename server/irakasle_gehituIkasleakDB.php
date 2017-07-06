<?php
$host="mysql.hostinger.es"; // Host name
$username="u942620627_marib"; // Mysql username
$password="aizpeagap"; // Mysql password
$db_name="u942620627_marib";

// Connect to server and select databse.
$link = mysqli_connect("$host", "$username", "$password", "$db_name");
$iniziala = strtolower($_POST['izena'][0]);
$abizena = strtolower($_POST['abizena']);
$sql="SELECT * FROM ikaslea WHERE idIkaslea LIKE '$iniziala$abizena%'";
$result=mysqli_query($link,$sql);
$count=$result->num_rows;
$sql="SELECT * FROM irakaslea WHERE idIrakasle LIKE '$iniziala$abizena%'";
$result=mysqli_query($link,$sql);
// Mysql_num_row is counting table row
$count+=$result->num_rows;
// Mysql_num_row is counting table row
$count++;
if(!isset($_SESSION))
    {
        session_start();
        $irakasle = $_SESSION["usr"];

    }
    else
    {
      $irakasle = $_SESSION["usr"];
    }
if($count<10){
  $count = "000".$count;
}else if($count<100){
  $count = "00".$count;
}else if($count<1000){
  $count = "0".$count;
}
$erabiltzaileBerria=$iniziala.$abizena.$count;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < 10; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}
$pasahitza=$randomString;
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$izena=$_POST['izena'];
$abizena=$_POST['abizena'];
$sql = "INSERT INTO ikaslea (izena,abizena,idIkaslea,pasahitza,idirakasle) VALUES ('$izena','$abizena','$erabiltzaileBerria','$pasahitza','$irakasle')";
if ($conn->query($sql) === TRUE) {
  $emaitza = array();
  $emaitza['success'] = true;
  $emaitza['erabiltzailea'] = $erabiltzaileBerria;
  $emaitza['pasahitza'] = $pasahitza;
} else {
   echo "Error updating record: " . $conn->error;
   $emaitza['success'] = false;
}

$conn->close();
header('Content-type: application/json');
echo json_encode($emaitza);
 ?>
