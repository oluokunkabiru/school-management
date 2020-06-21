<?php
         include("../includes/connection.php");
        if(isset($_GET['search'])){
            $id =1;
             echo '<div class="card-body">
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
               <tbody>"';
            $search =ucwords( $_GET['search']);
            $dept = $_GET['dept'];
            $qu = mysqli_query($conn, "SELECT* FROM student WHERE Department = '$dept' AND 
            (SurName LIKE '%$search%' OR LastName LIKE '%$search%' OR FirstName LIKE '%$search%' OR matricNo LIKE '%$search%'  
            OR Faculty LIKE '%$search%' OR  Phone_Number LIKE '%$search%' OR email LIKE '%$search%' OR gender LIKE '%$search%')  ");
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
                    <a href="resultprocessing.php?id='.$studentId.'">Upload Result</a>|<a href="studentDetails.php?id='.$studentId.'">Details</a>
                  </td>
                </tr>';
                
                $id++;
                    }
                
echo '  </tbody>
       </table>
    </div>';
              
}

?>