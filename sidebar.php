<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="position:fixed; top: 0px; left: 0px; z-index: 1;">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="logo" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">YAHAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
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
                <li class="nav-item">
                  <a href="#studentlogin" class="nav-link active" data-toggle="modal">
                    <i class="fa fa-graduation-cap nav-icon"></i>
                    <p>Student Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#stafftlogin" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Staff Login</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#admintlogin" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Admin Login</p>
                  </a>
                </li>
                
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
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="categories/new_category.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="categories/manage_categories.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Categories</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>