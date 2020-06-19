<?php
    include("../includes/connection.php");

if(isset($_GET['level'])){
    $department = $_GET['dept'];
    $level =$_GET['level'];
    $id =1;
    echo "<tbody>";
    $qu = mysqli_query($conn, "SELECT * FROM student WHERE Department='$department' AND Level = '$level'");
            while($student = mysqli_fetch_array($qu)){
                $name = $student['SurName']." ".$student['FirstName']." ".$student['LastName'];
                $matric = $student['matricNo'];
                $levels = $student['Level'];
                $studentId = $student['StudentId'];
                $faculty = $student['Faculty'];
                $semester = $student['CurrentSemester'];
                $department = $student['Department'];
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
?>