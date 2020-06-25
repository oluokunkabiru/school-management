<?php
     session_start();
     if(isset($_SESSION['studentLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['studentLogin'];
    $stmt = "SELECT* FROM student WHERE email = '$user'|| Phone_Number = '$user' || matricNo = '$user' ";
    $qe = mysqli_query($conn, $stmt);
    $student = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper( $student['SurName']." ".$student['FirstName']." ".$student['LastName']));
    $dept = $student['Department'];
    $level = $student['Level'];
    $studentId = $student['StudentId'];

    // select all course registerd
    $coursetitle =[];
    $coursecode =[];
    $courseunit =[];
    $lev = [];
    $stm = mysqli_query($conn, "SELECT* FROM registeredcourse WHERE studentId = '$studentId' ");
    while($courses = mysqli_fetch_array($stm)){
        $Title = $courses['courseTitle'];
        $Code = $courses['courseCode'];
        $Unit = $courses['courseUnit'];
        $leve = $courses['level'];
        array_push($coursecode, $Code);
        array_push($coursetitle, $Title);
        array_push($courseunit, $Unit);
    }
    $codes = implode(",", $coursecode);
    $units = implode(",", $courseunit);
    $titles = implode(",", $coursetitle);
  $code = [];
  $unit = [];
  $title = [];
  $levels = [];

  $title = explode(",",$titles);
  $code = explode(",",$codes);
  $unit = explode(",",$units);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?> All registered Courses</title>
    <link rel="stylesheet" href=>
</head>
<?php
    include('sidebar.php');
    ?>
<body>
    
<div class="content-wrapper">
    <!-- index image -->


    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <h2><?php echo $name ?></h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <h1>All Registered Courses</h1>
               
                  <h1 class="text-center btn btn-primary card-title btn-lg btn-block"> Register Courses</h1>
 
              </div><!-- /.card-header -->
              
              <!-- /.card-header -->
              <div class="card-body">
               
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Course Title</th>
                      <th>Course Code</th>
                      <th>Course Unit</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form class="" role="form" action="" method="POST" id="courseRegisterForm" >
                      <p class="courseError"></p>
                      <?php
                     for ($i=0; $i < count($title) ; $i++) { 
                        
                     
                        
                      ?>
                    <tr>
                      <td><?php echo $i+1?></td>
                      <td><?php echo $title[$i] ?></td>
                      <td><?php echo $code[$i] ?></td>
                      <td><?php echo $unit[$i] ?></td>
                      
                    </tr>
                    <?php
                      }
                    ?>
                    <tr>
                        <td></td>
                        <td><b> Total Unit </b></td>
                        <td></td>
                        <td class="btn btn-primary btn-block"><?php echo array_sum($unit) ?></td>
                    </tr>
                  </tbody>
                   
                  
                </table>
                 <!-- <button type="submit" class="btn btn-primary mb-2 float-right" id="registercourse" name="registerCourse" >Add Course</button> -->
                
                </form>
                <?php
                //   }else{
                //     echo "You have Already register, will you like to <a href= '#'>edit</a> your courses ";
                //   }
                ?>
              </div>
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      
            <!-- /.nav-tabs-custom -->
      </div><!-- /.container-fluid -->
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