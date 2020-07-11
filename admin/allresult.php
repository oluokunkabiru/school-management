<?php
     session_start();
     if(isset($_SESSION['adminLogin'])){
    include('header.php');
    include("../includes/connection.php");
    $studentId =$_GET['student'];
    $stmt = "SELECT* FROM student WHERE studentId = '$studentId' ";
    $qe = mysqli_query($conn, $stmt);
    $student = mysqli_fetch_array($qe);
    $name = htmlentities(strtoupper( $student['SurName']." ".$student['FirstName']." ".$student['LastName']));
    $level = $student['Level'];
    $dept = $student['Department'];
    $semester = $student['CurrentSemester'];
    $studentId = $student['StudentId'];
    // echo "id = $studentId <br> level = $level <br> $semester";


  

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?> Check All Result</title>
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
          </div>
          <div class="col-sm-6">
            <h2><?php echo $name ?></h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   

    <section class="content">
      <div class="container-fluid">
      <div class="row">
                    <div class="col-md-4">
                        <form role="form" method="post"  enctype="multipart/form-data" id="upadateProfileDetails">
                            <div class="form-group"> 
                                <label for="lang">Select Level </label>
                                    <select class="form-control"  name="dept" id="lev" onchange="levels(this.value)">
                                        <option value=""></option>
                                        <option value="100">100 Level</option>
                                        <option value="200">200 Level</option>
                                        <option value="300">300 Level</option>
                                        <option value="400">400 Level</option>
                                        <option value="500">500 Level</option>                    
                                    </select>
                                </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form action=""  id="semester"></form>
                    </div>
                    
                </div>
        <div class="row" id="result">
         
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                 <h1 class="text-center btn btn-primary card-title btn-lg btn-block"> Result for <?php echo "$semester, $level" ?></h1> 
              </div><!-- /.card-header -->
              
              <!-- /.card-header -->
              <div class="card-body">
                
                <table class="table table-bordered" id ="printable">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Course Title</th>
                      <th>Course Code</th>
                      <th>Course Unit</th>
                      <th>Course Scores</th>
                      <th>Course Grades</th>
                      <th>Course Point</th>
                      <th>Course Total Points</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form class="" role="form" action="" method="POST" id="courseRegisterForm" >
                      <p class="courseError"></p>
                      <?php
                      $id = 0;
                      $regcourse = mysqli_query($conn, "SELECT* FROM registeredcourse WHERE studentId = '$studentId' AND semester = '$semester' AND level = '$level' ");// ");
                        $courses = mysqli_fetch_array($regcourse);
                        $courseTitle = explode(",", $courses['courseTitle']);
                        $courseUnit = explode(",", $courses['courseUnit']);
                        $courseCode = explode(",", $courses['courseCode']);
                        $point = explode(",", $courses['points']);
                        $totalpoint = explode(",", $courses['totalunitpoint']);
                        $scoress = explode(",", $courses['scores']);
                        $gradess = explode(",", $courses['grades']);
                        $totalunit = array_sum($point);
                        $totalpoints = array_sum($totalpoint);
                        $cgpa =round($courses['cgpa'],2);
                        $class = $courses['class'];

                       for ($i=0; $i <count($courseTitle) ; $i++) { 
                         

                           ?>
                    <tr>
                      <td><?php echo $id+1?></td>
                      <td><?php echo $courseTitle[$i] ?></td>
                      <td><?php echo $courseCode[$i] ?></td>
                      <td><?php echo $courseUnit[$i] ?></td>
                      <td><?php 
                      if(!empty($scoress[$i])){
                       echo $scoress[$i];}else {
                         echo "<span class = 'text-danger'>Result not yet upload</span>";
                       }
                        ?></td>
                      <td><?php if(!empty($gradess[$i])){
                       echo $gradess[$i];}else {
                         echo "<span class = 'text-danger'>Result not yet upload</span>";
                       } ?></td>
                      <td><?php if(isset($point[$i])){
                       echo $point[$i];}else {
                         echo "<span class = 'text-danger'>Result not yet upload</span>";
                       } ?></td>
                      <td><?php if(isset($totalpoint[$i])){
                       echo $totalpoint[$i];}else {
                         echo "<span class = 'text-danger'>Result not yet upload</span>";
                       } ?></td>
                     </tr>
                     <?php
                     $id++;
                    }?>
                       </tbody>

                       <tfoot>
                           <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td><span class ="btn btn-block btn-primary text-light font-weight-bold"><?php echo $totalunit?></span></td>
                           <td><span class ="btn btn-block btn-success text-light font-weight-bold"><?php echo $totalpoints?></span></td>
                           </tr>
                       </tfoot>
                </table>
                <h5><?php echo" CGPA : <b> $cgpa </b>"?></h5>
                <h5><?php echo" Class : <b> $class </b>"?></h5>
                 <button type="button" class="btn btn-dark mb-2 float-right mt-1" onclick="table()" name="print" id="print" >Download Result</button>
                
                </form>
                
              </div>
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      
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
   
<script>

var semesters ="";
var level = "";

function levels(str) {
    if (str.length == 0) {
        document.getElementById("semester").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var result = document.getElementById("semester")
                var ret = this.responseText
                result.innerHTML = ret;
                level = str;
            }
        };
        xmlhttp.open("GET", "result.php?level="+str, true);
        xmlhttp.send();
    }
}


function semester(str) {
    var studentId ="";
    if (str.length == 0) {
        document.getElementById("result").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              var result = document.getElementById("result")
                var ret = this.responseText
                result.innerHTML = ret;
                semesters = str;
            }
        };
        studentId = "<?php echo $studentId?>";
        xmlhttp.open("GET", "result.php?semester="+ str+"&studentId="+studentId, true);
        xmlhttp.send();
    }
} 





  

function table(){
  var doc = new jsPDF('p','pt', 'a4')
  var conten = '<?php echo $name ?>'+ 'RESULT FOR '+semesters+' , '+level+' Level' ;
  doc.text(conten, 14, 80)
  doc.autoTable({ 
    html:'#printable',
    theme: 'grid',
    
  margin: { top: 100 },
    
    headStyles: {
      fillColor: [234, 234, 225],
      textColor: [0, 0, 0],
      fontSize: 12,
      fontStyle: 'bold',
    },
    footStyles: {
      fillColor: [234, 234, 225],
      fontSize: 15,
      fontStyle: 'bold',
      textColor: [0, 0, 0],

    },
    bodyStyles: {
      fillColor: [255, 255, 255],
      textColor: [0, 0, 0],
      margin:20,
      fontSize:12,

    },
    
    
   
  
})
var cgpa = '<?php echo "CGPA : $cgpa" ?>' ;
doc.text(cgpa, 14, doc.autoTable.previous.finalY + 30)
var clas = '<?php echo "Class : $class" ?>' ;
doc.text(clas, 14, doc.autoTable.previous.finalY + 50)

  doc.save('<?php echo $name ?> Result .pdf')
}



</script>