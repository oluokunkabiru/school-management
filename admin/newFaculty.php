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

        if(empty($_POST['faculty'])){
            array_push($error,'Enter Faculty Name');
        }
        
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['faculty'])) {
            array_push($error, "Only letters and white space allowed");
        }
        if(empty($_POST['dean'])){
            array_push($error,'Enter dean Name');
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['dean'])) {
            array_push($error, "Only letters and white space allowed");
        }
        
         $existPhone = check("name", $_POST['faculty']);
        
        
        if($existPhone != 0){
            
            array_push($error, "Staff with this Phone Number :".$_POST['faculty']. " Already Exist, Will you like to view the details  <a href='#' data-toggle='modal' data-dismiss='modal'>Login</a>?");
        }
        
        foreach($error as $errors){
            echo("$errors <br>");
        }

         if(count($error)==0){
             $last = "SELECT MAX(id) as lastId FROM faculty";
             $q = mysqli_query($conn, $last);
             $lastI = mysqli_fetch_array($q);
             $lastId = $lastI['lastId'];
             $mess = md5($lastId+1);
             
             $name = testinput($_POST['faculty']);
             $dean = testinput($_POST['dean']);
             
             $FacultyId = $mess;
            //  inserting the data into database
             $data = "INSERT INTO faculty (id, name, dean, FacultyId) VALUES 
             ('','$name','$dean', '$FacultyId')";
             $q = mysqli_query($conn, $data);
             if($q){
                 echo "<h2 class='text-success'>Register Successfully</h1>";
             }else{
                 echo "Fail to register".mysqli_error($conn);
             }

         }
    }
?>