<?php
$id = $_GET['id'];
// delete all oderdetail by userid
$sql = "DELETE FROM `orders` WHERE orid = " . $id;
$result = mysqli_query($conn, $sql);
header("Location: $urluser?page=$order");


