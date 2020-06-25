<?php
  if(isset($_SESSION['studentLogin'])){
    include("../includes/connection.php");
    $user =$_SESSION['studentLogin'];
    $stmt = "SELECT* FROM student WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $students = mysqli_fetch_array($qe);
    $names = htmlentities(strtoupper( $students['SurName']." ".$students['FirstName']." ".$students['LastName']));
    $profile = $students['profilePicture'];
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4 bg-success" style="position:fixed; top: 0px; left: 0px; z-index: 1;">
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
        <img class="profile-user-img img-fluid img-circle"
                       src="<?php
                        if(!empty($student['profilePicture'])){
                            echo htmlentities($student['profilePicture']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?>"
                       alt="User profile picture">                    </div>
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
                  <a href="currentSemesterResult.php" class="nav-link">
                    <i class="fa fa-graduation-cap nav-icon"></i>
                    <p>Current Semester</p>
                  </a>
                </li>
               
                <li class="nav-item">
                  <a href="allresult.php" class="nav-link">
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
            <a href="Logout.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Logout
                <i class="fas fa-angle-left right"></i>
              </p>
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