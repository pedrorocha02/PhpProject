<?php include('topo.php');
include('loggedin.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title> Perfil Menu Admin </title>
</head>
<?php
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($conn, $sql);
} else {
    echo "Realize o login para ter acesso a estas páginas!!!";
    include('rodape.php');
    die;
}
?>
<style>
.profile{
    font-size: 25px;
}
</style>
<div class="profile">
    <?php echo "<br/>O Meu Perfil: <br/><br/>"; ?>
</div>
<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<b>UserName</b>: " . $row["username"] . "<br/>";
    echo "<b>Password</b>: " . $row['password'] . "<br/>";
    echo "<b>Primeiro Nome</b>: " . $row['pnome'] . "<br/>";
    echo "<b>Último Nome</b>: " . $row['unome'] . "<br/>";
    echo "<b>Email</b>: " . $row['email'] . "<br/>";
}
?>
<img src="./fotos/editar.jpg" width="15" height="15" style="border:1px solid black" alt="Logo"><a href="atualizar_o_meu_user.php"> Alterar o meu Perfil</a><br />
<?php include('rodape.php');?>

</html>