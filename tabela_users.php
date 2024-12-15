<style>
table, th, td {
    border-collapse: collapse;
    border: 2px solid black;
}
</style>
<table>
    <tr>
        <th>UserName</th>
        <th>ID</th>
        <th>Primeiro Nome</th>
        <th>Último Nome</th>
        <th>Email</th>
        <th>Admin</th>
    </tr>
    <tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $seraadmin = "";
            if ($row['admin'] == 0) {
                $seraadmin = "Não";
            } else {
                $seraadmin = "Sim";
            } ?>

            <td><?php echo $row['username'] ?></td>
            <td> <?php echo $row['id'] ?></td>
            <td> <?php echo $row['pnome'] ?></td>
            <td> <?php echo $row['unome'] ?></td>
            <td> <?php echo $row['email'] ?></td>
            <td> <?php echo $seraadmin ?></td>
    </tr>
<?php
        }
?>
</table>