<?php
$conn = mysqli_connect("localhost", "smpw", "smpw2020", "members");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query="SELECT * FROM noticias";
$result=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result))
{
    $a[]=$row['titulo'];
}
$q = $_REQUEST["q"];
$hint = "";
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}
echo $hint === "" ? "Noticia não encontrada" : $hint;
?>