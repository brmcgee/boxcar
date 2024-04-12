<?php

include_once('db.php');

$postid = $_POST['postid'];
$userid = $_POST['userid'];
$like = $_POST['like'];
$count = $_POST['count'];
$bool = $_POST['bool'];

$myCounter = $count;


if ($bool == 'true') { 

    // delete like 
    $sql = "DELETE FROM likes WHERE post_id='$postid' AND user_id='$userid'";
    $sql_blog = "UPDATE `myblogs` SET `likes` = `likes` - 1 WHERE `id`= '$postid' ";

    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql_blog);

    $bsql = "SELECT * FROM myblogs WHERE id = $postid";
    $bquery = mysqli_query($conn, $bsql);

    foreach ($bquery as $b) {
        $like = $b['likes'];
    }

    echo $like; 
} 


else if ($bool == 'false'){

    // add like 
    $sql = "INSERT INTO likes (post_id, user_id) VALUES ('$postid','$userid')";
    $sql_blog = "UPDATE `myblogs` SET `likes` = `likes` + 1 WHERE `id`= '$postid'";
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql_blog);

    $bsql = "SELECT * FROM myblogs WHERE id = $postid";
    $bquery = mysqli_query($conn, $bsql);

    foreach ($bquery as $b) {
        $like = $b['likes'];
    }

    echo $like;

    // generate notification 
    $usql = "SELECT * FROM users WHERE user_id = $userid";
    $uque = mysqli_query($conn, $usql);
    foreach($uque as $u) {
        $displayname = $u['display_name'];
        $displayavatar = $u['avatar'];
    }
        
    $mbsql = "SELECT * FROM myblogs WHERE id = $postid";
    $mbque = mysqli_query($conn, $mbsql);
    foreach($mbque as $u) {
        $blog_userid = $u['author_id'];
        $blog_title = $u['title'];
    }

     
    $notification = '<img src="' . $displayavatar . '" height="50" width="50" alt="" class="me-3 rounded" ><strong>' 
                        . $displayname . ' </strong> liked your post <strong class="">' . $blog_title . '</strong>!';
    $nsql = "INSERT INTO notifications (notification, n_user, n_owner) VALUES ('$notification', '$userid', ' $blog_userid')";
    $nquery = mysqli_query($conn, $nsql);


}




// echo $postid . ' ' . $like . ' count ' . $myCounter . '-----> ' . $like;

// echo ' You and ' . $display . ' are no longer friends';

// $sql = "DELETE FROM friend WHERE id_user = $uid AND id_friend = $fid";
// $query = mysqli_query($conn, $sql);

// $sql = "DELETE FROM friend WHERE id_user = $fid AND id_friend = $uid";
// $query = mysqli_query($conn, $sql);


exit();

?>
