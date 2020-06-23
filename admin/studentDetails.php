<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['adminLogin'];
    $id = $_GET['id'];
    $stmt = "SELECT* FROM student WHERE StudentId = '$id'";
    $qe = mysqli_query($conn, $stmt);
    $student = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper($student['SurName']." ".$student['FirstName']." ".$student['LastName']));
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:: View  <?php echo $name ?> Details</title>
    <link rel="stylesheet" href=>
</head>
<?php
    include('sidebar.php');
    include('create.php');

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
                       src="../student/<?php
                        if(!empty($student['profilePicture'])){
                            echo htmlentities($student['profilePicture']);
                        }else{
                            echo "../image/login.png";
                        }
                       ?>"
                       alt="User profile picture">
                       
                </div>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item"> <h2> <b><?php echo $name ?></b></h2>
                  </li>
                <li class="list-group-item">Email(school) : <b><?php echo ($student['email'])?></b></li>
                <li class="list-group-item">Semester : <b><?php
                  if(!empty($student['CurrentSemester'])){
                      echo htmlentities($student['CurrentSemester']);
                  }else{
                      echo "<span style ='color:red'>Not Yet Set</span>";
                  }
                 ?></b></li>
                    <li class="list-group-item">Department : <b><?php
                  if(!empty($student['Department'])){
                      echo htmlentities($student['Department']);
                  }else{
                      echo "<span style ='color:red'>Not Yet Set</span>";
                  }
                 ?></b></li>
                    <li class="list-group-item">Level: <b><?php
                  if(!empty($student['Level'])){
                      echo htmlentities($student['Level']);
                  }else{
                      echo "<span style ='color:red'>Not Yet Set</span>";
                  }
                 ?></b></li>
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
                          <li class="list-group-item">Surname : <b><?php echo strtoupper($student['SurName'])?></b></li>
                          <li class="list-group-item">Firstname : <b><?php echo ucfirst ($student['FirstName'])?></b></li>
                          <li class="list-group-item">Lastname : <b><?php echo ucfirst($student['LastName'])?></b></li>
                          <li class="list-group-item">Phone No : <b><?php echo ($student['Phone_Number'])?></b></li>
                          <li class="list-group-item">Email(school) : <b><?php echo ($student['email'])?></b></li>
                          <li class="list-group-item">Semester : <b><?php
                        if(!empty($student['CurrentSemester'])){
                            echo htmlentities($student['CurrentSemester']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Date of Birth : <b><?php
                        if(!empty($student['dob'])){
                            echo htmlentities($student['dob']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                       <li class="list-group-item">Gender: <b><?php
                        if(!empty($student['gender'])){
                            echo htmlentities($student['gender']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>

                          <li class="list-group-item">Level : <b><?php
                        if(!empty($student['Level'])){
                            echo htmlentities($student['Level']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Department : <b><?php
                        if(!empty($student['Department'])){
                            echo htmlentities($student['Department']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Faculty : <b><?php
                        if(!empty($student['Faculty'])){
                            echo htmlentities($student['Faculty']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">CGPA: <b><?php
                        if(!empty($student['CGPA'])){
                            echo htmlentities($student['CGPA']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Student Id : <b><?php
                        if(!empty($student['StudentId'])){
                            echo htmlentities($student['StudentId']);
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
                                if(!empty($student['Address'])){
                                    echo htmlentities($student['Address']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">City : <b><?php
                                if(!empty($student['city'])){
                                    echo htmlentities($student['city']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">State: <b><?php
                                if(!empty($student['state'])){
                                    echo htmlentities($student['state']);
                                }else{
                                    echo "<span style ='color:red'>Not Yet Set</span>";
                                }
                               ?></b></li>
                                  <li class="list-group-item">Next Of Kin : <b><?php
                                if(!empty($student['NextOfKin'])){
                                    echo htmlentities($student['NextOfKin']);
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
 