<!DOCTYPE html>
<html>
<?php 
$conn = mysqli_connect('localhost','smpw', 'smpw2020', 'members');

if(!$conn)
{
    echo"Ocoreu um erro na ligação à base de dados";
    die;
}
        $query="SELECT * FROM noticias";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
          $id=$row['id']; 
          $titulo=$row['titulo'];
          ?>
          <img src=<?php echo $row['imagem'] ?> width="100" height="100"></img> 
          <a href='detalhe_noticia.php?id=" <?php echo $id?> "'> <?php  echo $row['titulo'] ?> </a>
          <?php
          echo "<br/>";
        }
    ?>
</html>