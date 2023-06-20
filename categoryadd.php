<?php
$error = "";
if (isset($_POST['btnSubmit'])) {
  if ($_POST['id'] == "") {
    $error .= "<li>Please enter ID</li>";
  }
  if ($_POST['name'] == "") {
    $error .= "<li>Please enter Name</li>";
  }
  if ($_POST['description'] == "") {
    $error .= "<li>Please enter Description</li>";
  }
  if ($error == "") {
    // insert to mysql
    $cat_id = $_POST['id'];
    $cat_name = $_POST['name'];
    $cat_description = $_POST['description'];
    $sql = "select * from category where catname='" . $cat_name . "' or catid='" . $cat_id . "' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $sql = "INSERT INTO category (CatID, CatName,catdescription) VALUES('$cat_id', '$cat_name','$cat_description')";
      mysqli_query($conn, $sql);
      echo '<script>alert("Add category successful")</script>';
      echo '<meta http-equiv="refresh" content="0;URL=?page=admin/category.php"/>';
    } else {
      $error .= "<li>Duplicate</li>";
    }
  }
}
?>
<h2>Create a new category</h2>
<hr style="background-color: red; height:3px" />
<ul style="color: red;">
  <?php echo $error; ?>
</ul>
<form action="" method="post">
  <div class="form-group">
    <label for="">ID</label>
    <input type="text" class="form-control" name="id" id="" aria-describedby="helpId" placeholder="Enter ID">
  </div>
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="">Description</label>
    <input type="text" class="form-control" name="description" id="" aria-describedby="helpId" placeholder="Enter Description">
  </div>
  <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
</form>