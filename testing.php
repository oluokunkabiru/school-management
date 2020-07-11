<?php 
  $a ="0";
  if(!empty($a)){
    echo "A is not empty = : $a";
  }else {
    echo "0 is empty";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <input type="text" onkeyup="data(this.value)">
  <h1 id="show"></h1>
</body>
</html>
<script src="plugins/jquery/jquery.min.js"></script>
<script>
  function data(str) {
    if (str.length == 0) {
        document.getElementById("show").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("show").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "admin/search.php?student=" + str, true);
        xmlhttp.send();
    }
}
</script>