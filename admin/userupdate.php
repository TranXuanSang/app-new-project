<?php
$error = "";
if (isset($_POST['btnSubmit'])) {
    if ($_POST['fullname'] == ""){
        $error .= "<li>Please enter  Name</li>";
    }
    if ($_POST['address'] == ""){
        $error .= "<li>Please enter Address</li>";
    }
    if ($_POST['email'] == ""){
        $error .= "<li>Please enter Email</li>";
    }
    if ($_POST['tel'] == ""){
        $error .= "<li>Please enter Phone</li>";
    }
    if ($_POST['gender'] == ""){
        $error .= "<li>Please enter Gender</li>";
    }
    if ($_POST['year'] == ""){
        $error .= "<li>Please choose Year</li>";
    }
    if ($_POST['month'] == ""){
        $error .= "<li>Please enter Month</li>";
    }
    if ($_POST['date'] == ""){
        $error .= "<li>Please enter Date</li>";
    }
    if ($error == "") {
         // insert to mysql
        $id = $_GET['id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        if($_POST['gender']== 'Male' || $_POST['gender']== 'male')
            {
                $gender='0';
            }else{
                $gender='1';
            }
        $year = $_POST['date'];
        $month = $_POST['month'];
        $date = $_POST['date'];
        $sql = "select * from user where usid='".$_GET["id"]."'" ;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $sql = "UPDATE user  SET usfullname = '$fullname', usemail = '$email', usaddress ='$address',usphone='$tel',usgender='$gender',usyear='$year',usmonth='$month', usdate='$date'  WHERE usid = '$id'";
            mysqli_query($conn, $sql);
            echo '<script>alert("Update user successful")</script>';
            echo '<meta http-equiv="refresh" content="0;URL=?page=user.php"/>';
        }else {
            $error .= "<li>Duplicate</li>";
        }
    }

}else {
    if (isset($_GET["id"])) {
        $fullname = "";
        $email = "";
        $address = "";
        $tel = "";
        $gender = "";
        $year = "";
        $month = "";
        $date ="";
        $sql = "select * from user where usid=" . $_GET["id"];
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
            $fullname = $row["usfullname"];
            $email = $row["usemail"];
            $address = $row["usaddress"];
            $tel = $row["usphone"];
            if($row['usgender']== 0)
            {
                $gender='Male';
            }else{
                $gender='Female';
            }
            $year = $row["usyear"];
            $month = $row["usmonth"];
            $date = $row["usdate"];
        }
    }
}
?>
<h2> Update Information User</h2>
<hr style="background-color: red; height:2px" />
<ul style="color:red">
<?php echo $error; ?>
</ul>
<form action="" method ="POST">
    <div class="form-group">
        <label for="">Full Name</label>
        <input type="text" class="form-control" name="fullname" id="" value="<?php echo isset($fullname) ? $fullname : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" id="" value="<?php echo isset($email) ? $email : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="text" class="form-control" name="address" id="" value="<?php echo isset($address) ? $address : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Telephone</label>
        <input type="text" class="form-control" name="tel" id="" value="<?php echo isset($tel) ? $tel : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Gender</label>
        <input type="text" class="form-control" name="gender" id="" value="<?php echo isset($gender) ? $gender : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Year</label>
        <input type="text" class="form-control" name="year" id="" value="<?php echo isset($year) ? $year : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Month</label>
        <input type="text" class="form-control" name="month" id="" value="<?php echo isset($month) ? $month : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Date</label>
        <input type="text" class="form-control" name="date" id="" value="<?php echo isset($date) ? $date : ''; ?>">
    </div>
    <button type="submit" name="btnSubmit" class="btn btn-primary">Update</button>
</form>