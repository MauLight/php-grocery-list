<?php
//$connection connects with SQL database and returns an object.
$con = mysqli_connect("localhost", "root", "", "grocerydb");
if(!$con) {
    die("Cannot connect to server.");
}
?>