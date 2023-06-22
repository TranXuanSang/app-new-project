<?php
session_start();
//$urladmin ="http://localhost:8080/admin/";
//$urluser ="http://localhost:8080/";

$home = "pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/home.php";
$register = "pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/register.php";
$shoppingcart = "pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/shoppingcart.php";
$order = "pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/order.php";
$logout = "pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/logout.php";

//Connection

$conn = mysqli_connect("pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "mnbwt19epiqwcvmx", "bgs9fvd7zlmsm0gm", "ug7qhsb1m4dfw2vl")
      or die("Can not connect database".mysqli_connect_error());

include('theme.php');