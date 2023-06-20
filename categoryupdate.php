<?php
    $error = "";
    if (isset($_POST['btnSubmit'])){
    if ($_POST['id'] == ""){
        $error .= "<li>Please enter ID</li>";
    }
    if ($_POST['name'] == ""){
        $error .= "<li>Please enter Name</li>";
    }
    if ($_POST['description'] == ""){
        $error .= "<li>Please enter Description</li>";
    }
    if($error == ""){
        // insert to mysql
        $cat_id = $_POST['id'];
        $cat_name = $_POST['name'];
        $cat_description = $_POST['description'];
        $sql = "select * from category where catname='".$cat_name."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            $sql = "UPDATE category SET catname = '$cat_name', catdescription = '$cat_description' WHERE catid='$cat_id'";
            mysqli_query($conn, $sql);
            echo '<script>alert("Update category successful")</script>';
            echo '<meta http-equiv="refresh" content="0;URL=?page=category.php"/>';
        }else{
            $error .= "<li>Duplicate</li>";
        }
    }
    }else{
    if (isset($_GET["id"])) {
        $id = "";
        $name = "";
        $description = "";
        $sql = "select * from category where CatID=" . $_GET["id"];
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($results)) {
            $id = $row['catid'];
            $name = $row['catname'];
            $description = $row['catdescription'];
            }
        }
    }
?>
<h2>Update Category</h2>
<hr style="background-color: red; height:3px"/>
<ul style="color: red;">
    <?php echo $error; ?>
</ul>
    <form action="" method="post">
    <div class="form-group">
        <label for="">ID</label>
        <input type="text" class="form-control" name="id" id="" value='<?php echo isset($id) ? $id : ""; ?>'>
    </div>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" id="" value="<?php echo isset($name) ? $name : ''; ?>">
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <input type="text" class="form-control" name="description" id="" value="<?php echo isset($description) ? $description : ''; ?>">
    </div>
    <button type="submit" name="btnSubmit" class="btn btn-primary">Update</button>
</form>