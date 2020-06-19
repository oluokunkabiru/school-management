<?php
     session_start();
     if(isset($_SESSION['studentLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['studentLogin'];
    $stmt = "SELECT* FROM student WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $student = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper( $student['SurName']." ".$student['FirstName']." ".$student['LastName']));
    $dept = $student['Department'];
    $level = $student['Level'];
    $studentId = $student['StudentId'];
     $select =[];
    $error = [];
    $total = 0;
    $semester = $student['CurrentSemester'];
     
     
   
    if(isset($_POST['registerCourse'])){
     
        if(empty($_POST['course'])){
          array_push($error, "You must select courses");
        }
         if(!empty($_POST['course'])){

        foreach($_POST['course'] as $selected){
          array_push($select, $selected);
          $check = mysqli_query($conn, "SELECT* FROM courses WHERE CourseId = '$selected'  ");
          $course= mysqli_fetch_array($check);
          $unit = $course['CourseUnit'];
         
          $total = $unit+$total;
          $level =500;
          if($level != 500 && $total >24){
            array_push($error, "You can't Register more than 25 units");
          }
          if($level == 500 && $total >28){
            array_push($error, "As a final year student, you permit to register on 28 unit");
          } 
          
        }
       

      if(count($error)==0){
        foreach($select as $selecting){
          $checki = mysqli_query($conn, "SELECT* FROM courses WHERE CourseId = '$selecting' ");
          $courses= mysqli_fetch_array($checki);
          $titles = $courses['CourseTitle'];
          $codes = $courses['CourseCode'];
          $units = $courses['CourseUnit'];
          $studentId = $student['StudentId'];
          $courseId = $selected;
          $studentName = $name;
          $semesters = $student['CurrentSemester'];
          $levels = $student['Level'];


    //    $in = $conn->prepare("INSERT INTO registeredcourese (student, studentId, courseTitle, courseCode, 
    //       courseUnit, courseId, semester, level) VALUES (?, ?, ?,?, ?, ?,?,?) ");
    //      $in -> bind_param("ssssssss", $studentName, $studentId, $titles, $codes, $units, $courseId, $semesters, $levels);
    //      $in -> execute();
      }
        
        
      }
       
    }
  }
  

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?> Updating course</title>
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
                <h1>Registered Course For Current Semester</h1>
                <?php
                 $prev = mysqli_query($conn, "SELECT* FROM registeredcourse WHERE studentId = '$studentId' AND 
                 semester = '$semester' AND level = '$level' AND department ='$dept' ");
                 $previ = mysqli_fetch_array($prev);
                 $courseRegId = $previ['courseRegId'];
                
                ?>
                  <h1 class="text-center btn btn-primary card-title btn-lg btn-block"> Register Courses</h1>
 
              </div><!-- /.card-header -->
              
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                 foreach($error as $errors){
                  echo "<p class= 'text-danger'>$errors </p> <br>";
                }
                ?>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Course Title</th>
                      <th>Course Code</th>
                      <th>Course Unit</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form class="" role="form" action="" method="POST" id="courseRegisterForm" >
                      <p class="courseError"></p>
                      <?php
                      $id = 0;
                        $reg = mysqli_query($conn, " registeredcourse.courseRegId = '$courseRegId' ");
                      while($course = mysqli_fetch_array($reg)){
                        $registeredCourses = $course['crid'];
                        $regs = explode(",",$registeredCourses);
                        $registeredCourse = $regs[0];
                        echo $registeredCourse;
                        
                      ?>
                    <tr>
                      <td><?php echo $id+1?></td>
                      <td><?php echo $course['title'] ?></td>
                      <td><?php echo $course['code'] ?></td>
                      <td><?php echo $course['unit'] ?></td>
                      <td><input type="checkbox" name="course[]" id="course" value="<?php echo $course['courseId'] ?>" <?php
                        if($course['regId']==$course['courseId']){
                            echo "checked";
                        }
                      ?>></td>
                      
                    </tr>
                    <?php
                        $id++;
                      }
                    ?>
                  </tbody>
                   
                  
                </table>
                 <button type="submit" class="btn btn-primary mb-2 float-right" id="registercourse" name="registerCourse" >Add Course</button>
                
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