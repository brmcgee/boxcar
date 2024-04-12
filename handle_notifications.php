<?php 
    
    include_once('db.php');
    $user = $_POST['userid'];
 



    if (!$conn) {
        echo "Connection not successfull" . mysqli_connect_error();
    } 
    else {
        $sql = "SELECT * FROM `notifications` WHERE n_owner = $user";
        $select = mysqli_query($conn, $sql);

        $sql = "DELETE FROM `notifications` WHERE n_owner = $user";
        mysqli_query($conn, $sql);

        foreach($select as $q) {
            $notification = $q['notification'];
            
             ?> 

             <div class="alert alert-dismissible mb-1" style="background-color:#cff5c6;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?php echo $q['notification']; ?>
            </div>
            
            
             <?php
        }

    }
?>



