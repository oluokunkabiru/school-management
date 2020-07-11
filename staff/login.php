<?php
// session_start();
function testinput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
$error =[];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../includes/connection.php');
        if(empty($_POST['phone'])){
            array_push($error, "Please Enter your phone Number or Email");
        }
        if(empty($_POST['password'])){
            array_push($error, "Please enter your password ");
        }
        foreach($error as $errors){
            echo("$errors <br>");
        }

         if(count($error)==0){
             session_start();
             $email = testinput($_POST['phone']);
             $password =md5(testinput($_POST['password']));
             $mydata = "SELECT* FROM staff WHERE (email ='$email' OR Phone_Number = '$email') AND password ='$password' ";
             $query = mysqli_query($conn, $mydata);
             $dat = mysqli_fetch_array($query);
             if($dat['password']==$password){
                 $_SESSION['staffLogin'] = $email;
                echo "Login Successfully";
             }else{
                 echo "<h2 class='text-danger'> Failed to Login, Invalid Email or Password</h1>";
             }



         }
    }
?>