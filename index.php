<?php
session_start();
//$urladmin ="http://localhost:8080/admin/";
//$urluser ="http://localhost:8080/";

$home = "q0h7yf5pynynaq54.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/home.php";
$register = "q0h7yf5pynynaq54.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/register.php";
$shoppingcart = "q0h7yf5pynynaq54.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/shoppingcart.php";
$order = "q0h7yf5pynynaq54.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/order.php";
$logout = "q0h7yf5pynynaq54.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/logout.php";

//Connection

$conn = mysqli_connect("q0h7yf5pynynaq54.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "gcwa9jegsj3qhlzy", "b8ezxamnerkl1hgr", "n1xnw8ur47td4783")
      or die("Can not connect database".mysqli_connect_error());

include('theme.php');