<?php
$error = "";
if (isset($_POST['btnSubmit'])) {
    if ($_POST['id'] == "") {
        $error .= "<li>Please enter ID</li>";
    }
    if ($_POST['name'] == "") {
        $error .= "<li>Please enter Name</li>";
    }
    if ($_POST['price'] == "") {
        $error .= "<li>Please enter Price</li>";
    }
    if ($_POST['quantity'] == "") {
        $error .= "<li>Please enter Quantity</li>";
    }
    if ($_FILES['fileimage'] == "") {
        $error .= "<li>Please choose Image</li>";
    }
    if ($_POST['description'] == "") {
        $error .= "<li>Please enter Description</li>";
    }
    if ($error == "") {
        // insert to mysql
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        $pic = $_FILES["fileimage"];
        $description = $_POST["description"];

        if ($pic['type'] == "image/jpg" || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/gift") {
            if ($pic['size'] <= 614400) {
                copy($pic['tmp_name'], "pimgs/" . $pic['name']);
                $filePic = $pic['name'];

                $sql = "select * from product where proname='" . $name . "'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 0) {

                    $sql = "UPDATE product SET proname = '$name', proprice = '$price', proquantity = '$quantity', proimage = '$filePic', prodescription = '$description' WHERE proid='$id'";
                    mysqli_query($conn, $sql);
                    echo '<script>alert("Update product successful")</script>';

                    echo '<meta http-equiv="refresh" content="0;URL=?page=product.php"/>';
                } else {
                    $error .= "<li>Duplicate</li>";
                }
            }
        }
    }
} else {
    if (isset($_GET["id"])) {
        $id = "";
        $name = "";
        $description = "";
        $sql = "select * from product where proid=" . $_GET["id"];
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
            $id = $row['proid'];
            $name = $row['proname'];
            $price = $row["proprice"];
            $quantity = $row["proquantity"];
            $category = $row["catid"];
            $description = $row["prodescription"];
        }
    }
}
?>
<h2>Update Product</h2>
<hr style="background-color: red; height:3px" />
<ul style="color: red;">
    <?php echo $error; ?>
</ul>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Category</label>
        <select class="form-control" name="categorylist" id="">
            <option value='0'>Choose category</option>";
            <?php
            $sql = "select * from category";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <option value='<?php echo $row['catid'] ?>'><?php echo $row['catname'] ?></option>";
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">ID</label>
        <input type="text" class="form-control" name="id" id="" value='<?php echo isset($id) ? $id : ""; ?>'>
    </div>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" id="" value="<?php echo isset($name) ? $name : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="text" class="form-control" name="price" id="" value="<?php echo isset($price) ? $price : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Quantity</label>
        <input type="text" class="form-control" name="quantity" id="" value="<?php echo isset($quantity) ? $quantity : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control-file" name="fileimage" id="" value="<?php echo 'admin/pimgs/'
                                                                                        . $row['proimage']; ?>" style="width:150px" />
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" name="description" id="" value="<?php echo isset($description) ? $description : ''; ?>">
    </div>
    <button type="submit" name="btnSubmit" class="btn btn-primary">Update</button>
</form>