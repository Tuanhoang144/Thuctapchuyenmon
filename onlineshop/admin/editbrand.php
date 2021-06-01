<?php
session_start();
include("../db.php");
$brand_id=$_REQUEST['brand_id'];

$result=mysqli_query($con,"select brand_id,brand_title from brands where brand_id='$brand_id'")or die ("query 1 incorrect.......");

list($brand_id,$brand_title)=mysqli_fetch_array($result);

if(isset($_POST['btn_save'])) 
{

$brand_title=$_POST['brand_title'];


mysqli_query($con,"update brands set brand_title='$brand_title' where brand_id='$brand_id'")or die("Query 2 is inncorrect..........");

header("location: managebrand.php");
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
                    <h5 class="title">Edit Brands</h5>
                </div>
                <form action="editbrand.php" name="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">

                        <input type="hidden" name="brand_id" id="brand_id" value="<?php echo $brand_id; ?>" />
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label>Brand title</label>
                                <input type="text" id="brand_title" name="brand_title" class="form-control"
                                    value="<?php echo $brand_title; ?>">
                            </div>
                        </div>
                    <div class="card-footer">
                        <button type="submit" id="btn_save" name="btn_save"
                            class="btn btn-fill btn-primary">Update Brand</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
<?php
include "footer.php";
?>