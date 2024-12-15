<!DOCTYPE html>
<html>
<?php include('topo.php');
include('loggedin.php');?>
<p> Utilizadores:</p><br/>
<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
include('tabela_users.php');
echo "<br/>";

?>
<p>Remover um Utilizador:</p>
<form method="POST" action="removeruser.php">
    Id do Utilizador que quer remover: <input type="number" name="id"  placeholder="Insira um ID" /><br /><br />
    <input type="submit" name="submit" value="Submit" />
</form>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id=$id";
    $result = mysqli_query($conn, $query);
}

if (isset($result) && isset($id)) {
    echo "Utilizador " . $id . " removido com sucesso!";
} else if(!isset($result)) {
    echo "Ocorreu um erro ao remover o Utilizador!";
}
$id = null;
?>

</html>