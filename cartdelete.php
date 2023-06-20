<?php

$id = $_GET['id'];

$sql = "Delete from cart where proid=" .$id;
$result = mysqli_query($conn, $sql);
header("Location: $urluser?page=$shoppingcart");