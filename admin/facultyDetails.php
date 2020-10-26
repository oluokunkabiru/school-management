<?php
session_start();
include("../includes/connection.php");


if(isset($_GET['faculty'])){
$fac = $_GET['faculty'];
$_SESSION['getfaculty'] = $fac;
$dept="";
$quer = mysqli_query($conn, "SELECT* FROM department WHERE FacultyCategory = '$fac' ");
echo '<div class="form-group">
        <label for="lang">Select Department</label>
         <select class="form-control" id="dept" name="dept"  onchange="department(this.value)">
         <option value=""></option>';
     while($faculty = mysqli_fetch_array($quer)){
        $dept = $faculty['name']; 
        $deptid = $faculty['DepartmentId'];   
      echo '<option value="'. $deptid.'">'.$dept.'</option>';
     }
     echo ' </select>
            </div>';
    }

if(isset($_GET['dept'])){
    $deptm = $_GET['dept'];
    $_SESSION['department'] =$deptm ;

    echo '
    <div class="form-group">
     <label for="lang">Course Category</label>
     <select class="form-control" id="level" name="level"  onchange="level(this.value)">
     <option value=""></option>
     <option value="100">100 Level</option>
     <option value="200">200 Level</option>
     <option value="300">300 Level</option>
    <option value="400">400 Level</option>
    <option value="500">500 Level</option>
    </select>
    </div>
    ';
}


if(isset($_GET['level'])){
    $_SESSION['level']= $_GET['level'];
    $facultys = $_SESSION['getfaculty'];
    $department = $_SESSION['department'];
    $de = "Computer Science and Engineering";
    $level =$_SESSION['level'];
    $id =1;
    echo "<tbody>";
    $qu = mysqli_query($conn, "SELECT student.*, department.name AS dept, faculty.name AS faculty FROM 
    student INNER JOIN department ON student.Department = department.DepartmentId INNER JOIN faculty 
    ON student.Faculty = faculty.facultyId WHERE Department='$department' AND Level = '$level' AND Faculty = '$facultys' ");
            while($student = mysqli_fetch_array($qu)){
                $name = $student['SurName']." ".$student['FirstName']." ".$student['LastName'];
                $matric = $student['matricNo'];
                $levels = $student['Level'];
                $studentId = $student['StudentId'];
                $faculty = $student['faculty'];
                $semester = $student['CurrentSemester'];
                $department = $student['dept'];
                $profile = $student['profilePicture'];    
         echo '     <tr>
                <td> '. $id .'</td>
                <td> '. $name.'</td>
                <td>  '.$matric.'</td>
                <td>  '.$levels.'</td>
                <td>'. $department.'</td>
                <td>'.$semester .'</td>
                <td>
                  <img class="profile-user-img img-fluid img-circle"
                       src= "';
                        if(!empty($profile)){
                          echo  htmlentities($profile);
                        }else{
                           echo  "<span style ='color:red'>Not Yet Set</span>";
                        }
                     echo ' "
                       alt="Course Logo">
                  </td>
                
                
                  <td>
                    <a href="resultprocessing.php?id='.$studentId.'">Upload Result</a>|<a href="">Update Result</a>
                  </td>
                </tr>';
                
                $id++;
                    }
                
echo '  </tbody>';
            }
                 
if(isset($_GET['grade'])){
  
 $grade = $_GET['grade'];
 echo $grade;
}


// check result
if(isset($_GET['levelss'])){
  $_SESSION['levels']= $_GET['levelss'];
  $facultys = $_SESSION['getfaculty'];
  $department = $_SESSION['department'];
  $de = "Computer Science and Engineering";
  $level =$_SESSION['levels'];
  $id =1;
  echo "<tbody>";
  $qu = mysqli_query($conn, "SELECT student.*, department.name AS dept, faculty.name AS faculty FROM 
  student INNER JOIN department ON student.Department = department.DepartmentId INNER JOIN faculty 
  ON student.Faculty = faculty.facultyId WHERE Department='$department' AND Level = '$level' AND Faculty = '$facultys' ");
          while($student = mysqli_fetch_array($qu)){
              $name = $student['SurName']." ".$student['FirstName']." ".$student['LastName'];
              $matric = $student['matricNo'];
              $levels = $student['Level'];
              $studentId = $student['StudentId'];
              $faculty = $student['faculty'];
              $semester = $student['CurrentSemester'];
              $department = $student['dept'];
              $profile = $student['profilePicture'];    
       echo '     <tr>
              <td> '. $id .'</td>
              <td> '. $name.'</td>
              <td>  '.$matric.'</td>
              <td>  '.$levels.'</td>
              <td>'. $department.'</td>
              <td>'.$semester .'</td>
              <td>
                <img class="profile-user-img img-fluid img-circle"
                     src= "';
                      if(!empty($profile)){
                        echo  htmlentities($profile);
                      }else{
                         echo  "<span style ='color:red'>Not Yet Set</span>";
                      }
                   echo ' "
                     alt="Course Logo">
                </td>
              
              
                <td>
                  <a href="viewStudentResult.php?semester='.$semester.'&id='.$studentId.'&level='.$levels.'">View Result</a>|| <a href="allResult.php?student='.$studentId.'">View All Result</a>
                </td>
              </tr>';
              
              $id++;
                  }
              
echo '  </tbody>';
          }
               
if(isset($_GET['grade'])){

$grade = $_GET['grade'];
echo $grade;
}



if(isset($_GET['staffFaculty'])){

  $facul = $_GET['staffFaculty'];
  $q = mysqli_query($conn, "SELECT* FROM department WHERE FacultyCategory = '$facul'");
  echo '<div class="form-group">
        <label for="lang"> Department</label>
         <select class="form-control" name="dept" onchange="deptmt(this.value)">
         <option></option>';
       
        
  while($dept = mysqli_fetch_array($q)){
    $dep = $dept['name'];
    $depid = $dept['DepartmentId'];
    echo '<option value="'.$depid.'">'.$dep.'</option>';
  }
echo ' </select>
</div>';
}



if(isset($_GET['staffDept'])){
  $dept = $_GET['staffDept'];
  $q = mysqli_query($conn, "SELECT* FROM courses WHERE CourseCategory = '$dept'");
  echo '<div class="form-group">
        <label for="lang">Course Taken</label>
         <select class="form-control" name="course">
         <option></option>';
        
        
  while($cour = mysqli_fetch_array($q)){
    $course = $cour['CourseTitle'];
    $courseC = $cour['CourseCode'];
    $courseid = $cour['CourseId'];
    echo '<option value="'. $courseid.'">'.$course." || ".$courseC.'</option>';
}
echo '</select>
</div>';
}
?>