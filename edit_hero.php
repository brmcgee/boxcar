<?php

    include_once('db.php');

    $uid = htmlspecialchars($_POST['uid']);
    $hero = $_POST['hero'];

    $sql = "UPDATE users SET hero ='$hero' WHERE user_id = $uid";
    $query = mysqli_query($conn, $sql);

        // generate notification 
        $usql = "SELECT * FROM users WHERE user_id = $uid";
        $uque = mysqli_query($conn, $usql);
        foreach($uque as $u) {
            $displayname = $u['display_name'];
            $hero = $u['hero'];
        }
        $notification = '<img src="' . $hero . '" height="50" width="50" alt="" class="me-3 rounded" >' . $displayname . '  you changed you background image! ';
        $nsql = "INSERT INTO notifications (notification, n_user, n_owner) VALUES ('$notification', '0', '$uid')";
        $nquery = mysqli_query($conn, $nsql);

?>