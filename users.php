<!DOCTYPE html>
<html>
<head>
<title>Users </title>
</head>
<?php
include('topo.php');
include('loggedin.php');
?>

<p>Utilizadores:</p>
<?php
$conn = mysqli_connect("localhost", "smpw", "smpw2020", "members");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
include('tabela_users.php');
echo "<br/>";
?>
<img src="./fotos/certo.jpg" width="12" height="12" style="border:1px solid black" alt="Logo"><a href="adicionaruser.php"> Adicionar um Utilizador</a><br />
<img src="./fotos/errado.jpg" width="12" height="12" style="border:1px solid black" alt="Logo"><a href="removeruser.php"> Remover um Utilizador</a> <br />
<img src="./fotos/editar.jpg" width="12" height="12" style="border:1px solid black" alt="Logo"><a href="atualizaruser.php"> Alterar um Utilizador</a><br />
<p>Admins:</p>
<img src="./fotos/admin.jpg" width="15" height="15" style="border:1px solid black" alt="Logo"><a href="adicionar_admin.php"> Adicionar Admin</a><br />
<img src="./fotos/admin.jpg" width="15" height="15" style="border:1px solid black" alt="Logo"><a href="remover_admin.php"> Remover Admin</a><br />
<p>Servidor:</p>
<a href="http://localhost/phpmyadmin/sql.php?db=members&table=users&pos=0"> Aceder ao Servidor </a> 
<?php include('rodape.php');?>
</html>