<?php
include("konfigurimi.php");

$id=$_GET['id'];

$result = mysqli_query($conn,"DELETE FROM studentet WHERE id=$id");

header("Location:index.php");
?>

