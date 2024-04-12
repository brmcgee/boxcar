<?php
    include_once('db.php');
    $user_id = $_REQUEST['uid'];
?>
<!-- render mail message - list item -->
<ul class="list-group" id="messageList">
    
<?php     
$messageSql = "SELECT * FROM mail WHERE rec_id = $user_id";
$messageQuery = mysqli_query($conn, $messageSql);
    foreach($messageQuery as $m) {
    $message = $m['message'];
    $senderId = $m['sender_id'];
    $messageDate = $m['m_date'];
    $messageId = $m['mail_id'];
$userSql = "SELECT * FROM users WHERE user_id = $senderId";
$userQuery = mysqli_query($conn, $userSql);
    foreach($userQuery as $u) {
        $messName = $u['display_name'];
        $messAvatar = $u['avatar'];
    }

    ?>      
        <li class="list-group-item" id="message<?php echo $messageId; ?>">

            <div class="d-flex m-0 p-0 justify-content-between float-end">
                <small class="text-primary"><?php echo $messageDate;?></small>
                    <!-- delete mail button  -->
                    <form action="#" id="frm" class="border-0 bg-transparent bg-light m-0 p-0">
                        <input  hidden type="text" name="messageId" value="<?php echo $messageId;?>"/>
                            
                        <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" 
                                style='border:none;background-color:transparent;' 
                                onclick="deleteMail(messageId.value)"
                                class="border-0 text-danger">
                            <span class="material-symbols-outlined w3-text-red">delete</span>
                         </button>
                    </form> 

                <div id="deleteMail"></div>

            </div>             
            <p class="m-0 p-0">Message from <strong><?php echo $messName;?></strong></p>
            <p class="m-0 p-0"><?php echo $message;?> </p>
        </li>
    <?php
        }
    ?>
    </ul>