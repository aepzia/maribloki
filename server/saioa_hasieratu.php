<?php
$host="mysql.hostinger.es";
$username="u942620627_marib";
$password="aizpeagap";
$db_name="u942620627_marib";
$tbl_name="ikaslea";

$link = mysqli_connect("$host", "$username", "$password", "$db_name");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $myusername=$_POST['usr'];
          $mypassword=$_POST['pwd'];
}

$sql="SELECT * FROM $tbl_name WHERE idIkaslea='$myusername' and pasahitza='$mypassword'";
$result=mysqli_query($link,$sql);
$count=$result->num_rows;

if($count==1){
  session_start();
  $_SESSION['usr'] = $myusername;
  $fields = mysqli_fetch_array( $result );
  header("location:../ikaslea_nagusia.php");
}else{
  $tbl_name="irakaslea";
  $sql="SELECT * FROM $tbl_name WHERE idIrakasle='$myusername' and pasahitza='$mypassword'";
  $result=mysqli_query($link,$sql);
  $count=$result->num_rows;
  if($count==1){
    session_start();
    $_SESSION['usr'] = $myusername;
    header("location:../irakasle_nagusia.php");
  }else {
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Erabiltzailea edo pasahitza ez da egokia');\n";
    echo "window.location='../index.html#login'";
    echo "</script>";
  }
}

?>
