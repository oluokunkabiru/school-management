<?php
     session_start();
     if(isset($_SESSION['studentLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $user =$_SESSION['studentLogin'];
    $stmt = "SELECT* FROM student WHERE email = '$user'|| Phone_Number = '$user'|| matricNo = '$user'";
    $qe = mysqli_query($conn, $stmt);
    $student = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper( $student['SurName']." ".$student['FirstName']." ".$student['LastName']));
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
    include('sidebar.php');
    ?>
<body>
    
<div class="content-wrapper">
    <!-- index image -->


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
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php
                        if(!empty($student['profilePicture'])){
                            echo htmlentities($student['profilePicture']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $name ?></h3>
                <p class="text-mute text-center">Matric Number : <b><?php
                        if(!empty($student['matricNo'])){
                            echo htmlentities($student['matricNo']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></p>
                <p class="text-muted text-center">Department: <b><?php
                        if(!empty($student['Department'])){
                            echo htmlentities($student['Department']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></p>
                <p class="text-muted text-center">Faculty: <b><?php
                        if(!empty($student['Faculty'])){
                            echo htmlentities($student['Faculty']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    Current Semester: <b><?php
                        if(!empty($student['CurrentSemester'])){
                            echo htmlentities($student['CurrentSemester']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b>
                  </li>
                  <li class="list-group-item">
                    Current Level: <b><?php
                        if(!empty($student['Level'])){
                            echo htmlentities($student['Level']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b>
                  </li>
                  <li class="list-group-item">
                    Current CGPA:<b> <?php
                        if(!empty($student['CGPA'])){
                            echo htmlentities($student['CGPA']);
                        }else{
                            echo "<span style ='color:red'>Not Yet Set</span>";
                        }
                       ?></b>
                  </li>
                </ul>

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
                          <li class="list-group-item">Gender: <b><?php
                            if(!empty($student['gender'])){
                                echo htmlentities($student['gender']);
                            }else{
                                echo "<span style ='color:red'>Not Yet Set</span>";
                            }
                           ?></b></li>

                        </ul>
                         
                        
                      </div>
                      
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
        <div class="card">
              <div class="card-header p-2">
                
                           <h1 class="text-center">Address Details</h1>

              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                          
                          <ul class="list-group list-group-unbordered mb-3">
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
                      
                   </div>
                    <!-- /.post -->

                   
                  </div>
                  <!-- /.tab-pane -->
                  
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
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