<?php

include_once("dbcon.php");


// DETECT COPY QUESTIONS
// $select_data = "SELECT id, question, option1, option2, option3, option4, option5, answer FROM mock_questions";

// $results = $con->query($select_data);

// while($get_rows = $results->fetch_assoc()){
    
//     $get_id = $get_rows['id'];
//     $get_question = $get_rows['question'];
//     $get_option1 = $get_rows['option1'];
//     $get_option2 = $get_rows['option2'];
//     $get_option3 = $get_rows['option3'];
//     $get_option4 = $get_rows['option4'];
//     $get_option5 = $get_rows['option5'];
//     $get_answer = $get_rows['answer'];
    
//     $select_qq = "SELECT id, question, option1, option2, option3, option4, option5, answer FROM mock_questions WHERE question = '$get_question'AND option1 = '$get_option1' AND option2 = '$get_option2' AND option3 = '$get_option3' AND option4 = '$get_option4' AND option5 = '$get_option5' AND answer = '$get_answer' AND id != $get_id ";
//     $qq_results = $con->query($select_qq);
     
//     if($qq_results->num_rows > 1){
//         echo ",".$get_rows['id'];
//         while($get_duplicates = $qq_results->fetch_assoc()){
//             echo ",".$get_duplicates['id'];
//         }
//         echo "<br><br>";
//     }
    
// }

// add question if question is less
// $done_ids = "0,,0";

//         $select_data = "SELECT * FROM mock WHERE course_id = 1 ORDER BY id ASC";
//         $results = $con->query($select_data);
        
//         while($get_rows = $results->fetch_assoc()){
            
//             $get_mock_id = $get_rows['id'];

//             $select_user = "SELECT * FROM mock_questions WHERE mock_id = '$get_mock_id' AND subject_id = 12";
//             $user_results = $con->query($select_user);
//             $available_questions = $user_results->num_rows;
            
//             if($available_questions < 50){
//                 $pending_questions = 50 - $user_results->num_rows;
                
//                 $select_user22 = "SELECT * FROM mock_questions WHERE mock_id = '19' AND subject_id = 12";
//                 $user_results22 = $con->query($select_user22);
                
//                 if($user_results22->num_rows > 5){
//                     while($get_rowss = $user_results22->fetch_assoc()){
                    
//                     if($available_questions < 50 && !in_array($get_rowss['id'], explode(",,",$done_ids))){
//                       $get_question = $get_rowss['question'];
//                      $get_option1 = $get_rowss['option1'];
//                       $get_option2 = $get_rowss['option2'];
//                       $get_option3 = $get_rowss['option3'];
//                       $get_option4 = $get_rowss['option4'];
//                       $get_option5 = $get_rowss['option5'];
//                       $get_details = $get_rowss['details'];
//                       $get_answer = $get_rowss['answer'];
//                       $get_language = $get_rowss['language'];
//                       $get_time = $get_rowss['time'];
                       
//                       $insert_nwew_we = "INSERT INTO mock_questions(mock_id, subject_id, question, option1, option2, option3, option4, option5, details, answer, language, time) VALUES('$get_mock_id', '12', '$get_question', '$get_option1', '$get_option2', '$get_option3', '$get_option4', '$get_option5', '$get_details', '$get_answer', '$get_language', '$get_time')";
                       
//                       $con->query($insert_nwew_we); 
                       
//                       $done_ids = $done_ids.",,".$get_rowss['id'];
                       
//                       $available_questions++;
//                     }
                    
//                 }
//                 }
                
//             }
        
//         }

// create a new cURL resource
$ch = curl_init();

 $title = "Mock Test Notice";
    $msg = "Dear Aspirants,\n New Mock Tests and Quizzes are coming soon for prelims.\n Stay Tuned.\n\nTeam Learnizy";
    
// set URL and other appropriate options
$key = "c16MAT0GRVGVjfD5f1rfoo:APA91bEfvw2bOkl-VrQeIQ9GQ78qzClE3xClat1nP-_8y0Q5N4zLuW5VTYzva3CXzvvylWLGCkg-4Qg4oBX9e73cPNY7GCRqk0wjnRy2-LI_OC_MofgD3PDOjD09AM3yr1SElASJKsUk";

curl_setopt($ch, CURLOPT_URL, "https://learnizy.in/Learnish/send_to_single.php?key=".$key."&title=".$title."&msg=".$msg);
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

// //CHECK LESS QUESTIONS
// $select_data = "SELECT * FROM mock WHERE course_id = 1 ORDER BY id ASC";
// $results = $con->query($select_data);

// while($get_rows = $results->fetch_assoc()){
    
//     $get_id = $get_rows['id'];
    
//                 $select_user = "SELECT * FROM mock_questions WHERE mock_id = '$get_id' AND subject_id = 12";
//             $user_results = $con->query($select_user);
            
//             echo $get_id." == ".$user_results->num_rows."<br>";
// }
?>