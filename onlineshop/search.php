<?php
include "header.php";

if(isset($_POST['search'])){

$tukhoa = $_POST['search'];

    
$sql_product = mysqli_query($con,"select * from products  where product_title like '%".$tukhoa."%' ");		

$title = $tukhoa;
}		 
?>

<!-- <div class='col-md-4 col-xs-6'>
    <?php
     while($row_sanpham = mysqli_fetch_array($sql_product)){ 
    ?>
    <a href='product.php?p=$pro_id'>
        <div class='product'>
            <div class='product-img'>
                <img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
                <div class='product-label'>
                    <span class='sale'>-30%</span>
                    <span class='new'>NEW</span>
                </div>
            </div>
    </a>

    <div class='product-body'>
        <p class='product-category'>$cat_name</p>
        <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'><?php echo $row_sanpham['product_title'] ?></a></h3>
        <h4 class='product-price header-cart-item-info'><?php echo $row_sanpham['product_price'] ?><del class='product-old-price'>$990.00</del></h4>
        <div class='product-rating'>
            <i class='fa fa-star'></i>
            <i class='fa fa-star'></i>
            <i class='fa fa-star'></i>
            <i class='fa fa-star'></i>
            <i class='fa fa-star'></i>
        </div>
        <div class='product-btns'>
            <button class='add-to-wishlist' tabindex='0'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to
                    wishlist</span></button>
            <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to
                    compare</span></button>
            <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
        </div>
    </div>
    <div class='add-to-cart'>
        <button pid='$pro_id' id='product' href='#' tabindex='0' class='add-to-cart-btn'><i
                class='fa fa-shopping-cart'></i> add to cart</button>

    </div>
</div> -->
<?php
								} 
								?>
</div>

<?php
include "newslettter.php";
include "footer.php";
?>