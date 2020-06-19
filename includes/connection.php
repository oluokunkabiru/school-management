<?php
    $server ="localhost";
    $user = "root";
    $password ="";
    $con = mysqli_connect($server, $user, $password);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $databse ="";
    $db = "CREATE DATABASE IF NOT EXISTS School";
    $query = mysqli_query($con, $db);
    if($query){
        echo "";
        $databse ="school";
    }else{
        echo "Fail to create Database BLOG" .mysqli_error($con);
    }
    
    $conn =  mysqli_connect($server, $user, $password,$databse);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "";
    }
// users table
   $myuser = "CREATE TABLE IF NOT EXISTS Admin (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        Phone_Number VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        profilePicture text,
        AdminId VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP
   )";
   if (mysqli_query($conn, $myuser)) {
    echo "";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
// end of users table

// post table
$myuser = "CREATE TABLE IF NOT EXISTS staff (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        Phone_Number VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        CourseTaken VARCHAR(50) NOT NULL,
        category VARCHAR(50) NOT NULL,
        state VARCHAR(50) NOT NULL,
        city VARCHAR(50) NOT NULL,
        gender VARCHAR(50) NOT NULL,
        dob VARCHAR(50) NOT NULL,
        profilePicture VARCHAR(50) NOT NULL,
        StaffId VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP
)";
if (mysqli_query($conn, $myuser)) {
echo "";
} else {
echo "Error creating table: " . mysqli_error($conn);
}
// end of post table

// table comment
$comment = "CREATE TABLE IF NOT EXISTS Student (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        SurName VARCHAR(30) NOT NULL,
        FirstName VARCHAR(30) NOT NULL,
        LastName VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        Phone_Number VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        Level VARCHAR(50) NOT NULL,
        matricNo VARCHAR(10) NOT NULL,
        CurrentSemester VARCHAR(30) NOT NULL,
        Department VARCHAR(255) NOT NULL,
        Faculty VARCHAR(50) NOT NULL,
        state VARCHAR(50) NOT NULL,
        city VARCHAR(50) NOT NULL,
        Address VARCHAR(50) NOT NULL,
        dob VARCHAR(50) NOT NULL,
        gender VARCHAR(50) NOT NULL,
        StudentId VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP
)";
if (mysqli_query($conn, $comment)) {
echo "";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

$message = "CREATE TABLE IF NOT EXISTS courses (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    CourseCode VARCHAR(255) NOT NULL,
    CourseUnit VARCHAR(255) NOT NULL,
    CourseTitle VARCHAR(255) NOT NULL,
    CourseDesc VARCHAR(255) NOT NULL,
    logo text NOT NULL,

    CourseId VARCHAR(50) NOT NULL,
    courseReg_date TIMESTAMP
)";
if (mysqli_query($conn, $message)) {
echo "";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

$message = "CREATE TABLE IF NOT EXISTS faculty (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    dean VARCHAR(255) NOT NULL,
    logo text NOT NULL,
    facultyId VARCHAR(50) NOT NULL,
    FacultyReg_date TIMESTAMP
)";
if (mysqli_query($conn, $message)) {
echo "";
} else {
echo "Error creating table: " . mysqli_error($conn);
}



$message = "CREATE TABLE IF NOT EXISTS RegisteredCourse (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    student VARCHAR(255) NOT NULL,
    studentId VARCHAR(50) NOT NULL,
    matricNo VARCHAR(50) NOT NULL,    
    courseTitle text NOT NULL,
    courseUnit VARCHAR(255) NOT NULL,
    courseCode VARCHAR(255) NOT NULL,   
    courseId text NOT NULL,    
    CourseReg_date TIMESTAMP
)";
if (mysqli_query($conn, $message)) {
echo "";
} else {
echo "Error creating table: " . mysqli_error($conn);
}


$message = "CREATE TABLE IF NOT EXISTS Department (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    hod VARCHAR(255) NOT NULL,
    FacultyCategory VARCHAR(255) NOT NULL,  
    logo VARCHAR(50) NOT NULL,  
    DepartmentId VARCHAR(50) NOT NULL,
    DepartmentReg_date TIMESTAMP
)";
if (mysqli_query($conn, $message)) {
echo "";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

?>