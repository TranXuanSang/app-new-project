<?php
if (isset($_SESSION['usname']) == "") {
    echo '<script>alert("Please login to view your orders")</script>';
    echo '<meta http-equiv="refresh" content="0;URL=?page=login.php"/>';
} else {
    $sql = "SELECT * FROM orders where usid = " . $_SESSION['usid'];
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
                                <h3><strong>Your Order is Empty</strong></h3>
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
                    Your Orders
                </h3>
            </span>
        </div>
        <table id="example" class="display dt-responsive nowrap" style="width:100%; background-color: white;">
            <thead>
                <tr>

                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Delivery</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from orders where usid = '" . $_SESSION['usid'] . "'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td scope="row"><?php echo $row['orid']; ?></td>
                        <td><?php echo $row['usname']; ?></td>
                        <td><?php echo $row['ordate']; ?></td>
                        <td><?php echo $row['ordelivery']; ?></td>
                        <td><?php echo $row['usphone']; ?></td>
                        <td><?php echo $row['oraddress']; ?></td>
                        <td><?php echo $row['usemail']; ?></td>
                        <td>
                            <a href='?page=orderupdate.php&id=<?php echo $row['orid']; ?>' class='glyphicon glyphicon-edit'></a> |
                            <a href='?page=orderdelete.php&id=<?php echo $row['orid']; ?>' onclick="return confirm('Are you sure?');" class='glyphicon glyphicon-trash'></a>
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