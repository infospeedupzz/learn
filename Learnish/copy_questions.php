<?php
include_once('dbcon.php');


$selectMock = "SELECT id FROM mock WHERE id > 10 AND id <= 54 AND course_id = 2";
$mockResult = $con->query($selectMock);

$copyDes = 70;

while($mockRows = $mockResult->fetch_assoc()){
    $getMockId = $mockRows['id'];
    
    echo "MyMoooo".$getMockId."<br>";
    $selectData = "SELECT * FROM mock_questions WHERE mock_id = '$getMockId'";
$dataResults = $con->query($selectData);

$countt = 0;

while($dataRow = $dataResults->fetch_assoc()){
    
    $countt++;
    
    $getQuestions = $dataRow['question'];
    $option1 = $dataRow['option1'];
    $option2 = $dataRow['option2'];
    $option3 = $dataRow['option3'];
    $option4 = $dataRow['option4'];
    $option5 = $dataRow['option5'];
    $details = $dataRow['details'];
    $answer = $dataRow['answer'];
    $language = $dataRow['language'];
    $description = $dataRow['description'];

    $insert_data = "INSERT INTO mock_questions( `mock_id`, `subject_id`, chapter_id, `question`, `option1`, `option2`, `option3`, `option4`, `option5`, `details`, `answer`, `language`, `description`, time) VALUES('$copyDes', 6, 0, '$getQuestions', '$option1', '$option2', '$option3','$option4','$option5','$details','$answer','$language','$description', '45')";

    echo $countt." = ".$insert_data."<br><br>";
    $con->query($insert_data);
}
    $copyDes++;
}


?>