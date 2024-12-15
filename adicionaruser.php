<!DOCTYPE html>
<?php include('topo.php');
include('loggedin.php');?>
<p> Utilizadores:</p>
<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
include('tabela_users.php');
?>
<html>
<p>Inserir um novo utilizador:</p>
<form method="POST" action="adicionaruser.php">
    Username: <input type="text" name="username" placeholder="UserName" /><br /><br />
    Password: <input type="text" name="passe" placeholder="Palavra-Passe" /><br /> <br />
    Primeiro Nome: <input type="text" name="pnome" placeholder="Primeiro Nome"/> <br /> <br />
    Último Nome: <input type="text" name="unome" placeholder="Último Nome"/> <br /> <br />
    Email: <input type="text" name="email" placeholder="Email"/> <br /> <br />
    <input type="submit" name="submit" value="Submit" />
</form>

<?php
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $passe = $_POST['passe'];
    $pnome = $_POST['pnome'];
    $unome = $_POST['unome'];
    $email = $_POST['email'];
    $query = "INSERT INTO users (username,password,pnome,unome,email) VALUES ('$user','$passe','$pnome','$unome','$email');";
    $result = mysqli_query($conn, $query);
}
if ($result) {
    echo "Utilizador adicionado com sucessso!";
    unset($query);
} else {
    echo "Ocorreu um erro ao adicionar o novo utilizador!";
}
mysqli_close($conn);
unset($query);
include('rodape.php');
?>

</html>