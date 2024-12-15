<!DOCTYPE html>
<html>
<?php include('topo.php');
include('loggedin.php');
echo "Utilizadores:<br/>";
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
include('tabela_users.php');
echo "<br/>";

?>
<p>Promover um Utilizador a Admin:</p>
<form method="POST" action="adicionar_admin.php">
    Id do Utilizador que quer promover a Admin: <input type="number" name="id" placeholder="Insira um ID" /><br /><br />
    <input type="submit" name="submit_admin" value="Submit" />
</form>
<p>

<?php
if (isset($_POST['submit_admin'])) {
    $id = $_POST['id'];
    $query = "UPDATE users SET admin='1' WHERE id=$id";
    $result = mysqli_query($conn, $query);
}

if (isset($result) && isset($id)) {
    echo "Utilizador " . $id . " definido como Admin!";
    unset($id);
} else if (!isset($result)) {
    echo "Ocorreu um erro ao adicionar um novo Admin!";
}
include('rodape.php');
?>

</html>