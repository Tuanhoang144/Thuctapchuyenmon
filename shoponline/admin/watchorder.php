<?php
session_start();
include("../db.php");
$order_id=$_REQUEST['order_id'];

$result=mysqli_query($con,"select orders_info.order_id,  user_info_backup.last_name,products.product_title, user_info_backup.mobile, user_info_backup.email, user_info_backup.address1, amt,dateorder 
from orders_info,products,order_products,user_info_backup 
where orders_info.user_id = user_info_backup.user_id and orders_info.order_id = order_products.order_id and order_products.product_id = products.product_id and orders_info.order_id = '$order_id'")or die ("query 1 incorrect.....");


    list($order_id,$cus_name,$pro_name,$mobile,$email,$address1,$price,$dateorder)=mysqli_fetch_array($result);


if(isset($_POST['btn_close'])) 
{

header("location: orders.php");
mysqli_close($con);
}
include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h5 class="title">Orders</h5>
                </div>

                <form action="watchorder.php" name="form" method="post" enctype="multipart/form-data">
              <div class="card-body">
                
                  <input type="hidden" name="order_id" id="order_id" value="<?php echo $order_id;?>" />
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <h3> <label>Customer name</label>
                        <input type="text" id="first_name" name="first_name" text-color='white' class="form-control" value="<?php echo $cus_name; ?>" readonly ></h3>
                       
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <h3><label>Product Name</label>
                        <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $pro_name; ?>"  readonly></h3>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <h3><label for="exampleInputEmail1">Email address</label>
                        <input type="text"  id="email" name="email" class="form-control" value="<?php echo $email; ?>" readonly></h3>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <h3> <label for="exampleInputEmail1">Mobile</label>
                        <input type="text"  id="mobile" name="mobile" class="form-control" value="<?php echo $mobile; ?>" readonly></h3>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <h3> <label >Address</label>
                        <input type="text" name="address1" id="address1" class="form-control" value="<?php echo $address1; ?>" readonly></h3>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <h3><label >Price</label>
                        <input type="text" name="price" id="price" class="form-control" value="<?php echo $price; ?>" readonly></h3>
                      </div>
                    </div>
                    <div class="col-md-12 ">
                      <div class="form-group">
                      <h3> <label >Order Date</label>
                        <input type="text" name="dateorder" id="dateorder" class="form-control" value="<?php echo $dateorder; ?>" readonly></h3>
                      </div>
                    </div>
              </div>
              <div class="card-footer">
                <button type="submit" id="btn_close" name="btn_close" class="btn btn-fill btn-primary">Quay về trang chủ</button>
              </div>
              </form>    
            </div>
        </div>


    </div>
</div>
<?php
include "footer.php";
?>