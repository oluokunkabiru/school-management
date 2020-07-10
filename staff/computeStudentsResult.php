<?php
     session_start();
     if(isset($_SESSION['staffLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['staffLogin'];
    $stmt = "SELECT staff. *, faculty.name AS faculty,faculty.facultyId AS facultyid, courses.CourseTitle AS courses,
    courses.CourseId AS courseid,department.DepartmentId AS deptid, staff.StaffId AS staffid, department.name AS dept FROM 
    staff INNER JOIN courses ON staff.CourseTaken = courses.CourseId INNER JOIN department ON staff.category = department.DepartmentId 
    INNER JOIN faculty ON faculty.facultyId = staff.faculty WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $staff = mysqli_fetch_array($qe);
    $staf = explode(",", $staff['name']);
    $name =strtoupper($staf[0]." ".$staf[1]." ".$staf[2]);
    $dept = $staff['category'];
    $deptname = $staff['dept'];
    $staffid = $staff['StaffId'];


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
                               
                                <label for="lang">Select Level </label>

                                    <select class="form-control"  name="dept" onchange="level(this.value)">
                                        <option value=""></option>
                                        <option value="100">100 Level</option>
                                        <option value="200">200 Level</option>
                                        <option value="300">300 Level</option>
                                        <option value="400">400 Level</option>
                                        <option value="500">500 Level</option>                    
                                    </select>
                                </div>
                        </form>
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
                <tbody id="student">
                    <?php
                    $no = 1;
                    $qu = mysqli_query($conn, "SELECT student.*, department.name AS dept, faculty.name AS faculty FROM 
                    student INNER JOIN department ON student.Department = department.DepartmentId INNER JOIN faculty 
                    ON student.Faculty = faculty.facultyId WHERE Department='$dept'");
                    while($student = mysqli_fetch_array($qu)){
                        $name = $student['SurName']." ".$student['FirstName']." ".$student['LastName'];
                        $matric = $student['matricNo'];
                        $levels = $student['Level'];
                        $studentId = $student['StudentId'];
                        $faculty = $student['faculty'];
                        $semester = $student['CurrentSemester'];
                        $department = $student['dept'];
                        $profile = $student['profilePicture'];
                    ?>
                    <tr>
                    <td><?php  echo $no ?></td>
                    <td><?php  echo $name ?></td>
                    <td><?php  echo $matric ?></td>
                    <td><?php  echo $levels ?></td>
                    <td><?php  echo $department ?></td>
                    <td><?php  echo $semester ?></td>
                    <td><img class="profile-user-img img-fluid img-circle"
                     src= "../student/<?php
                      if(!empty($student['profilePicture'])){
                          echo htmlentities($student['profilePicture']);
                      }else{
                          echo "<span style ='color:red'>Not Yet Set</span>";
                      }
                     ?>"
                     alt="User profile picture"></td>
                    <td><a href="resultprocessing.php?id=<?php echo $studentId ?>">Upload Result</a>|<a href="">Update Result</a></td>
                    </tr>
                  <?php
                  $no++;
                    }
                  ?>
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


<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });



  function level(str) {
    if (str.length == 0) {
        document.getElementById("student").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("student").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "fetchleveldetails.php?level=" + str+"&dept=<?php echo $dept ?>", true);
        xmlhttp.send();
    }
}
</script>