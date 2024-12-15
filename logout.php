<?php
include('topo.php');
unset($_SESSION['username']);
session_destroy();
header('Location: home.php');
?>