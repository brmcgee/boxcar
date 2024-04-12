<?php

include_once('db.php');

$f_req = $_POST['fr'];
$fid = $_POST['fid'];
$uid = $_POST['uid'];
$friend = 0;

// echo "friend-request=" . $f_req . "&" . "friend-id=" . $fid . "&" . "user-id=" . $uid;
// echo '';

// $sql = "INSERT INTO `friend` (`record_id`, `id_user`, `id_friend`, `sent`, `friends`, `accepted`)
//          VALUES (NULL, '34', '44', '1', '0', current_timestamp())"         
// mysqli_query($conn, $sql);

$sql_friend = "SELECT * FROM friend";
$query = mysqli_query($conn, $sql_friend);


$sql = "INSERT INTO friend (id_user, id_friend, sent, friends) 
VALUES ('$uid', '$fid',  '$f_req', '0')";

mysqli_query($conn, $sql);
exit();


?>