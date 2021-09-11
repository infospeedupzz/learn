<?php include ('layout/innersession.php');
$colorArr = array(
    "#c9dbff",
    "#5fa4ef99",
    "#dc354542",
    "#ff845f47",
    "#03a84e54"
);
$data = array();
$chk = 0;
if (isset($_POST['course_id']))
{
    $orderby=$_POST['orderby'];
    $row = $_POST['start'];
    $rowperpage = $_POST['length']; 
      $conArrP= array(
        "course_id" => $_POST['course_id']
    );
    $countt=0;
    ## Total number of records with filtering
    $resultTotal = $functionClass->getRowsByWhere("quizzes", "course_id=:course_id ", $conArrP);
    $totalRecords = sizeof($resultTotal);

    $resultP = $functionClass->getRowsByWhere("quizzes", "course_id=:course_id order by id $orderby LIMIT $rowperpage  OFFSET $row ", $conArrP);
    foreach($resultP as $rowP){
    $display="";
    $chk=1;
    $data[]=$rowP;
    if(!empty($_SESSION['userId'])){ 
        $link1="<a  class='readon2 green-btn' style='padding: 6px 61px;margin-top:10px'href='quiz/".str_replace(" ","-", $rowP['name'])."/".$functionClass->EN($rowP['id'])."'  >Start Now  </a>";
        }else{
            $link1="<a class='readon2 green-btn' style='padding: 6px 61px;margin-top:10px' href='#' data-toggle='modal' data-target='#loginModal'>Start  Now </a>";
        }
     

    ## add fee details to user array
    $data[$countt]['link1'] = $link1;
    $countt++;
    } 
    

}

## Response
$response = array("TotalRecords" => $totalRecords, "aaData" => $data);
echo json_encode($response);

?>

  
  
  
