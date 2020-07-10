<?php
function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function check($row, $data){
      include('../includes/connection.php');
      $mys = "SELECT* FROM student WHERE $row ='$data' ";
      $query = mysqli_query($conn, $mys);
      $num = mysqli_num_rows($query);
      return $num;
  }
  include('../includes/connection.php');
$error =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(empty($_POST['sname'])){
            array_push($error,'Enter your Surname');
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['sname'])) {
            array_push($error, "Only letters and white space allowed");
        }
        if(empty($_POST['fname'])){
            array_push($error,'Enter your Firstname');
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['fname'])) {
            array_push($error, "Only letters and white space allowed");
        }
        if(empty($_POST['lname'])){
            array_push($error,'Enter your Lastname');
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST['lname'])) {
            array_push($error, "Only letters and white space allowed");
        }
        if(empty($_POST['phone'])){
            array_push($error,'Enter your Phone Number ');
        }
        if (!preg_match("/^[0-9]*$/",$_POST['phone'])) {
            array_push($error, "Only Numbers allowed");
        }
        if(empty($_POST['faculty'])){
            array_push($error,'Please Select Faculty');
        }
        if(empty($_POST['dept'])){
            array_push($error,'Please Select Department');
        }
         $existPhone = check("Phone_Number", $_POST['phone']);
        if($existPhone != 0){
            
            array_push($error, "Student with this Phone Number :".$_POST['phone']. " Already Exist, Will you like to  <a href='#studentlogin' data-toggle='modal' data-dismiss='modal'>Login</a>?");
        }
        
        if(empty($_POST['password'])){
            array_push($error, "Please choose Password required ");
        }
        if(strlen($_POST['password'])<5){
            array_push($error, "Password must greater than 5 characters");
        }
        if(empty($_POST['repassword'])){
            array_push($error, "Please Confirm your Password required ");
        }
        if($_POST['password'] != $_POST['repassword']){
            array_push($error, "Password miss matched");
        }
        foreach($error as $errors){
            echo("$errors <br>");
        }

         if(count($error)==0){
             $last = "SELECT MAX(id) as lastId, MAX(matricNo) as matric FROM student";
             $q = mysqli_query($conn, $last);
             $lastI = mysqli_fetch_array($q);
             $lastId = $lastI['lastId'];
             $prema = $lastI['matric'];
             $mess = md5($lastId+1);
             $ges = Date('y');
             $ge = $ges."0000";
             $matric ="";
             if($prema < 1){
                 $matric = $ge;
             }else{
                 $matric = ($prema+1);
             }
             $sname = testinput($_POST['sname']);
             $fname = testinput($_POST['fname']);
             $lname = testinput($_POST['lname']);
             $faculty = testinput($_POST['faculty']);
             $dept = testinput($_POST['dept']);
             $gen = strtolower($sname[0].$fname[0].$lname[0].$fname."@student.oic.org");
             $email = $gen;
             $phone = testinput($_POST['phone']);
             $password = md5(testinput($_POST['password']));
             $studentId = $mess;
            //  inserting the data into database
             $data = "INSERT INTO student (id, SurName, FirstName, LastName, email, Phone_Number, matricNo, password,Department, Faculty, StudentId) VALUES 
             ('','$sname','$fname','$lname','$email','$phone', '$matric', '$password','$dept', '$faculty', '$studentId')";
             $q = mysqli_query($conn, $data);
             if($q){
                 echo "<h2 class='text-success'>Register Successfully</h1>";
             }else{
                 echo "Fail to register". mysqli_error($conn) ;
             }

         }
    }
?>