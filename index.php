<?php require_once('access.php') ?>
<?php include_once('head_section.php') ?>
    <title>Home - boxcar</title>

    <style>
      html {scroll-behavior:smooth}
      body {
        margin:0;
        padding:0;
        box-sizing: border-box;        
      }
      *{
        font-family: 'Times New Roman', Times, serif;
        font-family: Helvetica, sans-serif;
        font-family: "Roboto", sans-serif;
        font-weight: 500;
        font-style: normal;


      }
      .user-box{
        padding: 10px 22px;
        display: flex;
        justify-content: space-between;
        width: 100%;
        max-width:310px;
        margin: 10px auto;
        border: 5px solid gray;
        border-radius: 1px;
      }

      .user-box img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        position: relative;
        right: 10px;
      }
      
      *{
        /* font-family: "Protest Riot", sans-serif; */
        /* font-family: "Roboto", sans-serif; */
        font-weight: 400;
        font-style: normal;
      }

      /* red  */
      .w3-theme-l5 {color:#000 !important; background-color:#fef4f3 !important}
      .w3-theme-l4 {color:#000 !important; background-color:#fbdad8 !important}
      .w3-theme-l3 {color:#000 !important; background-color:#f6b6b0 !important}
      .w3-theme-l2 {color:#000 !important; background-color:#f29189 !important}
      .w3-theme-l1 {color:#fff !important; background-color:#ed6d61 !important}
      .w3-theme-d1 {color:#fff !important; background-color:#e6301f !important}
      .w3-theme-d2 {color:#fff !important; background-color:#d12717 !important}
      .w3-theme-d3 {color:#fff !important; background-color:#b72214 !important}
      .w3-theme-d4 {color:#fff !important; background-color:#9d1d11 !important}
      .w3-theme-d5 {color:#fff !important; background-color:#83180f !important}

      .w3-theme-light {color:#000 !important; background-color:#fef4f3 !important}
      .w3-theme-dark {color:#fff !important; background-color:#83180f !important}
      .w3-theme-action {color:#fff !important; background-color:#83180f !important}

      .w3-theme {color:#fff !important; background-color:#e94b3c !important}
      .w3-text-theme {color:#e94b3c !important}
      .w3-border-theme {border-color:#e94b3c !important}

      .w3-hover-theme:hover {color:#fff !important; background-color:#e94b3c !important}
      .w3-hover-text-theme:hover {color:#e94b3c !important}
      .w3-hover-border-theme:hover {border-color:#e94b3c !important}


      .w3-theme-l5 {color:#000 !important; background-color:#f1f7fe !important}
      .w3-theme-l4 {color:#000 !important; background-color:#d1e4fc !important}
      .w3-theme-l3 {color:#000 !important; background-color:#a2c8fa !important}
      .w3-theme-l2 {color:#fff !important; background-color:#74adf7 !important}
      .w3-theme-l1 {color:#fff !important; background-color:#4691f4 !important}
      .w3-theme-d1 {color:#fff !important; background-color:#0d69e2 !important}
      .w3-theme-d2 {color:#fff !important; background-color:#0c5dc8 !important}
      .w3-theme-d3 {color:#fff !important; background-color:#0a52af !important}
      .w3-theme-d4 {color:#fff !important; background-color:#094696 !important}
      .w3-theme-d5 {color:#fff !important; background-color:#073a7d !important}

      .w3-theme-light {color:#000 !important; background-color:#f1f7fe !important}
      .w3-theme-dark {color:#fff !important; background-color:#073a7d !important}
      .w3-theme-action {color:#fff !important; background-color:#073a7d !important}

      .w3-theme {color:#fff !important; background-color:#1877f2 !important}
      .w3-text-theme {color:#1877f2 !important}
      .w3-border-theme {border-color:#1877f2 !important}

      .w3-hover-theme:hover {color:#fff !important; background-color:#1877f2 !important}
      .w3-hover-text-theme:hover {color:#1877f2 !important}
      .w3-hover-border-theme:hover {border-color:#1877f2 !important}
      .w3-green {background-color: #00A400;}

      

      

    </style>
  </head>

  <body class="w3-theme-l5 " style="max-width:2200px;margin:auto;">
  

<!-- Navbar -->
<div class="w3-top" style="z-index:3;">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-theme-d4 protest-riot-regular fs-3 text " >  
    <span class="material-symbols-outlined fs-2">logout</span>
      <span class="protest-riot-regular fs-2 text w3-theme-d1 text-white p-1 px-3" style="border-radius:50%;width:45px;height:45px;">b</span>oxcar
  </a>

  <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" id="logOutBtn" title="Logout"><span class="material-symbols-outlined fs-1">home</span></a>
  <a href="" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" id="logOutBtn" title="Messages"><span class="material-symbols-outlined fs-1">mail</span></a>
  <a href="https://mysite.brmnow.com" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><span class="material-symbols-outlined fs-1">account_box  </span></a>
  <a href="create.php" data-bs-toggle="modal" data-bs-target="#cmodal" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><span class="material-symbols-outlined fs-1">add_circle</span></a>


  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Notifications"><span class="material-symbols-outlined fs-1">notifications</span><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">  
        <a href="#friend" class="w3-bar-item w3-button"><?php echo sizeof($_SESSION['friend_request']);?> new friend request</a>
        <a href="#" class="w3-bar-item w3-button">You have <?php echo sizeof($_SESSION['friend_id']);?> friends</a>
        <a href="#" class="w3-bar-item w3-button">You posted <?php echo sizeof($_SESSION['total_posts']);?> times.</a>
      </div>
    </div>
    <a href="logout.php" title="Logout Goodbye!"class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white w3-animate-zoom" title="My Account">
      <img src="<?php echo $_SESSION['a_avatar']; ?>" class="w3-circle" style="height:30px;width:30px" alt="Avatar">
    </a>
  </div>
  </div>

  <a href="#feed" class="position-fixed" style="z-index:100; bottom:05px;left:10px;font-size:50px;width:50px;"><span class="material-symbols-outlined">arrow_downward</span></a>
  <a href="#top" class="position-fixed" style="z-index:100; bottom:05px;right:10px;font-size:50px;width:50px;"><span class="material-symbols-outlined">arrow_upward</span></a>
  <div class="row" id="top">  

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
      <br>
      <a href="#friend" class="w3-bar-item w3-button w3-padding-large pt-5 mt-5"><?php echo sizeof($_SESSION['friend_request']);?> new friend request</a>
      <a href="#posts" class="w3-bar-item w3-button w3-padding-large">Recent Posts</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large" data-bs-toggle="modal" data-bs-target="#cmodal">Create Post</a>
      <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>


      </div>
    </div>
  </div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1800px;margin-top:70px; padding: 0.01em 4px;">    
  <!-- The Grid -->
  <div class="w3-row">

    <!-- Left Column -->
    <div class="w3-col l4">
      
   
      <!-- Profile Card-->
      <div class="w3-card w3-round w3-white">

        <div class="col col-12">
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


        <!-- My Friends Menu  -->
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

           
            </div>
              
                
          <?php }} ?>

          </div>

        <!-- My Messages Menu  -->
          <button onclick="myFunction('Demo2'), getMail('<?php echo $_SESSION['a_ID'];?>')" class="w3-button w3-block w3-theme-d2 w3-left-align">
            <i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Messages</button>
                      
            <div id="Demo2" class="w3-hide w3-container">

              <!-- live mail target  -->
              <div id="liveMail"></div>

              <!-- get mail script live  -->
              <script>
                  function getMail (uid) {

                      var xmlhttp;
                      if (window.XMLHttpRequest){
                        xmlhttp = new XMLHttpRequest();
                      }
                      else{
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                      }
                      xmlhttp.onreadystatechange = function(){
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                          document.getElementById('liveMail').innerHTML = '';
                          document.getElementById('liveMail').innerHTML = this.responseText;
                        };
                      }

                    xmlhttp.open("POST", "get_mail.php", true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("uid=" + uid);

              }

              </script>
          </div>

        <!-- My Photos Menu  -->
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-d2 w3-left-align">
            <i class="fa far fa-image fa-fw w3-margin-right"></i> My Photos
          </button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
         <?php 
            // display user photos from blogs script 
            $catsql = "SELECT * FROM myblogs";
            $query =  mysqli_query($conn, $catsql);
            foreach ($query as $q) {  
              if (($q['author_id'] == $_SESSION['a_ID'])) {
            ?>
              <div class="w3-half">
                <img src="<?php echo $q['img']?>" style="width:100%;" class="w3-margin-bottom">
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

    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col l6" id="posts">
      <div id="notificationBox" class="mx-2 px-1 py-1"></div>

        <!-- quick multi post componet  -->
        <div class="w3-row-padding">
          
          <div class="card card-body">
          <h2 class="font-italic mb-1 text-dark p-3 oswald rounded g-2 bg-light" id="feeling"><?php echo $_SESSION['a_feeling']; ?></h2>

            <div class="d-flex mb-3">
              <!-- Avatar -->
              <div class="avatar avatar-xs me-2">
                <a href="#"> <img class="avatar-img rounded-circle" id="feelingAvatar" src="<?php echo $_SESSION['a_avatar'];?>" width="50" height="50" alt=""> </a>
              </div>

              <form action="#" id="feelingWidget" class="border-0 bg-transparent" style="width:100%;max-width:600px;">

                  <input hidden type="text" value="<?php echo $_SESSION['a_ID'];?> " name="userId" id="userId">
                  <input name="userFeeling" class="form-control pe-4 border-1 px-2 w-100" rows="4" id="userCommet" 
                                placeholder="Share your thoughts...">

                  <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" style='border:none;background-color:transparent;' 
                          onclick="loadXmlDocFeeling(userId.value, userFeeling.value)" style="border:0;"
                          class="button  w3-green text-white py-2 float-end">Post
                  </button>
                  
              </form>
            </div>
            <!-- Share feed toolbar START -->
            <ul class="nav nav-pills nav-stack small fw-normal">

              <li class="nav-item">
                <a class="nav-link bg-light py-1 px-2 mb-0 me-1" href="#!" data-bs-toggle="modal" data-bs-target="#cmodal"> 
                <span class="material-symbols-outlined w3-text-green">photo_camera</span> Photo </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link bg-light py-1 px-2 mb-0 me-1" data-bs-toggle="modal" data-bs-target="#modalCreateEvents">
                <span class="material-symbols-outlined w3-text-red">event</span>Event </a>
              </li>

              <li class="nav-item">
                <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateFeed"> 
                <span class="material-symbols-outlined w3-text-yellow">mood</span>Feeling /Activity</a>
              </li>

              <li class="nav-item dropdown ms-sm-auto">
                <a class="nav-link bg-light py-1 px-2 mb-0" href="#" id="feedActionShare" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots"></i>
                </a>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="feedActionShare">
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Create a poll</a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Ask a question </a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Help</a></li>
                </ul>
              </li>
            </ul>
            <!-- Share feed toolbar END -->
          </div>
        </div>


      <!-- include live feed from database  -->
      <?php include_once('feeder.php') ?> 

    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col l2"> 
      

      <div class="w3-car w3-round w3-white">

          <!-- Query all users   -->
          <div class="w3-card w3-round w3-white  mt-1 mb-1">
              
              <h5 class="ms-2 text-secondary">Search Users <span class="badge badge-primary w3-green"><?php echo sizeof($_SESSION['users']); ?> </span></h5>
              <div class="w3-container w3-padding">
                <form>
                      <select name="users" class="form-control bg-light  my-1" onchange="showUser(this.value, 'titleBox', <?php echo $_SESSION['a_ID'];?>)">
                        <option value="" class="form-control fs-5 lh-1" >Select from users:</option>

                        <?php 
                          $catsql = "SELECT * FROM users ORDER BY display_name";
                          $cat_query =  mysqli_query($conn, $catsql);
                          $count = 1;
                          
                          foreach ($cat_query as $q) { 
                            
                            ?> 
                          <option class="form-control fs-5 lh-1" style="width:28rem;"value="<?php echo $q['user_id'];?>"><?php echo $count++ . '. '. $q['display_name'];?> </option>
                          <?php }?>
                      </select>
                </form>
              </div>
          </div>

          <div id="titleBox" class="row mx-auto p-o" style="padding-bottom:10px;"><b></b></div>

          <!-- Show user query  -->
          <script>
            function showUser(str, divId, uid) {
              if (str == "") {
                document.getElementById(divId).innerHTML = "";
                return;
              } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                    document.getElementById(divId).innerHTML = this.responseText;
                  }
                };
                xmlhttp.open("POST", "filter.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("q=" + str + "&" + "uid=" + uid);
              }
            }
            </script>
        </div>

        <div id="friend"></div>

        <div class="w3-card w3-round w3-white w3-center"> 

                <!-- event  -->
                  <div class="w3-container">
                  <p>Upcoming Events:</p>
                  <img src="https://wallpapercave.com/wp/wp3080477.jpg" alt="Forest" style="width:100%;">
                  <p><strong>Summer</strong></p>
                  <p>Summer vacation is coming up.</p>
                  <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
                </div>
              </div>
              <br>
              

          
          
          <span id="fbox2" class="d-none">&nbsp;</span>         
          <div id="feed"></div>
         

          <!-- display friend request component if friend request exists  -->
            <?php
              $user_sql = "SELECT * FROM friend";
              $query =  mysqli_query($conn, $user_sql);
              foreach ($query as $q) {  
                if ($_SESSION['a_ID'] == $q['id_friend'] && ($q['sent'] == 1)) {
                  $friend_id = $q['id_user'];
                  
                  $sql1= "SELECT * FROM users WHERE user_id = $friend_id";
                  $query_friend = mysqli_query($conn, $sql1); 
                  
                  foreach ($query_friend as $qf) {
                    // array_push($_SESSION['friend_request'], $qf['user_id']);
                  }
                ?> 
                  
                <div class="alert alert-info alert-dismissible fade show" style="display: none" role="alert" id="friendAlert<?php echo $qf['user_id'];?>">
                  <strong>Awesome stuff!</strong> You and @<?php echo $qf['display_name'];?> are now friends!
                </div> 

                <div class="w3-card w3-round w3-white w3-center w3-sand" id="friendRequestBox<?php echo $friend_id?>">
                    <div class="w3-container">
                      <h5 class="text-uppercase h3 "><small class="roboto-medium">Friend Request</small></h5>
                      <img src="<?php echo $qf['avatar'];?>" alt="Avatar" style="width:50%;height:50%; border-radius:50%;"><br>
                      <span class="protest-riot-regular fs-5">@<?php echo $qf['display_name'];?></span>
                      <div class="w3-row mx-auto w-75">
                      
                      <!-- accept/decline button  -->
                      <form action="#" id="frmAcc" class="border-0 bg-light">

                          <input hidden type="text" name="record" value='<?php echo $q['record_id']?>'/>
                          <input hidden type="text" name="accept" value='1'/>
                          <input hidden type="text" name="fid" value="<?php echo $friend_id?>"/>
                          <input hidden type="text" name="uid" value="<?php echo $_SESSION['a_ID']?>"/>
                          <input hidden type="text" name="dName" value="<?php echo $qf['display_name'];?>"/>
                          <input hidden type="text" name="dAvatar" value="<?php echo $qf['avatar'];?>"/>


                          <div class="w3-half w-50">
                          <button class="w3-button w3-block w3-green w3-section" type="button" id="btn<?php echo $friend_id?>" name="submit" value="Send" 
                                    onclick="loadXmlDocFR(accept.value, fid.value, uid.value, record.value, dName.value, dAvatar.value)" style="border:0;"
                                    class="p-0 border-none text-danger">
                              <span id="ico<?php echo $friend_id;?>"class="madimi-one-regular text-dark"></span>
                              <span id="icon<?php echo $friend_id;?>"class="material-symbols-outlined text-dark" >check_circle</span>
                          </button>
                          </div>

                          <div class="w3-half w-50">
                          <button class="w3-button w3-block w3-red w3-section" type="button" id="btn<?php echo $friend_id?>" name="submit" value="Send" 
                                    onclick="loadXmlDocFRDecline(accept.value, fid.value, uid.value, record.value, dName.value, dAvatar.value)" style="border:0;"
                                    class="p-0 border-none text-danger">
                              <span id="ico<?php echo $friend_id;?>"class="madimi-one-regular text-dark"></span>
                              <span id="icon<?php echo $friend_id;?>"class="material-symbols-outlined text-dark" >delete_forever</span>
                          </button>
                          </div>

                      </form> 

                      </div>
                    </div>
                  </div>
                  <br>
            <?php }; ?>
        <?php }; ?>
        
        <!-- accept friend request script  -->
        <script type="text/javascript">
            
            function loadXmlDocFR(accept, fid, uid, record, display, avatar){
                var xmlhttp;
                if (window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }
                else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function(){
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        document.getElementById("fbox2").innerHTML = xmlhttp.responseText; 
                        document.getElementById("fbox2").innerHTML = xmlhttp.responseText;
                        let friendBox = document.getElementById('friendRequestBox' + fid);
                        friendBox.style.display = "none";  
                        friendBox.style.animate = "ease 1000";  
                        
                        let alertBoxId = 'friendAlert' + fid;
                        let alertBox = document.getElementById(alertBoxId);
                        alertBox.style.display = 'block';
                        $(`#${alertBoxId}`).show();

                        // adds friend chip to myfriends 
                        let friendsDropDown = document.getElementById('Demo1');
                        let html = `
                        
                        <div class="d-flex bg-light ms-2 text-dark ps-2 border justify-content-between">
                          <div class="d-flex flex-row">
                              <img src="${avatar}" style="width:25px;height:25px;border-radius:50%;" class="me-2 mt-1">
                              <p>${display}</p> 

                          </div>
                          <span class="material-symbols-outlined w3-text-indigo me-3">fiber_new</span>
                        </div>
                        `;

                        friendsDropDown.innerHTML += html;
                      
                    }
                }
                xmlhttp.open("POST", "accept_friend_request.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("accept=" + accept + "&" + "fid=" + fid + "&" + "uid=" + uid + "&" + "record=" + record + "&" + "avatar=" + avatar + "&" + "display=" + display);
            }
        </script>

        <!-- decline friend request script  -->
        <script type="text/javascript">
            
            function loadXmlDocFRDecline(accept, fid, uid, record, display, avatar){
                var xmlhttp;
                if (window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }
                else{
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function(){
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        document.getElementById("fbox2").innerHTML = xmlhttp.responseText;
                        let friendBox = document.getElementById('friendRequestBox' + fid);
                        friendBox.style.display = "none";  
                        
                    let allUserBox = document.getElementById('allUserBox');
                                
                      allUserBox.innerHTML += 

                        html = `
                                  <div class="d-flex bg-light ms-2 text-dark ps-2 m-0 p-0 border justify-content-between">
                                    <div class="d-flex flex-row">
                                        <img src="${avatar}" style="width:25px;height:25px;border-radius:50%;" class="me-2 mt-1">
                                        <p>${display}</p> 

                                    </div>
                                    <!-- add friend  -->
                                    <form action="#" id="frm" class="border-0 bg-light">
                                      <input hidden="" type="number" name="fr" value="1">
                                      <input hidden="" type="text" name="fid" value="57">
                                      <input hidden="" type="text" name="uid" value="36">
                                      <span id="fbox" class="d-none">&nbsp;</span>
                                      <button type="button" id="btn${fid}" name="submit" value="Send" style="font-size:16px;border:none;background-color:transparent;" onclick="loadXmlDoc(fr.value, fid.value, uid.value)" class="p-0 border-none mx-4 text-danger">
                                          <span id="ico${fid}" class="material-symbols-outlined w3-text-deep-purple">group_add</span>
                                          <span id="icon${fid}" class="material-symbols-outlined " style="display:none;">forward_to_inbox</span>
                                      </button>

                                            </form>                               </div>
                                
                            `;
                    }
                }
                xmlhttp.open("POST", "decline_friend_request.php", true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("accept=" + accept + "&" + "fid=" + fid + "&" + "uid=" + uid + "&" + "record=" + record);
            }
        </script>

          
          <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
            <p>ADS</p>
          </div>
          <br>
          
          <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
            <p><i class="fa fa-bug w3-xxlarge"></i></p>
          </div>
          
        <!-- End Right Column -->
        </div>
      </div>
    
   <!-- End Grid -->

  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>END</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.brmcontractors.net" target="_blank">BRM</a></p>
</footer>
 

<!-- Edit Profile Modal Start -->
<div class="modal fade mt-5" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class= "mx-1 order-0" method="post">
            
            <div class="d-flex flex-row align-items-center mb-1">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" hidden id="uID" name="uID" class="form-control"  value="<?php echo $_SESSION['a_ID']?>" />
                  <label class="form-label" hidden for="uID">ID</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uDisplay" name="uDisplay" class="form-control"  value="<?php echo $_SESSION['a_user']?>" />
                  <label class="form-label ms-3" for="uDisplay">Display Name</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uAvatar" name="uAvatar"class="form-control"  value="<?php echo $_SESSION['a_avatar']?>" />
                  <label class="form-label ms-3" for="uAvatar">Your Avatar URL</label>
               </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uFeeling" name="uFeeling"class="form-control"  value="<?php echo $_SESSION['a_feeling']?>" />
                  <label class="form-label ms-3" for="uFeeling">Your Feeling</label>
               </div>
            </div>


            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uPassword" name="uPassword" class="form-control"  value="<?php echo $_SESSION['a_password']?>"/>
                  <label class="form-label" for="uPassword">Password</label>
                </div>
            </div>

            
            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uEmail" name="uEmail" class="form-control"  value="<?php echo $_SESSION['a_email']?>"/>
                  <label class="form-label" for="uEmail">Email</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uHero" name="uHero" class="form-control"  value="<?php echo $_SESSION['a_hero']?>"/>
                  <label class="form-label" for="uHero">Hero Image</label>
                </div>
            </div>
 

            <div class="d-flex justify-content-center mx-1 mb-0 mb-lg-12">
                <div class="modal-footer">
                    <button name="edit-profile" class="w3-button w3-theme-d5">Save</button>
                    <button type="button" class="w3-button w3-red" data-bs-toggle="modal" data-bs-target="#deleteProfileModal" data-bs-dismiss="modal">Delete </button>
                    <button type="button" class="w3-button w3-theme-d2" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </form>
      </div>

    </div>
  </div>
</div>
<!-- Edit Profile Modal End-->

<!-- Delete Profile Modal Start-->
<div class="modal fade mt-5" id="deleteProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="mx-1 mx-md-1 border-0" method="post">
           <p>Deleting a profile can not be undone. Are you sure you want to delete profile?</p>
            <div class="d-flex justify-content-center mx-1 mb-0 mb-lg-12">
                <div class="modal-footer">
                    <button name="delete-profile" class="w3-button w3-red">Delete</button>
                    <button type="button" class="w3-button w3-theme-d2" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-1">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" hidden id="uID" name="uID" class="form-control"  value="<?php echo $_SESSION['a_ID']?>" />
                  <label class="form-label" hidden for="uID">ID</label>
                </div>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Delete Profile Modal End-->

<!-- Modal create Feed START -->
<div class="modal fade mt-5" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <!-- Modal feed header START -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelCreateFeed">Create post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal feed header END -->

      <!-- Modal feed body START -->
      <div class="modal-body">
         <!-- Add Feed -->
         <div class="d-flex mb-3">
          <!-- Avatar -->
          <div class="me-2">
              
            <img class="img-thumbnail rounded-circle" width="135" height="135" src="<?php echo $_SESSION['a_avatar'];?>" alt="">
          </div>


          <form action="#" id="frm" class="border-0 bg-light w-100">

            <input hidden type="text" value="<?php echo $_SESSION['a_ID'];?> " name="userId" id="userId">
            <textarea name="userFeeling" class="form-control pe-4 fs-5 lh-1 border-0" rows="4" id="userCommet" placeholder="Share your thoughts..." autofocus></textarea>

            <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" style='border:none;background-color:transparent;' 
                    onclick="loadXmlDocFeeling(userId.value, userFeeling.value)" style="border:0;"
                    class="button w3-theme-d2 text-white">
                  Post
            </button>
          </form>   

        </div>

        <!-- script to handle delete friend relationship  -->
        <script>
          
            function loadXmlDocFeeling(uid, feeling){
              var xmlhttp;
                      if (window.XMLHttpRequest){
                          xmlhttp = new XMLHttpRequest();
                      }
                      else{
                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                      }
                      xmlhttp.onreadystatechange = function(){
                          if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                              console.log('you made it');

                              let feelingBox = document.getElementById('feeling');
                              feelingBox.innerHTML = feeling;  
   
                  //             $(function () {
                  //  $('#modalCreateFeed').modal('toggle');
                    //          });

                              document.getElementById('userCommet').value = '';                              
                                                        
                          };
                      }
                      xmlhttp.open("POST", "feeling.php", true);
                      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                      xmlhttp.send("userId=" + uid + "&" + "userFeeling=" + feeling);
                  }
        </script>

      </div>
      <!-- Modal feed body END -->
      


    </div>
  </div>
</div>
<!-- Modal create feed END -->

<!-- Modal create Feed photo START -->
<div class="modal fade" id="feedActionPhoto" tabindex="-1" aria-labelledby="feedActionPhotoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal feed header START -->
      <div class="modal-header">
        <h5 class="modal-title" id="feedActionPhotoLabel">Add post photo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal feed header END -->

        <!-- Modal feed body START -->
        <div class="modal-body">
        <!-- Add Feed -->
        <div class="d-flex mb-3">
          <!-- Avatar -->
          <div class="avatar avatar-xs me-2">
            <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="">
          </div>
          <!-- Feed box  -->
          <form class="w-100">
            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
          </form>
        </div>

        <!-- Dropzone photo START -->
        <div>
          <label class="form-label">Upload attachment</label>
          <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
            <div class="dz-message">
              <i class="bi bi-images display-3"></i>
              <p>Drag here or click to upload photo.</p>
            </div>
          </div>
        </div>
        <!-- Dropzone photo END -->

        </div>
        <!-- Modal feed body END -->

        <!-- Modal feed footer -->
        <div class="modal-footer ">
          <!-- Button -->
            <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-success-soft">Post</button>
        </div>
        <!-- Modal feed footer -->
    </div>
  </div>
</div>
<!-- Modal create Feed photo END -->

<!-- Modal create Feed video START -->
<div class="modal fade" id="feedActionVideo" tabindex="-1" aria-labelledby="feedActionVideoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
     <!-- Modal feed header START -->
     <div class="modal-header">
      <h5 class="modal-title" id="feedActionVideoLabel">Add post video</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <!-- Modal feed header END -->

      <!-- Modal feed body START -->
      <div class="modal-body">
       <!-- Add Feed -->
       <div class="d-flex mb-3">
        <!-- Avatar -->
        <div class="avatar avatar-xs me-2">
          <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="">
        </div>
        <!-- Feed box  -->
        <form class="w-100">
          <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="2" placeholder="Share your thoughts..."></textarea>
        </form>
      </div>

      <!-- Dropzone photo START -->
      <div>
        <label class="form-label">Upload attachment</label>
        <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
          <div class="dz-message">
            <i class="bi bi-camera-reels display-3"></i>
                <p>Drag here or click to upload video.</p>
          </div>
        </div>
      </div>
      <!-- Dropzone photo END -->

    </div>
      <!-- Modal feed body END -->

      <!-- Modal feed footer -->
      <div class="modal-footer">
        <!-- Button -->
        <button type="button" class="btn btn-danger-soft me-2"><i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
        <button type="button" class="btn btn-success-soft">Post</button>
      </div>
      <!-- Modal feed footer -->
    </div>
  </div>
</div>
<!-- Modal create Feed video END -->

<!-- Modal create events START -->
<div class="modal fade mt-5" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal feed header START -->
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabelCreateAlbum">Create event</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal feed header END -->
      <!-- Modal feed body START -->
      <div class="modal-body">
        <!-- Form START -->
        <form class="row g-4">
          <!-- Title -->
          <div class="col-12">
            <label class="form-label">Title</label>
            <input type="email" class="form-control" placeholder="Event name here">
          </div>
          <!-- Description -->
          <div class="col-12">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="2" placeholder="Ex: topics, schedule, etc."></textarea>
          </div>
          <!-- Date -->
          <div class="col-sm-4">
            <label class="form-label">Date</label>
            <input type="text" class="form-control flatpickr" placeholder="Select date">
          </div>
          <!-- Time -->
          <div class="col-sm-4">
            <label class="form-label">Time</label>
            <input type="text" class="form-control flatpickr" data-enableTime="true" data-noCalendar="true" placeholder="Select time">
          </div>
          <!-- Duration -->
          <div class="col-sm-4">
            <label class="form-label">Duration</label>
            <input type="email" class="form-control" placeholder="1hr 23m">
          </div>
          <!-- Location -->
          <div class="col-12">
            <label class="form-label">Location</label>
            <input type="email" class="form-control" placeholder="Logansport, IN 46947">
          </div>
          <!-- Add guests -->
          <div class="col-12">
            <label class="form-label">Add guests</label>
            <input type="email" class="form-control" placeholder="Guest email">
          </div>
         
        </form>
        <!-- Form END -->
      </div>
      <!-- Modal feed body END -->
      <!-- Modal footer -->
      <!-- Button -->
      <div class="modal-footer">
        <button type="button" class="button w3-theme-d1 me-1" data-bs-dismiss="modal"> Cancel</button>
        <button type="button" class="button w3-theme-d3">Create now</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal create events END -->

<!-- Modal Update hero image START-->
<div class="modal fade" id="heroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Update profile background image</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="modal-body" style="height:200px;">

                    <!-- update hero image button  -->
                    <form action="#" id="frmHero" class="position-absolute bg-transparent border-0">

                          <input  type="text" name="hero" value="<?php echo $_SESSION['a_hero']?>"/>
                          <input hidden type="text" name="uid" value="<?php echo $_SESSION['a_ID']?>"/>
                          
                          <span id="heroBox" class="">&nbsp;</span>
                          <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" 
                              onclick="loadXmlDocHero(uid.value, hero.value, )"
                              class="p-2 border-0 button w3-theme-d4">
                            <span id="" class="material-symbols-outlined w3-text-white">check</span> Save Changes
                          </button>
                            
                      </form> 

                      <div id="heroUpdate" class="position-absolute d-none" style="bottom:10px;"></div>
      
                      <!-- script to handle delete friend relationship  -->
                      <script>
                          function loadXmlDocHero(uid, hero){
                              var xmlhttp;
                              if (window.XMLHttpRequest){
                                  xmlhttp = new XMLHttpRequest();
                              }
                              else{
                                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                              }
                              xmlhttp.onreadystatechange = function(){
                                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                                  
                                        let imgTag = `
                                      <img src="${this.responseText}" alt="<?php echo $_SESSION['a_user']; ?>" 
                                      class="" style="border-radius:20%; object-fit: fill;
                                            object-position:center;border:6px solid #fff;" width="80" height="80">
                                      `;
                                      document.getElementById('heroUpdate').innerHTML = imgTag;  
                                      
                                      $(function () {
                                        $('#heroModal').modal('toggle');
                                      });                                         
                                   
                                      let heroContainer = document.getElementById('heroImg');
                                      heroContainer.style.backgroundImage = `url(${hero})`;
                                    
                                  };

                              }
                              xmlhttp.open("POST", "edit_hero.php", true);
                              xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                              xmlhttp.send("uid=" + uid + "&" + "hero=" + hero);
                          }
                      </script>

                  </div>

                </div>
              </div>
            </div>
<!-- Modal Update hero image END-->

<!-- Modal Update avatar image START-->
<div class="modal fade" id="avatarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Update avatar image</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <div class="modal-body" style="height:200px;">

                    <!-- update avatar image button  -->
                    <form action="#" id="frmAvatar" class="position-absolute bg-transparent border-0">

                          <input  type="text" name="avatar" value="<?php echo $_SESSION['a_avatar']?>"/>

                          <!-- <div class="col-sm-6 col-md-9 mt-4">
                            <label for="file" class="pb-3"><strong class="text-secondary"> Select image to upload:</strong></label>
                            <input type="file" name="fileToUpload2" id="fileToUpload2" class="form-control-file " required>
                          </div> -->

                          <input hidden type="text" name="uid" value="<?php echo $_SESSION['a_ID']?>"/>
                          
                          <span id="heroBox" class="">&nbsp;</span>

                          <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" 
                              onclick="loadXmlDocAvatar(uid.value, avatar.value)"
                              class="p-2 border-0 button w3-theme-d4">
                            <span id="" class="material-symbols-outlined w3-text-white">check</span> Save Changes
                          </button>
                            
                      </form> 

                      <div id="heroUpdate" class="position-absolute d-none" style="bottom:10px;"></div>
      
                      <!-- script to handle avatar image  -->
                      <script>
                          function loadXmlDocAvatar(uid, avatar){
                              var xmlhttp;
                              if (window.XMLHttpRequest){
                                  xmlhttp = new XMLHttpRequest();
                              }
                              else{
                                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                              }
                              xmlhttp.onreadystatechange = function(){
                                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                                      
                                      $(function () {
                                        $('#avatarModal').modal('toggle');
                                      });                                         
                                   
                                      let avatarContainer = document.getElementById('avatarImg');
                                      avatarContainer.src = avatar;
                                      document.getElementById('feelingAvatar').src = avatar;
                                    
                                  };

                              }
                              xmlhttp.open("POST", "edit_avatar.php", true);
                              xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                              xmlhttp.send("uid=" + uid + "&" + "avatar=" + avatar);
                          }
                      </script>

                  </div>

                </div>
              </div>
            </div>

<!-- Modal Update avatar image END-->

<script src="app.js"></script>

    <!-- accordion drop down scripts  -->
    <script>
    // Accordion
    function myFunction(id) {
      var x = document.getElementById(id);
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
      } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
      }
    }

    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
    </script>
  
    <!-- delete friend relationship handler -->
    <script>
                  function deleteFriend(fid, uid, avatar, display) {
                    result = confirm("Are you sure you want to remove friendship with " +  display + "?");
                    if (result) {
                      console.log(fid + uid + display + avatar)
                      loadXmlDocFRDelete(fid, uid, display, avatar);
                    } else {
                      alert('Wowzers.. that was a close call!')
                    }
                  };
                
          
                  function loadXmlDocFRDelete(fid, uid, display, avatar){
                      var xmlhttp;
                      if (window.XMLHttpRequest){
                          xmlhttp = new XMLHttpRequest();
                      }
                      else{
                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                      }
                      xmlhttp.onreadystatechange = function(){
                          if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                              console.log(this.responseText);
                              let friendCardId = 'friendCard' + fid; 
                              let friendCard = document.getElementById(friendCardId);
                              friendCard.remove();

                              let allUserBox = document.getElementById('allUserBox');
                              
                              allUserBox.innerHTML += 
          
                              html = `
                                        <div class="d-flex bg-light ms-2 text-dark ps-2 m-0 p-0 border justify-content-between">
                                          <div class="d-flex flex-row">
                                              <img src="${avatar}" style="width:25px;height:25px;border-radius:50%;" class="me-2 mt-1">
                                              <p>${display}</p> 
          
                                          </div>
                                          <!-- add friend  -->
                                          <form action="#" id="frm${fid}" class="border-0 bg-light">
                                              <input hidden="" type="number" name="fr" value="1">
                                              <input hidden="" type="text" name="fid" value="57">
                                              <input hidden="" type="text" name="uid" value="36">
                                              <span id="fbox" class="d-none">&nbsp;</span>
                                              <button type="button" id="" name="submit" value="Send" style="font-size:16px;border:none;background-color:transparent;" onclick="alert('You just deleted..take a break!')" class="p-0 border-none mx-4 text-danger">
                                                        <span id="" class="material-symbols-outlined w3-text-deep-purple">group_add</span>
                                                        <span id="" class="material-symbols-outlined " style="display:none;">forward_to_inbox</span>
                                                      </button>

                                          </form> 
                                        </div>                                       
                                      
                                  `;
                                                                
                          };
                      }
                      xmlhttp.open("POST", "delete_friend_request.php", true);
                      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                      xmlhttp.send("fid=" + fid + "&" + "uid=" + uid + "&" + "display=" + display + "&" + "avatar=" + avatar);
                  }
    </script>

    <!-- send friend request form handler  -->
    <script type="text/javascript">
        
        function loadXmlDoc(fr, fid, uid){
            var xmlhttp;
            if (window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }
            else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                    document.getElementById("fbox").innerHTML = xmlhttp.responseText;
                    let icoId = 'ico' + fid;
                    let ico = document.getElementById(icoId);
                    ico.style.display = 'none';

                    let iconId = 'icon' + fid;
                    let icon2 = document.getElementById(iconId);
                    icon2.style.display = 'block';

                    let btnId = 'btn' + fid;
                    let btn = document.getElementById(btnId);
                    btn.value = 'sent';
                    btn.disabled = 'true';

                    let boxId = 'friendCard' + fid;
                    let box = document.getElementById(boxId);
                    box.style.opacity = '.74';
                    box.style.animation = 'all 900';
                    
                }
            }
            xmlhttp.open("POST", "send_friend_req.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("fr=" + fr + "&" + "fid=" + fid + "&" + "uid=" + uid);
        }
    </script>

    <!-- profile view card handler  -->
    <script>

      function loadCard(str){
          var xmlhttp;
          if (window.XMLHttpRequest){
              xmlhttp = new XMLHttpRequest();
          }
          else{
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                                          
                  document.getElementById("friendBox").innerHTML = xmlhttp.responseText;
                  document.getElementById('id01').style.display='block';
                
                  // document.addEventListener("click", ()=>{document.getElementById('id01').style.display='none';})                                          
              };
          }
          xmlhttp.open("POST", "view_profile.php", true);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xmlhttp.send("str=" + str + "&" + "str=" + str);
      }
    </script>

    <!-- friend card profile handler  -->
    <script>
      function loadUserCard(str){
            var xmlhttp;
            if (window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }
            else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function(){
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                                            
                    document.getElementById("friendBox").innerHTML = xmlhttp.responseText;
                    document.getElementById('id01').style.display='block';
                                                      
                };
            }
            xmlhttp.open("POST", "view_profile.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("str=" + str + "&" + "str=" + str);
        }
        
    </script>

    <!-- mail friend handler MODAL  -->
    <script>
      function sendMailFriend(str, uid){
            

      var xmlhttp;
      if (window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
      }
      else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
                                            
          document.getElementById("friendBox").innerHTML = xmlhttp.responseText;
          document.getElementById('id01').style.display='block';
                                                      
        };
      }
      
      xmlhttp.open("POST", "send_friend_mail.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("str=" + str + "&" + "uid=" + uid);
        }
    </script>

    <!-- mail handler script to send mail message   -->
    <script>
      function sendMail(message, fid, uid){
 
        var xmlhttp;
        if (window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
        }
        else{
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function(){
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
            document.getElementById('message').innerHTML = '';
            document.getElementById('message').innerHTML = this.responseText;
            document.getElementById('mailMessage').value = '';
          };
         }

        xmlhttp.open("POST", "handle_mail.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("message=" + message + "&" + "fid=" + fid + "&" + "uid=" + uid);

        }
    </script>

  <!-- delete mail script  -->
  <script>
         
         function deleteMail (messageId) {

          var xmlhttp;
          if (window.XMLHttpRequest){
            xmlhttp = new XMLHttpRequest();
          }
          else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange = function(){
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
              // document.getElementById('deleteMail').innerHTML = this.responseText;
              document.getElementById('message' + messageId).remove();
            };
          }

          xmlhttp.open("POST", "delete_mail.php", true);
          xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xmlhttp.send("messageId=" + messageId);

        }
  </script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- poll database -->
  <script>
 function handleNotification(userid){
      var xmlhttp;
      if (window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
      }
      else{
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
                xmlhttp.onreadystatechange = function(){
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
    
                       let html = this.responseText;
                       document.getElementById('notificationBox').innerHTML += html;
  
                  
                    };

                }
            xmlhttp.open("POST", "handle_notifications.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("userid=" + userid );
          };




  jQuery(function($) {
    setInterval(function() {
      let user = <?php echo $_SESSION['a_ID'];?>;

      handleNotification(user);
      
    }, 12000);
  });






  </script>

  </body>
</html>

      <!-- get date  -->
      <?php
        function getDateOnly($d) {
              $mydatetime = $d;
              $datetimearray = explode(" ", $mydatetime);
              $date = $datetimearray[0];
              $time = $datetimearray[1];
              $reformatted_date = date('F j, Y',strtotime($date)); // March 10, 2001
              // $reformatted_date = date('m-d-y',strtotime($date)); // 03.10.01
              $reformatted_time = date('g:i a',strtotime($time));  
              return $reformatted_date . ' ' . $reformatted_time;
          };
          function getDateTimeDifferenceString() {
            return;
          }
      ?>

      <!-- time elapsed  -->
      <?php function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $w = floor($diff->d / 7);
        $diff->d -= $w * 7;
        $string = ['y' => 'year','m' => 'month','w' => 'week','d' => 'day','h' => 'hour','i' => 'minute','s' => 'second'];
        foreach ($string as $k => &$v) {
            if ($k == 'w' && $w) {
                $v = $w . ' week' . ($w > 1 ? 's' : '');
            } else if (isset($diff->$k) && $diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
      }?>





