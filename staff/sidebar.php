<?php
  if(isset($_SESSION['staffLogin'])){
    include("../includes/connection.php");
    $user =$_SESSION['staffLogin'];
    $stmt = "SELECT* FROM staff WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $staff = mysqli_fetch_array($qe);
    $staf = explode(",", $staff['name']);
    $name =strtoupper($staf[0]." ".$staf[1]." ".$staf[2]);

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-muted  sidebar-dark-success elevation-4  bg-dark"  style="position:fixed; top: 0px; left: 0px; z-index: 1;">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../image/village boy logo.jpg" alt="<?php $name ?>" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-bold">Oluokun</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <img class="profile-user-img img-fluid img-circle"
                     src= "../staff/<?php
                      if(!empty($staff['profilePicture'])){
                          echo htmlentities($staff['profilePicture']);
                      }else{
                          echo "<span style ='color:red'>Not Yet Set</span>";
                      }
                     ?>"
                     alt="User profile picture">
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $name;?> </a>
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
                
              </p>
            </a>
          </li>
          
            
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-graduation-cap"></i>
                <p>
                  Students
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="manageStudent.php" class="nav-link">
                <i class="fa fa-users"></i>
                <p>Managed Student</p>
              </a>
            </li>
                <li class="nav-item">
                  <a href="computeStudentsResult.php" class="nav-link">
                    <i class="fa fa-calculator"></i>
                    <p>Compute Result</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="checkResult.php" class="nav-link">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Check Result</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="#" class="nav-link"">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>All Semester</p>
                  </a>
                </li> -->
                
              </ul>

            </li>
              
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-registered"></i>
            <p>
              Department
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="manageCourse.php" class="nav-link">
                <i class="fas fa-graduation-cap nav-icon"></i>
                <p>View All Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manageStaff.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>View All Staffs</p>
              </a>
            </li>
            
          </ul>
        </li>

        
        
           <!-- Cateegories  -->
         
          <li class="nav-item">
                <a href="Logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
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