<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php echo date('y');?>
  <form action="" method="post" id="upadateProfileDetails" enctype="multipart/form-data" id="upadateProfileDetails">
    <input type="file" name="" id="profile_picture">
  </form>
</body>
</html>
<script src="plugins/jquery/jquery.min.js"></script>
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