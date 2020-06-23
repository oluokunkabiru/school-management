<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include("../includes/connection.php");
    // include('create.php');

    $user =$_SESSION['adminLogin'];
    $id = $_GET['id'];
    $stmt = "SELECT* FROM staff WHERE StaffId = '$id'";
    $qe = mysqli_query($conn, $stmt);
    $staffs = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper($staffs['name']));
  $s  = explode(",",($name));
           // echo $name;
                        $surname =  $s[0];
                        $firstname = $s[1];
                        $lastname =  $s[2];
                        // echo "ehhhhol";
                        $staffname = $firstname." ".$lastname." ".$surname;  

    function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $error =[];
    // echo "file is". $_POST['profile_picture'];
    // display username
       
        $id = $staffs['StaffId'];
        $time = Date('Y-m-d-h-m-s');
        // define data to for update user profile
        // echo $time;
    
        if(isset($_POST['UpdateProfile'])){
            // echo $time.$time.$time;
            $profile_picture="";
            if(! empty($_POST['phone'])){
            $phone = testinput($_POST['phone']);
            // echo $phone;

            }else{
                $phone = $staffs['Phone_Number'];
            }
            if(! empty($_POST['faculty'])){
              $faculty = testinput($_POST['faculty']);
              // echo $phone;
  
              }else{
                  $faculty = $staffs['faculty'];
              }
            if(! empty($_POST['email'])){
              $email = strtolower(testinput($_POST['email']));
              // echo $phone;
  
              }else{
                  $email =strtolower($staffs['email']);
              }
             if(! empty($_POST['sname'])){
              $sname = strtolower(testinput($_POST['sname']));
              // echo $phone;
  
              }else{
                  $sname =$surname;
              }

              if(! empty($_POST['fname'])){
                $fname = strtolower(testinput($_POST['fname']));
                // echo $phone;
    
                }else{
                    $fname =$firstname;
                }
              if(! empty($_POST['lname'])){
              $lname = strtolower(testinput($_POST['lname']));
              // echo $phone;
  
              }else{
                  $lname =$lastname;
              }
            if(! empty($_POST['address'])){
                $address = testinput($_POST['address']);
            }else{
                    $address = $staffs['address'];
                }
            if(! empty($_POST['dob'])){
                $dob = testinput($_POST['dob']);
            }else{
                    $dob = $staffs['dob'];
                }
            
            if(! empty($_POST['gender'])){
                $gender = testinput($_POST['gender']);
            }else{
                    $gender = $staffs['gender'];
                }
            if(! empty($_POST['state'])){
                $state = testinput($_POST['state']);
            }else{
                    $state = $staffs['state'];
                }
            if(! empty($_POST['city'])){
                $city= testinput($_POST['city']);
            }else{
                    $city = $staffs['city'];
                }
            if(! empty($_POST['sname'])){
                $sname= testinput($_POST['sname']);
            }
            if(! empty($_POST['lname'])){
                $lname= testinput($_POST['lname']);
            }
            if(! empty($_POST['fname'])){
                $fname= testinput($_POST['fname']);
            }
              
            if(! empty($_POST['course'])){
                $course= testinput($_POST['course']);
            }else{
                    $course = $staffs['CourseTaken'];
                }
              
              if(! empty($_POST['dept'])){
                $dept= testinput($_POST['dept']);
            }else{
                    $dept = $staffs['category'];
                }
            
                
    
                
                    $target_dir = "Staff Profile Pictures/";
                   
                    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
                    $uploadOk = 1;
                    // echo $target_file."<br>";
    
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    // echo $imageFileType."<br>";
                    $newName ="../staff/". $target_dir. $name." (".$time.").".$imageFileType;
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
                            $profile_picture = $staffs['profilePicture'];
                            // echo $profile_picture;
                        }
                    if(count($error)==0){
                      $names = $fname.",".$lname.",".$sname;
                    $update = "UPDATE staff SET Address = '$address', faculty = '$faculty', name ='$names', CourseTaken = '$course', category = '$dept', 
                      state = '$state', city = '$city', email = '$email', gender = '$gender',  dob = '$dob',
                       profilePicture = '$profile_picture' WHERE StaffId = '$id' ";
                    $updat = mysqli_query($conn, $update);
                    // echo "<br> $profile_picture";
                    if($updat){
                        echo "<h2> Your data Update Succefully</h2";
                        header("location:staffUpdateProfile.php?id=$id");
                    }else{
                        echo "<h2 class = 'text-danger'> Fail to Update</h2>".mysqli_error($conn);
                    }
                    // echo $profile_picture;
                }
                }
    ?>
    
                  <?php
                          // echo $name;
                          
                        
                      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:: edit <?php echo $staffname?> Details</title>
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
                       src="../staff/<?php
                        if(!empty($staffs['profilePicture'])){
                            echo htmlentities($staffs['profilePicture']);
                        }else{
                            echo "../image/login.png";
                        }
                       ?>"
                       alt="User profile picture">
                       <div class="carousel-caption card-img-overlay">
                        <a href="#profilePicture"  data-toggle="modal"><span style="font-size: 40px;" class="bg-dark text-light"><i class="fa fa-upload"></i></span></a>
                    </div>
                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item"><h3><b><?php echo strtoupper($staffname)?></b></h3></li>
                    <li class="list-group-item">Matric Number : <b><?php
                        if(!empty($student['matricNo'])){
                            echo htmlentities($student['matricNo']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                   <li class="list-group-item">Department : <b><?php
                        if(!empty($staffs['category'])){
                            echo htmlentities($staffs['category']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                    <li class="list-group-item">Email(school) : <b><?php echo ($staffs['email'])?></b></li>
                    </ul>

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
                
                  <h1 class="text-center btn btn-success btn-lg btn-block"> Brief Biodata</h1>
 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                      
                          <ul class="list-group list-group-unbordered mb-3">
                          
                          <li class="list-group-item">Staff Name : <b><?php echo strtoupper($staffname)?></b></li>
                          <li class="list-group-item">Phone No : <b><?php echo ($staffs['Phone_Number'])?></b></li>
                          <li class="list-group-item">Email(school) : <b><?php echo ($staffs['email'])?></b></li>
                          <li class="list-group-item">Department : <b><?php
                        if(!empty($staffs['category'])){
                            echo htmlentities($staffs['category']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Date of Birth : <b><?php
                        if(!empty($staffs['dob'])){
                            echo htmlentities($staffs['dob']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                       <li class="list-group-item">Gender: <b><?php
                        if(!empty($staffs['gender'])){
                            echo htmlentities($staffs['gender']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>

                          <li class="list-group-item">Course Taken : <b><?php
                        if(!empty($staffs['CourseTaken'])){
                            echo htmlentities($staffs['CourseTaken']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Address : <b><?php
                        if(!empty($staffs['Address'])){
                            echo htmlentities($staffs['Address']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">City : <b><?php
                        if(!empty($staffs['city'])){
                            echo htmlentities($staffs['city']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">State: <b><?php
                        if(!empty($staffs['state'])){
                            echo htmlentities($staffs['state']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                         
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
                  <h4 class="modal-title">Profile Picture</h4>
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
                            <label for="">Surname</label>
                            <input type="text" class="form-control" id=""  name="sname" value="<?php echo $surname?>">
                          </div>
                          <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" class="form-control" id=""  name="fname" value="<?php echo $firstname?>">
                          </div>
                          <div class="form-group">
                            <label for="">Lastname</label>
                            <input type="text" class="form-control" id=""  name="lname" value="<?php echo $lastname ?>">
                          </div>
                          <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id=""   name="email" value="<?php echo strtolower($staffs['email'])?>">
                          </div>
                          
                          

                          <div class="form-group">
                            <label for="lang">Faculty</label>
                                <select class="form-control"  name="faculty"  onchange="facult(this.value)">
                                  
                                  
                                <option selected value="<?php 
                                      if(!empty($staffs['faculty'])){
                                          echo $staffs['faculty'];
                                      }
                                      ?>"><?php 
                                      if(!empty($staffs['faculty'])){
                                          echo $staffs['faculty'];
                                      }
                                      $q = mysqli_query($conn, "SELECT* FROM faculty");
                                      while($fac = mysqli_fetch_array($q)){
                                        $fa = $fac['name'];
  
                                      
                                      ?>
                                    
                                  </option>
                                  <option value="<?php echo $fa ?>"><?php echo $fa ?></option>
                                      <?php } ?>                                
                                </select>
                            </div>    
                      <!-- </div> -->
                      <div class="form-group " id="dept">
                          <label for="lang">Department</label>
                              <select class="form-control" name="dept" onchange="deptmt(this.value)">
                                
                                
                              <option selected value="<?php 
                                    if(!empty($staffs['Department'])){
                                        echo $staffs['Department'];
                                    }
                                    ?>"><?php 
                                    if(!empty($staffs['category'])){
                                        echo $staffs['category'];
                                    }
                                   
                                    ?>
                                  
                                </option>
                                <!-- <option id="dept"> -->
                              </select>
                          </div>
                          
                          <div class="form-group" id="coursetaken">
                            <label for="lang">Course Taken</label>
                              <select class="form-control" name="course">
                                <option selected value="<?php 
                                if(!empty($staffs['CourseTaken'])){
                                    echo $staffs['CourseTaken'];
                                }
                                ?>"><?php 
                                if(!empty($staffs['CourseTaken'])){
                                    echo $staffs['CourseTaken'];
                                }
                      
                                ?>
                                  </option>
                              </select>
                            </div>
                      <!-- </div> -->
                  
                            <div class="form-group">
                                <label>Phone Number</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="tel" class="form-control" value ="<?php echo htmlentities($staffs['Phone_Number']);?>" name="phone" data-inputmask='"mask": "(999) 999-9999-999"' data-mask>
                                </div>
                                <!-- /.input group -->
                              </div>
                            <div class="form-group">
                                <label>Date of birth</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                  </div>
                                  <input type="date" name="dob" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="
                                  <?php 
                                      if(!empty($staffs['dob'])){
                                          echo $staffs['dob'];
                                      }else{
                                          echo "";
                                      }
                                      ?>
                                  ">
                                </div>
                                <!-- /.input group -->
                              </div>
                              <div class="form-group">
                                <label for="lang">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="<?php echo htmlspecialchars_decode($staffs['gender'])?>" selected><?php echo htmlspecialchars_decode($staffs['gender'])?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Not Specify">Not Specify</option>
                                </select>
                             </div>

                              <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                  <label>Address</label>
                                  <textarea class="form-control" name="address" rows="3" placeholder="Enter ...">
                                      <?php 
                                      if(!empty($staffs['Address'])){
                                          echo $staffs['Address'];
                                      }else{
                                          echo "";
                                      }
                                      ?>
                                  </textarea>
                                </div>
                                


                              </div>

                              <div class="form-group">
                                <label for="">City</label>
                                <input type="text" class="form-control" name="city" id="" value="
                                <?php 
                                      if(!empty($staffs['city'])){
                                          echo $staffs['city'];
                                      }else{
                                          echo "";
                                      }
                                      ?>
                                ">
                              </div>

                              <div class="form-group">
                                <label for="">State</label>
                                <input type="text" class="form-control" name="state" id="" value="
                                <?php 
                                      if(!empty($staffs['state'])){
                                          echo $staffs['state'];
                                      }else{
                                          echo "";
                                      }
                                      ?>
                                ">
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


function facult(str) {
    if (str.length == 0) {
        document.getElementById("dept").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("dept").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "facultyDetails.php?staffFaculty=" + str, true);
        xmlhttp.send();
    }
}

function deptmt(str) {
    if (str.length == 0) {
        document.getElementById("coursetaken").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("coursetaken").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "facultyDetails.php?staffDept=" + str, true);
        xmlhttp.send();
    }
}
</script>
        
         