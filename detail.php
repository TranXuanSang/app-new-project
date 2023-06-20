<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `product` a 
    left join category b on a.catid = b.catid WHERE a.proid =" . $id;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
    <div class="row main">
        <h2 class="product text-center">PRODUCT DETAILS</h2>
        <div class="image text-center">
            <img class="card-img-top" src="<?php echo 'admin/pimgs/'
                                                . $row['proimage']; ?>" alt="Card image cap" style="height:350px">

            <h2 class="card-title"><?php echo $row['proname']; ?></h2>
            <p class="card-text"><h3>Price: <?php echo $row['proprice']; ?></h3></p>
            <h3 class="description">Description:</h3>
            <p class="description"><h4><?php echo $row['prodescription']; ?></h4></p>
            <a class="btn btn-primary mt-3" href="?page=cartadd.php&id=<?php echo $row['proid']; ?>">Add to cart</a>
        </div>
    </div>
<?php
}
?>