<?php

$id = $_GET['id'];

$sql = "Delete from product where proid=" .$id;
$result = mysqli_query($conn, $sql);
header("Location: $urladmin?page=$product");

?>