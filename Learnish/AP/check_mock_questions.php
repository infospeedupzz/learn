<?php
include_once("dbcon.php");

$select_data = "SELECT * FROM mock_questions";
$results = $con->query($select_data);

while($get_row = $results->fetch_assoc()){
    
    $get_option1 = $get_row['option1'];
    $get_option2 = $get_row['option2'];
    $get_option3 = $get_row['option3'];
    $get_option4 = $get_row['option4'];
    $get_option5 = $get_row['option5'];
    
    $get_answer = $get_row['answer'];
    
     // check if answer not match with any option
    if($get_answer != $get_option1 && $get_answer != $get_option2 && $get_answer != $get_option3 && $get_answer != $get_option4 && $get_answer != $get_option5){
        //echo "Wrong Answer at id = ".$get_row['id']."<br>";
    }
    
    // check if answer is empty
    if($get_answer == ""){
       // echo "Empty Answer = ".$get_row['id']."<br>";
    }
    
    // check if options math with each other
    $is_answer_match = "";
    if($get_option1 == $get_option2 || $get_option1 == $get_option3 || $get_option1 == $get_option4 || $get_option1 == $get_option5){
        $is_answer_match = "get_option1";
    }
    if($get_option2 == $get_option1 || $get_option2 == $get_option3 || $get_option2 == $get_option4 || $get_option2 == $get_option5){
        $is_answer_match = "get_option2";
    }
    if($get_option3 == $get_option1 || $get_option3 == $get_option2 || $get_option3 == $get_option4 || $get_option3 == $get_option5){
        $is_answer_match = "get_option3";
    }
    if($get_option4 == $get_option1 || $get_option4 == $get_option2 || $get_option4 == $get_option3 || $get_option4 == $get_option5){
        $is_answer_match = "get_option4";
    }
    if($get_option5 == $get_option1 || $get_option5 == $get_option2 || $get_option5 == $get_option3 || $get_option5 == $get_option4){
        $is_answer_match = "get_option5";
    }
    
    if($is_answer_match != ""){
        echo $is_answer_match." Match with other = ".$get_row['id']."<br>";
    }
}
?>