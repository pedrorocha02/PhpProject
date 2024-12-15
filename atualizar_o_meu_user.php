<!DOCTYPE html>
<html>
<head>
<title>Atualizar Perfil User</title>
</head>
<?php include('topo.php');
include('loggedin.php');?>
<p> Utilizadores:</p>
<?php
$sql = "SELECT * FROM users WHERE username='".$_SESSION['username']."'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
    $passe = $row['password'];
    $pnome = $row['pnome'];
    $unome = $row['unome'];
    $email = $row['email'];
}
?>

<form method="POST" action="atualizar_o_meu_user.php">
    Username: <input type="text" name="username" value="<?php echo $username ?>" /><br /><br />
    Password: <input type="text" name="passe" value="<?php echo $passe ?>" /><br /> <br />
    Primeiro Nome: <input type="text" name="pnome" value="<?php echo $pnome ?>" /> <br /> <br />
    Último Nome: <input type="text" name="unome" value="<?php echo $unome ?>" /> <br /> <br />
    Email: <input type="text" name="email" value="<?php echo $email ?>" /> <br /> <br />
    <input type="submit" name="submitmeuuser" value="Submit" />
</form>

<?php
if (isset($_POST['submitmeuuser'])) {
    $user = $_POST['username'];
    $passe = $_POST['passe'];
    $pnome = $_POST['pnome'];
    $unome = $_POST['unome'];
    $email = $_POST['email'];
    $query = "UPDATE users SET username ='" . $username . "' , password='" . $passe . "', pnome='" . $pnome . "', unome='" . $unome . "', email='" . $email . "' WHERE username='" . $_SESSION['username'] . "'";
    $result = mysqli_query($conn, $query);
}
if (isset($_POST['submitmeuuser'])) {
    echo "Utilizador " . $_SESSION['username'] . " atualizado com sucessso!";
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