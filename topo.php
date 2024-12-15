<?php
session_start();
$conn = mysqli_connect('localhost', 'smpw', 'smpw2020', 'members');

if (!$conn) {
    echo "Ocoreu um erro na ligação à base de dados";
    die;
}
?>
<!DOCTYPE html>
<html>
<style>
    head,
    body,
    footer,
    header {
        background-color: #e0c68b;
    }
</style>
<div class="topo">

    <head>
        <link rel="stylesheet" href="estilos.css">
        <title>Trabalho de SMPW 2020</title>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="home.php" action="home.php">Home</a>
            <a href="contactos.php" action="contactos.php">Contactos</a>
            <?php
            if (isset($_SESSION['username'])) {?>
                <a href="pesquisar.php" action="pesquisar.php">Pesquisar</a>
                <?php
                $query = "SELECT username FROM users WHERE admin='1'";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $admins[] = $row['username'];
                }
                if (in_array($_SESSION['username'], $admins)) {
            ?>
                    <a href="users.php" action="users.php">Utilizadores</a>
                    <a href="gerenciar.php" action="gerenciar.php">Gestao de Pagina</a>
            <?php
                }
            }
            ?>
        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu </span>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <div id="login" class="mylogin" style="float:right">

            <?php
            if (!isset($_SESSION['username'])) {
            ?>
                <a href="login.php"> Login </a><br />
            <?php
            } else {
                if (in_array($_SESSION['username'], $admins)) {
                    echo "Bem-Vindo Admin! <br/>";
                }
                echo "Bem-Vindo " . $_SESSION['username'];
            ?>
                <br />
                <a href="perfil.php"> O Meu Perfil </a><br />
                <a href="logout.php"> Sair </a>
            <?php
            }
            ?>
        </div>

        <h1>Trabalho de SMPW 2020</h1>

        <style>
            body {
                font-family: "Lato", sans-serif;
            }

            .sidenav {
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }

            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
            }

            .sidenav a:hover {
                color: #f1f1f1;
            }

            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 36px;
                margin-left: 50px;
            }

            @media screen and (max-height: 450px) {
                .sidenav {
                    padding-top: 15px;
                }

                .sidenav a {
                    font-size: 18px;
                }
            }
        </style>
    </head>

    <body>
        <script>
            function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
            }

            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
        </script>
        
        <div id="imglogo" class="mylogo">
            <a href="home.php" target="_blank">
                <img src="./fotos/logo.png" width="200" style="border:3px solid black" alt="Logo">


            </a>

        </div>
    </body>
    <hr />
</div>