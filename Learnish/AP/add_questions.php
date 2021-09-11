<?php
include_once("dbcon.php");

$con->set_charset("utf8mb4");

$getMockId = $con -> real_escape_string($_POST['mock_id']);
$getSubjectId = $con -> real_escape_string($_POST['subject_id']);
$getChapterId = $con -> real_escape_string($_POST['chapter_id']);
$question = $con -> real_escape_string($_POST['question']);
$getOption1 = $con -> real_escape_string($_POST['option1']);
$getOption2 = $con -> real_escape_string($_POST['option2']);
$getOption3 = $con -> real_escape_string($_POST['option3']);
$getOption4 = $con -> real_escape_string($_POST['option4']);
$getOption5 = $con -> real_escape_string($_POST['option5']);
$getDetails = $con -> real_escape_string($_POST['details']);
$getAnswer = $con -> real_escape_string($_POST['answer']);
$getLanguage = $con -> real_escape_string($_POST['language']);
$getDescription = $con -> real_escape_string($_POST['description']);
$getSectionTime = $con -> real_escape_string($_POST['section_time']);


$fp = fopen('questionssss.txt', 'a');//opens file in append mode  
fwrite($fp, $question."\n");  
fclose($fp);  
  
//echo "File appended successfully";  

$insertMockQuestion = "INSERT INTO mock_questions(mock_id, subject_id, chapter_id, question, option1, option2, option3, option4, option5, details, answer, language, description, time) VALUES('$getMockId', '$getSubjectId', '$getChapterId', '$question', '$getOption1', '$getOption2', '$getOption3', '$getOption4', '$getOption5', '$getDetails', '$getAnswer', '$getLanguage', '$getDescription', '$getSectionTime')";

$con->query($insertMockQuestion);

?>