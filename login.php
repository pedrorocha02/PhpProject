<?php 
include('topo.php');

if (isset($_SESSION['username'])) {
   header('Location: securedpage.php');
}
?>
<html>

<head>
   <title>SimpleLogin</title>
</head>

<body>
   <h3>Iniciar Sessão</h3>
   <form method="POST" action="loginproc.php">
      Username:<input type="text" name="username" size="20" />
      Password:<input type="password" name="passe" size="20" />
      <input type="submit" name="submit" value="Login" />
   </form>
</body>
<br/>
<a href="criarconta.php" >Não tem Conta? Criar Conta!</a>
<?php
include('rodape.php');
?>

</html>