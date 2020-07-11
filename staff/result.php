<?php
session_start();
include("../includes/connection.php");

    if(isset($_GET['level'])){
        $_SESSION['level'] = $_GET['level'];
        echo '
        <form role="form" method="post"  enctype="multipart/form-data" id="upadateProfileDetails">
            <div class="form-group"> 
                <label for="lang">Select Semester </label>
                    <select class="form-control"  name="dept" onchange="semester(this.value)">
                        <option value=""></option>
                        <option value="Rain Semester">Rain Semester</option>
                        <option value="Harmattan Semester">Harmattan Semester</option>
                                         
                    </select>
                </div>
        </form>
    ';
    }

    if(isset($_GET['semester'])){
        $semesters = $_GET['semester'];
        $levels = $_SESSION['level'];
        $studentId = $_GET['studentId'];
        $id = 0;
              $regcourse = mysqli_query($conn, "SELECT* FROM registeredcourse WHERE studentId = '$studentId' AND semester = '$semesters' AND level = '$levels' ");// ");
                $courses = mysqli_fetch_array($regcourse);
                $courseTitle = explode(",", $courses['courseTitle']);
                $courseUnit = explode(",", $courses['courseUnit']);
                $courseCode = explode(",", $courses['courseCode']);
                $point = explode(",", $courses['points']);
                $totalpoint = explode(",", $courses['totalunitpoint']);
                $scoress = explode(",", $courses['scores']);
                $gradess = explode(",", $courses['grades']);
                $totalunit = array_sum($point);
                $totalpoints = array_sum($totalpoint);
                $cgpa =round($courses['cgpa'],2);
                $class = $courses['class'];
               

        echo '     
<div class="row">
 
  <!-- /.col -->
  <div class="col-md-12">
    <div class="card">
      <div class="card-header p-2">
         <h1 class="text-center btn btn-primary card-title btn-lg btn-block"> Result for '.$semesters.' , '. $levels.' Level </h1> 
      </div><!-- /.card-header -->
      
      <!-- /.card-header -->
      <div class="card-body">
        
        <table class="table table-bordered" id ="printable">
          <thead>                  
            <tr>
              <th style="width: 10px">ID</th>
              <th>Course Title</th>
              <th>Course Code</th>
              <th>Course Unit</th>
              <th>Course Scores</th>
              <th>Course Grades</th>
              <th>Course Point</th>
              <th>Course Total Points</th>
            </tr>
          </thead>
          <tbody>
            <form class="" role="form" action="" method="POST" id="courseRegisterForm" >
              <p class="courseError"></p>';
              
               for ($i=0; $i <count($courseTitle) ; $i++) { 
                   $title =$courseTitle[$i];
                   $code =  $courseCode[$i];
                   $unit =$courseUnit[$i];
                   $id+1;
        echo '
           <tr>
              <td>'.$id.'</td>
              <td>';
              if(!empty($title)){
                echo $title;
             }else {
               echo "<span class = 'text-danger'>No Course Registered</span>";
             }
             echo '</td>
              <td>';
              if(!empty($code)){
                echo $code;
             }else {
               echo "<span class = 'text-danger'>No Course Code</span>";
             }
             echo '</td>
              <td>';
              if(!empty($unit)){
                echo $unit;
             }else {
               echo "<span class = 'text-danger'>No Course Unit</span>";
             }
             echo '</td>
              <td>';
              if(!empty($scoress[$i])){
               echo $scoress[$i];
            }else {
              echo "<span class = 'text-danger'>No Score</span>";
            }
                ?></td>
              <td><?php if(!empty($gradess[$i])){
               echo $gradess[$i];}else {
                echo "<span class = 'text-danger'>No Grade</span>";
              } ?></td>
              <td><?php if(isset($point[$i])){
               echo $point[$i];}else {
                echo "<span class = 'text-danger'>No Point</span>";
              } ?></td>
              <td><?php if(isset($totalpoint[$i])){
               echo $totalpoint[$i];}else {
                 echo "<span class = 'text-danger'>No Total Point</span>";
               } ?></td>
             </tr>
             <?php
             $id++;
            }
             echo '
               </tbody>

               <tfoot>
                   <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td><span class ="btn btn-block btn-primary text-light font-weight-bold">'.$totalunit.'</span></td>
                   <td><span class ="btn btn-block btn-success text-light font-weight-bold">'.$totalpoints.'</span></td>
                   </tr>
               </tfoot>
        </table>';
        if(!empty($title)){
          echo '
        <h5> CGPA : <b>'. $cgpa.'</b></h5>
        <h5> Class : <b>'.$class.'</b></h5>
        <input type="hidden" value="'.$cgpa.'" id="cgpa">
        <input type="hidden" value="'.$class.'" id="class">
        <button type="button" class="btn btn-dark mb-2 float-right mt-1" onclick="table()" name="print" id="print" >Download Result</button>
        
        </form>
        
      </div>';
    }else {
          echo "<h2 class = 'text-danger'>No CGPA OR CLASS </h2>";
        }
    '</div>';
        }

?>