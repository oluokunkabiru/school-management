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
              <h1 class="card-title">Manage Courses</h1>
            </div>
            <a href="#newcourse" class="btn btn-lg btn-info" data-toggle="modal">
                <i class="nav-icon fa fa-user-plus"></i>
                  Add New Course
              </a>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Code </th>
                  <th>Unit</th>
                  <th>Description</th>
                  <th>Department</th>
                  <th>Level</th>
                  <th>Logo</th>
                  <th>Date of Approval</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $std =mysqli_query($conn, "SELECT courses.CourseCode AS code, courses.CourseUnit AS unit,
                   courses.CourseTitle AS title, courses.CourseDesc AS descs, courses.CourseLevel AS level,
                   courses.logo AS logo, courses.CourseId AS cid, department.name AS dept, courses.courseReg_date
                    AS approval FROM courses INNER JOIN department ON courses.CourseCategory = department.DepartmentId");
                  $id =1;
                  while($course = mysqli_fetch_array($std)){
                    $courseId = $course['cid'];
                ?>
              <tr>
              <td><?php echo $id ?></td>
              <td><?php echo htmlentities($course['title'] )?></td>
              <td><?php echo htmlentities($course['code'] )?></td>
              <td><?php echo htmlentities($course['unit'] )?></td>
              <td><?php echo htmlentities($course['descs'] )?></td>
              <td><?php echo htmlentities($course['dept'] )?></td>
              <td><?php echo htmlentities($course['level'] )?></td>
              <td>
                <img class="profile-user-img img-fluid img-circle"
                     src= "logo/<?php
                      if(!empty($course['logo'])){
                          echo htmlentities($course['logo']);
                      }else{
                          echo "<span style ='color:red'>Not Yet Set</span>";
                      }
                     ?>"
                     alt="Course Logo">
                </td>
              <td><?php echo htmlentities($course['approval'] )?></td>
              
                <td>
                  <a href="courseUpdate.php?id=<?php echo $courseId;?>">Edit</a>|<a href="">Delete</a>
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
                  <th>Title</th>
                  <th>Code </th>
                  <th>Unit</th>
                  <th>Description</th>
                  <th>Department</th>
                  <th>Level</th>
                  <th>Logo</th>
                  <th>Date of Approval</th>
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
</script>