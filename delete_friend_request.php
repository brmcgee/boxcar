<?php

include_once('db.php');

$fid = $_POST['fid'];
$uid = $_POST['uid'];
$display = $_POST['display'];
$avatar = $_POST['avatar'];



// echo ' You and ' . $display . ' are no longer friends';

$sql = "DELETE FROM friend WHERE id_user = $uid AND id_friend = $fid";
$query = mysqli_query($conn, $sql);

$sql = "DELETE FROM friend WHERE id_user = $fid AND id_friend = $uid";
$query = mysqli_query($conn, $sql);




exit();


?>