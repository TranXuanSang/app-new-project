<?php
$error = "";
if (isset($_POST['btnSubmit'])) {
    if ($error == "") {
        // insert to mysql
        $us_id = $_SESSION['usid'];
        $us_name= $_POST['usname'];
        $or_date = $_POST['ordate'];
        $us_phone = $_POST['usphone'];
        $or_address = $_POST['oraddress'];
        $us_email = $_POST['usemail'];


        $sql = "select * from user where usid='" . $us_id . "' ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

            $sql = "INSERT INTO `orders` ( usid, usname, ordate, usphone, oraddress, usemail) 
            VALUES( '$us_id', '$us_name', '$or_date','$us_phone', '$or_address', '$us_email')";
            mysqli_query($conn, $sql);
            echo '<script>alert("Add order successful")</script>';
            echo '<meta http-equiv="refresh" content="0;URL=?page=order.php"/>';
        } else {
            echo '<meta http-equiv="refresh" content="0;URL=?page=order.php"/>';
        }
    }
}
?>


<h2>Add Order</h2>
<hr style="background-color: red; height:3px" />

<ul style="color: red;">
    <?php echo $error; ?>
</ul>

<form action="" method="post">
<div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="usname" id="" >
    </div>
    <div class="form-group">
        <label for="">Date</label>
        <input type="text" class="form-control" name="ordate" id="" >
    </div>

    <div class="form-group">
        <label for="">Phone</label>
        <input type="text" class="form-control" name="usphone" id="" >
    </div>

    <div class="form-group">
        <label for="">Address</label>
        <input type="text" class="form-control" name="oraddress" id="" >
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="usemail" id="" >
    </div>

    <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
</form>