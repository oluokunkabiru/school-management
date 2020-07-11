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
                                        $faid = $fac['facultyId'];
  
                                      
                                      ?>
                                    
                                  </option>
                                  <option value="<?php echo $faid ?>"><?php echo $fa ?></option>
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
                                        $faid = $fac['facultyId'];
  
                                      
                                      ?>
                                    
                                  </option>
                                  <option value="<?php echo $faid ?>"><?php echo $fa ?></option>
                                      <?php } ?>                                
                                </select>
                            </div>    
                      <!-- </div> -->
                      <div class="form-group " id="depts">
                          <label for="lang">Department</label>
                              <select class="form-control" name="depts" onchange="deptmt(this.value)">
                                
                                
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
                          
                          <input type="hidden" name="level" value="100">
                          <input type="hidden" name="semester" value="Rain Semester">
                      <!-- </div> -->
                        <label for="pwd" class="mr-sm-2 mr-md-2">Choose Password:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="password" name="password">
                        <label for="pwd" class="mr-sm-2 mr-md-2">Confirm Password:</label>
                        <input type="password" class="form-control mb-2 mr-sm-2" id="repassword" name="repassword">
                        
                        <button type="submit" class="btn btn-primary mb-2 float-right" id="studentSignUp" >Sign Up</button>
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
                  $facultyid = $faculty['facultyId']

              ?>
               <option value="<?php echo $facultyid ?>"><?php echo htmlspecialchars_decode($faculty['name']);?></option>
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
               <option value="<?php echo htmlspecialchars_decode($department['DepartmentId']);?>"><?php echo htmlspecialchars_decode($department['name']);?></option>
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

