<?php
  if(isset($_SESSION['studentLogin'])){
    include("../includes/connection.php");
    $user =$_SESSION['studentLogin'];
    $stmt = "SELECT* FROM student WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $students = mysqli_fetch_array($qe);
    $names = htmlentities(strtoupper( $students['SurName']." ".$students['FirstName']." ".$students['LastName']));
    
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-light elevation-4" style="position:fixed; top: 0px; left: 0px; z-index: 1;">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../image/village boy logo.jpg" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Oluokun</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $names;?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="StudentDashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="studentUpdateProfile.php" class="nav-link active">
                <i class="fas fa-graduation-cap nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-lock"></i>
                <p>
                  Check Result
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="currentSemesterResult.php" class="nav-link active">
                    <i class="fa fa-graduation-cap nav-icon"></i>
                    <p>Current Semester</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Previous Semester</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>All Semester</p>
                  </a>
                </li>
                
              </ul>

            </li>
              
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-registered"></i>
            <p>
              Courses
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="registeredCours.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Registered Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="newCourse.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Register New Course</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="allRegisteredCourse.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> All Registered Courses</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- supervisor -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-registered"></i>
            <p>
              Department info
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#studentsignup" class="nav-link active" data-toggle="modal">
                <i class="fas fa-graduation-cap nav-icon"></i>
                <p>View All Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All Staffs</p>
              </a>
            </li>
            
          </ul>
        </li>
        
           <!-- Cateegories  -->
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Register New Activity
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="regiterCourse.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Courses</p>
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
  <?php
  }
  ?>