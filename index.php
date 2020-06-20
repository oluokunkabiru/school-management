
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
    <div class="" id="slide">
      
    
        <h2 class="text-light pt-5 pb-5 text-center">OLUOKUN academy of Coding</h2>
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
    <div class="row">
      <div class="col-md-4">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-warning studentAdmission " >
            
            <!-- /.widget-user-image -->
            <h3 class=" text-light font-weight-bold">Student Admission</h3>
            <h5 class="widget-user-desc text-light font-weight-bold">in progress</h5>
          </div>
          <div class="card-footer p-2 pt-5">
           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod vero in debitis, quos, aliquid doloribus repellendus, impedit laborum praesentium exercitationem provident repellat at unde obcaecati. Consequuntur possimus aspernatur magnam accusantium?
           Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, excepturi? Amet cum aliquid, voluptatibus odio accusantium expedita maxime, in non ipsa, veniam sapiente. Nisi id minus ullam eius amet veritatis?
           <div class="card-link float-right"><a href="">Read More</a></div>
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username">Management speech</h3>
            <h5 class="widget-user-desc">Founder & CEO</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="image/doctor.png" alt="User Avatar">
          </div>
          <div class="card-footer">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam officia ipsam rem unde dicta tempora tempore voluptatum. Libero praesentium ex minima. Repellat minus odio molestiae iure esse at eos ullam?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis laborum aspernatur odio necessitatibus expedita eius perspiciatis ex blanditiis qui, rerum itaque dicta velit quod laudantium optio delectus molestias officiis voluptate.
            <div class="card-link float-right"><a href="">Read More</a></div>

             
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
      <!-- /.col -->
      <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header ourstaff text-center text-light font-weight-bold">
            <h2 class="widget-user-username  font-weight-bold">Our Staff are</h2>
            <h5 class="widget-user-desc font-weight-bold">very capable</h5>
          </div>
          
          <div class="card-footer">
           Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi, repellat. Officia fugit doloremque dolorem laborum sint perferendis quis? Porro hic possimus alias, aut quam dolore molestiae quod fuga magnam ipsum?
           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste at inventore possimus obcaecati praesentium! Quam rem harum quas beatae sequi minima repellendus, cupiditate perferendis pariatur deleniti reprehenderit id architecto vel.
           <div class="card-link float-right"><a href="">Read More</a></div>

            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
      <!-- /.col -->
    </div>
    <h1>Background Slideshow With Image Lazy Load Demo</h1>
    
    
  <img src="" alt="">

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

<img src="image/doctor.png" alt="">
<img src="image/staff.jpg" alt="">

</div>
</div>

</body>
</html>

<?php
    include('footer.php')
?>

<!-- sign up script -->
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
  $()
  function slider(){
    var image = ["image/doctor.png","image/staff.jpg" ];
    var ok = document.getElementById('slide');
    ok.style.backgroundImage=image[0];
    ok.innerHTML;
    
  }
  </script>