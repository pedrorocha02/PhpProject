<!DOCTYPE html>
<html>
<?php include('topo.php');
include('loggedin.php');
echo "Notícias:<br/>";
$sql = "SELECT * FROM noticias";
$result = mysqli_query($conn, $sql);
include('tabela_noticias.php');
echo "<br/>";


?>
<p>Remover uma Notícia:</p>
<form method="POST" action="remover.php">
    Id da Notícia que quer remover: <input type="number" name="id"  placeholder="Insira um ID" /><br /><br />
    <input type="submit" name="submit" value="Submit"/>
</form>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM noticias WHERE id=$id";
    $result = mysqli_query($conn, $query);
}

if (isset($result) && isset($id)) {
    echo "Noticia " . $id . " removida com sucesso!";
} else if(!isset($result)) {
    echo "Ocorreu um erro ao remover a notícia!";
}
$id = null;
include('rodape.php');
?>

</html>