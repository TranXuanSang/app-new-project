<?php
if (isset($_POST['btnSubmit'])) {
    $us_id = $_SESSION["usid"];
    $pro_id = $_POST['id'];
    $quantity = $_POST['cartquantity'];

    $sql = "UPDATE cart SET cartquantity=" . $quantity . " WHERE usid=" . $us_id . " and proid=" . $pro_id;
    mysqli_query($conn, $sql);
    echo '<script>alert("Updated successful")</script>';
}
?>

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
        $sql = "SELECT * FROM cart a left join product b on a.proid = b.proid where a.usid = " . $_SESSION['usid'];
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td scope="row"><?php echo $row['proname']; ?></td>
                <td> <img src="<?php echo 'admin/pimgs/' . $row['proimage']; ?>" style="width:150px" /></td>
                <td><?php echo $row['proprice']; ?></td>

                <form action="" method="post">
                    <td>
                        <input hidden="true" type="hidden" name="id" value="<?php echo $row['proid']; ?>" style="width: 50px">
                        <input type="number" name="cartquantity" value="<?php echo $row['cartquantity']; ?>" style="width: 50px">
                    </td>
                    <td>
                        <?php echo $row['cartquantity'] * $row['proprice']; ?>
                    </td>
                    <td>
                        <button type="submit" name="btnSubmit" class="btn btn-link">Update</button>
                        <a href='?page=productdelete.php&id=<?php echo $row['proid']; ?>' onclick="return confirm('R u sure?');">Delete</a>
                    </td>
                </form>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>