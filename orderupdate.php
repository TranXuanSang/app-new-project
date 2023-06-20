<?php
$error = "";

if (isset($_POST['btnSubmit'])) {
    if ($error == "") {
        // insert to mysql
        $orid = $_GET['id'];
        $ordate = $_POST['ordate'];
        $orname = $_POST['orname'];
        $oraddress = $_POST['oraddress'];
        $oremail = $_POST['oremail'];
        $ortel = $_POST['ortel'];

        $sql = "select * from orders where orid='".$orid."'"  ;
        echo $sql;
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
        $sql = "UPDATE orders  SET orid = '$orid', ordate = '$ordate', usname ='$orname',oraddress='$oraddress',usemail='$oremail',usphone='$ortel' WHERE orid = '$orid'";
            mysqli_query($conn, $sql);
            echo '<script>alert("Update successful")</script>';
            echo '<meta http-equiv="refresh" content="0;URL=?page=order.php"/>';
        } else {
            $error .= "<li>Duplicate</li>";
        }
    }
} else {
    if (isset($_GET["id"])) {
        $usid = "";
        $orname = "";
        $ordate = "";
        $oraddress = "";
        $oremail = "";
        $ortel = "";
        $sql = "select * from orders where orid='".$_GET['id']."'";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
            $orname = $row['usname'];
            $ordate = $row['ordate'];
            $oraddress = $row['oraddress'];
            $oremail = $row['usemail'];
            $ortel = $row['usphone'];
        }
    }
}
?>
<h2>Update Order</h2>
<hr style="background-color: red; height:3px" />

<ul style="color: red;">
    <?php echo $error; ?>
</ul>

<form action="" method="post">

    <div class="form-group">
        <label for="">Order Date</label>
        <input type="text" class="form-control" name="ordate" id="" value="<?php echo isset($ordate) ? $ordate : ''; ?>">
    </div>

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="orname" id="" value="<?php echo isset($orname) ? $orname : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Address</label>
        <input type="text" class="form-control" name="oraddress" id="" value="<?php echo isset($oraddress) ? $oraddress : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="oremail" id="" value="<?php echo isset($oremail) ? $oremail : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Telephone</label>
        <input type="text" class="form-control" name="ortel" id="" value="<?php echo isset($ordate) ? $ordate : ''; ?>">
    </div>

    <button type="submit" name="btnSubmit" class="btn btn-primary">Update</button>
</form>