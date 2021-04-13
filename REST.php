<?php
include $_SERVER['DOCUMENT_ROOT'].'\vote_sys\resources\config\config.php';
header("Access-Control-Allow-Origin: *");

$data 	   = array();
$get_users = "SELECT user_id
                    ,username
                    ,first_name
                    ,last_name FROM user";
$get_users = $db_conn->prepare($get_users);
$get_users->execute();
$rs_users  = $get_users->fetchAll(2);
$count     = 0;
foreach($rs_users as $key => $val){
    $count ++;
    $data["USERS"][] = array('count'      => $count
                            ,'user_id'    => $val['user_id']
                            ,'username'   => $val['username']
                            ,'first_name' => $val['first_name']
                            ,'last_name'  => $val['last_name']);
}

header("content-type: application/json");
echo json_encode($data);

?>