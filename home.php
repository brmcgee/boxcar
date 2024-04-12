<?php
    include_once('head_section.php');
    include_once('access.php');
?>
    <title>Home | Boxcar</title>
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
<body>

<div class="w3-container w3-content">
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" 
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Feed
        </button>

        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" 
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Mail
        </button>

        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" 
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Profile
        </button>


    </div>
  </nav>
</div>

<!-- FEED TAB  -->
<div class="tab-content" id="nav-tabContent">
  
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <?php include('feeder.php');?>
  </div>


  <!-- MAIL TAB  -->
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
  <div class="w3-container w3-content">
    <div class="w3-col l8">
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
            </div>

  </div>

  <!-- PROFILE TAB -->
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <?php include_once('user_profile.php')?>
  </div>




  
</div>













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



