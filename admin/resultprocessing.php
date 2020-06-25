<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include("../includes/connection.php");

    $user =$_SESSION['adminLogin'];
    $id = $_GET['id'];
    $stmt = "SELECT* FROM student WHERE StudentId = '$id'";
    $qe = mysqli_query($conn, $stmt);
    $student = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper($student['SurName']." ".$student['FirstName']." ".$student['LastName']));
    $level = $student['Level'];
    $semester = $student['CurrentSemester'];
    function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $error =[];
    
        $id = $student['StudentId'];
        $courseTitle =[];
        $courseCode = [];
        $courseUnit =[];
        $courseId = [];
        
          $regcourse = mysqli_query($conn, "SELECT* FROM registeredcourse WHERE studentId = '$id' AND semester = '$semester' AND level = '$level' ");// ");
          $courses = mysqli_fetch_array($regcourse);
          $courseTitle = explode(",", $courses['courseTitle']);
          $courseUnit = explode(",", $courses['courseUnit']);
          $courseCode = explode(",", $courses['courseCode']);
          $courseId = explode(",", $courses['courseId']);
          $scoress = explode(",", $courses['scores']);
          $gradess = explode(",", $courses['grades']);
          $to = array_sum($courseUnit);
          $sco = array_sum($scoress);
          // echo $to;
        
    
        if(isset($_POST['uploadResult'])){
            if(isset($_POST['scores'])){
                $grade = [];
                $scores = [];
                $gradd ="";
                $totalunit =$to;
                $points =[];
                $totalunitpoint = [];
                $class = "";

                foreach ($_POST['scores'] as $score) {
                   if($score >= 70 && $score <=100 ){
                       $gradd = "A";
                       $point =5;
                   }elseif($score < 70 && $score >= 60){
                       $gradd = "B";
                       $point =4;
                   }elseif($score < 60 && $score >= 50){
                    $gradd = "C";
                    $point =3;
                   } elseif($score < 50 && $score >= 45){
                    $gradd = "D";
                    $point =2;
                    }elseif($score < 45 && $score >= 40){
                    $gradd = "E";
                    $point =1;
                    }elseif($score < 40 && $score >= 0){
                        $gradd = "F";
                        $point =0;
                    }else {
                        array_push($error, "There is no such Grade ");
                    }
                array_push($scores, $score);
                array_push($grade, $gradd);
                array_push($points, $point);

              
                }
// total unit point for each course selected;
                for ($i=0; $i < count($courseUnit) ; $i++) { 
                  $point = $points[$i];
                  $units = $courseUnit[$i];
                  $totalpo = $point* $units;
                  
                  array_push($totalunitpoint, $totalpo);
                }
                // sum up the scores
                
            }

            $sum_of_point = array_sum($totalunitpoint);
            $cgpa = $sum_of_point/$totalunit;

            // check the category for a semester
            
           if($cgpa <=5.000 && $cgpa >=4.500){
             $class ="FIRST CLASS";
           }elseif($cgpa <4.500 && $cgpa >=3.500){
            $class ="SECOND CLASS UPPER";
          }elseif($cgpa <3.500 && $cgpa >=2.500){
            $class ="SECOND CLASS LOWER";
          }elseif($cgpa <2.500 && $cgpa >=1.500){
            $class ="THIRD CLASS";
          }elseif($cgpa <1.500 && $cgpa >=0.900){
            $class ="PASS";
          }else {
            $class = "PROBATION";
          }
          // echo "<br> Class = $class";


                    if(count($error)==0){
                    $score = implode(",",$scores);
                    $grades = implode(",", $grade);
                    $point = implode(",",$points);
                    $cgpa;
                    $class;
                    $totalunits =implode(",", $totalunitpoint);
                    echo "$score <br> $grades<br>$point";
                    $update = "UPDATE registeredcourse SET scores = '$score', grades = '$grades', points = '$point', 
                    cgpa = '$cgpa', class = '$class', totalunitpoint = '$totalunits' WHERE studentId = '$id'AND level = '$level' AND semester = '$semester' ";
                    $updat = mysqli_query($conn, $update);
                    // echo "<br> $profile_picture";
                    if($updat){
                        echo "<h2> Your data Update Succefully</h2";
                        header("location:computingStudentResult.php");

                    }else{
                        echo "<h2 class = 'text-danger'> Fail to Update</h2>".mysqli_error($conn);
                    }
                    // echo $profile_picture;
                }
                $studentId = $id;
    $regcourse = mysqli_query($conn, "SELECT* FROM registeredcourse WHERE studentId = '$studentId'");
    $tups = [];
    $points =[];
    while ($courses = mysqli_fetch_array($regcourse)){
      $tup = $courses['totalunitpoint'];
      $point = $courses['courseUnit'];
      array_push($tups, $tup);
      array_push($points, $point);
    }
    $totalpoint =[];
    $totalunit =[];
    $p = implode(",",$points );
    $u = implode(",", $tups);

    $totalpoint = explode(",", $p);
    $totalunit = explode(",", $u);
    $pointss = array_sum($totalpoint);
    $unit = array_sum($totalunit);
    $cgpa = $unit/$pointss;
    $class ="";
    if($cgpa <=5.000 && $cgpa >=4.500){
      $class ="FIRST CLASS";
    }elseif($cgpa <4.500 && $cgpa >=3.500){
     $class ="SECOND CLASS UPPER";
   }elseif($cgpa <3.500 && $cgpa >=2.500){
     $class ="SECOND CLASS LOWER";
   }elseif($cgpa <2.500 && $cgpa >=1.500){
     $class ="THIRD CLASS";
   }elseif($cgpa <1.500 && $cgpa >=0.900){
     $class ="PASS";
   }else {
     $class = "PROBATION";
   }
  //  update database with cgpa and class
  $updat = "UPDATE student SET cgpa = '$cgpa', class = '$class' WHERE StudentId = '$studentId' ";
  $update = mysqli_query($conn, $updat);
  
            }
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $student['SurName'] ?> Dashboard</title>
    <link rel="stylesheet" href=>
</head>
<?php
    include('sidebar.php');
    include('header.php');
    ?>
<body>
    
<div class="content-wrapper">
 <div class="container-fluid">
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

                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                
                  <h1 class="text-center btn btn-primary btn-lg btn-block"> <?php echo $name ?> Registered course</h1>
 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    
                    <?php 
                  
                     ?>
                    <div class="post">
                    <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Course Title</th>
                      <th>Course Code</th>
                      <th>Course Unit</th>
                      <th>Select Course Score</th>
                      <th>Grades</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form class="" role="form"  action="" method="POST" id="courseRegisterForm" >
                      <p class="courseError"></p>
                      <?php
                    //   $no =1;
                     
                        

                        for ($i=0; $i < count($courseId); $i++) { 
                      ?>
                      <tr>
                     <td><?php echo $i+1?></td>
                      <td><?php echo $courseTitle[$i] ?></td>
                      <td><?php echo $courseCode[$i]  ?></td>
                      <td><?php echo $courseUnit[$i]  ?></td>
                      <td> <div class="form-group">
                                <select class="form-control" name="scores[]" onchange="student(this.value)">
                                <?php if(!empty($scoress[$i])){

                                 ?>   
                                <option value="<?php echo $scoress[$i]?>" <?php echo "selected"?>><?php echo $scoress[$i]?></option>
                                <?php } ?>
                                   <?php
                                    for ($score=0; $score < 100; $score++) { 
                                        # code...
                                    
                                    ?>
                                <option id="item" value="<?php echo $score;?>"><?php echo $score;?></option>
                                        <?php } ?>
                                </select>
                             </div>
                    </td>
                    <td> <?php if(!empty($gradess[$i])){
                      echo $gradess[$i];
                    }
                      ?> </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                   <tfoot>
                   <tr>
                      <th style="width: 10px"></th>
                      <th></th>
                      <th><p name = "p" value ="paragrap"></p> </th>
                      <th><button class ="btn btn-success btn-block" value = "<?php echo $to?>" name ="" type ="input"><?php echo $to?></button></th>
                      <th><button class ="btn btn-warning btn-block" value = "" name ="grade" id = "grading"> <?php if(!empty($gradess)){echo $sco;}?></button></th>
                      <th>Grades</th>
                    </tr>
                   </tfoot>
                  
                </table>
                 <button type="submit" class="btn btn-primary mb-2 float-right" id="uploadResult" name="uploadResult" >Upload Result</button>
                
                </form>
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
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#upadateProfileDetails + img').remove();
                    $('#upadateProfileDetails').after('<img src="'+e.target.result+'" width="450" height="400"/>');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile_picture").change(function () {
            filePreview(this);
        });

var sum = 0;


        function student(select) {
    if (select.length == 0) {
        document.getElementById("grading").innerHTML = "0";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var va  = this.responseText;
             sum += parseInt(va);
                document.getElementById("grading").innerHTML =sum;

            }
        };
        xmlhttp.open("GET", "facultyDetails.php?grade=" + select, true);
        xmlhttp.send();
    }
}
          </script>
        

    