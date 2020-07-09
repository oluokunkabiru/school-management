<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include("../includes/connection.php");

    $user =$_SESSION['adminLogin'];
    $id = $_GET['id'];
    $stmt = "SELECT* FROM courses WHERE CourseId = '$id'";
    $qe = mysqli_query($conn, $stmt);
    $courses = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper($courses['CourseTitle']));

    function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $error =[];
    // echo "file is". $_POST['profile_picture'];
    // display username
       
        // $id = $courses['FacultyId'];
        $time = Date('Y-m-d-h-m-s');
        // define data to for update user profile
        // echo $time;
    
        if(isset($_POST['UpdateProfile'])){
            // echo $time.$time.$time;
            $profile_picture="";
            if(! empty($_POST['title'])){
            $title = testinput($_POST['title']);
            // echo $phone;

            }else{
                $title = $courses['CourseTitle'];
            }
            
            if(! empty($_POST['code'])){
                $code = testinput($_POST['code']);
            }else{
                    $code = $courses['CourseCode'];
                }
             if(! empty($_POST['unit'])){
                $unit = testinput($_POST['unit']);
            }else{
                    $unit = $courses['CourseUnit'];
                }
             if(! empty($_POST['desc'])){
                $desc = testinput($_POST['desc']);
            }else{
                    $desc = $courses['CourseDesc'];
                }
             if(! empty($_POST['dept'])){
                $dept = testinput($_POST['dept']);
            }else{
                    $dept = $courses['CourseCategory'];
                }
             if(! empty($_POST['level'])){
                $level = testinput($_POST['level']);
            }else{
                    $level = $courses['CourseLevel'];
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
                            $profile_picture = $courses['logo'];
                            // echo $profile_picture;
                        }
                    if(count($error)==0){
        
                    $update = "UPDATE courses SET CourseTitle = '$title', CourseCode = '$code', CourseUnit = '$unit',
                    CourseLevel = '$level', CourseCategory = '$dept', CourseDesc = '$desc', logo = '$profile_picture' WHERE CourseId = '$id' ";
                    $updat = mysqli_query($conn, $update);
                    // echo "<br> $profile_picture";
                    if($updat){
                        echo "<h2> Your data Update Succefully</h2";
                        header("location:courseUpdate.php?id=$id");
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
    <title>Admin:: edit <?php echo $name ?> Details</title>
    <link rel="stylesheet" href=>
</head>
<?php
    include('header.php');

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
              <a href="manageStudent.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="manageStaff.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="manageCourse.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="manageDepartment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                        if(!empty($courses['logo'])){
                            echo htmlentities($courses['logo']);
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
                
                  <h1 class="text-center btn btn-secondary btn-lg btn-block"> Course Details</h1>
 
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
                          <li class="list-group-item">Course Title : <b><?php echo ($courses['CourseTitle'])?></b></li>
                          <li class="list-group-item">Course Code : <b><?php echo ($courses['CourseCode'])?></b></li>
                          <li class="list-group-item">Course Unit : <b><?php echo ($courses['CourseUnit'])?></b></li>
                          <li class="list-group-item">Course Description : <b><?php echo ($courses['CourseDesc'])?></b></li>
                          <li class="list-group-item">Course Level : <b><?php echo ($courses['CourseLevel'])?></b></li>
                          </ul>
                        
                      </div>
                      <a href="#profiledetails" class="text-center btn btn-warning btn-lg" data-toggle="modal"> <span>Update Course</span></a>
                      
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
                       
                    <label for="email" class="mr-sm-2 mr-md-2">Course Title:</label>
        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="title" name="title"
         value = "<?php 
              if(!empty($courses['CourseTitle'])){
               echo $courses['CourseTitle'];
               }else{
               echo "";
               }
        ?>">                        
        <label for="email" class="mr-sm-2 mr-md-2">Course Code:</label>
        <input type="text" class="form-control mb-2 mr-sm-2 mr-md-1" id="code" name="code"
        value = "<?php 
              if(!empty($courses['CourseCode'])){
               echo $courses['CourseCode'];
               }else{
               echo "";
               }
        ?>">   
        <label for="email" class="mr-sm-2 mr-md-2">Course Unit:</label>
        <input type="number" class="form-control mb-2 mr-sm-2 mr-md-1" id="unit" name="unit"
        value = "<?php 
              if(!empty($courses['CourseUnit'])){
               echo $courses['CourseUnit'];
               }else{
               echo "";
               }
        ?>">  
        <div class="form-group">
         <label for="lang">Course Category</label>
          <select class="form-control" id="level" name="level">
              <option selected value="<?php 
              if(!empty($courses['CourseLevel'])){
               echo $courses['CourseLevel'];
               }else{
               echo "";
               }
        ?>">   <?php 
        if(!empty($courses['CourseLevel'])){
         echo $courses['CourseLevel']." Level";
         }else{
         echo "";
         }
  ?>    </option>
            <option value="100">100 Level</option>
            <option value="200">200 Level</option>
            <option value="300">300 Level</option>
            <option value="400">400 Level</option>
            <option value="500">500 Level</option>
          </select>
         </div>
        <div class="form-group">
          <label for="comment">Course Description:</label>
          <textarea class="form-control" rows="5" id="desc" name="desc"><?php echo $courses['CourseDesc']; ?></textarea>
      </div>

        
        <div class="form-group">
         <label for="lang">Department Category</label>
            <select class="form-control" id="dept" name="dept">
              <?php
                $fac = mysqli_query($conn, "SELECT* FROM department");
                while( $department = mysqli_fetch_array($fac)){
              ?>
               <option value="<?php echo htmlspecialchars_decode($department['DepartmentId']);?>"><?php echo htmlspecialchars_decode($department['name']);?></option>
                <?php
              }
              ?>        
              </select>  
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