<h3>User Management</h3>
<hr style="background-color: blue; height:2px">
<table id="example" class="display dt-responsive nowrap" style="width:100%; background-color: white;">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Year</th>
                <th>Month</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from user";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){
            ?>
                <tr>
                    <td scope="row"><?php echo $row['usid']; ?></td>
                    <td><?php echo $row['usname']; ?></td>
                    <td><?php echo $row['usphone']; ?></td>
                    <td><?php echo $row['usemail']; ?></td>
                    <td><?php echo $row['usaddress']; ?></td>
                    
                    <td>
                        <?php
                        if($row['usgender']== 0)
                        {
                            echo 'Male';
                        }else{
                            echo 'Female';
                        }
                        ?>
                    </td>
                    <td><?php echo $row['usyear']; ?></td>                   
                    <td><?php echo $row['usmonth']; ?></td>
                    <td><?php echo $row['usdate']; ?></td>
                    <td>
                        <a href='?page=userupdate.php&id=<?php echo $row['usid']; ?>'class='glyphicon glyphicon-edit'></a> |
                        <a href='?page=userdelete.php&id=<?php echo $row['usid']; ?>' onclick="return confirm('Are you sure?');"class="glyphicon glyphicon-remove"></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>