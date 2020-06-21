<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['adminLogin'];
    $stmt = "SELECT* FROM admin WHERE email = '$user'|| Phone_Number = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $admin = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper( $admin['name']));
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:: <?php echo $name ?> Dashboard</title>
    <link rel="stylesheet" href=>
</head>
<?php
    include('sidebar.php');
    ?>
<body>
    
<div class="content-wrapper">
    <!-- index image -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
            <?php
              $staff = mysqli_query($conn, "SELECT COUNT(id) AS totalStudent FROM student");
              $TotalStudent = mysqli_fetch_array($staff);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($TotalStudent['totalStudent']);?></h3>
                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <?php
              $staff = mysqli_query($conn, "SELECT COUNT(id) AS totalStaff FROM staff");
              $TotalStaff = mysqli_fetch_array($staff);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($TotalStaff['totalStaff']);?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <?php
              $staff = mysqli_query($conn, "SELECT COUNT(id) AS totalCourses FROM courses");
              $TotalCourse = mysqli_fetch_array($staff);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($TotalCourse['totalCourses']);?></h3>

                <p>Total Courses offered</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
            <?php
              $staff = mysqli_query($conn, "SELECT COUNT(id) AS totaldepartment FROM department");
              $Totaldepartment = mysqli_fetch_array($staff);
              ?>
              <div class="inner">
                <h3><?php echo htmlentities($Totaldepartment['totaldepartment']);?></h3>

                <p>Total Department</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
      
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
<!-- create new staff -->


<!-- add new studen -->
<!-- register modal -->

<!-- /register modal -->

<!-- new admin -->

<!-- /new admin -->

<!-- new faculty -->

<!-- /new faculty -->

<!-- new department -->

<!-- /new faculty -->

<!-- new course -->

<!-- /new course -->

<!-- register modal -->

<!-- /register modal --><!-- register modal -->

<!-- /register modal -->































    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <h2><?php echo $name ?></h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <img class="img-fluid card-img"
                       src="<?php
                        if(!empty($admin['profilePicture'])){
                            echo $admin['profilePicture'];
                        }else{
                            echo "../image/login.png";
                        }
                       ?>"
                       alt="Admin profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $name ?></h3>

                

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                
                  <h1 class="text-center btn btn-primary btn-lg btn-block"> Admin  Biodata</h1>
 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                          <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">Name : <b><?php echo strtoupper($admin['name'])?></b></li>
                          <li class="list-group-item">Phone No : <b><?php echo ($admin['Phone_Number'])?></b></li>
                          <li class="list-group-item">Email(school) : <b><?php echo ($admin['email'])?></b></li>
                          <i class="list-group-item">Date Of Birth : <b><?php echo ucfirst($admin['dob'])?></b></li>

                        </ul>
                         
                        
                      <!-- </div> -->
                      
                   <!-- </div> -->
                    <!-- /.post -->

                   
                  <!-- </div> -->
                  <!-- /.tab-pane -->
                  
                <!-- </div> -->
                <!-- /.tab-content -->
              <!-- </div>/.card-body -->
            <!-- </div> -->
            <!-- /.nav-tabs-custom -->
          <!-- </div> -->
          <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->
       
            <!-- /.nav-tabs-custom -->
      <!-- </div>/.container-fluid -->
    </section>
    <!-- </div> -->
<!-- </div> -->
<?php include('footer.php'); ?>
</body>
</html>
<?php
    
    }
    else{
        header('location:../index.php');
    }
    ?>
    <script>
      $('#addstaff').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'newStaff.php',
      data: $('#staffRegisterForm').serialize(),
      success: function (data) {
      var result=data;
      $(".errorCreate").html(result);
      if(result=="<h2 class='text-success'>Register Successfully</h1>"){
          
          setInterval(function(){
            location.reload();
          }, 1000);
          // alert("Registered");
        }
      }
  });
  
  })
// add new student
  $('#studentSignUp').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: '../student/SignUp.php',
        data: $('#studentRegisterForm').serialize(),
        success: function (data) {
        var result=data;
        $(".errorsignup").html(result);
        if(result=="<h2 class='text-success'>Register Successfully</h1>"){
          
          setInterval(function(){
            location.reload();
          }, 1000);
          // alert("Registered");
        }
        }
    });
  
    })

    // add new admin
    $('#addadmin').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'newAdmin.php',
        data: $('#adminRegisterForm').serialize(),
        success: function (data) {
        var result=data;
        $(".erroradmin").html(result);
        if(result=="<h2 class='text-success'>Register Successfully</h1>"){
          
          setInterval(function(){
            location.reload();
          }, 1000);
          // alert("Registered");
        }
        }
    });
  
    })

    // new faculty

    $('#addfaculty').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'newFaculty.php',
        data: $('#facultyRegisterForm').serialize(),
        success: function (data) {
        var result=data;
        $(".erroradmin").html(result);
        if(result=="<h2 class='text-success'>Register Successfully</h1>"){
          
          setInterval(function(){
            location.reload();
          }, 1000);
          // alert("Registered");
        }
        }
    });
  
    })

    $('#adddept').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'newdept.php',
        data: $('#deptRegisterForm').serialize(),
        success: function (data) {
        var result=data;
        $(".erroradmin").html(result);
        if(result=="<h2 class='text-success'>Register Successfully</h1>"){
          
          setInterval(function(){
            location.reload();
          }, 1000);
          // alert("Registered");
        }
        }
    });
  
    })


    // new course
    $('#addcourse').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'newCourse.php',
        data: $('#courseRegisterForm').serialize(),
        success: function (data) {
        var result=data;
        $(".erroradmin").html(result);
        if(result=="<h2 class='text-success'>Register Successfully</h1>"){
          
          setInterval(function(){
            location.reload();
          }, 1000);
          // alert("Registered");
        }
        }
    });
  
    })


     $('#studentSignUp').click(function(event){
        event.preventDefault();
    $.ajax({
        type:'POST',
        url: 'student/SignUp.php',
        data: $('#studentRegisterForm').serialize(),
        success: function (data) {
        var result=data;
        $(".errorsignup").html(result);
        if(result=="<h2 class='text-success'>Register Successfully</h1>"){
          setInterval(function(){
            location.reload();
          }, 1000);        }
        }
    });
  
    })
    </script>