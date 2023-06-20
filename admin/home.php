<h2>CATEGORY LIST</h2>
<hr style="background-color: red;">
<ul style="color:red"> </ul>
</hr>
</hr>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM category";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>

            <tr>
                <td scope="row"><?php echo $row['catid']; ?></td>
                <td><?php echo $row['catname']; ?></td>
                <td><?php echo $row['catdescription']; ?></td>

            </tr>
        <?php
        }
        ?>

    </tbody>
</table>

<h2> PRODUCT LIST</h2>
<hr style="background-color: red;">
<ul style="color:red"> </ul>

<table id="example" class="display dt-responsive nowrap" style="width:100%; background-color: white;">
    <thead>
        <tr>
            <th>Category ID</th>
            <th>Product ID</th>
            <th>Images</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM `product` a left join category b on a.catid = b.catid ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td scope="row"><?php echo $row['catid'] ?></td>
                <td><?php echo $row['proid'] ?></td>
                <td><img src="<?php echo '../admin/pimgs/' . $row['proimage'] ?>" style="width:150px" /> </td>
                <td><?php echo $row['proname'] ?></td>
                <td><?php echo $row['prodescription'] ?></td>
                <td><?php echo $row['proprice'] ?></td>
                <td><?php echo $row['proquantity'] ?></td>
                <td><?php echo $row['catname'] ?></td>
                <td>
                    <a href="?page=productupdate.php&id=<?php echo $row['proid'] ?>"></a>
                    <a href="?page=productdelete.php&id=<?php echo $row['proid'] ?>" onclick="return confirm('Are you sure?');"></a>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>
<h2> INFORMATION USER</h2>
<hr style="background-color: red;">
<ul style="color:red"> </ul>
</hr>

<table id="example" class="display dt-responsive nowrap" style="width:100%; background-color: white;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
                <td scope="row"><?php echo $row['usid']; ?></td>
                <td><?php echo $row['usname']; ?></td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>