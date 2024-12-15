<?php include('topo.php'); 
include('loggedin.php');?>
<main class="container">
    <div class="row">
        <div class="col-sm-4">
            <?php
            $pesquisa=" ";
            if (!isset($_POST['submit'])) {
            ?>
                <form action="pesquisar.php" method="POST">
                    Pesuisar:<input id="search" name="search_pesquisa" type="text" placeholder="Pesquisar">
                    <input id="submit" type="submit" value="Search">
                </form>
            <?php
                
                $pesquisa = $_POST['search_pesquisa'];
            }
            $sql = "SELECT * FROM noticias WHERE titulo LIKE '%$pesquisa%'";
            $result = mysqli_query($conn, $sql);
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <img src=<?php echo $row['imagem'] ?> width="120" height="120"></img>

                <?php
                $titulo = $row["titulo"];
                echo "<li> <b>Noticia : </b><a href='detalhe_noticia.php?id=" . $row['id'] . "'>" . $titulo . "</a> </br>";
                echo "</br>";
                ?>
            <?php
            }
            echo "</ul>";
            mysqli_close($conn);
            ?>
        </div>
    </div>
</main>