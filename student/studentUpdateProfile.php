<?php
     session_start();
     if(isset($_SESSION['studentLogin'])){
 
    include("../includes/connection.php");
    $user =$_SESSION['studentLogin'];
    $stmt = "SELECT student.*, department.name AS dept,department.DepartmentId AS deptid, faculty.name AS faculty , faculty.facultyId AS facultyid FROM 
    student INNER JOIN department ON student.Department = department.DepartmentId INNER JOIN faculty 
    ON student.Faculty = faculty.facultyId  WHERE email = '$user'|| Phone_Number = '$user'|| matricNo = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $student = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper( $student['SurName']." ".$student['FirstName']." ".$student['LastName']));

    function testinput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    $error =[];
    // display username
       
        $id = $student['StudentId'];
        $time = Date('Y-m-d-h-m-s');
        // define data to for update user profile
    
        if(isset($_POST['UpdateProfile'])){
            // echo $time.$time.$time;
            $profile_picture="";
            if(! empty($_POST['phone'])){
            $phone = testinput($_POST['phone']);
            // echo $phone;

            }else{
                $phone = $student['Phone_Number'];
            }
            if(! empty($_POST['address'])){
                $address = testinput($_POST['address']);
            }else{
                    $address = $student['Address'];
                }
            if(! empty($_POST['dob'])){
                $dob = testinput($_POST['dob']);
            }else{
                    $dob = $student['dob'];
                }
            if(! empty($_POST['nek'])){
                $nextOfKin = testinput($_POST['nek']);
            }else{
                    $nextOfKin = $student['NextOfKin'];
                }
            
            if(! empty($_POST['gender'])){
                $gender = testinput($_POST['gender']);
            }else{
                    $gender = $student['gender'];
                }
            if(! empty($_POST['state'])){
                $state = testinput($_POST['state']);
            }else{
                    $state = $student['state'];
                }
            if(! empty($_POST['city'])){
                $city= testinput($_POST['city']);
            }else{
                    $city = $student['city'];
                }
                
    
                
                    $target_dir = "Student Profile Pictures/";
                   
                    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
                    $uploadOk = 1;
                    // echo $target_file."<br>";
    
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Check if image file is a actual image or fake image
                    // echo $imageFileType."<br>";
                    $newName = $target_dir. $name." (".$time.").".$imageFileType;
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
                    echo htmlentities( $profile_picture);
                    }else{
                            $profile_picture = $student['profilePicture'];
                            echo $profile_picture;
                        }
                    if(count($error)==0){
                    $update = "UPDATE student SET Address = '$address', NextOfKin = '$nextOfKin', 
                    state = '$state', city = '$city',
                     gender = '$gender',  dob = '$dob',
                       profilePicture = '$profile_picture' WHERE StudentId = '$id' ";
                    $updat = mysqli_query($conn, $update);
                    echo "<br> $profile_picture";
                    if($updat){
                        echo "<h2> Your data Update Succefully</h2";
                        header("location:studentUpdateProfile.php");
                    }else{
                        echo "<h2 class = 'text-danger'> Fail to Update</h2>".mysqli_error($conn);
                    }
                    echo $profile_picture;
                }
                }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $student['SurName'] ?> Dashboard</title>
    <link rel="stylesheet" href=>
</head>
<?php
  include('header.php');
    include('sidebar.php');
    ?>
<body>
    
<div class="content-wrapper">
<div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="img-fluid card-img"
                       src="<?php
                        if(!empty($student['profilePicture'])){
                            echo htmlentities($student['profilePicture']);
                        }else{
                            echo "../image/login.png";
                        }
                       ?>"
                       alt="User profile picture">
                       <div class="carousel-caption card-img-overlay">
                        <a href="#profilePicture"  data-toggle="modal"><span style="font-size: 40px;" class="bg-dark text-light"><i class="fa fa-upload"></i></span></a>
                    </div>
                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item"><h3><b><?php echo $name ?></b></h3></li>
                    <li class="list-group-item">Department : <b><?php
                        if(!empty($student['dept'])){
                            echo htmlentities($student['dept']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                       <li class="list-group-item">Matric Number : <b><?php
                        if(!empty($student['matricNo'])){
                            echo htmlentities($student['matricNo']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                    <li class="list-group-item">Email(school) : <b><?php echo ($student['email'])?></b></li>
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
                
                  <h1 class="text-center btn btn-primary btn-lg btn-block"> Brief Biodata</h1>
 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                          <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">Surname : <b><?php echo strtoupper($student['SurName'])?></b></li>
                          <li class="list-group-item">Firstname : <b><?php echo ucfirst ($student['FirstName'])?></b></li>
                          <li class="list-group-item">Lastname : <b><?php echo ucfirst($student['LastName'])?></b></li>
                          <li class="list-group-item">Phone No : <b><?php echo ($student['Phone_Number'])?></b></li>
                          <li class="list-group-item">Email(school) : <b><?php echo ($student['email'])?></b></li>
                          <li class="list-group-item">Semester : <b><?php
                        if(!empty($student['CurrentSemester'])){
                            echo htmlentities($student['CurrentSemester']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Date of Birth : <b><?php
                        if(!empty($student['dob'])){
                            echo htmlentities($student['dob']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                       <li class="list-group-item">Gender: <b><?php
                        if(!empty($student['gender'])){
                            echo htmlentities($student['gender']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>

                          <li class="list-group-item">Level : <b><?php
                        if(!empty($student['Level'])){
                            echo htmlentities($student['Level']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Address : <b><?php
                        if(!empty($student['Address'])){
                            echo htmlentities($student['Address']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">City : <b><?php
                        if(!empty($student['city'])){
                            echo htmlentities($student['city']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">State: <b><?php
                        if(!empty($student['state'])){
                            echo htmlentities($student['state']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></li>
                          <li class="list-group-item">Next Of Kin : <b><?php
                        if(!empty($student['NextOfKin'])){
                            echo htmlentities($student['NextOfKin']);
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
                                <input type="file" class="custom-file-input" id="profile_picture" name="profile_picture">
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
                  <h4 class="modal-title">Details Update</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post"  enctype="multipart/form-data" id="upadateProfileDetails">
                       
                        <div class="card-body">
                            <div class="form-group">
                                <label>Phone Number</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="text" class="form-control" name="phone" data-inputmask='"mask": "(999) 999-9999-999"' data-mask>
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
                                      if(!empty($student['dob'])){
                                          echo $student['dob'];
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
                                    <option value="<?php echo htmlspecialchars_decode($student['gender'])?>" selected><?php echo htmlspecialchars_decode($student['gender'])?></option>
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
                                      if(!empty($student['Address'])){
                                          echo $student['Address'];
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
                                      if(!empty($student['city'])){
                                          echo $student['city'];
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
                                      if(!empty($student['state'])){
                                          echo $student['state'];
                                      }else{
                                          echo "";
                                      }
                                      ?>
                                ">
                              </div>

                              <div class="form-group">
                                <label for="">Next of Kin</label>
                                <input type="text" class="form-control" name="nek" id="" value="
                                <?php 
                                      if(!empty($student['NextOfKin'])){
                                          echo $student['NextOfKin'];
                                      }else{
                                          echo "";
                                      }
                                      ?>
                                ">
                              </div>
                              <div class="form-group">
                                <label for="">Surname</label>
                                <input type="text" class="form-control" id="" disabled name="" value="<?php echo $student['SurName']?>">
                              </div>
                              <div class="form-group">
                                <label for="">Firstname</label>
                                <input type="text" class="form-control" id="" disabled name="" value="<?php echo $student['FirstName']?>">
                              </div>
                              <div class="form-group">
                                <label for="">Lastname</label>
                                <input type="text" class="form-control" id="" disabled name="" value="<?php echo $student['LastName']?>">
                              </div>
                              <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="" disabled name="" value="<?php echo $student['email']?>">
                              </div>
                              <div class="form-group">
                                <label for="">Level</label>
                                <input type="number" class="form-control" id="" disabled name="" value="<?php 
                                        if(!empty($student['Level'])){
                                            echo $student['Level'];
                                        }else{
                                            echo "";
                                        }
                                        ?>">
                              </div>
                              <div class="form-group">
                                <label for="">Semester</label>
                                <input type="text" class="form-control" id="" disabled name="" value="<?php 
                                        if(!empty($student['CurrentSemester'])){
                                            echo $student['CurrentSemester'];
                                        }else{
                                            echo "";
                                        }
                                        ?>">
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