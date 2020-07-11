<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['adminLogin'];
    $id = $_GET['id'];
    $stmt = "SELECT staff. *, faculty.name AS faculty,faculty.facultyId AS facultyid, courses.CourseTitle AS courses,
    courses.CourseId AS courseid,department.DepartmentId AS deptid, staff.StaffId AS staffid, department.name AS dept FROM 
    staff INNER JOIN courses ON staff.CourseTaken = courses.CourseId INNER JOIN department ON staff.category = department.DepartmentId 
    INNER JOIN faculty ON faculty.facultyId = staff.faculty  WHERE StaffId = '$id'";
    $qe = mysqli_query($conn, $stmt);
    $staffs = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper($staffs['name']));
   
  $s  = explode(",",($name));
           // echo $name;
                        $surname =  $s[0];
                        $firstname = $s[1];
                        $lastname =  $s[2];
                        // echo "ehhhhol";
                        $staffname = $firstname." ".$lastname." ".$surname;  
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:: View  <?php echo $staffname ?> Details</title>
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
              $staff = mysqli_query($conn, "SELECT COUNT(id) AS totalStudent FROM student");
              $TotalStudent = mysqli_fetch_array($staff);
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
              $staff = mysqli_query($conn, "SELECT COUNT(id) AS totalStaff FROM staff");
              $TotalStaff = mysqli_fetch_array($staff);
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
              $staff = mysqli_query($conn, "SELECT COUNT(id) AS totalCourses FROM courses");
              $TotalCourse = mysqli_fetch_array($staff);
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
              $staff = mysqli_query($conn, "SELECT COUNT(id) AS totaldepartment FROM department");
              $Totaldepartment = mysqli_fetch_array($staff);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($Totaldepartment['totaldepartment']);?></h3>

                <p>Total Department</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="manageDepartment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    

    <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid card-img"
                       src="../staff/<?php
                        if(!empty($staffs['profilePicture'])){
                            echo htmlentities($staffs['profilePicture']);
                        }else{
                            echo "../image/login.png";
                        }
                       ?>"
                       alt="User profile picture">
                       
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item text-center"><h2><b><?php echo $staffname ?></b></h2></li>
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
                
                  <h1 class="text-center btn btn-success btn-lg btn-block"> Brief Biodata</h1>
 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                          <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">Staff Name : <b><?php echo $staffname ?></b></li>
                          <li class="list-group-item">Phone No : <b><?php echo ($staffs['Phone_Number'])?></b></li>
                          <li class="list-group-item">Email(school) : <b><?php echo ($staffs['email'])?></b></li>
                          <li class="list-group-item">Department : <b><?php
                        if(!empty($staffs['dept'])){
                            echo htmlentities($staffs['dept']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Date of Birth : <b><?php
                        if(!empty($staffs['dob'])){
                            echo htmlentities($staffs['dob']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                       <li class="list-group-item">Gender: <b><?php
                        if(!empty($staffs['gender'])){
                            echo htmlentities($staffs['gender']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>

                          <li class="list-group-item">Course Taken : <b><?php
                        if(!empty($staffs['courses'])){
                            echo htmlentities($staffs['courses']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                        ?></li>
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
                                if(!empty($staffs['Address'])){
                                    echo htmlentities($staffs['Address']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">City : <b><?php
                                if(!empty($staffs['city'])){
                                    echo htmlentities($staffs['city']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">State: <b><?php
                                if(!empty($staffs['state'])){
                                    echo htmlentities($staffs['state']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">Next Of Kin : <b><?php
                                if(!empty($staffs['NextOfKin'])){
                                    echo htmlentities($staffs['NextOfKin']);
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

    


























    </div>
</div>
<?php include('footer.php'); ?>
</body>
</html>
<?php
    
    }
    else{
        header('location:../index.php');
    }
    ?>
 