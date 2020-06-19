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
<section>
  <div class="modal fade" id="newstaff">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New Staff</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
               
       <form class="" role="form" action="" method="POST" id="staffRegisterForm" >
        <div class="modal-body">
          <div class="card-body">
      <p class="errorCreate"></p>

       <label for="email" class="mr-sm-2 mr-md-2">Surname:</label>
       <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="sname" name="sname">
       <label for="email" class="mr-sm-2 mr-md-2">Firstname:</label>
       <input type="text" class="form-control mb-2 mr-sm-2" id="fname" name="fname">
       <label for="email" class="mr-sm-2 mr-md-2">Lastname:</label>
       <input type="text" class="form-control mb-2 mr-sm-2" id="lname" name="lname">
        <label for="email" class="mr-sm-2 mr-md-2">Phone Number:</label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="phone" name="phone">
        <label for="email" class="mr-sm-2 mr-md-2">Date of Birth:</label>
        <input type="date" class="form-control mb-2 mr-sm-2" id="dob" name="dob">
        <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
        <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
        <label for="pwd" class="mr-sm-2 mr-md-2">Confirm Password:</label>
        <input type="password" class="form-control mb-2 mr-sm-2" id="repassword" name="repassword">    
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary mb-2 float-right" id="addstaff" >Add Staff</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
</section>

<!-- add new studen -->
<!-- register modal -->
<section>
    <div class="modal fade" id="addnewstudent">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title text-center ">Add New Student</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container register">
                      <!-- <img src="image/register.png" alt="" class="rounded-circle mt-2"> -->
                    <p class="errorsignup"></p>
                    <form class="" action="" method="POST" id="studentRegisterForm" >
                       <label for="email" class="mr-sm-2 mr-md-2">Surname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="sname" name="sname">
                        <label for="email" class="mr-sm-2 mr-md-2">Firstname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="fname" name="fname">
                        <label for="email" class="mr-sm-2 mr-md-2">Lastname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="lname" name="lname">
                        <label for="email" class="mr-sm-2 mr-md-2">Phone Number:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" id="phone" name="phone">
                        <label for="email" class="mr-sm-2 mr-md-2">Date of Birth:</label>
                        <input type="date" class="form-control mb-2 mr-sm-2" id="dob" name="dob">
                        <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
                        <label for="pwd" class="mr-sm-2 mr-md-2">Confirm Password:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="repassword" name="repassword">
                        
                        <button type="submit" class="btn btn-primary mb-2 float-right" id="studentSignUp" >Sign Up</button>
                       <p class="text-center">Already Have Account  <a href="#studentlogin"  data-dismiss="modal" data-toggle="modal">Login</a></p>
                    </form> 
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</section>
<!-- /register modal -->

<!-- new admin -->
<section>
  <div class="modal fade" id="newadmin">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Create New Admin</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
               
       <form class="" role="form" action="" method="POST" id="adminRegisterForm" >
        <div class="modal-body">
          <div class="card-body">
      <p class="erroradmin"></p>

       <label for="email" class="mr-sm-2 mr-md-2">Surname:</label>
       <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="sname" name="sname">
       <label for="email" class="mr-sm-2 mr-md-2">Firstname:</label>
       <input type="text" class="form-control mb-2 mr-sm-2" id="fname" name="fname">
       <label for="email" class="mr-sm-2 mr-md-2">Lastname:</label>
       <input type="text" class="form-control mb-2 mr-sm-2" id="lname" name="lname">
        <label for="email" class="mr-sm-2 mr-md-2">Phone Number:</label>
        <input type="number" class="form-control mb-2 mr-sm-2" id="phone" name="phone">
        <label for="email" class="mr-sm-2 mr-md-2">Date of Birth:</label>
        <input type="date" class="form-control mb-2 mr-sm-2" id="dob" name="dob">
        <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
        <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
        <label for="pwd" class="mr-sm-2 mr-md-2">Confirm Password:</label>
        <input type="password" class="form-control mb-2 mr-sm-2" id="repassword" name="repassword">    
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary mb-2 float-right" id="addadmin" >Add Staff</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
</section>
<!-- /new admin -->

<!-- new faculty -->
<section>
  <div class="modal fade" id="newfaculty">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create New Faculty</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form class="" role="form" action="" method="POST" id="facultyRegisterForm" >
          <div class="modal-body">
            <div class="card-body">
        <p class="erroradmin"></p>

        <label for="email" class="mr-sm-2 mr-md-2">Name Of Faculty:</label>
        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="faculty" name="faculty">
        <label for="email" class="mr-sm-2 mr-md-2">Name of Dean</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="dean" name="dean">
        
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary mb-2 float-right" id="addfaculty" >Add Faculty</button>
            </div>
          </form>
          </div>
        <!-- /.modal-content -->
      </div>

</section>
<!-- /new faculty -->

<!-- new department -->
<section>
  <div class="modal fade" id="newdepartment">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create New Department</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form class="" role="form" action="" method="POST" id="deptRegisterForm" >
          <div class="modal-body">
            <div class="card-body">
        <p class="erroradmin"></p>

        <label for="email" class="mr-sm-2 mr-md-2">Name Of Department:</label>
        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="dept" name="dept">
        <label for="email" class="mr-sm-2 mr-md-2">Name of HOD</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="hod" name="hod">
        <div class="form-group">
         <label for="lang">Faculty Category</label>
            <select class="form-control" id="faculty" name="faculty">
              <?php
                $fac = mysqli_query($conn, "SELECT* FROM faculty");
                while( $faculty = mysqli_fetch_array($fac)){

              ?>
               <option value="<?php echo htmlspecialchars_decode($faculty['name']);?>"><?php echo htmlspecialchars_decode($faculty['name']);?></option>
                <?php
              }
              ?>        
              </select>  
            </div>                       
        
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary mb-2 float-right" id="adddept" >Add Faculty</button>
            </div>
          </form>
          </div>
        <!-- /.modal-content -->
      </div>

</section>
<!-- /new faculty -->

<!-- new course -->
<section>
  <div class="modal fade" id="newcourse">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Create New Course</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <form class="" role="form" action="" method="POST" id="courseRegisterForm" >
          <div class="modal-body">
            <div class="card-body">
        <p class="erroradmin"></p>

        <label for="email" class="mr-sm-2 mr-md-2">Course Title:</label>
        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="title" name="title">
        <label for="email" class="mr-sm-2 mr-md-2">Course Code:</label>
        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="code" name="code">
        <label for="email" class="mr-sm-2 mr-md-2">Course Unit:</label>
        <input type="number" class="form-control mb-2 mr-sm-2 mr-md-1" id="unit" name="unit">
        <div class="form-group">
         <label for="lang">Course Category</label>
          <select class="form-control" id="level" name="level">
            <option value="100">100 Level</option>
            <option value="200">200 Level</option>
            <option value="300">300 Level</option>
            <option value="400">400 Level</option>
            <option value="500">500 Level</option>
          </select>
         </div>
        <div class="form-group">
          <label for="comment">Course Description:</label>
          <textarea class="form-control" rows="5" id="desc" name="desc"></textarea>
      </div>

        
        <div class="form-group">
         <label for="lang">Department Category</label>
            <select class="form-control" id="dept" name="dept">
              <?php
                $fac = mysqli_query($conn, "SELECT* FROM department");
                while( $department = mysqli_fetch_array($fac)){
              ?>
               <option value="<?php echo htmlspecialchars_decode($department['name']);?>"><?php echo htmlspecialchars_decode($department['name']);?></option>
                <?php
              }
              ?>        
              </select>  
            </div>                       
        
          <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary mb-2 float-right" id="addcourse" >Add Course</button>
            </div>
          </form>
          </div>
        <!-- /.modal-content -->
      </div>

</section>
<!-- /new course -->

<!-- register modal -->
<section>
    <div class="modal fade" id="studentsignup">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title text-center ">Student Sign Up</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container register">
                      <!-- <img src="image/register.png" alt="" class="rounded-circle mt-2"> -->
                    <p class="errorsignup"></p>
                    <form class="" action="" method="POST" id="studentRegisterForm" >
                       <label for="email" class="mr-sm-2 mr-md-2">Surname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="sname" name="sname">
                        <label for="email" class="mr-sm-2 mr-md-2">Firstname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="fname" name="fname">
                        <label for="email" class="mr-sm-2 mr-md-2">Lastname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="lname" name="lname">
                        <label for="email" class="mr-sm-2 mr-md-2">Phone Number:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" id="phone" name="phone">
                        <label for="email" class="mr-sm-2 mr-md-2">Date of Birth:</label>
                        <input type="date" class="form-control mb-2 mr-sm-2" id="dob" name="dob">
                        <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
                        <label for="pwd" class="mr-sm-2 mr-md-2">Confirm Password:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="repassword" name="repassword">
                        
                        <button type="submit" class="btn btn-primary mb-2 float-right" id="studentSignUp" >Sign Up</button>
                       <p class="text-center">Already Have Account  <a href="#studentlogin"  data-dismiss="modal" data-toggle="modal">Login</a></p>
                    </form> 
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</section>
<!-- /register modal --><!-- register modal -->
<section>
    <div class="modal fade" id="addnewstudent">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title text-center ">Admit New Student</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container register">
                      <!-- <img src="image/register.png" alt="" class="rounded-circle mt-2"> -->
                    <p class="errorsignup"></p>
                    <form class="" action="" method="POST" id="studentRegisterForm" >
                       <label for="email" class="mr-sm-2 mr-md-2">Surname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="sname" name="sname">
                        <label for="email" class="mr-sm-2 mr-md-2">Firstname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="fname" name="fname">
                        <label for="email" class="mr-sm-2 mr-md-2">Lastname:</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="lname" name="lname">
                        <label for="email" class="mr-sm-2 mr-md-2">Phone Number:</label>
                        <input type="number" class="form-control mb-2 mr-sm-2" id="phone" name="phone">
                        <label for="email" class="mr-sm-2 mr-md-2">Date of Birth:</label>
                        <input type="date" class="form-control mb-2 mr-sm-2" id="dob" name="dob">
                        <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
                        <label for="pwd" class="mr-sm-2 mr-md-2">Confirm Password:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="repassword" name="repassword">
                        
                        <button type="submit" class="btn btn-primary mb-2 float-right" id="studentSignUp" >Sign Up</button>
                       <p class="text-center">Already Have Account  <a href="#studentlogin"  data-dismiss="modal" data-toggle="modal">Login</a></p>
                    </form> 
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
</section>
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