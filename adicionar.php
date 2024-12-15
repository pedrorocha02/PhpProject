<!DOCTYPE html>
<?php include('topo.php');
include('loggedin.php');
echo "Notícias:<br/>";
$sql = "SELECT * FROM noticias";
$result = mysqli_query($conn, $sql);
include('tabela_noticias.php');
echo "<br/>";
?>
<html>
<p>Inserir uma nova Notícia:</p>
<form method="POST" action="adicionar.php">


    Título: <input type="text" name="titulo" placeholder="Insira um Título"/><br /><br />
    Conteúdo: <input type="text" name="conteudo" placeholder="Conteúdo da Notícia"/><br /> <br />
    Imagem: <input type="text" name="imagem" placeholder="Caminho da Imagem"/> <?php echo "O ficheiro da imagem tem de estar na pasta de imagens do seridor!!   <br/> Nome da pasta: ftnoticias " ?> <br /> <br />
    <input type="submit" name="submit" value="Submit" />
</form>

<?php
if (isset($_POST['submit'])) {
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $imagem = $_POST['imagem'];
    $data=date("Y-m-d H:i:s");
    $query = "INSERT INTO noticias (titulo,texto,imagem,data_noticia) VALUES ('$titulo','$conteudo','$imagem','$data');";
    $result = mysqli_query($conn, $query);
}
if ($result) {
    echo "Noticia adicionada com sucessso!";
    unset($query);
} else {
    echo "Ocorreu um erro ao adicionar a notícia!";
} 
mysqli_close($conn);
include('rodape.php');
?>

</html>