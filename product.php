<div>
    <span class="text text-center">
        <h3 style="font-size: 23px;font-weight: bold">
            Finding Best Products Now <br />in Your Fingertips
        </h3>
    </span>
</div>
<div class="row">
    <?php
    $id= $_GET['id'];
    $sql = "SELECT * FROM `product` a left join category b on a.catid = b.catid where a.catid='".$id."'";
    $result = mysqli_query($conn, $sql);   
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="card-title"><?php echo $row['proname']; ?></h4>
                </div>
                <div class="panel-body-inner">
                    <div> 
                        <img src="<?php echo 'admin/pimgs/'. $row['proimage']; ?>" class="img-product" /> 
                    </div>
                </div>
                <div class="panel-footer">
                <span>Price: <?php echo $row['proprice']; ?></span>
                <a class="btn btn-primary" href="?page=detail.php&id=<?php echo $row['proid']; ?>">Details</a>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
</div>