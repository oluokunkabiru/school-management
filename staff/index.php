<?php
     session_start();
     if(isset($_SESSION['staffLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['staffLogin'];
    $stmt = "SELECT staff.*, faculty.name AS faculty,faculty.facultyId AS facultyid, courses.CourseTitle AS courses,
    courses.CourseId AS courseid,department.DepartmentId AS deptid, staff.StaffId AS staffid, department.name AS dept FROM 
    staff INNER JOIN courses ON staff.CourseTaken = courses.CourseId INNER JOIN department ON staff.category = department.DepartmentId 
    INNER JOIN faculty ON faculty.facultyId = staff.faculty WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $staff = mysqli_fetch_array($qe);
    $staf = explode(",", $staff['name']);
    $name =strtoupper($staf[0]." ".$staf[1]." ".$staf[2]);
    $dept = $staff['deptid'];
    $deptname = $staff['dept'];
    $coursetaken = $staff['courses'];



    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?> Dashboard</title>
    <link rel="stylesheet" href=>
</head>
<?php
    include('sidebar.php');
    ?>
<body>
    
<div class="content-wrapper">
  
    <!-- index image -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <?php
              $student = mysqli_query($conn, "SELECT COUNT(id) AS totalStudent FROM student WHERE Department ='$dept' ");
              $TotalStudent = mysqli_fetch_array($student);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($TotalStudent['totalStudent']);?></h3>
                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="manageStudent.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <?php
              $staffs = mysqli_query($conn, "SELECT COUNT(id) AS totalStaff FROM staff WHERE category = '$dept' ");
              $TotalStaff = mysqli_fetch_array($staffs);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($TotalStaff['totalStaff']);?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="manageStaff.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <?php
              $course = mysqli_query($conn, "SELECT COUNT(id) AS totalCourses FROM courses WHERE CourseCategory ='$dept' ");
              $TotalCourse = mysqli_fetch_array($course);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($TotalCourse['totalCourses']);?></h3>

                <p>Total Courses offered</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="manageCourse.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <?php
              $depttment = mysqli_query($conn, "SELECT COUNT(id) AS totaldepartment FROM department");
              $Totaldepartment = mysqli_fetch_array($depttment);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($Totaldepartment['totaldepartment']);?></h3>

                <p>Total Department</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
<section>
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <h2><?php echo $name ;?></h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php
                        if(!empty($staff['profilePicture'])){
                            echo htmlentities($staff['profilePicture']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $name; ?></h3>

                
                
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    Department: <b><?php
                         if(!empty($staff['category'])){
                          echo $deptname;
                      }else{
                          echo "<span style ='color:red'>Not Yet Set</span>";
                      }
                       ?></b>
                  </li>
                  <li class="list-group-item">
                  <li class="list-group-item">
                    Course Taken: <b><?php
                         if(!empty($staff['CourseTaken'])){
                          echo $coursetaken;
                      }else{
                          echo "<span style ='color:red'>Not Yet Set</span>";
                      }
                       ?></b>
                  </li>
                  
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                
                  <h1 class="text-center btn btn-primary btn-lg btn-block"> Brief Biodata</h1>
 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                          <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">Surname : <b><?php echo strtoupper($staf[0])?></b></li>
                          <li class="list-group-item">Firstname : <b><?php echo ucfirst ($staf[1])?></b></li>
                          <li class="list-group-item">Lastname : <b><?php echo ucfirst($staf[2])?></b></li>
                          <li class="list-group-item">Phone No : <b><?php echo ($staff['Phone_Number'])?></b></li>
                          <li class="list-group-item">Email(school) : <b><?php echo ($staff['email'])?></b></li>
                          <li class="list-group-item">Gender: <b><?php
                            if(!empty($staff['gender'])){
                                echo htmlentities($staff['gender']);
                            }else{
                                echo "<span style ='color:red'>Not Yet Set</span>";
                            }
                           ?></b></li>

                        </ul>
                         
                        
                      </div>
                      
                   </div>
                    <!-- /.post -->

                   
                  </div>
                  <!-- /.tab-pane -->
                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="card">
              <div class="card-header p-2">
                
                           <h1 class="text-center">Address Details</h1>

              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                          
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">Address : <b><?php
                                if(!empty($staff['Address'])){
                                    echo htmlentities($staff['Address']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">City : <b><?php
                                if(!empty($staff['city'])){
                                    echo htmlentities($staff['city']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">State: <b><?php
                                if(!empty($staff['state'])){
                                    echo htmlentities($staff['state']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">Next Of Kin : <b><?php
                                if(!empty($staff['NextOfKin'])){
                                    echo htmlentities($staff['NextOfKin']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                          </ul>
                        
                      </div>
                      
                   </div>
                    <!-- /.post -->

                   
                  </div>
                  <!-- /.tab-pane -->
                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
      </div><!-- /.container-fluid -->
    </section>
    </div>
</div>
<?php  include('footer.php'); ?>
</body>
</html>
<?php
    
    }
    else{
        header('location:../index.php');
    }
    ?>