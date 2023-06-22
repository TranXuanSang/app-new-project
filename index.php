<?php
session_start();
//$urladmin ="http://localhost:8080/admin/";
//$urluser ="http://localhost:8080/";

$home = "eanl4i1omny740jw.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/home.php";
$register = "eanl4i1omny740jw.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/register.php";
$shoppingcart = "eanl4i1omny740jw.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/shoppingcart.php";
$order = "eanl4i1omny740jw.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/order.php";
$logout = "eanl4i1omny740jw.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/logout.php";

//Connection

$conn = mysqli_connect("eanl4i1omny740jw.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "kxvhmvwfindqbr6j", "qkgcf02pmxg73ohk", "dyzpdzy7izih7ans")
      or die("Can not connect database".mysqli_connect_error());

include('theme.php');