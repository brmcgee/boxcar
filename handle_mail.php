<?php

include_once('db.php');

$message = htmlspecialchars($_POST['message']);
$recId = $_POST['fid'];
$sendId = $_POST['uid'];





// sender 
$ssql = "SELECT * FROM users WHERE user_id = $sendId";
$squery = mysqli_query($conn, $ssql);
foreach($squery as $s) {
    $sendAvatar = $s['avatar'];
    $sendName = $s['display_name'];
}

// recipient 
$rsql = "SELECT * FROM users WHERE user_id = $recId";
$rquery = mysqli_query($conn, $rsql);
foreach($rquery as $r) {
    $recAvatar = $r['avatar'];
}

// echo '<img src="'. $sendAvatar   .'" alt="" style="width:40px;height:40px;border-radius:50%;">';
// echo '<span class="material-symbols-outlined">arrow_forward</span>' . '<br>';
// echo '<strong>Message</strong> ' . '<br>';
// echo $message . '<br>'; 

// echo  '<img src="'. $recAvatar    .'" alt="" style="width:40px;height:40px;border-radius:50%;">' . '<br>';


// echo '<br> message to -- ' . $recId  . '<br>';
// echo 'message from user id ' . $sendId;





$sql = "INSERT INTO `mail`(`sender_id`, `rec_id`, `message`) VALUES ('$sendId','$recId', '$message')";
$query = mysqli_query($conn, $sql);

$notification = '<img src="' . $sendAvatar . '" height="40" width="40" alt="" style="border-radius:50%;" class="me-3" ><strong>' . $sendName . ' </strong>  sent you a message.';
$nsql = "INSERT INTO notifications (notification, n_user, n_owner) VALUES ('$notification', ' $sendId', '$recId')";
$nquery = mysqli_query($conn, $nsql);


echo '<div class="alert alert-success mx-2" role="alert">';
echo '<strong>Message Sent!</strong>' . '<br>';
echo $message;
echo '</div>';

exit();

?>


