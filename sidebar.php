<?php
session_start();
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="position:fixed; top: 0px; left: 0px; z-index: 1;">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="image/village boy logo.jpg" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Oluokun Kabir</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-lock"></i>
                <p>
                  Login
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <?php if(!isset($_SESSION['studentLogin'])){?>
                <li class="nav-item">
                  <a href="#studentlogin" class="nav-link active" data-toggle="modal">
                    <i class="fa fa-graduation-cap nav-icon"></i>
                    <p>Student Login</p>
                  </a>
                </li>
                <?php } ?>
                <?php if(!isset($_SESSION['staffLogin'])){?>

                <li class="nav-item">
                  <a href="#stafftlogin" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Staff Login</p>
                  </a>
                </li>
                <?php } ?>
                <?php if(!isset($_SESSION['adminLogin'])){?>
                <li class="nav-item">
                  <a href="#admintlogin" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Admin Login</p>
                  </a>
                </li>
                <?php } ?>

              </ul>

            </li>
              
          <!-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-registered"></i>
            <p>
              Sign Up
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#studentsignup" class="nav-link active" data-toggle="modal">
                <i class="fas fa-graduation-cap nav-icon"></i>
                <p>Student Sign Up</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Staff</p>
              </a>
            </li>
            
          </ul>
        </li> -->
        
           <!-- Cateegories  -->
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>