<?php
session_start();
//$urladmin ="http://localhost:8080/admin/";
//$urluser ="http://localhost:8080/";
$home = "frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/home.php";
$register = "frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/register.php";
$shoppingcart = "frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/shoppingcart.php";
$order = "frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/order.php";
$logout = "frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com/logout.php";

//Connection

$conn = mysqli_connect("frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "eg84xy9f508f9dwf", "jmqam7byju09nogo", "goy9i2r608in7p25")
      or die("Can not connect database".mysqli_connect_error());

include('theme.php');