<?php include ('layout/innersession.php');

$chk = 0;
if (isset($_GET['n']))
{
     $id= $functionClass->DE($_GET['n']);
      $conArrP= array(
        "id" => $id
    );
    $resultP = $functionClass->getRowsByWhere("previous_papers", "id=:id", $conArrP);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo $resultP[0]['name']; ?></title>
  <meta charset="utf-8">

 
</head>

<body>
<embed src="<?php echo $resultP[0]['url']; ?>#toolbar=0" type="application/pdf" width="100%" height="600px" />
</body>

</html>
<?php 
}

?>

  
  
  
