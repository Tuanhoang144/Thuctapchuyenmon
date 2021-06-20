<?php
session_start();
include("../db.php");
include "sidenav.php";
include "topheader.php";
if(isset($_POST['btn_save']))
{
$brand_title=$_POST['brand_title'];

mysqli_query($con,"insert into brands(brand_title) values ('$brand_title')") 
			or die ("Query 1 is inncorrect........");   
            
echo "<script>alert('Thêm Thành công !')</script>";
mysqli_close($con);     
}


?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-info">
                    <h4 class="card-title">Add Brands</h4>
                    <p class="card-category">Complete Brands profile</p>
                </div>
                <div class="card-body">
                    <form action="" method="post" name="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" id="brand_title" name="brand_title" class="form-control"
                                        placeholder="Brand Title" required>
                                </div>
                            </div>

                        </div>
                        <a href="managebrand.php" class="btn btn-warning"><i class="fa fa-angle-left"></i></a>
                        <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Update
                            Brands</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>