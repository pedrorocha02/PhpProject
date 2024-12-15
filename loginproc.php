<?php
include('topo.php');

if(isset($_POST['submit']))
{
    $user = $_POST["username"];
    $senha = $_POST["passe"];
}

$query = "SELECT * FROM users WHERE username='$user' and password=$senha";
$result = mysqli_query($conn, $query);
$a=mysqli_num_rows($result);

if ($a > 0) {
  $_SESSION['username'] = $_POST["username"];
  header('Location: securedpage.php');
} else {
   header('Location: login.php');
}
?>
