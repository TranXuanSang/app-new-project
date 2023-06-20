<?php
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>
<h3>Category Management</h3>
<hr style="background-color: blue; height:2px">
<a class="btn btn-primary" href="?page=categoryadd.php">New Category</a>
<hr/>
<table id="example" class="display dt-responsive nowrap" style="width:100%; background-color: white;">
<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Decription</th>
        <th></th>
    </tr>
</thead>
<tbody>
    <?php
        $sql = "select * from category";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($result))
        {
    ?>
            <tr>
                <td scope="row" ><?php echo $row['catid'];?></td>
                <td ><?php echo $row ['catname'];?></td>
                <td ><?php echo $row ['catdescription'];?></td>
                <td>
                <a href="?page=categoryupdate.php&id=<?php echo $row['catid'];?>" class="glyphicon glyphicon-edit" ></a> |
                <a href="?page=categorydelete.php&id=<?php echo $row['catid'];?>" onclick="return confirm('Are you sure?')"; class="glyphicon glyphicon-remove"></a>
                </td>
            </tr>
    <?php
        }
    ?>
</tbody>
</table>