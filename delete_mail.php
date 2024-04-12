<?php

include_once('db.php');

$messageId = $_POST['messageId'];



$sql = "DELETE FROM mail WHERE mail_id = $messageId";
$query = mysqli_query($conn, $sql);

echo 'confirm';


exit();


?>