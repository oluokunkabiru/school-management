<?php
         include("../includes/connection.php");
        //  get student details
        if(isset($_GET['student'])){
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
            $search =ucwords( $_GET['student']);
            $qu = mysqli_query($conn, "SELECT student.*, department.name AS dept, faculty.name AS faculty FROM 
            student INNER JOIN department ON student.Department = department.DepartmentId INNER JOIN faculty 
            ON student.Faculty = faculty.facultyId WHERE  
            SurName LIKE '%$search%' OR LastName LIKE '%$search%' OR FirstName LIKE '%$search%' OR matricNo LIKE '%$search%'  
            OR Faculty LIKE '%$search%' OR  Phone_Number LIKE '%$search%' OR email LIKE '%$search%' OR gender LIKE '%$search%'  ");
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
                    <a href="resultprocessing.php?id='.$studentId.'
                    ">Upload Result</a><p></p><a href="viewStudentResult.php?id='.$studentId.'&semester='.$semester.'&level='.$levels.'
                    ">Check Result</a><p></p><a href="studentDetails.php?id='.$studentId.'">View Details</a>
                  </td>
                </tr>';
                
                $id++;
                    }
                
echo '  </tbody>
       </table>
    </div>';
              
}



// get staff details

if(isset($_GET['staff'])){
  $id =1;
   echo '<div class="card-body">
   <table id="example1" class="table table-bordered table-striped">
     <thead>
     <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Email </th>
       <th>Phone No</th>
       <th>Course</th>
       <th>Dept</th>
       <th>Gender</th>
       <th>Image</th>
       <th>Action</th>
     </tr>
     </thead>
     <tbody>';
  $search =ucwords( $_GET['staff']);
  $qu = mysqli_query($conn, "SELECT staff.*, courses.CourseTitle AS courses,
  department.name AS dept FROM staff INNER JOIN courses ON staff.CourseTaken = courses.CourseId 
  INNER JOIN department ON staff.category = department.DepartmentId WHERE  
 staff.name LIKE '%$search%' OR department.name LIKE '%$search%' OR  staff.Phone_Number LIKE '%$search%' OR staff.email LIKE '%$search%' OR staff.gender LIKE '%$search%' OR courses.CourseTitle LIKE '%$search%'
  OR staff.state  LIKE '%$search%' OR staff.city  LIKE '%$search%' OR staff.address LIKE '%$search%'  ");
  while($staff = mysqli_fetch_array($qu)){
    $staf = (explode(",",$staff['name']));
    $name =strtoupper($staf[0]." ".$staf[1]." ".$staf[2]);
    $email = $staff['email'];
    $phone =$staff['Phone_Number'];
    $course ="";
    if(!empty($staff['CourseTaken'])){
      $course = $staff['courses'];
       }else{
       $course = "Not Yet Assign";
       }
      $dept ="";
      if(!empty($staff['category'])){
        $dept = $staff['dept'];
         }else{
         $dept =  "Not Yet Assingn";
         }
    $gender ="";
         if(!empty($staff['gender'])){
          $gender = $staff['gender'];
           }else{
           $gender = "Not Specify";
           }
    $profile ="";

    $staffId = $staff['StaffId'];
    $profile = $staff['profilePicture'];
     
      echo '     <tr>
      <td> '. $id .'</td>
      <td> '. $name.'</td>
      <td>  '. $email .'</td>
      <td>  '.$phone.'</td>
      <td>'. $course.'</td>
      <td>'.$dept .'</td>
      <td>'.$gender .'</td>
      <td>
        <img class="profile-user-img img-fluid img-circle"
             src= "../';
              if(!empty($profile)){
                echo  htmlentities($profile);
              }else{
                 echo  "<span style ='color:red'>Not Yet Set</span>";
              }
           echo ' "
             alt="Staff Image">
        </td>
      
      
        <td>
          <a href="staffDetails.php?id='.$staffId.'">View Details</a>|<a href="staffUpdateProfile.php?id='.$staffId.'">Update Details</a>
        </td>
      </tr>';
      
      $id++;
          }
      
echo '  </tbody>
</table>
</div>';
    
}


// department details
if(isset($_GET['dept'])){
  $id =1;
   echo '<div class="card-body">
   <table id="example1" class="table table-bordered table-striped">
     <thead>

     <tr>
     <th>ID</th>
     <th>Name</th>
     <th>Faculty </th>
     <th>HOD</th>
     <th>Action</th>
     </tr>
     </thead>
     <tbody>"';
  $search =ucwords( $_GET['dept']);
  $qu = mysqli_query($conn, "SELECT courses.CourseCode AS code, courses.CourseUnit AS unit,
  courses.CourseTitle AS title, courses.CourseDesc AS descs, courses.CourseLevel AS level,
  courses.logo AS logo, courses.CourseId AS cid, department.name AS dept, courses.courseReg_date
   AS approval FROM courses INNER JOIN department ON courses.CourseCategory = department.DepartmentId WHERE name LIKE '%$search%' OR hod  LIKE '%$search%' 
  OR FacultyCategory  LIKE '%$search%'  ");
  $id =1;
  while($dept = mysqli_fetch_array($qu)){
    $name = htmlentities(strtoupper($dept['name']));
    $deptId = $dept['DepartmentId'];
    $faculty = $dept['faculty'];
    $hod = $dept['hod'];
  
      echo '     <tr>
      <td> '. $id .'</td>
      <td> '. $name.'</td>
      <td>  '.$faculty.'</td>
      <td>  '.$hod.'</td> 
        <td>
          <a href="departmentDetails.php?id='.$deptId.'">View Details</a>|<a href="departmentUpdate.php?id='.$deptId.'">Details</a>
        </td>
      </tr>';
      
      $id++;
          }
      
echo '  </tbody>
</table>
</div>';
    
}


?>
