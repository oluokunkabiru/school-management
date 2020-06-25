<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../plugins/dist/css/adminlte.min.css">
<link rel="stylesheet" href="../css/style.css">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
      <a class="nav-link" data-widget="pushmenu" href=""><i class="fas fa-bars"></i></a>
    <ul class="navbar-nav ml-auto">     
      <li class="nav-item d-none d-sm-inline-block">
        <a href="AdminDashboard.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group">
        <input class="form-control form-control-navbar" type="search" onkeyup="students(this.value)" placeholder="Search Student" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <form class="form-inline ml-3">
      <div class="input-group input-group">
        <input class="form-control form-control-navbar" type="search" onkeyup="staffs(this.value)" placeholder="Search Staff" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <form class="form-inline ml-3">
      <div class="input-group input-group">
        <input class="form-control form-control-navbar" type="search" onkeyup="departments(this.value)" placeholder="Search Department" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
</nav>
<!-- <div class="content-wrapper"> -->
    <!-- index image -->
<div class="container">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <section class="content" id="searchDetails">
    </section>
    </div>
  </div>
</div>
<!-- </div> -->
<script>
function students(str) {
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
function staffs(str) {
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
function departments(str) {
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

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>