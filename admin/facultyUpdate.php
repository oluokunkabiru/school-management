<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include('header.php');
    include("../includes/connection.php");
    include('create.php');

    $user =$_SESSION['adminLogin'];
    $id = $_GET['id'];
    $stmt = "SELECT* FROM faculty WHERE FacultyId = '$id'";
    $qe = mysqli_query($conn, $stmt);
    $faculty = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper($faculty['name']));
  
    function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $error =[];
    // echo "file is". $_POST['profile_picture'];
    // display username
       
        // $id = $faculty['FacultyId'];
        $time = Date('Y-m-d-h-m-s');
        // define data to for update user profile
        // echo $time;
    
        if(isset($_POST['UpdateProfile'])){
            // echo $time.$time.$time;
            $profile_picture="";
            if(! empty($_POST['name'])){
            $name = testinput($_POST['name']);
            // echo $phone;

            }else{
                $name = $faculty['name'];
            }
            
            if(! empty($_POST['dean'])){
                $dean = testinput($_POST['dean']);
            }else{
                    $dean = $faculty['dean'];
                }
            
            
            
                
    
                
                    $target_dir = "logo/";
                   
                    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
                    $uploadOk = 1;
                    // echo $target_file."<br>";
    
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    // echo $imageFileType."<br>";
                    $newName =$target_dir. $name." (".$time.").".$imageFileType;
                    // echo "<br> $newName <br>";
                    if(!empty($imageFileType)){
                        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
                        if($check !== false) {
                            // array_push($error, "File is an image - " . $check["mime"] . ".");
                            $uploadOk = 1;
                        } else {
                            array_push($error, "File is not an image.");
                            $uploadOk = 0;
                        }
                    
                   
                    // Check file size
                    if ($_FILES["profile_picture"]["size"] > 5000000) {
                        array_push($error, "Sorry, your file is too large.");
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPEG"
                    && $imageFileType != "GIF"  && $imageFileType != "JPG" ) {
                        array_push($error, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        array_push($error, "Sorry, your file was not uploaded.");
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $newName)) {
                            // echo "The file ". basename( $_FILES["profile_picture"]["name"]). " has been uploaded.";
                        } else {
                            array_push($error, "Sorry, there was an error uploading your file.");
                        }
                    }
                }
                // get image directory
                    // update the database
                    if(!empty($imageFileType)){
                    $profile_picture = $newName;
                    // echo htmlentities( $profile_picture);
                    }else{
                            $profile_picture = $faculty['logo'];
                            // echo $profile_picture;
                        }
                    if(count($error)==0){
        
                    $update = "UPDATE faculty SET name = '$name',  dean = '$dean', logo = '$profile_picture' WHERE FacultyId = '$id' ";
                    $updat = mysqli_query($conn, $update);
                    // echo "<br> $profile_picture";
                    if($updat){
                        echo "<h2> Your data Update Succefully</h2";
                        header("location:facultyUpdate.php?id=$id");
                    }else{
                        echo "<h2 class = 'text-danger'> Fail to Update</h2>".mysqli_error($conn);
                    }
                    // echo $profile_picture;
                }
                }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:: edit <?php echo $faculty['name'] ?> Details</title>
    <link rel="stylesheet" href=>
</head>
<?php
    include('sidebar.php');
    ?>
<body>
    
<div class="content-wrapper">
 <div class="container-fluid">
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
        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid card-img"
                       src="<?php
                        if(!empty($faculty['logo'])){
                            echo htmlentities($faculty['logo']);
                        }else{
                            echo "../image/login.png";
                        }
                       ?>"
                       alt="User profile picture">
                       <div class="carousel-caption card-img-overlay">
                        <a href="#profilePicture"  data-toggle="modal"><span style="font-size: 40px;" class="bg-dark text-light"><i class="fa fa-upload"></i></span></a>
                    </div>
                </div>

                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
          <!-- /.col -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                
                  <h1 class="text-center btn btn-secondary btn-lg btn-block"> Faculty Details</h1>
 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                      
                          <ul class="list-group list-group-unbordered mb-3">
                          <?php
                          // echo $name;
                          
                        // $s  = explode(" ",($name));
                        // // echo $name;
                        // $surname =  $s[2];
                        // $firstname = $s[3];
                        // $lastname =  $s[4];
                        // echo "ehhhhol";
                      ?>
                          <li class="list-group-item">Faculty Name : <b><?php echo strtoupper($faculty['name'])?></b></li>
                          <li class="list-group-item">Faculty Dean : <b><?php echo ($faculty['dean'])?></b></li>
                          

                          
                         
                          </ul>
                        
                      </div>
                      <a href="#profiledetails" class="text-center btn btn-warning btn-lg" data-toggle="modal"> <span>Update Profile</span></a>
                      
                   </div>
                    <!-- /.post -->

                   
                  </div>
                  <!-- /.tab-pane -->
                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
<!-- profile picture -->
        <div class="modal fade" id="profilePicture">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Admin Profile Picture</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                       <form role="form" method="post"  enctype="multipart/form-data" id="upadateProfileDetails">
             
                <div class="modal-body">
                       
                            
                          <div class="form-group">
                            <label for="exampleInputFile">Choose Image</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" value="<?php echo $profile_picture; ?>" id="profile_picture" name="profile_picture">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                              
                            </div>
                          </div>
                          
                      
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"  name="UpdateProfile" id="UpdateProfile">Save changes</button>
                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>

          <!-- user text details dialog for updtate -->

          <div class="modal fade" id="profiledetails">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update <?php echo $name ?> Details</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post"  enctype="multipart/form-data" id="upadateProfileDetails">
                       
                        <div class="card-body">
                          <div class="form-group">
                            <label for="">Faculty Name</label>
                            <input type="text" class="form-control" id=""  name="name" value="<?php echo $faculty['name']?>">
                          </div>
                          
                          <div class="form-group">
                            <label for="">Dean</label>
                            <input type="text" class="form-control" id=""   name="dean" value="<?php echo $faculty['dean']?>">
                          </div>
                          
                           
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary"  name="UpdateProfile" id="UpdateProfile">Save changes</button>
                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        
      </div><!-- /.container-fluid -->
    </section>
    </div>
</div>
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
        function filePreview(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#upadateProfileDetails + img').remove();
                    $('#upadateProfileDetails').after('<img src="'+e.target.result+'" width="450" height="400"/>');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile_picture").change(function () {
            filePreview(this);
        });
          </script>
        
           <script>