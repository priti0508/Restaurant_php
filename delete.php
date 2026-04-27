<?php
include 'db.php';
$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM menu_items WHERE id=$id");

header("Location: home.php");
?>