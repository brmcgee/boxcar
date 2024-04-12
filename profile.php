
<?php require_once('access.php') ?>
<?php include_once('head_section.php') ?>


	<title>Social</title>
  
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

	

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	<link rel="stylesheet" href="https://social.webestica.com/assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="https://social.webestica.com/assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" href="https://social.webestica.com/assets/vendor/dropzone/dist/dropzone.css">
	<link rel="stylesheet" href="https://social.webestica.com/assets/vendor/choices.js/public/assets/styles/choices.min.css">
	<link rel="stylesheet" href="https://social.webestica.com/assets/vendor/bootstrap-icons/bootstrap-icons.css">
	<link rel="stylesheet" href="https://social.webestica.com/assets/css/style.css">

</head>
<body>


<!-- **************** MAIN CONTENT START **************** -->
<main>
  
  <!-- Container START -->
  <div class="container">
    <div class="row g-4">

      <!-- Main content START -->
      <div class="col-lg-8 vstack gap-4">
        <!-- My profile START -->
        <div class="card">
          <!-- Cover image -->
          <div class="h-200px rounded-top" style="background-image:url(https://www.elegantthemes.com/blog/wp-content/uploads/2013/09/bg-8-full.jpg); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
            <!-- Card body START -->
            <div class="card-body py-0">
              <div class="d-sm-flex align-items-start text-center text-sm-start">
                <div>
                  <!-- Avatar -->
                  <div class="avatar avatar-xxl mt-n5 mb-3">
                    <img class="avatar-img rounded-circle border border-white border-3" src="<?php echo $_SESSION['a_avatar'];?>" alt="">
                  </div>
                </div>
                <div class="ms-sm-4 mt-sm-3">
                  <!-- Info -->
                  <h1 class="mb-0 h5"><?php echo $_SESSION['a_user'];?><i class="bi bi-patch-check-fill text-success small"></i></h1>
                  <p>250 connections</p>
                </div>
                <!-- Button -->
                <div class="d-flex mt-3 justify-content-center ms-sm-auto">
                  <button class="btn btn-danger-soft me-2" type="button"> <i class="bi bi-pencil-fill pe-1"></i> Edit profile </button>
                  <div class="dropdown">
                    <!-- Card share action menu -->
                    <button class="icon-md btn btn-light" type="button" id="profileAction2" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots"></i>
                    </button>
                    <!-- Card share action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileAction2">
                      <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Share profile in a message</a></li>
                      <li><a class="dropdown-item" href="#"> <i class="bi bi-file-earmark-pdf fa-fw pe-2"></i>Save your profile to PDF</a></li>
                      <li><a class="dropdown-item" href="#"> <i class="bi bi-lock fa-fw pe-2"></i>Lock profile</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#"> <i class="bi bi-gear fa-fw pe-2"></i>Profile settings</a></li>
                    </ul>
                  </div>
                </div>
              </div>

              <!-- List profile -->
              <ul class="list-inline mb-0 text-center text-sm-start mt-3 mt-sm-0">
                <li class="list-inline-item"><i class="bi bi-briefcase me-1"></i> Lead Developer</li>
                <li class="list-inline-item"><i class="bi bi-geo-alt me-1"></i> New Hampshire</li>
                <li class="list-inline-item"><i class="bi bi-calendar2-plus me-1"></i> Joined on Nov 26, 2019</li>
              </ul>
            </div>
            <!-- Card body END -->


            <div class="card-footer mt-3 pt-2 pb-0">
              <!-- Nav profile pages -->
              <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
                <li class="nav-item"> <a class="nav-link active" href="my-profile.html"> Posts </a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-about.html"> About </a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-connections.html"> Connections <span class="badge bg-success bg-opacity-10 text-success small"> 230</span> </a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-media.html"> Media</a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-videos.html"> Videos</a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-events.html"> Events</a> </li>
                <li class="nav-item"> <a class="nav-link" href="my-profile-activity.html"> Activity</a> </li>
              </ul>
            </div>
          </div>
          <!-- My profile END -->


          <!-- Share feed START -->
          <div class="card card-body">
            <div class="d-flex mb-3">
              <!-- Avatar -->
              <div class="avatar avatar-xs me-2">
                <a href="#"> <img class="avatar-img rounded-circle" src="<?php echo $_SESSION['a_avatar'];?>" alt=""> </a>
              </div>
              <!-- Post input -->
              <form class="w-100">
                <input class="form-control pe-4 border-0" placeholder="Share your thoughts..." data-bs-toggle="modal" data-bs-target="#modalCreateFeed">
              </form>
            </div>
            <!-- Share feed toolbar START -->
            <ul class="nav nav-pills nav-stack small fw-normal">
              <li class="nav-item">
                <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionPhoto"> <i class="bi bi-image-fill text-success pe-2"></i>Photo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#feedActionVideo"> <i class="bi bi-camera-reels-fill text-info pe-2"></i>Video</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link bg-light py-1 px-2 mb-0" data-bs-toggle="modal" data-bs-target="#modalCreateEvents"> <i class="bi bi-calendar2-event-fill text-danger pe-2"></i>Event </a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-light py-1 px-2 mb-0" href="#!" data-bs-toggle="modal" data-bs-target="#modalCreateFeed"> <i class="bi bi-emoji-smile-fill text-warning pe-2"></i>Feeling /Activity</a>
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
          <!-- Share feed END -->




          <!-- Card feed item START -->
          <div class="card">
            
            <div class="border-bottom">
              <p class="small mb-0 px-4 py-2"><i class="bi bi-heart-fill text-danger pe-1"></i>Sam Lanson likes this post</p>
            </div>
            <!-- Card header START -->
            <div class="card-header border-0 pb-0">
              <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                  <!-- Avatar -->
                  <div class="avatar me-2">
                    <a href="#"> <img class="avatar-img rounded-circle" src="https://social.webestica.com/assets/images/logo/13.svg" alt=""> </a>
                  </div>
                  <!-- Title -->
                  <div>
                    <h6 class="card-title mb-0"> <a href="#!"> Apple Education </a></h6>
                    <p class="mb-0 small">9 November at 23:29</p>
                  </div>
                </div>
                <!-- Card share action menu -->
                <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardShareAction5" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-three-dots"></i>
                </a>
                <!-- Card share action dropdown menu -->
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction5">
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark fa-fw pe-2"></i>Save post</a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-person-x fa-fw pe-2"></i>Unfollow lori ferguson </a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-x-circle fa-fw pe-2"></i>Hide post</a></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-slash-circle fa-fw pe-2"></i>Block</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#"> <i class="bi bi-flag fa-fw pe-2"></i>Report post</a></li>
                </ul>
              </div>
                <!-- Card share action END -->
            </div>
            <!-- Card header START -->

            <!-- Card body START -->
            <div class="card-body pb-0">
              <p>Find out how you can save time in the classroom this year. Earn recognition while you learn new skills on iPad and Mac. Start  recognition your first Apple Teacher badge today!</p>
              <!-- Feed react START -->
              <ul class="nav nav-stack pb-2 small">
                <li class="nav-item">
                  <a class="nav-link active text-secondary" href="#!"> <i class="bi bi-heart-fill me-1 icon-xs bg-danger text-white rounded-circle"></i> Louis, Billy and 126 others </a>
                </li>
                <li class="nav-item ms-sm-auto">
                  <a class="nav-link" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                </li>
              </ul>
              <!-- Feed react END -->
            </div>
            <!-- Card body END -->
            <!-- Card Footer START -->
            <div class="card-footer py-3">
              <!-- Feed react START -->
              <ul class="nav nav-fill nav-stack small">
                <li class="nav-item">
                  <a class="nav-link mb-0 active" href="#!"> <i class="bi bi-heart pe-1"></i>Liked (56)</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0" href="#!"> <i class="bi bi-chat-fill pe-1"></i>Comments (12)</a>
                </li>
                <!-- Card share action dropdown START -->
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link mb-0" id="cardShareAction6" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-reply-fill flip-horizontal ps-1"></i>Share (3)
                  </a>
                  <!-- Card share action dropdown menu -->
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardShareAction6">
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-envelope fa-fw pe-2"></i>Send via Direct Message</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-bookmark-check fa-fw pe-2"></i>Bookmark </a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-link fa-fw pe-2"></i>Copy link to post</a></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-share fa-fw pe-2"></i>Share post via …</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"> <i class="bi bi-pencil-square fa-fw pe-2"></i>Share to News Feed</a></li>
                  </ul>
                </li>
                <!-- Card share action dropdown END -->
                <li class="nav-item">
                  <a class="nav-link mb-0" href="#!"> <i class="bi bi-send-fill pe-1"></i>Send</a>
                </li>
              </ul>
              <!-- Feed react END -->
            </div>
            <!-- Card Footer END -->
          </div>
          <!-- Card feed item END -->
      </div>
      <!-- Main content END -->









	  
      <!-- Right sidebar START -->
      <div class="col-lg-4">

        <div class="row g-4">

          <!-- Card START -->
          <div class="col-md-6 col-lg-12">
            <div class="card">
              <div class="card-header border-0 pb-0">
                <h5 class="card-title">About</h5>
                <!-- Button modal -->
              </div>
              <!-- Card body START -->
              <div class="card-body position-relative pt-0">
                <p>He moonlights difficult engrossed it, sportsmen. Interested has all Devonshire difficulty gay assistance joy.</p>
                <!-- Date time -->
                <ul class="list-unstyled mt-3 mb-0">
                  <li class="mb-2"> <i class="bi bi-calendar-date fa-fw pe-1"></i> Born: <strong> October 20, 1990 </strong> </li>
                  <li class="mb-2"> <i class="bi bi-heart fa-fw pe-1"></i> Status: <strong> Single </strong> </li>
                  <li> <i class="bi bi-envelope fa-fw pe-1"></i> Email: <strong><?php echo $_SESSION['a_email']?></strong> </li>
                </ul>
              </div>
              <!-- Card body END -->
            </div>
          </div>
          <!-- Card END -->

          <!-- Card START -->
          <div class="col-md-6 col-lg-12">
            <div class="card">
              <!-- Card header START -->
              <div class="card-header d-flex justify-content-between border-0">
                <h5 class="card-title">Experience</h5>
                <a class="btn btn-primary-soft btn-sm" href="#!"> <i class="fa-solid fa-plus"></i> </a>
              </div>
              <!-- Card header END -->
              <!-- Card body START -->
              <div class="card-body position-relative pt-0">
                <!-- Experience item START -->
                <div class="d-flex">
                  <!-- Avatar -->
                  <div class="avatar me-3">
                    <a href="#!"> <img class="avatar-img rounded-circle" src="https://1.bp.blogspot.com/-Sf4sPT42qCA/UM4IxB3MzFI/AAAAAAAABlg/8GIO3ApcVQY/s1600/apple+logo+png.png" alt=""> </a>
                  </div>
                  <!-- Info -->
                  <div>
                    <h6 class="card-title mb-0"><a href="#!"> Apple Computer, Inc. </a></h6>
                    <p class="small">May 2015 – Present Employment Duration 8 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                  </div>
                </div>
                <!-- Experience item END -->

                <!-- Experience item START -->
                <div class="d-flex">
                  <!-- Avatar -->
                  <div class="avatar me-3">
                    <a href="#!"> <img class="avatar-img rounded-circle" src="https://lofrev.net/wp-content/photos/2016/06/microsoft-logo-1.jpg" alt=""> </a>
                  </div>
                  <!-- Info -->
                  <div>
                    <h6 class="card-title mb-0"><a href="#!"> Microsoft Corporation </a></h6>
                    <p class="small">May 2017 – Present Employment Duration 1 yrs 5 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                  </div>
                </div>
                <!-- Experience item END -->

                <!-- Experience item START -->
                <div class="d-flex">
                  <!-- Avatar -->
                  <div class="avatar me-3">
                    <a href="#!"> <img class="avatar-img rounded-circle" src="https://www.carlogos.org/logo/Tata-Group-logo-3840x2160.png" alt=""> </a>
                  </div>
                  <!-- Info -->
                  <div>
                    <h6 class="card-title mb-0"><a href="#!"> Tata Consultancy Services. </a></h6>
                    <p class="small mb-0">May 2022 – Present Employment Duration 6 yrs 10 mos <a class="btn btn-primary-soft btn-xs ms-2" href="#!">Edit </a></p>
                  </div>
                </div>
                <!-- Experience item END -->

              </div>
              <!-- Card body END -->
            </div>
          </div>
          <!-- Card END -->
          
          <!-- Card START -->
          <div class="col-md-6 col-lg-12">
            <div class="card">
              <!-- Card header START -->
              <div class="card-header d-sm-flex justify-content-between border-0">
                <h5 class="card-title">Photos</h5>
                <a class="btn btn-primary-soft btn-sm" href="#!"> See all photo</a>
              </div>
              <!-- Card header END -->
              <!-- Card body START -->
              <div class="card-body position-relative pt-0">
                <div class="row g-2">

                  <!-- Photos item -->
                  <div class="col-6">
                    <a href="assets/images/albums/01.jpg" data-gallery="image-popup" data-glightbox="">
                      <img class="rounded img-fluid" src="https://live.staticflickr.com/4228/34609329072_9762a663f5_b.jpg" alt="">
                    </a>
                  </div>
                  <!-- Photos item -->
                  <div class="col-6">
                    <a href="assets/images/albums/02.jpg" data-gallery="image-popup" data-glightbox="">
                      <img class="rounded img-fluid" src="https://wallup.net/wp-content/uploads/2016/01/233139-military-military_aircraft-US_Air_Force-USA-F-22_Raptor.jpg" alt="">
                    </a>
                  </div>
                  <!-- Photos item -->
                  <div class="col-4">
                    <a href="assets/images/albums/03.jpg" data-gallery="image-popup" data-glightbox="">
                      <img class="rounded img-fluid" src="https://seancrane.com/blog/wp-content/uploads/2018/06/long_tailed_macaque_2.jpg?is-pending-load=1" alt="">
                    </a>
                  </div>
                  <!-- Photos item -->
                  <div class="col-4">
                    <a href="assets/images/albums/04.jpg" data-gallery="image-popup" data-glightbox="">
                      <img class="rounded img-fluid" src="https://www.elevatecom.com/wp-content/uploads/2019/02/Happy-Place-2_Rubber-Ducky-scaled.jpg" alt="">
                    </a>
                  </div>
                  <!-- Photos item -->
                  <div class="col-4">
                    <a href="assets/images/albums/05.jpg" data-gallery="image-popup" data-glightbox="">
                      <img class="rounded img-fluid" src="https://cfm.yidio.com/images/movie/2371/backdrop-1280x720.jpg" alt="">
                    </a>
                    <!-- glightbox Albums left bar END  -->
                  </div>
                </div>
              </div>
              <!-- Card body END -->
            </div>
          </div>
          <!-- Card END -->

          <!-- Card START -->
          <div class="col-md-6 col-lg-12">
            <div class="card">
              <!-- Card header START -->
              <div class="card-header d-sm-flex justify-content-between align-items-center border-0">
                <h5 class="card-title">Friends <span class="badge bg-danger bg-opacity-10 text-danger"><?php echo sizeof($_SESSION['friend_id']);?></span></h5>
                <a class="btn btn-primary-soft btn-sm" href="#!"> See all friends</a>
              </div>
              <!-- Card header END -->
              <!-- Card body START -->
              <div class="card-body position-relative pt-0">
                <div class="row">
                                    



    <!-- display friends script  -->
            <?php
              foreach ($_SESSION['friend_id'] as $x) {

              $friend_sql = "SELECT * FROM users WHERE user_id = $x";
              $friend_query =  mysqli_query($conn, $friend_sql);
              foreach ($friend_query as $fq) {
                $friendId = $fq['user_id']
                ?> 

            <div class="col-12">
                    <!-- Friends item START -->
                    <div class="card shadow-none text-center h-100">
                      <!-- Card body -->
                      <div class="card-body p-2 pb-0">
                        <div class="avatar avatar-xl">
                          <a href="#!"><img class="avatar-img rounded-circle" src="<?php echo $fq['avatar'];?>" alt=""></a>
                        </div>
                        <h6 class="card-title mb-1 mt-3"> <a href="#!"><?php echo $fq['display_name'];?></a></h6>
                        <p class="mb-0 small lh-sm"><?php echo $fq['r_date'];?></p>
                      </div>
                      <!-- Card footer -->
                      <div class="card-footer p-2 border-0  d-flex justify-content-center ">

                      
                        <!-- add button  -->
                        <form action="#" id="frm" class="border-0 bg-light m-0 p-0 me-1">
                            <input hidden type="text" name="display" value="<?php echo $fq['display_name'];?>"/>
                            <input hidden type="text" name="avatar" value="<?php echo $fq['avatar'];?>"/>
                            <input hidden type="text" name="fid" value="<?php echo $fq['user_id']?>"/>
                            <input hidden type="text" name="uid" value="<?php echo $_SESSION['a_ID']?>"/>
                            
                            <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" 
                                    onclick="addFriend(fid.value, uid.value, avatar.value, display.value)" style="border:0;"
                                    class="btn btn-sm btn-primary">
                                    <i class="bi bi-chat-left-text"></i> 
                            </button>

                            <span id="frDel"></span>
                        </form> 

                        <!-- delete button  -->
                        <form action="#" id="frm" class="border-0 bg-light m-0 p-0">
                            <input hidden type="text" name="display" value="<?php echo $fq['display_name'];?>"/>
                            <input hidden type="text" name="avatar" value="<?php echo $fq['avatar'];?>"/>
                            <input hidden type="text" name="fid" value="<?php echo $fq['user_id']?>"/>
                            <input hidden type="text" name="uid" value="<?php echo $_SESSION['a_ID']?>"/>
                    
                            <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" 
                                    onclick="deleteFriend(fid.value, uid.value, avatar.value, display.value)" style="border:0;"
                                    class="btn btn-sm btn-danger ">
                                    <i class="bi bi-person-x"></i> 
                            </button>

                            <span id="frDel"></span>
                        </form>  
                        
                      </div>
                    </div>
                    <!-- Friends item END -->
                  </div>

            
 

            <!-- script to handle delete friend relationship  -->
            <script>
                function deleteFriend(fid, uid, avatar, display) {
                  result = confirm("Are you sure you want to remove friendship with " +  display + "?");
                  if (result) {
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
                                            <button type="button" id="btn${fid}" name="submit" value="Send" style="font-size:16px;border:none;background-color:transparent;" onclick="loadXmlDoc(fr.value, fid.value, uid.value)" class="p-0 border-none mx-4 text-danger">
                                                      <span id="ico${fid}" class="material-symbols-outlined w3-text-deep-purple">group_add</span>
                                                      <span id="icon${fid}" class="material-symbols-outlined " style="display:none;">forward_to_inbox</span>
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
            <!-- <span class="material-symbols-outlined w3-text-indigo me-1">diversity_1</span> -->
              
                
          <?php }} ?>
                  </div>
                </div>
              </div>
              <!-- Card body END -->
            </div>
          </div>
          <!-- Card END -->
        </div>

      </div>
      <!-- Right sidebar END -->

            </div> <!-- Row END -->
        </div>
  <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Modal create Feed START -->
<div class="modal fade" id="modalCreateFeed" tabindex="-1" aria-labelledby="modalLabelCreateFeed" aria-hidden="true">
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
          <div class="avatar avatar-xs me-2">
            <img class="avatar-img rounded-circle" src="https://social.webestica.com/assets/images/avatar/03.jpg" alt="">
          </div>
          <!-- Feed box  -->
          <form class="w-100">
            <textarea class="form-control pe-4 fs-3 lh-1 border-0" rows="4" placeholder="Share your thoughts..." autofocus></textarea>
          </form>
        </div>
        <!-- Feed rect START -->
        <div class="hstack gap-2">
          <a class="icon-md bg-success bg-opacity-10 text-success rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Photo"> <i class="bi bi-image-fill"></i> </a>
          <a class="icon-md bg-info bg-opacity-10 text-info rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Video"> <i class="bi bi-camera-reels-fill"></i> </a>
          <a class="icon-md bg-danger bg-opacity-10 text-danger rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Events"> <i class="bi bi-calendar2-event-fill"></i> </a>
          <a class="icon-md bg-warning bg-opacity-10 text-warning rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Feeling/Activity"> <i class="bi bi-emoji-smile-fill"></i> </a>
          <a class="icon-md bg-light text-secondary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Check in"> <i class="bi bi-geo-alt-fill"></i> </a>
          <a class="icon-md bg-primary bg-opacity-10 text-primary rounded-circle" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Tag people on top"> <i class="bi bi-tag-fill"></i> </a>
        </div>
        <!-- Feed rect END -->
      </div>
      <!-- Modal feed body END -->
      
      <!-- Modal feed footer -->
      <div class="modal-footer row justify-content-between">
        <!-- Select -->
        <div class="col-lg-3">
          <select class="form-select js-choice" data-position="top" data-search-enabled="false">
            <option value="PB">Public</option>
            <option value="PV">Friends</option>
            <option value="PV">Only me</option>
            <option value="PV">Custom</option>
          </select>
        </div>
        <!-- Button -->
        <div class="col-lg-8 text-sm-end">
          <button type="button" class="btn btn-danger-soft me-2"> <i class="bi bi-camera-video-fill pe-1"></i> Live video</button>
          <button type="button" class="btn btn-success-soft">Post</button>
        </div>
      </div>
      <!-- Modal feed footer -->

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
<div class="modal fade" id="modalCreateEvents" tabindex="-1" aria-labelledby="modalLabelCreateAlbum" aria-hidden="true">
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
          <!-- Avatar group START -->
          <div class="col-12 mt-3">
            <ul class="avatar-group list-unstyled align-items-center mb-0">
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/05.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/06.jpg" alt="avatar">
              </li>
              <li class="avatar avatar-xs">
                <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
              </li>
              <li class="ms-3">
                <small> +50 </small>
              </li>
            </ul>
          </div>
          <!-- Upload Photos or Videos -->
          <!-- Dropzone photo START -->
          <div>
            <label class="form-label">Upload attachment</label>
            <div class="dropzone dropzone-default card shadow-none" data-dropzone='{"maxFiles":2}'>
              <div class="dz-message">
                <i class="bi bi-file-earmark-text display-3"></i>
                <p>Drop presentation and document here or click to upload.</p>
              </div>
            </div>
          </div>
          <!-- Dropzone photo END -->
        </form>
        <!-- Form END -->
      </div>
      <!-- Modal feed body END -->
      <!-- Modal footer -->
      <!-- Button -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger-soft me-2" data-bs-dismiss="modal"> Cancel</button>
        <button type="button" class="btn btn-success-soft">Create now</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal create events END -->
<script src="https://social.webestica.com/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://social.webestica.com/assets/vendor/dropzone/dist/dropzone.js"></script>
<script src="https://social.webestica.com/assets/vendor/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://social.webestica.com/assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://social.webestica.com/assets/js/functions.js"></script>
</body>
</html>

