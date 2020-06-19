
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLUOKUN Academy::Home</title>
</head>
<?php
    include('sidebar.php')
    ?>
<body class = "hold-transition sidebar-mini layout-navbar-fixed">
  <?php
    include('header.php')
?>
<div class="content-wrapper">
    <!-- index image -->
    <div class="container-fluid indexwelcome">
        <h5 class="text-light pt-5 pb-5 text-center">OLUOKUN academy of Coding</h5>
        <div class="row">
            <div class="col-md-6 offset-2">
                <div id="demo" class="carousel slide text-light text-center" data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h2>We are developing student new Technology</h2>
                    </div>
                    <div class="carousel-item">
                        <h2>We are training student with Technology</h2>
                    </div>
                    <div class="carousel-item">
                        <h2>Education is the key to mordern World</h2>
                    </div>
                 </div>
         </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>

        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8 pt-5 pb-5">
                   <h1  class="text-light pt-5 pb-5">Better Education for A Better World</h1>
            </div>

            <div class="col-md-2">

            </div>
        </div>
      
    </div>
    <!-- /inde imge -->
    <?php 
    $a =2;
    while($a<20){
      echo "$a<br>";
      $a++;
    }
    ?>
<!-- register modal -->
<!-- <section>
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
        </div>
      </div>
</section> -->
<!-- /register modal -->
<!-- login -->
<section>
    <div class="modal fade" id="studentlogin">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Student Login</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container register">
                        <!-- <img src="image/login.png" alt="" class="rounded-circle mt-2"> -->
                        <p class="errorlogin"></p>
    
                            <form class="" action="" method="POST" id="studentLogin">
                               
                                <label for="email" class="mr-sm-2 mr-md-2">Email address or Phone Number:</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="phone" name="phone">
                                <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
                                <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
                            
                                <button type="submit" class="btn btn-primary mb-2 float-right" id="stdlogin" >Login</button>
                               <!-- <p class="text-center">Have No Account  <a href="#studentsignup"  data-toggle="modal" data-dismiss="modal">Register</a></p> -->
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
<!-- /login modal -->

<!-- staff login -->
<section>
    <div class="modal fade" id="stafftlogin">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Staff Login</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container register">
                        <!-- <img src="image/login.png" alt="" class="profile-user-img img-fluid img-circle mt-2 ml-5"> -->
                        <p class="errorlogin"></p>
    
                            <form class="" action="" method="POST" id="staffLogin">
                               
                                <label for="email" class="mr-sm-2 mr-md-2">Email address or Phone Number:</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="phone" name="phone">
                                <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
                                <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
                            
                                <button type="submit" class="btn btn-primary mb-2 float-right" id="stafflogin" >Login</button>
                               <!-- <p class="text-center">Have No Account  <a href="#studentsignup"  data-toggle="modal" data-dismiss="modal">Register</a></p> -->
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
<!-- /staff login -->


<!-- admin login -->
<section>
    <div class="modal fade" id="admintlogin">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title">Admin Login</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="container register">
                        <!-- <img src="image/login.png" alt="" class="profile-user-img img-fluid img-circle mt-2 ml-5"> -->
                        <p class="errorlogin"></p>
    
                            <form class="" action="" method="POST" id="adminLogin">
                               
                                <label for="email" class="mr-sm-2 mr-md-2">Email address or Phone Number:</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="phone" name="phone">
                                <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
                                <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
                            
                                <button type="submit" class="btn btn-primary mb-2 float-right" id="adminlogin" >Login</button>
                               <!-- <p class="text-center">Have No Account  <a href="#studentsignup"  data-toggle="modal" data-dismiss="modal">Register</a></p> -->
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
<!-- /admin -->



</div>
</div>

</body>
</html>

<?php
    include('footer.php')
?>

<!-- sign up script -->
<script>
    // $('#studentSignUp').click(function(event){
    //     event.preventDefault();
    // $.ajax({
    //     type:'POST',
    //     url: 'student/SignUp.php',
    //     data: $('#studentRegisterForm').serialize(),
    //     success: function (data) {
    //     var result=data;
    //     $(".errorsignup").html(result);
    //     if(result=="success"){
    //     window.alert('register successfully');
    //     }
    //     }
    // });
  
    // })
  </script>
  
  <!-- login script -->
  <script>
  $('#stdlogin').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'student/login.php',
      data: $('#studentLogin').serialize(),
      success: function (data) {
      var result=data;
      $(".errorlogin").html(result);
      if(result=="Login Successfully"){
        window.location.assign("student/StudentDashboard.php"); 
        
      }
      }
  });
  
  })

//   staff login

$('#stafflogin').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'staff/login.php',
      data: $('#staffLogin').serialize(),
      success: function (data) {
      var result=data;
      $(".errorlogin").html(result);
      if(result=="Login Successfully"){
        window.location.assign("staff/StaffDashboard.php"); 
        
      }
      }
  });
  
  })


//   admin login
$('#adminlogin').click(function(event){
      event.preventDefault();
  $.ajax({
      type:'POST',
      url: 'admin/login.php',
      data: $('#adminLogin').serialize(),
      success: function (data) {
      var result=data;
      $(".errorlogin").html(result);
      if(result=="Login Successfully"){
        window.location.assign("admin/AdminDashboard.php"); 
        
      }
      }
  });
  
  })
  </script>