

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
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
<!-- Fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<!-- Custom StyleSheet -->
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
    <div class="sidebar" data-color="danger" data-background-color="white" data-image="./assets/img/sidebar-2.jpg">
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
              <p>Th??ng tin </p>
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
              <p>S???n ph???m</p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a class="nav-link" href="orders.php">
              <i class="material-icons">library_books</i>
              <p>????n h??ng</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="bills.php">
              <i class="material-icons">library_books</i>
              <p>Ho?? ????n</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="addproduct.php">
              <i class="material-icons">add</i>
              <p>Add s???n ph???m</p>
            </a>
          </li> -->
          
          <li class="nav-item ">
            <a class="nav-link" href="manageuser.php">
              <i class="material-icons">edit_user</i>
              <p>Qu???n l?? ng?????i d??ng</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="managecategory.php">
            <i class="fas fa-list-ul"></i>
              <p>Qu???n l?? Danh m???c</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="managebrand.php">
            <i class="fas fa-location-arrow"></i>
              <p>Qu???n l?? Nh??n hi???u</p>
            </a>
          </li>
          <!-- <li class="nav-item ">
            <a class="nav-link" href="thongke.php">
              <i class="material-icons">library_books</i>
              <p>Th???ng k??</p>
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
    