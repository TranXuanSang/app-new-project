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
    $error .= "<li>Please choose file image</li>";
  }
  if ($_POST['description'] == "") {
    $error .= "<li>Please enter Description</li>";
  }
  if ($error == "") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $pic = $_FILES["fileimage"];
    $category = $_POST["categorylist"];
    $description = $_POST["description"];

    if ($pic['type'] == "image/jpg" || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/gift") {
      if ($pic['size'] <= 614400) {
        copy($pic['tmp_name'], "admin/pimgs/" . $pic['name']);
        $filePic = $pic['name'];

        // insert new product
        $sql = "select * from product where proname='" . $name . "'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
          $sql = "INSERT INTO product (proid, proname, proprice, proquantity, proimage, prodescription, catid) VALUES('$id', '$name','$price','$quantity','$filePic','$description','$category');";
          mysqli_query($conn, $sql);
          echo '<script>alert("Add product successful")</script>';
          echo '<meta http-equiv="refresh" content="0;URL=?page=admin/product.php"/>';
        } else {
          $error .= "<li>Duplicate</li>";
        }
      }
    }
  }
}
?>

<h2>Create a new Product</h2>
<hr style="background-color:pink; height:2px;" />
<ul style="color:red">
  <?php
  echo $error;
  ?>
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
    <input type="text" class="form-control" name="id" id="" aria-describedby="helpId" placeholder="">
  </div>
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
  </div>
  <div class="form-group">
    <label for="">Price</label>
    <input type="text" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="">
  </div>
  <div class="form-group">
    <label for="">Quantity</label>
    <input type="text" class="form-control" name="quantity" id="" aria-describedby="helpId" placeholder="">
  </div>
  <div class="form-group">
    <label for="">Image</label>
    <input type="file" class="form-control-file" name="fileimage" id="" placeholder="Choose Image" aria-describedby="fileHelpId">
  </div>
  <div class="form-group">
    <label for="">Description</label>
    <input type="text" class="form-control" name="description" id="" aria-describedby="helpId" placeholder="">
  </div>
  <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
</form>