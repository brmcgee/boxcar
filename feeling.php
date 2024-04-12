<?php

    include_once('db.php');


    $feeling = htmlspecialchars($_POST['userFeeling']);
    $uid = $_POST['userId'];

    $_SESSION['a_feeling'] = $feeling;
    $sql = "UPDATE `users` SET `feeling` =  '$feeling' WHERE `user_id` = $uid";
    $query = mysqli_query($conn, $sql);

?>



