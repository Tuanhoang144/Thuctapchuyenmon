<?php
// session_start();
include("../db.php");
include "sidenav.php";
include "topheader.php";
if(isset($_POST['btn_save']))
{
$cat_title=$_POST['cat_title'];

mysqli_query($con,"insert into Categories(cat_title) values ('$cat_title')") 
			or die ("Query 1 is inncorrect........");  


header("location: sumit_form.php?success=1");  
mysqli_close($con); 
}
  
?>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <!-- your content here -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Categories</h4>
                    <p class="card-category">Complete Categories profile</p>
                </div>
                <div class="card-body">
                    <form action="" method="post" name="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"></label>
                                    <input type="text" id="cat_title" name="cat_title" class="form-control"
                                        placeholder="Categories" required>
                                </div>
                            </div>

                        </div>
                        <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Update
                            Categories</button>
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