 <?php
session_start();
include("../db.php");
error_reporting(0);

if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$result=mysqli_query($con,"select product_image from products where product_id='$product_id'")
or die("query is incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="../product_images/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*xoa product*/
mysqli_query($con,"delete from products where product_id='$product_id'")or die("query is incorrect...");
}
/* edit san pham*/

///phaan trang

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
//tìm kiếm


include "sidenav.php";
include "topheader.php";
?>
 <!-- End Navbar -->
 <div class="content">
     <div class="container-fluid">


         <div class="col-md-14">
             <div class="card ">
                 <div class="card-header card-header-info">
                        <?php 
                            if(isset($_GET['search']) && $_GET['search'] != ''){
                                $a = $_GET['search'];
                            }
                        ?>
                     <form method="GET">
                         <input type="text" name="search" class="form-control col-md-10" placeholder="Tìm Kiếm">
                     </form>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive ps">
                         <table class="table tablesorter " id="page1">
                             <thead class=" text-primary">
                                 <tr>
                                     <th>Hình ảnh</th>
                                     <th>Tên</th>
                                     <th>Price</th>
                                     <th>
                                         <a class=" btn btn-primary" href="addproduct.php">Add product</a>
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php 
                                 $sql="select product_id,product_image, product_title,product_price from products  where product_title like '%".$a."%' and (product_cat =1 or product_cat=2 or product_cat=3 or product_cat=4 or product_cat=5 or product_cat=6 or product_cat=7 or product_cat=8 )Limit $page1,10";
                                    $result=mysqli_query($con,$sql);
                                    while(list($product_id,$image,$product_name,$price)=mysqli_fetch_array($result))
                                    {
                                    echo "<tr><td><img src='../product_images/$image' style='width:100px; height:120px; border:groove #000'></td><td style='font-size:1.3rem;color:white'>$product_name</td>
                                    <td>$price</td>
                                    <td style='width:300px'>

                                    <a class=' btn btn-success' href='editproduct.php?product_id=$product_id'>Edit</a>
                                    <a class=' btn btn-danger' href='productlist.php?product_id=$product_id&action=delete'>Delete</a>
                                    </td></tr>";
                                    }
                        
                        ?>
                             </tbody>
                         </table>
                         <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                             <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                         </div>
                         <div class="ps__rail-y" style="top: 0px; right: 0px;">
                             <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                         </div>
                     </div>
                 </div>
             </div>
             <nav aria-label="Page navigation example">
                 <ul class="pagination">
                     <li class="page-item">
                         <a class="page-link" href="#" aria-label="Previous">
                             <span aria-hidden="true">&laquo;</span>
                             <span class="sr-only">Previous</span>
                         </a>
                     </li>
                     <?php 
//counting paging

                $paging=mysqli_query($con,"select product_id,product_image, product_title,product_price from products");
                $count=mysqli_num_rows($paging);

                $a=$count/8;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?>
                     <li class="page-item"><a class="page-link"
                             href="productlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>

                     <?php	
}
          mysqli_close($con);
?>
                     <li class="page-item">
                         <a class="page-link" href="#" aria-label="Next">
                             <span aria-hidden="true">&raquo;</span>
                             <span class="sr-only">Next</span>
                         </a>
                     </li>
                 </ul>
             </nav>
         </div>
     </div>
 </div>
 <?php
include "footer.php";
?>