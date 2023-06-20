<?php

$id = $_GET['id'];

$sql = "Delete from orders where orid=" .$id;
$result = mysqli_query($conn, $sql);
header("Location: $urladmin?page=$order");