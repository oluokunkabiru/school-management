<?php
function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function check($row, $data){
      include('../includes/connection.php');
      $mys = "SELECT* FROM faculty WHERE $row ='$data' ";
      $query = mysqli_query($conn, $mys);
      $num = mysqli_num_rows($query);
      return $num;
  }
  include('../includes/connection.php');
$error =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['dept'])){
            array_push($error,'Enter Department Name');
        }
        
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['dept'])) {
            array_push($error, "Only letters and white space allowed");
        }
        if(empty($_POST['faculty'])){
            array_push($error,'Select Faculty Category');
        }
        
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['faculty'])) {
            array_push($error, "Only letters and white space allowed");
        }
        if(empty($_POST['hod'])){
            array_push($error,'Enter HOD Name');
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['hod'])) {
            array_push($error, "Only letters and white space allowed");
        }
        
         $existPhone = check("name", $_POST['dept']);
         
         
        
        
        if($existPhone != 0){
            
            array_push($error, "Staff with this Phone Number :".$_POST['dept']. " Already Exist, Will you like to view the details  <a href='#' data-toggle='modal' data-dismiss='modal'>Login</a>?");
        }
        
        foreach($error as $errors){
            echo("$errors <br>");
        }

         if(count($error)==0){
             $last = "SELECT MAX(id) as lastId FROM Department";
             $q = mysqli_query($conn, $last);
             $lastI = mysqli_fetch_array($q);
             $lastId = $lastI['lastId'];
             $mess = md5($lastId+1);
             
             $faculty = testinput($_POST['faculty']);
             $name = testinput($_POST['dept']);
             $hod = testinput($_POST['hod']);
             
             $DepartmentId = $mess;
            //  inserting the data into database
             $data = "INSERT INTO Department (id, name, hod, FacultyCategory,DepartmentId) VALUES 
             ('','$name','$hod','$faculty', '$DepartmentId')";
             $q = mysqli_query($conn, $data);
             if($q){
                 echo "<h2 class='text-success'>Register Successfully</h1>";
             }else{
                 echo "Fail to register".mysqli_error($conn);
             }

         }
    }
?>