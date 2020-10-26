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
              <h1 class="card-title">Manage Students  for<b> <?php echo ucwords($deptname) ?></b></h1>
            </div>
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email </th>
                  <th>Phone No</th>
                  <th>Level</th>
                  <th>Dept</th>
                  <th>CGPA</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $std =mysqli_query($conn, "SELECT student.*, department.name AS dept, faculty.name AS faculty FROM 
                  student INNER JOIN department ON student.Department = department.DepartmentId INNER JOIN faculty 
                  ON student.Faculty = faculty.facultyId WHERE Department = '$dept' ");
                  $id =1;
                  while($student = mysqli_fetch_array($std)){
                    $name = htmlentities(strtoupper($student['SurName']." ".$student['FirstName']." ".$student['LastName']));
                    $studentId = $student['StudentId'];
                ?>
              <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $name ?></td>
              <td><?php echo htmlentities($student['email'] )?></td>
              <td><?php echo htmlentities($student['Phone_Number'] )?></td>
              <td> <?php
                if(!empty($student['Level'])){
                echo $student['Level'];
                 }else{
                 echo "";
                 }
                ?></td>
                <td> <?php
                if(!empty($student['Department'])){
                echo $student['dept'];
                 }else{
                 echo "";
                 }
                ?></td>
                <td> <?php
                if(!empty($student['CGPA'])){
                echo $student['CGPA'];
                 }else{
                 echo "";
                 }
                ?></td>
                <td>
                <img class="profile-user-img img-fluid img-circle"
                     src= "../student/<?php
                      if(!empty($student['profilePicture'])){
                          echo htmlentities($student['profilePicture']);
                      }else{
                          echo "<span style ='color:red'>Not Yet Set</span>";
                      }
                     ?>"
                     alt="User profile picture">
                </td>
                <td>
                  <a href="studentDetails.php?id=<?php echo $studentId;?>">View</a>
                </td>
              </tr>
              <?php
              $id++;
                  }
              ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email </th>
                    <th>Phone No</th>
                    <th>Level</th>
                    <th>Dept</th>
                    <th>CGPA</th>
                    <th>Image</th>
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
    $('#example1').DataTable();
  });
</script>