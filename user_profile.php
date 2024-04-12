  <div class="w3-container w3-content">
    <!-- Left Column -->
    <div class="w3-col l8">
      
   
      <!-- Profile Card-->
      <div class="w3-card w3-round w3-white">

        <div class="">
          <div class="card">

          <!-- Hero Image Button trigger modal -->
        <button type="button" class="p-2 border-0 bg-transparent position-absolute" title="Edit profile picture" data-bs-toggle="modal" data-bs-target="#heroModal">
          <span style="border-radius:50%;"class="bg-light  material-symbols-outlined w3-theme-d3 p-1">wallpaper</span>
        </button>

            <div class="rounded-top text-white d-flex flex-row w3-theme-d5" id="heroImg"
                 style="height:210px; background-image:url(<?php echo $_SESSION['a_hero']?>); background-position:center;
                 background-position:center; background-repeat:no-repeat; background-size:cover;">
             
             <!-- avatar image  -->
              <div class="ms-4 mt-5 pt-2 d-flex flex-column" style="width: 200px; height:270px;">             
                <img src="<?php echo $_SESSION['a_avatar']?>" alt="<?php echo $_SESSION['a_user']; ?>" 
                  class=" " style="z-index: 1; border-radius:50%; border:6px solid #fff; width:155px; height:155px; margin-top:65px;"id="avatarImg">
                        
                <!-- Avatar Image Button trigger modal -->
                <button type="button" class="p-2 border-0 bg-transparent position-relative" title="Edit profile picture" 
                        data-bs-toggle="modal" data-bs-target="#avatarModal" style="bottom:50px; left:40px; z-index:1;">
                  <span style="border-radius:50%;"class="bg-light p-1 material-symbols-outlined w3-theme-d3">edit</span>
                </button>

              </div>



            </div>

            <!-- total counts  -->
            <div class="p-4 pb-0 pt-5 mt-1 text-black" style="background-color: #f8f9fa; margin-top:55px;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5"><?php echo sizeof($_SESSION['total_posts']);?></p>
                  <p class="small text-muted mb-0">Photos</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h5"><?php echo sizeof($_SESSION['friend_id']);?></p>
                  <p class="small text-muted mb-0">Friends</p>
                </div>
                <div>
                  <p class="mb-1 h5"><?php echo sizeof($_SESSION['messages']);?></p>
                  <p class="small text-muted mb-0">Messages</p>
                </div>
            </div>

          </div>
            <div class="card-body px-4 pt-0 text-black">
              <div class="mt-2">
                <p class="lead fw-normal mb-1">About</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <h4 class="bg-light text-dark my-0 py-0"><strong><?php echo $_SESSION['a_user']; ?></strong></h4>
                  <p class="font-italic my-0 py-0"><?php echo $_SESSION['a_email']; ?></p>
                  <p class="font-italic my-0 py-0">since <?php echo date('m-d-Y',strtotime($_SESSION['a_date']));?></p>
                </div>
              </div>

              <div class="mt-2 d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">Recent photos</p>
                <p class="mb-0"><a href="#Demo3" class="text-muted"></a></p>
              </div>
              <div class="row g-2">



              <?php 
              $userId = $_SESSION['a_ID'];
              $catsql = "SELECT * FROM myblogs WHERE $userId ORDER BY id DESC ";
              $query =  mysqli_query($conn, $catsql);
              $count = 0;
              foreach ($query as $q) {  
                if (($q['author_id'] == $_SESSION['a_ID'])) {
                  if ($count < 2) {
              ?>

                <div class="col mb-2 d-flex justify-content-around">
                  <img src="<?php echo $q['img']?>" alt="<?php echo $q['title']?>" class="w-100 img-thumbnail m-0 p-0 border-0" 
                      style="max-width:250px; border-radius:7px;">
                </div>

              <?php 
              $count = $count + 1;
              }}}?>

      
              </div>

              <div class="d-flex justify-content-center m-0 p-0">
                  <button type="button" class="button w3-theme-d2 p-0 w-100" data-bs-toggle="modal" 
                          data-bs-target="#profileModal" style="z-index: 1;">
                          <span style="" class="bg-light p-1 material-symbols-outlined w3-theme-d2 fs-2">account_box</span>
                  </button>
                </div>

            </div>
          </div>
        </div>
      </div>
      <br>
      <!-- End Profile Card-->
      


      <!-- Accordion -->
      <div class="w3-card w3-round">

            <!-- User Profile View Modal START -->
            <div id="id01" class="w3-modal">
              <div class="w3-modal-content bg-transparent" style="height:400px;max-width:450px;">
                <div class="w3-container">
                  <span onclick="document.getElementById('id01').style.display='none'"
                  class="w3-button w3-display-topright">&times;</span>
                      <!-- user profile output  -->
                      <div id="friendBox" ></div>
                </div>
              </div>
            </div>
            <!-- User Profile View Modal START -->
            
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-d2 w3-left-align">
            <i class="fa fas fa-users fa-fw w3-margin-right"></i> My Friends
            <!-- <span class="badge badge-light bg-light text-primary"><?php echo sizeof($_SESSION['friend_id']);?></span> -->
          </button>
          <div id="Demo1" class="w3-hide w3-container w3-theme-l4 w3-border w3-theme-border">

        <!-- display friends script  -->
            <?php
              foreach ($_SESSION['friend_id'] as $x) {

              $friend_sql = "SELECT * FROM users WHERE user_id = $x";
              $friend_query =  mysqli_query($conn, $friend_sql);
              foreach ($friend_query as $fq) {
                $friendId = $fq['user_id']
                ?>


            <!-- Friend card  -->
            <div class="d-flex bg-light ms-2 text-dark ps-2 border justify-content-between " id="friendCard<?php echo $friendId ?>">
              <div class="d-flex flex-row">
                  <img src="<?php echo $fq['avatar'];?>" style="width:25px;height:25px;border-radius:50%;" class="me-2 mt-1">
                  <p><?php echo $fq['display_name'];?></p>   

              </div>
              


          <div class="d-flex">
         
              <!-- mail to modal  -->
              <button id="<?php echo $fq['user_id']?>" onclick="sendMailFriend(this.id,<?php echo $_SESSION['a_ID'];?>)" class="bg-transparent border-0">
                <span class="material-symbols-outlined text-primary">mail</span>
              </button>

              <!-- view friend modal  -->
              <button id="<?php echo $fq['user_id']?>" onclick="loadUserCard(this.id)" class="bg-transparent border-0">
                <span class="material-symbols-outlined w3-text-green">account_box</span>
              </button>


              <!-- delete button friend  -->
              <form action="#" id="frm" class="border-0 bg-light m-0">
                  <input hidden type="text" name="display" value="<?php echo $fq['display_name'];?>"/>
                  <input hidden type="text" name="avatar" value="<?php echo $fq['avatar'];?>"/>
                  <input hidden type="text" name="fid" value="<?php echo $fq['user_id']?>"/>
                  <input hidden type="text" name="uid" value="<?php echo $_SESSION['a_ID']?>"/>
                  

                    <span id="deletebox" class="">&nbsp;</span>
                    <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" 
                              style='border:none;background-color:transparent;' 
                            onclick="deleteFriend(fid.value, uid.value, avatar.value, display.value)"
                            class="border-0 text-danger">
                            <span class="material-symbols-outlined w3-text-red">delete</span>
                    </button>
                    <span id="frDel"></span>
              </form>   
          </div>

              <!-- <span class="material-symbols-outlined w3-text-indigo me-1">diversity_1</span> -->
            </div>
              
                
          <?php }} ?>

          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-d2 w3-left-align">
            <i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Messages</button>
          <div id="Demo2" class="w3-hide w3-container">


          
            <!-- display mail messages  -->
            <ul class="list-group" id="messageList">
              <?php

                
                $messageSql = "SELECT * FROM mail WHERE rec_id = $_SESSION[a_ID]";
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



          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-d2 w3-left-align">
          <i class="fa far fa-image fa-fw w3-margin-right"></i> My Photos
            <!-- <span class="badge badge-light bg-light text-primary"><?php echo sizeof($_SESSION['total_posts']);?></span> -->
          </button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>

        
         <!-- display user photos script  -->
         <?php 
            $catsql = "SELECT * FROM myblogs";
            $query =  mysqli_query($conn, $catsql);
            foreach ($query as $q) {  
              if (($q['author_id'] == $_SESSION['a_ID'])) {
            ?>
              <div class="w3-half">
                <img src="<?php echo $q['img']?>" style="width:100%" class="w3-margin-bottom">
              </div>
            <?php }}?>
          </div>
         </div>
        </div>      
      </div>
      <br>
      
      <!-- Categories --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Categories</p>
          <p>
          <?php 
          $user_sql = "SELECT * FROM category";
          $query =  mysqli_query($conn, $user_sql);
          foreach ($query as $q) {?>
          <span class="w3-tag w3-small w3-theme-d5"><?php echo $q['Category_Name']?></span>
          <?php };?></p>
        </div>
      </div>
      <br>
      
      <!-- Alert Box alert length of membership -->
      <div class="w3-container w3-display-container w3-round w3-pale-green w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Welcome back <?php echo $_SESSION['a_user']?>!</strong></p>
        <p>Thank you for being a member <br> since <?php echo time_elapsed_string($_SESSION['a_date'], $full = false)?></p>
      </div>
      <!-- Alert Box Total posts by active user -->
      <div class="w3-container w3-display-container w3-round w3-pale-blue w3-border w3-theme-border w3-margin-bottom w3-hide-small ">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey <?php echo $_SESSION['a_user']?>!</strong></p>
        <p>People are looking at your profile. You have posted     
          <?php 
            $user_sql = "SELECT * FROM myblogs";
            $query =  mysqli_query($conn, $user_sql);
            $count = 0;
            foreach ($query as $q) { 
              if (($q['author_id'] == $_SESSION['a_ID'])) {$count = $count + 1;} ?> 
            <?php }?>
            <span class="w3-tag w3-small w3-pink" style="border-radius:50%;"><?php echo $count?></span> times. Keep it up!
        </p>
      </div>

      <!-- All Users Box except friends and friend requests -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom" id="allUserBox">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>More users @boxcar...</strong></p>
        <p>Thinking about new connections?   

      <?php 
          $user_sql = "SELECT * FROM users";
          // $user_sql = "SELECT * FROM users INNER JOIN friend ON users.user_id = friend.id_friend";

          $query =  mysqli_query($conn, $user_sql);
          foreach ($query as $q) {  
            if (!in_array($q['user_id'],$_SESSION['friend_id']) && ($q['user_id'] != $_SESSION['a_ID'] ) 
                  && (!in_array($q['user_id'], $_SESSION['friend_request'])) ) {
                
            $friend = $q['user_id'];
            $user = $_SESSION['a_ID'];
            
            $sql_request = "SELECT * FROM friend WHERE id_user = $user AND id_friend = $friend AND sent = '1'";
            $req_query = mysqli_query($conn, $sql_request);
            $is_sent = '0';
                  foreach ($req_query as $r) {
                    $is_sent = '1';
                  }
                  if ($is_sent != '1'){
            ?>          
              
            <div class="d-flex bg-light ms-2 text-dark ps-2 border justify-content-between" id="friendCard<?php echo $q['user_id']?>" >
 

              <div class="d-flex flex-row" >
                <img src="<?php echo $q['avatar']?>" style="width:25px;height:25px;border-radius:50%;" class="me-2 mt-1">
                <p><?php echo $q['display_name']?></p>
              </div>

            <div class="d-flex">

                <!-- view friend modal  -->
                <button id="<?php echo $q['user_id']?>" onclick="loadCard(this.id)" class="bg-transparent border-0">
                  <span class="material-symbols-outlined w3-text-green">account_box</span>
                </button>

                <div class="d-flex justify-content-end">
                  <!-- add friend  -->
                  <form action="#" id="frm" class="border-0 bg-light">
                      <input hidden type="number" name="fr" value='1'/>
                      <input hidden type="text" name="fid" value="<?php echo $q['user_id']?>"/>
                      <input hidden type="text" name="uid" value="<?php echo $_SESSION['a_ID']?>"/>
                      <span id="fbox" class="d-none">&nbsp;</span>

                      <button type="button" id="btn<?php echo $q['user_id'];?>" name="submit" value="Send" style='font-size:16px;border:none;background-color:transparent;' 
                                onclick="loadXmlDoc(fr.value, fid.value, uid.value)" style="border:0;"
                                class="p-0 border-none ms-1 me-2 text-danger">
                                <span id="ico<?php echo $q['user_id'];?>"class="material-symbols-outlined w3-text-deep-purple">group_add</span>
                                <span id="icon<?php echo $q['user_id'];?>"class="material-symbols-outlined " style="display:none;">forward_to_inbox</span>
                              </button>

                  </form>          
                </div>
                </div>
            </div>


          <?php }}}?>
       

      </div>      
</div>

    <!-- End Left Column -->