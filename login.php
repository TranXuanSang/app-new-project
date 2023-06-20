<?php
$error = "";
if (isset($_POST['btnSubmit'])) {
    if ($_POST['usname'] == "") {
        $error .= "<li>Please enter  Username</li>";
    }
    if ($_POST['password'] == "") {
        $error .= "<li>Please enter Password</li>";
    }
    if ($error == "") {
        $username = $_POST['usname'];
        $password = $_POST['password'];
        $role = 'customer';
        $passwordmd5 = md5($password);

        $sql = "select * from user where usname='" . $username . "' and uspassword='" . $passwordmd5 . "' and usrole ='" . $role . "' ";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

            $_SESSION["usname"] = $username;

            while ($row = mysqli_fetch_array($result)) {
                $_SESSION["usid"] = $row['usid'];
                $_SESSION["usrole"] = $row['usrole'];
            }

            echo '<script>alert("You loged in successfully")</script>';
            echo '<meta http-equiv="refresh" content="0;URL=?page=home.php"/>';
        } elseif (isset($_POST['btnSubmit'])) {
            $role = 'admin';
            $sql = "select * from user where usname='" . $username . "' and uspassword='" . $passwordmd5 . "' and usrole ='" . $role . "' ";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {

                $_SESSION["usname"] = $username;

                while ($row = mysqli_fetch_array($result)) {
                    $_SESSION["usid"] = $row['usid'];
                    $_SESSION["usrole"] = $row['usrole'];
                }

                echo '<script>alert("You loged in successfully")</script>';
                header("Location: $urladmin?page=$home");
            } else {
                echo "Login failed";
            }
        }
    }
}
if (isset($_POST['btnRegister'])) {
    echo '<meta http-equiv="refresh" content="0;URL=?page=register.php"/>';
}
?>
<?php echo $error; ?>
<div class="col-sm-4">
    <form name="form1" action="" method="post">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="usname" id="" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="" placeholder="">
        </div>
        <button type="submit" name="btnSubmit" class="btn btn-primary" onclick="formValid();">Sign in</button>
        <button name="btnRegister" class="btn btn-primary">Register</button>
    </form>
</div>