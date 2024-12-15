<?php 
include('topo.php');

if (!isset($_SESSION['username']))
{
header('Location: login.php');
}
header('Location:home.php');
?>
