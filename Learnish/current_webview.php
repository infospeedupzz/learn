<?php include_once("dbcon.php");
$id=$con -> real_escape_string($_GET['id']);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br>
    <br>
<?php 
 
        $otpResult = $con->query("select * from current where id='".$id."'");
       
        if($otpResult->num_rows > 0){
            while($row = $otpResult->fetch_assoc()){
                echo $row['short_desc'];
            }
        }
?>
</div>

</body>
</html>

