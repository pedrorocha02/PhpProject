<!DOCTYPE html>
<html>
<?php include('topo.php');
include('loggedin.php');?>
<p> Utilizadores:</p>
<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
include('tabela_users.php');
echo"<br/>";
?>
<p>Promover um Utilizador a Admin:</p>
<form method="POST" action="remover_admin.php">
    Id do Admin que quer despromover : <input type="number" name="id" placeholder="Insira um ID" /><br /><br />
    <input type="submit" name="remove_admin" value="Submit" />
</form>
<p>

<?php
if (isset($_POST['remove_admin'])) {
    $id = $_POST['id'];
    $query = "UPDATE users SET admin='0' WHERE id=$id";
    $result = mysqli_query($conn, $query);
}

if (isset($result) && isset($id)) {
    echo "Utilizador " . $id . " despromovido!";
    unset($id);
} else if (!isset($result)) {
    echo "Ocorreu um erro ao adicionar despromover um Admin!";
}

?>

</html>