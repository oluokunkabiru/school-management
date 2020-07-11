<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['adminLogin'];
    $stmt = "SELECT* FROM admin WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $admin = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper( $admin['name']));
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin::  <?php echo $name ?> check Department Details</title>
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
    



    <section class="content">
      <div class="row">
        <div class="col-12">
         

          <div class="card">
            <div class="card-header">
              <h1 class="card-title">Result Computation</h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <form role="form" method="post"  enctype="multipart/form-data" id="upadateProfileDetails">
                            <div class="form-group">
                               
                                <label for="lang">Select Faculty </label>

                                    <select class="form-control"  name="dept" onchange="faculty(this.value)">
                                        <option value=""></option>
                                     <?php
                                    $fac = mysqli_query($conn, "SELECT* FROM faculty");
                                    while($faculty= mysqli_fetch_array($fac)){
                                    ?>
                                    
                                    <option value="<?php 
                                        if(!empty($faculty['facultyId'])){
                                            echo $faculty['facultyId'];
                                        }
                                        ?>"><?php 
                                        if(!empty($faculty['name'])){
                                            echo $faculty['name'];
                                        }?>
                                        
                                        
                                    </option>
                                        <?php } ?>                                
                                    </select>
                                </div>
                        </form>
                    </div>

                    <div class="col-md-4" id="department">
                        
                    </div>

                    <div class="col-md-4" id="levels">
                        
                       
                    </div>
                </div>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Matric Number </th>
                <th>Level</th>
                <th>Department</th>
               
                <th>Current Semester</th>
                 <th>Profile Picture</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody id="students">
                  
                </tbody>
                <tfoot>
                <tr>
                <th>ID</th>
                  <th>Name</th>
                  <th>Matric Number </th>
                  <th>Level</th>
                  <th>Department</th>
                 
                  <th>Current Semester</th>
                   <th>Profile Picture</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<!-- student details -->

<!-- /student details -->


    



















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
    <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });






function faculty(str) {
    if (str.length == 0) {
        document.getElementById("department").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("department").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "facultyDetails.php?faculty=" + str, true);
        xmlhttp.send();
    }
}


function department(str) {
    if (str.length == 0) {
        document.getElementById("levels").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("levels").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "facultyDetails.php?dept=" + str, true);
        xmlhttp.send();
    }
}


function level(str) {
    if (str.length == 0) {
        document.getElementById("students").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("students").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "facultyDetails.php?levelss=" + str, true);
        xmlhttp.send();
    }
}


function studentcourse(str) {
    if (str.length == 0) {
        document.getElementById("studentcourses").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("studentcourses").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "facultyDetails.php?studentcoursess=" + str, true);
        xmlhttp.send();
    }
}
</script>


