<!DOCTYPE html>
<html>
<head>
<title>Atualizar Perfil Admin </title>
</head>
<?php include('topo.php');
include('loggedin.php');?>

<p> Utilizadores:</p>
<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
include('tabela_users.php');
?>
<br/>
<form method="POST" action="atualizaruser.php">
    Id do User que quer editar: <input type="number" name="id" value="id"  placeholder="Insira um ID" /><br /><br />
    <input type="submit" name="submit" value="Enviar" />
</form>
<?php
if (isset($_POST['submit'])) {
    $_SESSION['id_user'] = $_POST['id'];
    $sql = "SELECT * FROM users WHERE id=" . $_SESSION['id_user'] . "";
    $result = mysqli_query($conn, $sql);
}
while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
    $passe = $row['password'];
    $pnome = $row['pnome'];
    $unome = $row['unome'];
    $email = $row['email'];
}

?>

<p>Utilizador:<?php echo " Utilizador " . $_SESSION['id_user'] ?></p>
<form method="POST" action="atualizaruser.php">
    Username: <input type="text" name="username" value="<?php echo $username ?>" /><br /><br />
    Password: <input type="text" name="passe" value="<?php echo $passe ?>" /><br /> <br />
    Primeiro Nome: <input type="text" name="pnome" value="<?php echo $pnome ?>" /> <br /> <br />
    Último Nome: <input type="text" name="unome" value="<?php echo $unome ?>" /> <br /> <br />
    Email: <input type="text" name="email" value="<?php echo $email ?>" /> <br /> <br />
    <input type="submit" name="submitatualizado" value="Submit" />
</form>

<?php
if (isset($_POST['submitatualizado'])) {
    $user = $_POST['username'];
    $passe = $_POST['passe'];
    $pnome = $_POST['pnome'];
    $unome = $_POST['unome'];
    $email = $_POST['email'];
    $query = "UPDATE users SET username =" . $username . " , password=" . $passe . ", pnome=" . $pnome . ", unome=" . $unome . ", email=" . $email . " WHERE id=" . $_SESSION['id'] . "";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['submitatualizado'])) {
    echo "Utilizador " . $_SESSION['id_user'] . " atualizado com sucessso!";
} else {
    if (isset($result)) {
        echo "Ocorreu um erro ao atualizar o utilizador!";
    }
}
mysqli_close($conn);
unset($query);
include('rodape.php');
?>

</html>