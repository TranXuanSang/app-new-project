<h3>Product Management</h3>
<hr style="background-color: blue; height:2px">
<a class="btn btn-primary" href="?page=productadd.php">New Product</a>
<table id="example" class="display dt-responsive nowrap" style="width:100%; background-color: white;">
    <thead>
        <tr>
          <th>Category ID</th>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Images</th>
          <th>Description</th>
          <th></th> 
        </tr>
    </thead>
    <tbody>
        <?php 
          $sql = "SELECT * FROM `product` a left join category b on a.catid = b.catid ";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_array($result)){
        ?>
          <tr>
            <td scope="row"><?php echo $row['catid']?></td>
            <td><?php echo $row['proid']?></td>
            <td><?php echo $row['proname']?></td>
            <td><?php echo $row['proprice']?></td>
            <td><?php echo $row['proquantity']?></td>
            <td><img src="admin/pimgs/<?php echo $row['proimage']; ?>" style="width:150px"/></td>
            <td><?php echo $row['prodescription']?></td>
            <td>
              <a href= "?page=productupdate.php&id=<?php echo $row['proid']?>"class="glyphicon glyphicon-edit"></a> |
              <a href= "?page=productdelete.php&id=<?php echo $row['proid']?>" onclick="return confirm('Are you sure?');"class="glyphicon glyphicon-remove"></a>
          </tr>
        <?php
        }
        ?>
        
    </tbody>
</table>