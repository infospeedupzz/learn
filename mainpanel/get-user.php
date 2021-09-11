<?php include("layout/session.php");
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();

## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " AND (email LIKE :email or 
        mobile LIKE :mobile OR 
        fullname LIKE :fullname OR 
        referral_code LIKE :referral_code ) ";
   $searchArray = array( 
        'email'=>"%$searchValue%", 
        'mobile'=>"%$searchValue%",
        'fullname'=>"%$searchValue%",
        'referral_code'=>"%$searchValue%"
   );
}

## Total number of records without filtering
$stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM users ");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

## Total number of records with filtering
$stmt = $db->prepare("SELECT COUNT(*) AS allcount FROM users WHERE 1 ".$searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

## Fetch records
$stmt = $db->prepare("SELECT * FROM users WHERE 1 ".$searchQuery." ORDER BY ".$columnName." ".$columnSortOrder." LIMIT :limit,:offset");

// Bind values
foreach($searchArray as $key=>$search){
   $stmt->bindValue(':'.$key, $search,PDO::PARAM_STR);
}

$stmt->bindValue(':limit', (int)$row, PDO::PARAM_INT);
$stmt->bindValue(':offset', (int)$rowperpage, PDO::PARAM_INT);
$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();
$countt = 0;
foreach($empRecords as $row){
   $data[] = $row;
   if(!empty($row['profile_pic'])){
       $profile_pic="<img src='https://learnizy.in/Learnish/".$row['profile_pic']."' width='100px'>";
   }else{
       $profile_pic="<img src='https://cdn.icon-icons.com/icons2/2643/PNG/512/male_boy_person_people_avatar_icon_159358.png' width='100px'>";
   }
   $action='<span type="button" class="btn btn-info text-capitalize noti" data-id="'.$row['id'].'"   data-fcm_token="'.$row['firebase_key'].'"  title="Change Status" data-toggle="modal" data-target="#rctmodal-status">Send Noti</span>';
    $data[$countt]['profile_pic'] = $profile_pic;
    $data[$countt]['action'] = $action;
    
    $countt++;
}

## Response
$response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
);

echo json_encode($response);