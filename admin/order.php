<h3>Order Management</h3>
<hr style="background-color: blue; height:2px">

<table id="example" class="display dt-responsive nowrap" style="width:100%; background-color: white;">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Order Delivery</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM orders a left join user b on a.usid=b.usid";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td scope="row"><?php echo $row['orid']; ?></td>
                <td><?php echo $row['ordate']; ?></td>
                <td><?php echo $row['ordelivery']; ?></td>
                <td><?php echo $row['usfullname']; ?></td>
                <td><?php echo $row['usphone']; ?></td>
                <td><?php echo $row['usaddress']; ?></td>
                <td>
                    <a href='?page=orderupdate.php&id=<?php echo $row['orid']; ?>' class='glyphicon glyphicon-check'></a> |
                    <a href='?page=orderdelete.php&id=<?php echo $row['orid']; ?>' onclick="return confirm('Are you sure you want to delete this!')" ; class="glyphicon glyphicon-remove"></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>