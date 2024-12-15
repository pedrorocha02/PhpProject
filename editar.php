<!DOCTYPE html>
<html>
<head>
<title>Editar Perfil Admin </title>
</head>

<?php include('topo.php');
include('loggedin.php');
echo "Notícias:<br/>";
$sql = "SELECT * FROM noticias";
$result = mysqli_query($conn, $sql);
include('tabela_noticias.php');
echo "<br/>";

if (!isset($_POST['submit'])) {

?>
    <form method="POST" action="editar.php">
        Id da Notícia que quer editar: <input type="number" name="id" value="id" placeholder="Insira um ID" /><br /><br />
        <input type="submit" name="submit" value="Enviar" />
    </form>
<?php
}
if (isset($_POST['submit'])) {
    $_SESSION['id'] = $_POST['id'];
    $sql = "SELECT * FROM noticias WHERE id=" . $_SESSION['id'] . "";
    $result = mysqli_query($conn, $sql);
}

while ($row = mysqli_fetch_assoc($result)) {
    $titulo = $row['titulo'];
    $conteudo = $row['texto'];
    $imagem = $row['imagem'];
}
?>
<p>Alterar uma Notícia: <?php echo "Noticia " . $_SESSION['id'] ?></p>
<form method="POST" action="editar.php">
    Título: <input type="text" name="titulo" value="<?php echo $titulo ?>" /><br /><br />
    <div id="caixa">
        Conteúdo: <input type="text" name="conteudo" value="<?php echo $conteudo ?>" /><br /> <br />
    </div>
    Imagem: <input type="text" name="imagem" value="<?php echo $imagem ?>" /> <?php echo "O ficheiro da imagem tem de estar na pasta de imagens do servidor!!   <br/> Nome da pasta: ftnoticias " ?> <br /> <br />
    <input type="submit" name="enviar" value="Inserir" />
</form>

<?php
if (isset($_POST['enviar'])) {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $imagem = $_POST['imagem'];
    $query = "UPDATE noticias SET titulo ='" . $titulo . "' , texto='" . $conteudo . "', imagem='" . $imagem . "', data_noticia='" . date("Y-m-d H:i:s") . "' WHERE id='" . $_SESSION['id'] . "'";
    $result = mysqli_query($conn, $query);

    if (isset($result)) {
        echo "Noticia " . $_SESSION['id'] . " alterada com sucessso!";
        unset($_POST['submit']);
        unset($_SESSION['id']);
    } else {
        echo "Ocorreu um erro ao alterar a notícia!";
    }
}
include('rodape.php');
?>

</html>