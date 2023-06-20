<?php
if (isset($_SESSION['usname']) == "") {
    echo '<script>alert("Please login to view your  shopping cart")</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=login.php"/>';
} else {
    $sql = "SELECT * FROM cart a left join product b on a.proid = b.proid where a.usid = " . $_SESSION['usid'];
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
?>
        <div class="container-fluid  mt-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body cart">
                            <div class="col-sm-12 empty-cart-cls text-center">
                                <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                                <h3><strong>Your Cart is Empty</strong></h3>
                                <h4>Add something to make me happy :)</h4>
                                <a href="?page=home.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    <?php
    } else {
    ?>
        <div>
            <span class="text-center">
                <h3>
                    Your Shopping Cart
                </h3>
            </span>
        </div>
        <a class="btn btn-primary" href="?page=orderadd.php">Payment</a>

        <table id="example" class="display dt-responsive nowrap" style="width:100%; background-color: white;">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Picture</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $row['proname']; ?></td>
                        <td> <img src="<?php echo 'admin/pimgs/' . $row['proimage']; ?>" style="width:150px" /></td>
                        <td><?php echo $row['proprice']; ?></td>
                        <td><?php echo $row['cartquantity']; ?></td>
                        <td>
                            <?php echo $row['cartquantity'] * $row['proprice']; ?>
                        </td>
                        <td>
                            <a href='?page=cartupdate.php&id=<?php echo $row['proid']; ?>' class="glyphicon glyphicon-edit"></a> |
                            <a href='?page=cartdelete.php&id=<?php echo $row['proid']; ?>' onclick="return confirm('Are you sure?');" class="glyphicon glyphicon-remove"></a></a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
<?php
}
?>