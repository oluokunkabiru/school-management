<?php
function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function check($row, $data){
      include('../includes/connection.php');
      $mys = "SELECT* FROM courses WHERE $row ='$data' ";
      $query = mysqli_query($conn, $mys);
      $num = mysqli_num_rows($query);
      return $num;
  }
  include('../includes/connection.php');
$error =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['title'])){
            array_push($error,'Enter Course Title');
        }
        
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['title'])) {
            array_push($error, "Only letters and white space allowed");
        }
        if(empty($_POST['code'])){
            array_push($error,'Enter Course Code');
        }
        // if (!preg_match("/^[a-zA-Z ]*$/",$_POST['code'])) {
        //     array_push($error, "Only letters and white space allowed");
        // }

        if(empty($_POST['unit'])){
            array_push($error,'Enter Course Unit');
        }
        
        if (!preg_match("/^[0-9]*$/",$_POST['unit'])) {
            array_push($error, "Only Number is allowed");
        }
        
        if(empty($_POST['desc'])){
            array_push($error,'Enter Course Description');
        }
        
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['desc'])) {
            array_push($error, "Only letters and white space allowed");
        }
         $existPhone = check("CourseTitle", $_POST['title']);
        
        
        if($existPhone != 0){
            
            array_push($error, "Course with this Title :".$_POST['title']. " Already Exist, Will you like to view the details  <a href='#' data-toggle='modal' data-dismiss='modal'>Login</a>?");
        }
        
        foreach($error as $errors){
            echo("$errors <br>");
        }

         if(count($error)==0){
             $last = "SELECT MAX(id) as lastId FROM courses";
             $q = mysqli_query($conn, $last);
             $lastI = mysqli_fetch_array($q);
             $lastId = $lastI['lastId'];
             $mess = md5($lastId+1);

             $Title =testinput($_POST['title']); 
             $code = testinput($_POST['code']);
             $unit = testinput($_POST['unit']);
             $desc = testinput($_POST['desc']);
             $level = testinput($_POST['level']);
             $department = testinput($_POST['dept']); 
             $CourseId = $mess;
            //  inserting the data into database
             $data = "INSERT INTO courses (id, CourseCode, CourseUnit, CourseTitle, CourseDesc, CourseLevel,
              CourseCategory, CourseId) VALUES 
             ('','$code','$unit','$Title', '$desc', '$level', '$department', '$CourseId')";
             $q = mysqli_query($conn, $data);
             if($q){
                 echo "<h2 class='text-success'>Register Successfully</h1>";
                //  header('location:AdminDashboard.php');
             }else{
                 echo "Fail to register".mysqli_error($conn);
             }

         }
    }
?>