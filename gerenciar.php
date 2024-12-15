<!DOCTYPE html>
<html>
<?php
include('topo.php');
include('loggedin.php');?>
<p> Notícias:</p>
<?php
$sql = "SELECT * FROM noticias";
$result = mysqli_query($conn, $sql);
include('tabela_noticias.php');
?>
<p> Gerenciar as Notícias:</p>

<img src="./fotos/certo.jpg" width="10" height="10"  style="border:3px solid black" alt="Logo"><a href="adicionar.php"> Adicionar uma Notícia</a><br/> 
<img src="./fotos/errado.jpg" width="10" height="10" style="border:3px solid black" alt="Logo"><a href="remover.php"> Remover uma Notícia</a> <br/> 
<img src="./fotos/editar.jpg" width="10" height="10" style="border:3px solid black" alt="Logo"><a href="editar.php"> Alterar uma Notícia</a><br/> 
<a href="http://localhost/phpmyadmin/sql.php?server=1&db=members&table=noticias&pos=0" > Aceder ao Servidor </a>
<?php include('rodape.php')?>
</html>