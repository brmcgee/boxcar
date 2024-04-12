<?php

include_once('db.php');

$accept = $_POST['accept'];
$fid = $_POST['fid'];
$uid = $_POST['uid'];
$rid = $_POST['record'];



$sql = "DELETE FROM friend WHERE record_id = $rid";
$query = mysqli_query($conn, $sql);




exit();


?>