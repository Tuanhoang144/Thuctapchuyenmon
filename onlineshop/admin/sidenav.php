

<!doctype html>
<html lang="en">

<head>
  <title>Hello admin</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="assets/css/Material+Icons.css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="assets/css/black-dashboard.css" rel="stylesheet" />
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
  <script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();

        //Restore orignal HTML
        document.body.innerHTML = oldPage;
    }
    </script>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#cargaBarras').load('barras.php');
	});
</script>
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-4.jpg">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
          
        </a>
      </div>
      <div class="sidebar-wrapper ps-container ps-theme-default" data-ps-id="3a8db1f4-24d8-4dbf-85c9-4f5215c1b29a">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">
              <i class="material-icons">dashboard</i>
              <p>Thông tin </p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="adduser.php">
              <i class="material-icons">person</i>
              <p>Add User</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="productlist.php">
              <i class="material-icons">list</i>
              <p>Sản phẩm</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="orders.php">
              <i class="material-icons">library_books</i>
              <p>Đơn hàng</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="bills.php">
              <i class="material-icons">library_books</i>
              <p>Hoá Đơn</p>
            </a>
          </li> -->
          <!-- <li class="nav-item ">
            <a class="nav-link" href="addproduct.php">
              <i class="material-icons">add</i>
              <p>Add sản phẩm</p>
            </a>
          </li> -->
          
          <li class="nav-item ">
            <a class="nav-link" href="manageuser.php">
              <i class="material-icons">edit_user</i>
              <p>Quản lý người dùng</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="managecategory.php">
              <i class="material-icons">edit_user</i>
              <p>Quản lý Danh mục</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="managebrand.php">
              <i class="material-icons">edit_user</i>
              <p>Quản lý hãng</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="thongke.php">
              <i class="material-icons">library_books</i>
              <p>Thống kê</p>
            </a>
          </li> -->
          
          <li class="nav-item ">
            <a class="nav-link" href="logout.php">
              <i class="material-icons">logout</i>
              <p>Logout</p>
            </a>
          </li>
         
        </ul>
      </div>
    </div>



    </body>
    