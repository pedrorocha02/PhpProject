<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>
<?php include("topo.php");
?>

<div id="container">
    <header>
        <div id="logo"></div>
        <h3>Notícias</h3>
    </header>
    <p> Notícias: </p>

    <?php
    include('feed.php');
    ?>

    <?php include('rodape.php') ?>
</div>

</html>