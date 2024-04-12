<?php

    include_once('db.php');

    $uid = $_POST['uid'];
    $avatar = htmlspecialchars($_POST['avatar']);


    $sql = "UPDATE users SET avatar ='$avatar' WHERE user_id = $uid";
    $query = mysqli_query($conn, $sql);


    
    // generate notification 
    $usql = "SELECT * FROM users WHERE user_id = $uid";
    $uque = mysqli_query($conn, $usql);
    foreach($uque as $u) {
        $displayname = $u['display_name'];
        $avatar = $u['avatar'];
    }
    $notification = '<img src="' . $avatar . '" height="50" width="50" alt="" class="me-3 rounded" >' . $displayname . '  you changed you avatar image! ';
    $nsql = "INSERT INTO notifications (notification, n_user, n_owner) VALUES ('$notification', '0', '$uid')";
    $nquery = mysqli_query($conn, $nsql);

?>
