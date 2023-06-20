<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color:black;">
  <div class="container-fluid">
    <a class="navbar-brand" href="?page=home.php">
      <img style=" width:25px; margin-right:0px; margin-left:0px" src="asset/images/shuttle.png"></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="nav navbar-nav navbar-left">
        <li class="active"><a href="?page=home.php">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Products
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <?php
              $sql = "select * from category";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {
              ?>
              <a href="?page=product.php&id=<?php echo $row['catid'] ?>"><?php echo $row['catname'] ?></a>
              <?php
              }
              ?>
          </div>
        </li>
        <li><a href="?page=contact.php">Contact</a></li>
        <?php
          if(isset($_SESSION["usrole"]) && $_SESSION["usrole"]=='admin')
          {
        ?>
        <li><a href="?page=admin/productmanagement.php">Product management</a></li>
        <?php
          }
        ?>
        <?php
          if(isset($_SESSION["usrole"]) && $_SESSION["usrole"]=='admin')
          {
        ?>
        <li><a href="?page=admin/category.php">Category management</a></li>
        <?php
          }
        ?>
      </ul>
      <form class="d-flex">
        <ul class="nav navbar-nav navbar-right">
          <?php
          if (isset($_SESSION['usname']) == "") {
          ?>
            <li><a href="?page=login.php">Login</a></li>
            <li><a href="?page=register.php"><span class="glyphicon glyphicon-user"></span>Register</a></li>
            <li><a href="?page=shoppingcart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
          <?php
          } else {
          ?>
            <li><a href=""><?php echo "Hi " . $_SESSION['usname']; ?></a></li>
            <li><a href="?page=logout.php"><span class="glyphicon glyphicon-log-out">Logout</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cart
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="?page=shoppingcart.php">My Cart</a>
                <br />
                <a class="dropdown-item" href="?page=order.php">My Order</a>
              </div>
            </li>
          <?php
          }
          ?>

        </ul>
      </form>
    </div>
  </div>
</nav>