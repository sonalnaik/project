

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
       <li class="nav-item">
        <a class="nav-link"  style="position:absolute;margin-left:87%;" href="/Admin/Admin/logout.php">Logout</a>
      </li>
      
    </ul>

    

    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Pannel</span>
    </a>
<?php //print_r($_SESSION);?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <?php if($_SESSION['user_type']==1){?>
          <li class="nav-item">
            <a href="add_user.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
               Add Users
              </p>
            </a>
          </li>
           <li class="nav-item">
              <a href="view_blog.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              
              <p id="view_blog">
                   View Blogs
              </p>
            </a>
          </li>
          <?php } ?>
          <!--start:-editor nav-->
           <?php if($_SESSION['user_type']==2){?>
          <li class="nav-item">
              <a href="editor_blog.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              
              <p id="view_blog">
                  Create Blogs
              </p>
            </a>
          </li>
          <!--end:-editor nav-->
          <?php } ?>
           <?php if($_SESSION['user_type']==3){?>
          <!--start:-author nav-->
          <li class="nav-item">
              <a href="author_blog.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              
              <p id="view_blog">
                   Create Blogs
              </p>
            </a>
          </li>
          <?php } ?>
          <!--end:-editor nav-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<script src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="plugins/jquery/jquery.validate.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>

</script>