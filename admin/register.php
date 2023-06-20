<?php
$error = "";
if (isset($_POST['btnSubmit'])) {
    if (strlen($_POST['password1'] <= 5)) {
        $error .= "<li>Password must be greater than 5 chars</li>";
    }
    if ($_POST['password1'] != $_POST['password2']) {
        $error .= "<li>Password and confirm password are the same</li>";
    }
    if ($_POST['year'] == "0") {
        $error .= "<li>Choose Year of Birth, please</li>";
    }
    if ($_POST['month'] == "0") {
        $error .= "<li>Choose Month of Birth, please</li>";
    }
    if ($_POST['date'] == "0") {
        $error .= "<li>Choose date of Birth, please</li>";
    }
    if ($_POST['username'] == "" || $_POST['password1'] == "" || $_POST['password2'] == "" || $_POST['fullname'] == "" || $_POST['email'] == "" || $_POST['address'] == "" || !isset($_POST['gender'])) {
        $error .= "<li>Enter fields with mark (*), please</li>";
    }
    if ($error == "") {
        // insert to mysql
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $role = "admin";
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        if (isset($_POST['gender'])) {
            $sex = $_POST['gender'];
        }
        $date = $_POST['date'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $passwordmd5 = md5($password1);

        $sql = "select * from user where usname ='" . $username . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            $sql = "INSERT INTO user (usname,uspassword,usrole,usfullname,usemail,usaddress,usphone,usgender,usdate,usmonth,usyear) 
            VALUES('$username','$passwordmd5','$role','$fullname','$email','$address','$tel','$sex','$date','$month','$year')";
            mysqli_query($conn, $sql);
            echo '<script>alert("successful")</script>';
            echo '<meta http-equiv="refresh" content="0;URL=?page=home.php"/>';
        } else {
            $error .= "<li>Duplicate</li>";
        }
    }
}
?>


<h2>New customer Register</h2>
<hr style="background-color: red; height:3px" />

<ul style="color: red;">
    <?php echo $error; ?>
</ul>

<form method="post" action="" class="form-horizontal">
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Username(*): </label>
        <div class="col-sm-10">
            <input type="text" name="username" id="txtUsername" class="form-control" placeholder="Username" value="" />
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Password(*): </label>
        <div class="col-sm-10">
            <input type="password" name="password1" id="txtPass1" class="form-control" placeholder="Password" />
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Confirm Password(*): </label>
        <div class="col-sm-10">
            <input type="password" name="password2" id="txtPass2" class="form-control" placeholder="Confirm your Password" />
        </div>
    </div>
    <div class="form-group">
        <label for="lblFullName" class="col-sm-2 control-label">Full name(*): </label>
        <div class="col-sm-10">
            <input type="text" name="fullname" id="txtFullname" value="" class="form-control" placeholder="Enter Fullname" />
        </div>
    </div>
    <div class="form-group">
        <label for="lblEmail" class="col-sm-2 control-label">Email(*): </label>
        <div class="col-sm-10">
            <input type="text" name="email" id="txtEmail" value="" class="form-control" placeholder="Email" />
        </div>
    </div>
    <div class="form-group">
        <label for="lblAddress" class="col-sm-2 control-label">Address(*): </label>
        <div class="col-sm-10">
            <input type="text" name="address" id="txtAddress" value="" class="form-control" placeholder="Address" />
        </div>
    </div>
    <div class="form-group">
        <label for="lblTelephone" class="col-sm-2 control-label">Telephone(*): </label>
        <div class="col-sm-10">
            <input type="text" name="tel" id="txtTel" value="" class="form-control" placeholder="Telephone" />
        </div>
    </div>
    <div class="form-group">
        <label for="lblGender" class="col-sm-2 control-label">Gender(*): </label>
        <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="gender" value="0" id="grpRender" />Male</label>
            <label class="radio-inline"><input type="radio" name="gender" value="1" id="grpRender" />Female</label>
        </div>
    </div>
    <div class="form-group">
        <label for="lblNgaySinh" class="col-sm-2 control-label">Date of Birth(*): </label>
        <div class="col-sm-10 input-group">
            <span class="input-group-btn">
                <select name="date" id="slDate" class="form-control">
                    <option value="0">Choose Date</option>
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }
                    ?>
                </select>
            </span>
            <span class="input-group-btn">
                <select name="month" id="slMonth" class="form-control">
                    <option value="0">Choose Month</option>
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }

                    ?>
                </select>
            </span>
            <span class="input-group-btn">
                <select name="year" id="slYear" class="form-control">
                    <option value="0">Choose Year</option>
                    <?php
                    for ($i = 1970; $i <= 2022; $i++) {
                        echo "<option value='" . $i . "'>" . $i . "</option>";
                    }
                    ?>
                </select>
            </span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit" />
        </div>
    </div>
</form>