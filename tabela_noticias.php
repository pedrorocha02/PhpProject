<style>
table, th, td {
    border-collapse: collapse;
    border: 2px solid black;
}
</style>
<table>
    <tr>
        <th>Título</th>
        <th>ID</th>
        <th>Imagem</th>
        <th>Data da Notícia</th>
    </tr>
    <tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {?>
            <td><?php echo $row['titulo'] ?></td>
            <td> <?php echo $row['id'] ?></td>
            <td> <?php echo $row['imagem'] ?></td>
            <td> <?php echo $row['data_noticia'] ?></td>
    </tr>
<?php
        }
?>
</table>