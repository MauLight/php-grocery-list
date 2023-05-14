<?php
include("connect.php");
$id= $_GET['id'];
$q= "delete from grocerytb where ID = $id";
mysqli_query($icon, $q);
?>
