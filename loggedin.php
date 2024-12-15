<?php
if (!isset($_SESSION['username'])) {
    echo "Realize o login para ter acesso a estas páginas!!!";
    include('rodape.php');
    die;
}
?>