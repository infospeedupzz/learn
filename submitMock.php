<?php include ('layout/session.php');

$response = array("type" => "", "message" => "");
// pass connection to objects
$success_message = '';
if (isset($_POST["kvcArray"]) && isset($_POST["sectionID"])) {
    include_once 'objects/mockScore.php';
    $Mockscore = new Mockscore($db);
    $isComplete=$_POST['isComplete'];
    $user_answerArr = array();
    $sectionArray = json_decode($_POST['kvcArray'], true);
    if($sectionArray=="null"){
        $sectionArray = array();
    }
    $score = 0;
    $correct = 0;
    $incorrect = 0;
    $time_taken = round($_POST['sectionTime'] / 60) . " mins";
    $attempted = sizeof($sectionArray);
    $ansCount = 0;
    $conArr=array("mock_id"=>$_POST['mock_id'],"subject_id"=>$_POST["sectionID"]);    
    $resultM = $functionClass->getRowsByWhere("mock_questions", "mock_id=:mock_id and subject_id=:subject_id", $conArr);
    foreach ($resultM as $rowM) {
        $chkQuestion = false;
        $user_ans = "";
        if(!empty($sectionArray)){
        foreach ($sectionArray as $sectionRow) {
            
            if ($sectionRow['shdkhf_qid'] == $rowM['id'] && $sectionRow['is_review']==0) {
                if ($rowM['answer'] == $sectionRow['ans']) {
                    //count score
                    $score = ($score + 1);
                    $correct++;
                } else {
                    $score = ($score - 0.25);
                    $incorrect++;
                }
                $user_ans = $sectionRow['ans'];
                $selected_language = $sectionRow['selected_language'];
                $chkQuestion = true;
            }
        }
        }
        if ($chkQuestion == true) {
            $user_answerArr[$ansCount]['user_answer'] = $user_ans;
            $user_answerArr[$ansCount]['correct_answer'] = $rowM['answer'];
            $user_answerArr[$ansCount]['selected_language'] = $selected_language;
        } else {
            $user_answerArr[$ansCount]['user_answer'] = "Not Answered";
            $user_answerArr[$ansCount]['correct_answer'] = $rowM['answer'];
            $user_answerArr[$ansCount]['selected_language'] = $selected_language;
        }
        $ansCount++;
    }
    //score array for save data
    $scoreArr = array();
    $scoreArr[0]['score'] = $score;
    $scoreArr[0]['name'] = $_POST["sectionName"];
    $scoreArr[0]['obtained'] = $score;
    $scoreArr[0]['attempted'] = $attempted;
    $scoreArr[0]['correct'] = $correct;
    $scoreArr[0]['incorrect'] = $incorrect;
    $scoreArr[0]['time_taken'] = $time_taken;
    $scoreArr[0]['percentile'] = 0;
    $scoreArr[0]['accuracy'] = 0;
        
        if($Mockscore->chkMock($_POST['mock_id'],$_SESSION['userId'])==false){
              if($correct>0){
                        $accuracy= round( $correct/($correct+ $incorrect)*100,2);
                    }else{
                        $accuracy =0;
                }
        $Mockscore->mock_id = $_POST['mock_id'];
        $Mockscore->user_id = $_SESSION['userId'];
        $Mockscore->score = json_encode($scoreArr);
        $Mockscore->overall_score = $score;
        $Mockscore->percentile = 0;
        $Mockscore->accuracy = $accuracy;
        $Mockscore->time_taken = $time_taken;
        $Mockscore->attempted = $attempted;
        $Mockscore->correct = $correct;
        $Mockscore->incorrect = $incorrect;
        $Mockscore->language = "English";
        $Mockscore->user_answers =json_encode($user_answerArr);
          $result=$Mockscore->create();
                if($result!=false){
                     if($isComplete==1){
                          $sconArr=array("mock_id"=>$_POST['mock_id'],"user_id"=>$_SESSION['userId']);    
                        $resultS = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id and user_id=:user_id", $sconArr);
                        $n=$functionClass->EN($_POST['mock_id']);
                    }else{
                        $n=0;
                    }
                   $response = array("type" => "success", "message" => "","isComplete"=>$isComplete,"n"=>$n);
                }else{
                    $response = array("type" => "error", "message" => "","isComplete"=>$isComplete,"n"=>$n);
                }
        }else{
            $oldScoreArr=array();
            $olduser_answerArr=array();
            //select mock score and update 
                $sconArr=array("mock_id"=>$_POST['mock_id'],"user_id"=>$_SESSION['userId']);    
                $resultS = $functionClass->getRowsByWhere("mock_scores", "mock_id=:mock_id and user_id=:user_id", $sconArr);
            //existing score data 
            $oldScoreArr=json_decode($resultS[0]['score'],true);
            if(!empty($oldScoreArr)){
                $newScoreArr=array_merge($oldScoreArr,$scoreArr);  
            }
          
            $olduser_answerArr=json_decode($resultS[0]['user_answers'],true);
             if(!empty($olduser_answerArr)){
            $newuser_answerArr=array_merge($olduser_answerArr,$user_answerArr);
            }
            //update correct and accuracy and percentile
            $oldoverall_score=0;
            $oldtime_taken=0;
            $oldattempted=0;
            $oldcorrect=0;
            $oldincorrect=0;
             $sectionArr=json_decode($resultS[0]['score'],true);
               foreach($sectionArr as $rowSection){
                   $oldoverall_score=floatval($oldoverall_score)+floatval($rowSection['score']);
                   $oldattempted=intval($oldattempted)+intval($rowSection['attempted']);
                   $oldcorrect=intval($oldcorrect)+intval($rowSection['correct']);
                   $oldincorrect=intval($oldincorrect)+intval($oldincorrect['incorrect']);
                   $oldtime_taken=intval($oldtime_taken)+intval($oldtime_taken['time_taken']);
               }
               $score+$oldoverall_score+$score;
               $time_taken+$oldtime_taken+$time_taken;
               $attempted+$oldattempted+$attempted;
               $correct+$oldcorrect+$correct;
               $incorrect+$oldincorrect+$incorrect;
                 if($correct>0){
                        $accuracy= round( $correct/($correct+ $incorrect)*100,2);
                    }else{
                        $accuracy =0;
                }
            //end update correct and accuracy and percentile
               if($isComplete==1){
                        $n=$functionClass->EN($_POST['mock_id']);
                
                    }
            $Mockscore->id = $resultS[0]['id'];
            $Mockscore->score = json_encode($newScoreArr);
            $Mockscore->overall_score = $score;
            $Mockscore->percentile = 0;
            $Mockscore->accuracy = $accuracy;
            $Mockscore->time_taken = $time_taken;
            $Mockscore->attempted = $attempted;
            $Mockscore->correct = $correct;
            $Mockscore->incorrect = $incorrect;
            $Mockscore->language = "English";
            $Mockscore->user_answers =json_encode($newuser_answerArr);
            $result=$Mockscore->edit();
                if($result!=false){
                 
                    $response = array("type" => "error", "message" => "","isComplete"=>$isComplete,"n"=>$n);
                }else{
                   $response = array("type" => "error", "message" => "","isComplete"=>$isComplete,"n"=>$n);
                }
            
        }
       
        echo json_encode($response);
}
?>