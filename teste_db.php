<html>
<head>
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</head>

<body>
    <form>
        Noticia: <input type="text" name="pesquisa" onkeyup="showHint(this.value)"/>
    </form>
    <p>Sugestões: <span id="txtHint"></span></p>
</body>
<style>
    .alinhamento_texto {
        text-align: left;
    }
</style>

</html>

<?php
$conn = mysqli_connect("localhost", "smpw", "smpw2020", "members");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM noticias";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) { ?>
    <img src=<?php echo $row['imagem'] ?> width="120" height="120"></img>
    <?php
    $id = $row["id"];
    $frase = $row["titulo"];
    ?>
    <div class="alinhamento_texto">
        <?php
        echo " <b>Notícia : </b><a href='detalhe_noticia.php?id=" . $id . "'>" . $frase . "</a> <br/><br/>";
        ?>
    </div>
<?php
}
mysqli_close($conn)
?>
</div>
</main>