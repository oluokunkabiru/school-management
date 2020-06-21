<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/jquery/jquery.min.js"></script>
</head>
<body>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email </th>
            <th>Phone No</th>
            <th>Course</th>
            <th>Dept</th>
            <th>Gender</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>

         </tbody>
        </table>
        </div>
</body>
</html>
<script>
        $("#example1").DataTable();

</script>