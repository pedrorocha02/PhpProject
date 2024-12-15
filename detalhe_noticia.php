<?php include('topo.php'); ?>
<main class="container">
    <div class="row">
        <div class="col-sm-4">

            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM noticias WHERE id=$id";
            $result = mysqli_query($conn, $sql);
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                $titulo = $row["titulo"];
                $conteudo = $row['texto'];
                $data=$row['data_noticia'];
                echo "</br>";
            ?>
                <style>
                    .titulo {
                        font-size: 20px;
                        text-align: center;
                    }
                </style>
                <div class="titulo">
                    <?php echo $row['titulo'];
                    echo "<br/> <br/>" ?><br />

                    <img src=<?php echo $row['imagem'] ?> width="50%" height="50%"></img>
                </div> <br />
            <?php
            echo"<b>Data de Publicacão</b>: ".$data. "<br/>";
                echo "<br/> <br/>";
                //echo "<li> <b>Titulo : </b><a href='detalhe_noticia.php?id=" .$id. "'>".$titulo. "</a> </br>";
                echo $conteudo;
            }
            echo "</ul>";
            mysqli_close($conn);
            ?>
        </div>
    </div>
</main>