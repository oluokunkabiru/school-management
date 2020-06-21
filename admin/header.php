<?php
if(isset($_SESSION['adminLogin'])){
  include("../includes/connection.php");
  // $user =$_SESSION['adminLogin'];
  //  $stmt = "SELECT* FROM staff WHERE email = '$user'|| Phone_Number = '$user'";
  //  $qe = mysqli_query($conn, $stmt);
  //  $staff = mysqli_fetch_array($qe);
  //  $dept = $staff['category'];
  //  $staffid = $staff['StaffId'];
  //  echo $dept;

?>
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../plugins/dist/css/adminlte.min.css">
<link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="../css/style.css">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
      <a class="nav-link" data-widget="pushmenu" href=""><i class="fas fa-bars"></i></a>

    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="StaffDashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group">
        <input class="form-control form-control-navbar" type="search" onkeyup="student(this.value)" placeholder="Search Student" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <form class="form-inline ml-3">
      <div class="input-group input-group">
        <input class="form-control form-control-navbar" type="search" onkeyup="staff(this.value)" placeholder="Search Staff" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <form class="form-inline ml-3">
      <div class="input-group input-group">
        <input class="form-control form-control-navbar" type="search" onkeyup="department(this.value)" placeholder="Search Department" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
</nav>
<section id="searchDetails">

</section>
<?php
}
else{
  header('location:../index.php');
}
?>
<script>
function student(str) {
    if (str.length == 0) {
        document.getElementById("searchDetails").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("searchDetails").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "search.php?student=" + str, true);
        xmlhttp.send();
    }
}

function staff(str) {
    if (str.length == 0) {
        document.getElementById("searchDetails").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("searchDetails").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "search.php?staff=" + str, true);
        xmlhttp.send();
    }
}

function department(str) {
    if (str.length == 0) {
        document.getElementById("searchDetails").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("searchDetails").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "search.php?dept=" + str, true);
        xmlhttp.send();
    }
}
</script>