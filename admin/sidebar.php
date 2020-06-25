<?php
  if(isset($_SESSION['adminLogin'])){
    include("../includes/connection.php");
    $user =$_SESSION['adminLogin'];
    $stmt = "SELECT* FROM admin WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $admins = mysqli_fetch_array($qe);
    $names = htmlentities(strtoupper( $admins['name']));
    
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4" style="position:fixed; top: 0px; left: 0px; z-index: 1;">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
      <img src="../image/village boy logo.jpg" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Oluokun</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      
          <img class="profile-user-img img-fluid img-circle"
                     src= "../admin/<?php
                      if(!empty($admin['profilePicture'])){
                          echo htmlentities($admin['profilePicture']);
                      }else{
                          echo "<span style ='color:red'>Not Yet Set</span>";
                      }
                     ?>"
                     alt="User profile picture">
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $names;?> </a>
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
          
            
            <!-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user-plus"></i>
                <p>
                  Add 
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#addnewstudent" class="nav-link active" data-toggle="modal">
                    <i class="fa fa-graduation-cap nav-icon"></i>
                    <p>New Student</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#newstaff" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>New Staff</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#newadmin" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>New Admin</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#newcourse" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>New Course</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#newdepartment" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>New Department</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#newfaculty" class="nav-link" data-toggle="modal">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>New Faculty</p>
                  </a>
                </li>
                
              </ul>

            </li> -->
              
         

        <!-- supervisor -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-registered"></i>
            <p>
              Manage Resources
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
                  <a href="manageStudent.php" class="nav-link">
                    <i class="fa fa-graduation-cap nav-icon"></i>
                    <p>Manage Student</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manageStaff.php" class="nav-link">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Manage Staff</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manageAdmin.php" class="nav-link">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Manage Admin</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="manageCourse.php" class="nav-link">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Manage Course</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="manageDepartment.php" class="nav-link">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Manage Department</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="manageFaculty.php" class="nav-link">
                    <i class="fas fa-chalkboard-teacher nav-icon"></i>
                    <p>Manage Faculty</p>
                  </a>
                </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-registered"></i>
            <p>
              Student Result
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="computingStudentResult.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Compute Student Result</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="checkResult.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Check Result</p>
              </a>
            </li>
          </ul>
        </li>
       

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