<?php
     session_start();
     if(isset($_SESSION['studentLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['studentLogin'];
    $stmt = "SELECT* FROM student WHERE email = '$user'|| Phone_Number = '$user' || matricNo = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $student = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper( $student['SurName']." ".$student['FirstName']." ".$student['LastName']));
    $level = $student['Level'];
    $dept = $student['Department'];
    $semester = $student['CurrentSemester'];
    $studentId = $student['StudentId'];


     $select =[];
    $error = [];
    $unit =[];
    $title = [];
    $code =[];
    $total = 0;
    $sta =[];
     
     
   
    if(isset($_POST['registerCourse'])){
     
        if(empty($_POST['course'])){
          array_push($error, "You must select courses");
        }
         if(!empty($_POST['course'])){

        foreach($_POST['course'] as $selected){
          array_push($select, $selected);
          $check = mysqli_query($conn, "SELECT* FROM courses WHERE CourseId = '$selected'  ");
          $course= mysqli_fetch_array($check);
          $uni = $course['CourseUnit'];
          array_push( $unit,$course['CourseUnit']);
          array_push($title, $course['CourseTitle']);
          array_push($code, $course['CourseCode']);
          array_push($sta, "0");
          $total = $uni+$total;
          if($level != 500 && $total >24){
            array_push($error, "You can't Register more than 25 units");
          }
          if($level == 500 && $total >28){
            array_push($error, "As a final year student, you permit to register on 28 unit");
          } 
          // echo $course['CourseTitle']." = ".$selected."<br>";
          
        }
      
       

      if(count($error)==0){
          
          
          
        $last = "SELECT MAX(id) as lastId  FROM registeredcourse";
        $q = mysqli_query($conn, $last);
        $lastI = mysqli_fetch_array($q);
        $lastId = $lastI['lastId'];
        $mess = md5($lastId+1);
        $courseRegId = $mess;
          $studentId = $student['StudentId'];
          $titles = implode(",", $title);
          $codes = implode(",", $code);
          $units = implode(",", $unit);

          $courseId = implode(",", $select);
          $stat = implode(",",$sta);
          $semesters = $student['CurrentSemester'];
          $levels = $student['Level'];
          $department = $student['Department'];
          $exist = mysqli_query($conn, "SELECT COUNT(courseRegId) as exist FROM registeredcourse WHERE studentId = '$studentId' AND level ='$level' AND semester ='$semester' ");
          $existing = mysqli_fetch_array($exist);
          $exists = $existing['exist'];
        //  echo $exists . $semesters.$department.$levels.$studentId;
         
          if(!empty($exists)||$exists > 0){
            $Q = "UPDATE registeredcourse SET courseTitle = '$titles', courseCode = '$codes', courseUnit = '$units', courseId ='$courseId'
                WHERE studentId = '$studentId' AND level ='$level' AND semester ='$semester' ";
               $insert = mysqli_query($conn, $Q);
            echo $codes;
               
          }
          else{      
        $in = $conn->prepare("INSERT INTO registeredcourse (studentId, courseTitle, courseCode, 
         courseUnit, courseId, level, semester, department, status, courseRegId) VALUES (?,?, ?, ?,?, ?, ?,?,?,?) ");
         $in -> bind_param("ssssssssss", $studentId, $titles, $codes, $units, 
         $courseId, $levels, $semesters, $department, $stat, $courseRegId);
         $in -> execute();
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
    <title><?php echo $name ?> Registering course</title>
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
          </div>
          <div class="col-sm-6">
            <h2><?php echo $name ?></h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   

    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <h4>Registered Course For Current Semester (<b><?php echo $semester ?></b>)</h4>
                  <h1 class="text-center btn btn-primary card-title btn-lg btn-block"> Register Courses</h1>

                <?php
                  $exist = mysqli_query($conn, "SELECT COUNT(courseRegId) as exist FROM registeredcourse WHERE studentId = '$studentId' AND level ='$level' AND semester ='$semester' ");
                     $existing = mysqli_fetch_array($exist);
                      $exists = $existing['exist'];
                ?>
 
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
                      $Registered =[];
                      $status =[];
                      $totalcourse =0;
                      $totalmark = 0;
                      $totalmark = [];
                      
                     
                //  echo $exists . $semesters.$department.$levels.$studentId;
                 
                  if(!empty($exists)||$exists > 0){
                    $Q = "SELECT* FROM courses WHERE CourseLevel ='$level' AND CourseCategory ='$dept'";
                       $new = mysqli_query($conn, $Q);
                      $s =0;
                     
                       $reg = mysqli_query($conn, "SELECT* FROM registeredcourse WHERE studentId = '$studentId' AND level ='$level' AND semester ='$semester' ");
                       while($cour = mysqli_fetch_array($reg)){
                         if(!empty($cour['courseId'])){
                          $regcourse = $cour['courseId'];
                          $Registered = explode(",", $regcourse);
                          $statu = $cour['status'];
                          if(!empty($statu)){
                          $status = explode(',', $statu);
                          }else {
                            $status =[];
                          }
                        }else {
                          $Registered=[];
                        }

                          $s++;
                       }
                       $totalcourse = count($Registered);
                       
                      //  echo "total $totalcourse <br> $totalresultupload";
                       $i = 0;
                       while($course = mysqli_fetch_array($new)){
                         $CourseId = $course['CourseId'];
                         $compute = 1;
                         $compare ="";
                         if(!empty($status[$i])){
                           $compare = $status[$i];
                           array_push($totalmark, $compare);
                         }else {
                           $compare = 0;
                         }
                        // echo "<br> $status[$i]<br>";
                        
                      ?>
                    <tr>
                      <td><?php echo $id+1?></td>
                      <td><?php echo $course['CourseTitle'] ?></td>
                      <td><?php echo $course['CourseCode'] ?></td>
                      <td><?php echo $course['CourseUnit'] ?></td>
                      <td><?php
                      if(in_array ($CourseId, $Registered) && ($compute == $compare)){
                          echo '<input type="checkbox" name="course[]" id="course" disabled ="disabled" checked ="check" value="'. $CourseId .'">
                          <input type="hidden" type="text" value="'. $CourseId .'" name="course[]">
                          ' ;
                        }elseif(in_array($CourseId, $Registered) && ($compute != $compare)){
                          echo '<input type="checkbox" name="course[]" id="course" checked ="check" value="'.$CourseId.'">
                          
                          ' ;
                          }else {
                          echo '<input type="checkbox" name="course[]" id="course" value="'.$CourseId.'">';
                        }
                      ?></td>
                      
                    </tr>
                    <?php
                        $id++;
                        $i++;
                      }
                    }else{
                      $Q = "SELECT* FROM courses WHERE CourseLevel ='$level' AND CourseCategory ='$dept'";
                      $new = mysqli_query($conn, $Q);
                     $s =0;
                     while($course = mysqli_fetch_array($new)){
                      $CourseId = $course['CourseId'];
                     //  echo $CourseId;
                   ?>
                 <tr>
                   <td><?php echo $id+1?></td>
                   <td><?php echo $course['CourseTitle'] ?></td>
                   <td><?php echo $course['CourseCode'] ?></td>
                   <td><?php echo $course['CourseUnit'] ?></td>
                   <td><input type="checkbox" name="course[]" id="course" value="<?php
                     echo $CourseId;
                   ?>" ></td>
                   
                 </tr>
                 <?php
                     $id++;
                   }

                                         }
                    ?>
                  </tbody>
                   
                  
                </table>
                 <button type="submit" class="btn btn-primary mb-2 float-right" id="registercourse" name="registerCourse" <?php 
                $totalresultupload = count($totalmark);
                 if($totalresultupload == $totalcourse && $totalcourse > 0){
                   echo "disabled";
                 }
                 ?> >Add Course</button>
                
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
    <script>
      $('.duallistbox').bootstrapDualListbox()
    </script>