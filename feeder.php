<?php require_once('access.php') ?>
<?php include_once('head_section.php') ?>

<style>
  html {scroll-behavior:smooth}

  .button-box{
    background-color:rgb(240, 239, 239);
    border-radius:20px;
    margin-bottom:5px;
    outline:none;
    outline: 0 !important;
  }
  .button-box:hover{
    background-color:rgb(240, 239, 241);;
  }
  .button-box:focus{
    background-color:rgb(242, 239, 241);
    outline:none;
  }
</style>


  <div class="px-1" style="max-width:99%;margin:auto;">
      <!-- conditions  -->  
      <?php if(isset($_REQUEST['info'])) { ?>

          <?php if($_REQUEST['info'] == "added") { ?>

              <div class="alert alert-success mt-3" role="alert">
                  Post has been added successfully
              </div>              

          <?php } else if($_REQUEST['info'] == "profile"){ ?> 

              <div class="alert alert-info mt-3" role="alert">
                  Profile has been updated successfully
              </div>
          
          <?php } else if($_REQUEST['info'] == "updated"){ ?> 

            <div class="alert alert-primary mt-3" role="alert">
                Blog post has been updated
            </div>

            <?php } else if($_REQUEST['info'] == "post-deleted"){ ?> 

              <div class="alert alert-warning mt-3" role="alert">
                Category has been deleted
              </div>

          <?php } else if($_REQUEST['info'] == "new-user"){ ?> 

              <div class="alert alert-primary mt-3" role="alert">
                  Succesfully created account
              </div>

          <?php } else if($_REQUEST['info'] == "invalid1"){ ?> 

              <div class="bg-warning text dark p-3 mt-3 h6" role="alert">
                  Invalid credentials please try again!
              </div>

          <?php } else if($_REQUEST['info'] == "comment"){ ?> 

              <div class="bg-info text dark p-3 m-1 h6" role="alert">
                  Comment Added
              </div>
          <?php } else if($_REQUEST['info'] == "liked"){ ?> 

              <div class="alert alert-success p-3 m-1 h6" role="alert">
                  You liked a post!
              </div>
          <?php } else if($_REQUEST['info'] == "unliked"){ ?> 

              <div class="alert alert-info  p-3 m-1 h6" role="alert">
                  You un-liked a post!
              </div>

          <?php } else if($_REQUEST['info'] == "deleted"){ ?> 

              <div class="alert alert-danger mt-1 p-3" role="alert">
                  Blog post has been deleted
              </div>    
          <?php } ?>   
      <?php }; ?>

    <?php 
    // $sql = 'SELECT * FROM myblogs order by RAND() LIMIT 10';
      $sql = "SELECT * FROM myblogs INNER JOIN users ON myblogs.author_id = users.user_id ORDER BY id DESC";
      // $sql = "SELECT * FROM myblogs INNER JOIN users ON myblogs.author_id = users.user_id ORDER BY RAND() LIMIT 10";
      $query = mysqli_query($conn, $sql);
  
      foreach ($query as $q) {  

        $blog_id =  $q['id']; 
        $blog_id_name = 'blog' . $blog_id;  
        $date = $q['reg_date'];
        $title = $q['title'];
        $body = $q['body'];
        $img = $q['img'];
        $comments = $q['comment_count'];
        $likes = $q['likes'];
        $avatar = $q['avatar'];
        $display_name = $q['display_name'];
        $user_id = $q['user_id'];

     ?> 



    <!-- blog posts from db query  -->
    <section id="boxcarPost<?php echo $blog_id;?>"class="mb-2 mx-auto" style="max-width: 46rem;" >
      
      <div class="card" id="<?php echo $blog_id_name;?>">

        <div class="card-body d-flex flex-row justify-content-start">
          <button type="button" class="btn-close position-absolute bg-gray" style="top:5px;right:5px;" aria-label="Close" 
                  onclick="document.getElementById('<?php echo $blog_id_name; ?>').style.display = 'none';"></button>

          <img src="<?php echo $avatar; ?>" class="rounded-circle me-2" height="50px" width="50px" alt="<?php echo $display_name; ?>">
          
          <div>
            <h4 class="card-title fw-bold mb-1 me-5" style="font-size:18px;"><?php echo $title; ?></h4>
            <p class="card-text">
              <span class="me-3 text-secondary"><strong><?php echo $display_name; ?></strong></span><span class="fst-italic"><?php echo getDateOnly($date);?></span>
            </p>
          </div>
        </div>

        <div class="rounded-0 d-flex justify-content-center">
          <img class="img-fluid" style="max-height:480px;" src="<?php echo $img; ?>" alt="<?php echo $title; ?>">
        </div>

        <div class="card-body">
          <p class="card-text lh-sm" style="text-indent:12px;text-align:justify;"><?php echo $body; ?></p>
        </div>
            
        <!-- Comment post Footer  -->
        <div class="mt-1 d-flex justify-content-between border border-top p-2 bg-light flex-column">


 <!-- comment add button ajax jq -->
 <form id="like" class="m-0 p-0 border-0 bg-transparent" action="#">
                              
    <div class="row m-0">

        <input hidden type="text" hidden  name="postid" placeholder="id" value="<?php echo $blog_id; ?>" class="form-control bg-light  my-3 text-center">
        <input hidden type="text" name="user" value="<?php echo  $_SESSION['a_ID'];?>" class="form-control bg-light  my-3 text-center"> 
        <input hidden type="number" name="likeCount" id="likeCount<?php echo $blog_id; ?>" value="<?php echo $likes;?>" class="form-control bg-light  my-3 text-center"> 

      <!-- like button  -->
      <button type="button" onclick="loadXmlHandleLike(postid.value, user.value, likeCount.value, likeCount.value, like.value)"
             class="button-box btn btn-light btn-sm ms-1 w-25 position-absolute" style="right:10px;">  

             <!-- logic for active user like current post  -->
             <?php
                // $q_sql = "SELECT * FROM likes";
                $q_sql = "SELECT * FROM myblogs INNER JOIN likes ON myblogs.id = likes.post_id";

                $query = mysqli_query($conn, $q_sql);
                $bool = 'true';
               
                foreach($query as $like_q) {
                    if ($like_q['post_id'] == $q['id'] && $like_q['user_id'] == $_SESSION['a_ID'] ) {
                        $bool = 'false';
                    } 
                };

                $totalLikes = $like_q['likes'];

                //not liked
                if($bool == 'true') {
                  $bool = 'false';
                  ?>
                    <input  hidden type="text" id="like<?php echo $blog_id; ?>" name="like" value="false">
                    <span class="material-symbols-outlined text-danger text-dark" id="thumbs<?php echo $blog_id ?>" style="">thumbs_up_down</span>
                  <?php
                }
                // liked 
                else {
                  $bool = 'true';
                  ?> 
                    <input  hidden type="text" id="like<?php echo $blog_id; ?>" name="like" value="true">
                    <span class="material-symbols-outlined text-danger " id="thumbs<?php echo $blog_id ?>" style="">thumb_up</span>
                  <?php
                };
              ?>
        <span class="badge bg-danger bg-rounded" style="border-radius:50%;" id="likes<?php echo $blog_id ?>"><?php echo $likes; ?></span>        
      </button> 
    </div>                   
  </form>

    <!-- edit button form top/left START -->
    <?php if (($q['author_id'] == $_SESSION['a_ID']) || ( $_SESSION['a_ID'] == '34')) {?>
      <a class="ms-1 position-absolute" style="top:2px;right:2px;" href="edit.php?id=<?php echo $blog_id; ?>">
        <span class="btn btn-light btn-sm bg-rounded ">
        <span class="material-symbols-outlined fs-2">edit</span></span>
      </a>
    <?php } ?>
    <!-- edit button form top/left END -->

    <!-- Comment button for drop down comment menu -->
    <button onclick="commentDrop('cd<?php echo $blog_id?>')" class="button-box btn btn-light btn-sm ms-1 w-25" style="outline:none;">  
      <span class="material-symbols-outlined">comment</span>
      <span class="badge bg-danger bg-rounded" style="border-radius:50%;" id="commentCount<?php echo $blog_id?>"><?php echo $q['comment_count'] ; ?></span>
    </button>

      <!-- drop down commment  -->
      <div id="cd<?php echo $blog_id?>" class="w3-container w3-hide">
      
      <!-- Comment Chip output -->
      <?php 
       
        $sql = "SELECT * FROM myblogs INNER JOIN comments ON myblogs.id = comments.post_id WHERE myblogs.id = $blog_id ";
        $view_query = mysqli_query($conn, $sql);

        $comment_counter = 0;
        $comment_card_id = 'commentCard' . $blog_id;

        foreach ($view_query as $vq) {
          $comment_counter = $comment_counter + 1;
        };     

        foreach($view_query as $q) {
          $renderID = $q['post_id'];

          if($comment_counter === 0) {
            $renderID = $q['post_id'] ;
          } else {
            $renderID = $q['post_id'];
          };

          $comment_avatar = $q['auth_avatar'];
          $comment_author = $q['author'];
          $comment_date = $q['date'];
          $comment = $q['comment'];
          $date = date('Y/m/d H:i:s');
        ?>    
  
      <!-- Comment Card chips  -->
      <div class="g-1" >

            <ul class="comment-wrap list-unstyled mb-0 p-0">
            <!-- Comment item START -->
              <li class="comment-item m-0 p-0">
                <div class="d-flex justify-content-start  m-0 p-0">
                  <!-- Avatar -->
                  <div class="avatar avatar-xs">
                      <img class="rounded-circle mt-1" src="<?php echo $comment_avatar; ?>" alt="<?php echo $comment_author; ?>" width="40" height="40">
                  </div>
                  <div class="ms-2">
                  <!-- Comment by -->
                  <div class="rounded rounded-start-top-0 px-3 py-1 " style="background-color: rgb(233, 231, 231); border-radius:10px;">
                    
                    <p class="small mb-0  p-0 m-0"><strong><?php echo $comment_author; ?></strong></p>
                    <div class="d-flex justify-content-between">
                      <p class="mb-0 "><?php echo $comment; ?> </p>
                    </div>
                  </div>
                  <p class="small"><?php echo time_elapsed_string($comment_date,  $full = false);?> </p>

                </div>
              </li>
              <!-- Comment item END -->
						</ul>    
            <?php }; ?> 

            <!-- ajax comment target -------------------  -->
            <span id="commentAdd<?php echo $blog_id;?>" class=""></span>
            <!-- ajax comment target -------------------  -->

          <!-- Comment add widget  -->
          <div class="d-flex justify-content-start align-items-center p-1">
                                      
            <!-- comment add button ajax jq -->
            <form id="commentForm<?php echo $blog_id ?>" class="mx-1 mx-md-1 border-0 bg-transparent" action="#">
          
            <div class="row m-0 pb-1">
              <input type="text"  hidden name="cm_postid" placeholder="id" value="<?php echo $blog_id; ?>" class="form-control bg-light  my-3 text-center">
              <input type="text" hidden name="cm_author" value="<?php echo  $_SESSION['a_user'];?>" class="form-control bg-light  my-3 text-center">
              <input type="text" hidden name="cm_avatar" value="<?php echo  $_SESSION['a_avatar'];?>" class="w-100 form-control bg-light  my-3 text-center"> 
              <input disabled type="text" name="cm_id" placeholder="auto" value="" hidden class="form-control bg-light  my-3 text-center">
              <input  type="text" name="cm_date" placeholder="auto" value="<?php echo $date?>" hidden class="form-control bg-light  my-3 text-center">
      

              <div class="col-sm-12 col-md-10 col-lg-10 mb-1">
                <input type="text"  name="cm_comment" value="" id="comment<?php echo $blog_id ?>" value="" placeholder="Share your thoughts...." 
                      class="form-control bg-light text-center border-rounded w-100 m-0" /> 
              </div>

              <div class="col-sm-12 col-md-4 col-lg-2">
                  <!-- Avatar -->
                  <div class="d-flex flex-row g-2">
                    <img class="avatar-img rounded-circle" src="<?php echo $_SESSION['a_avatar'];?>" width="50" height="50" alt="">
                  
                    <button type="button"  class="p-2 border-0 button w3-theme-d4 rounded px-5 ms-3 my-0"
                        onclick="loadXmlAddComment(cm_comment.value, cm_author.value, cm_postid.value, cm_avatar.value, cm_date.value)">
                        <span class="material-symbols-outlined m-0">post_add</span>
                    </button>

                  </div>
              </div>

            </div> 
          </form>

       </div>
      </div>
    </div>
  </div>

             
     
    </section>
    
        <?php
          };
        ?>


<!-- Delete Profile Modal -->
<div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="mx-1 mx-md-1" method="post">
           <p>Deleting a profile can not be undone. Are you sure you want to delete profile?</p>
            <div class="d-flex justify-content-center mx-1 mb-0 mb-lg-12">
                <div class="modal-footer">
                    <button name="delete-profile" class="btn btn-danger btn-sm bg-rounded">Delete</button>
                    <button type="button" class="btn btn-secondary btn-sm bg-rounded" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-1">
              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
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
<!-- Comment Profile Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closebtn"></button>
      </div>
      <div class="modal-body">
        <form id="commentForm" class="mx-1 mx-md-1" method="post">
          <div class="row m-0 p-0">
              <div class="col-6">
                  <label for="cm_post_id" hidden>Post Id</label>
                  <input disabled type="text" hidden name="cm_post_id" placeholder="id" value="<?php echo $q['id']; ?>" class="form-control bg-light  my-3 text-center">
              </div>
              <div class="col-12">
                  <label for="cm_comment" hidden>Comment</label>
                  <textarea type="text" name="cm_comment" placeholder="comment" class="form-control bg-light  my-3 text-center" rows="3"> </textarea>
              </div>
              <div class="col-12">
                  <label for="cm_author" hidden>Author</label>
                  <input type="text" hidden name="author" value="<?php echo  $_SESSION['a_user'];?>" class="form-control bg-light  my-3 text-center"> 
              </div>
              <div class="col-12">
                  <label for="cm_avatar" hidden>Author Avatar</label>
                  <input type="text" hidden name="cm_avatar" value="<?php echo  $_SESSION['a_avatar'];?>" class="form-control bg-light  my-3 text-center"> 
              </div>

              <div class="col-6">
                  <label for="cm_id" hidden>Comment Id</label>
                  <input disabled type="text" name="cm_id" placeholder="auto" value="" hidden class="form-control bg-light  my-3 text-center">
              </div>
              <div class="col-12">
                  <label for="cm_counter" hidden>Counter</label>
                  <input type="number" hidden name="cm_counter" value="<?php echo $comment_counter + 1; ?>" class="form-control bg-light  my-3 text-center"> 
              </div>
          </div> 

          <input type="submit" value="Post Comment" class="btn btn-primary btn"/>
          <a class="" href="view.php?id=<?php echo $q['id']; ?> "><span class="btn btn-dark btn">View </span></a>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Create new post Modal -->
<div class="modal fade mt-5" id="cmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height:100%;">
  <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><strong class="text-secondary">Add Post</strong></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">     
        <div class="container mt- col-sm-12">
        <form method="POST" enctype="multipart/form-data" class="form-group border-0">
        <div class="row">
            <div class="col-12">
                <label for="author" hidden >Author</label>
                <input type="text" name="author" hidden value="<?php echo $_SESSION['a_user'];?>" class="form-control bg-light text-center"> 
            </div>

            <div class="col-12">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control bg-light  my-1 text-center" required> 
            </div>
            <div class="col-12">
                <label for="body">Post Content</label>
                <textarea  type="text" name="body" placeholder="blog post content" class="form-control bg-light  my-3 text-center" rows="3" required></textarea>
            </div>
            <div class=" col-9">
                <label hidden for="category">Category</label>
                <select  hidden name="category"  class="form-select form-control bg-light  my-1 text-center">
                    <?php 

                    $sql = "SELECT * FROM `category`";
                    $all_categories = mysqli_query($conn,$sql);

                    while ($category = mysqli_fetch_array(
                            $all_categories,MYSQLI_ASSOC)):; 
                    ?>                  
                    <option value="<?php echo $category["Category_Name"];?> ">
                        <?php echo $category["Category_Name"];?>
                    </option>
                    <?php  endwhile; ?>
                </select>
            </div>      
    
            <!-- button for categories modal -->
            <div class="col-3" >
                <button hidden type="button" class="btn btn-success btn-sm bg-rounded  w3-button w3-theme" style="margin-top:28px;" data-bs-toggle="modal" 
                data-bs-target="#catModal" data-bs-dismiss="modal"><span class="material-symbols-outlined fs-2" style="color:#fff !important;">edit</span></button>
            </div>

            <div class="form-group p-1 row">
                <div class="col-sm-6 col-md-9 mt-4">
                  <label for="file" class="pb-3"><strong class="text-secondary"> Select image to upload:</strong></label>
                  <input type="file" name="fileToUpload" id="fileToUpload" class="form-control-file " required>
                </div>
              <div class="col-sm-6 col-md-3">
                <img id="img_up1" src="https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png" class="mt-1 rounded float-end" alt="upload image" width='120' height='120'/>
              </div>
            </div>

            <div class="col-12">
                <label for="auth" hidden >Auth Display</label>
                <input type="text" hidden name="auth" value="<?php echo $display_name; ?>" class="form-control bg-light  my-1 text-center">
            </div>
            <div class="col-12">
                <label for="avatar" hidden>Auth Avatar</label>
                <input type="text" hidden name="avatar" value="<?php echo $_SESSION['a_avatar'];?>" class="form-control bg-light  my-1 text-center">
            </div>
            <div class="col-12">
                <label for="authId" hidden>Auth Display</label>
                <input type="text" hidden name="authId" value="<?php echo $_SESSION['a_user'];?>" class="form-control bg-light  my-1 text-center">
            </div>
            <div class="col-12">
                <label for="authId" hidden >Auth ID</label>
                <input type="text" hidden name="authId" value="<?php echo $_SESSION['a_ID'];?>" class="form-control bg-light  my-1 text-center">
            </div>
            <div class="col-12">
                <label for="date" hidden>Date</label>
                <input type="text" hidden name="date" value="<?php print strftime('%D'); ?>" class="form-control bg-light  my-1 text-center">
            </div>
        </div> 
        
        <a href="index.php" class="w3-button w3-theme-d2" aria-current="page"><span class="material-symbols-outlined fs-2" style="color:#fff !important;">home</span></a>
        <!-- <a href="add-category.php" class="btn btn-primary mt-5" aria-current="page">Add category</a> -->
        <button name="new_post" class="w3-button  w3-theme-d5" id="btnAdd"><span class="material-symbols-outlined fs-2" style="color:#fff !important;">done</span></button>
      </form>

            <script>
                function readURL1(input) {
                if (document.getElementById('fileToUpload')) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#img_up1').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    }
                };
                $("#fileToUpload").change(function(){
                    readURL1(this);
                });

            </script> 

    </div>
    </div>
    <div class="modal-footer">
            
      </div>
    </div>
  </div>
  </div>


<!-- Category Modal -->
<div class="modal fade" id="catModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">         
            <!-- add category widget  -->
            <div class="container-md mx-auto">
                <form method="POST">
                    <label>Add Category:</label> <br>
                    <input type="text" name="categoryAdd" required class="form-control bg-light  my-1 text-center">
                    <input type="submit" value="Add" name="add-category" class="btn btn-success bg-rounded btn-sm ">
                </form>
            </div>
             <!-- delete category widget  -->
            <div class="container-md mx-auto">
                <form method="POST">
                    <br>
                    <label>Delete Category:</label> <br>
                    <select name="category"  class="form-select form-control bg-light  my-1 text-center">
                    <option value="" name="">
                            <?php 

                            $sql = "SELECT * FROM `category`";
                            $all_categories = mysqli_query($conn,$sql);

                            while ($category = mysqli_fetch_array(
                                    $all_categories,MYSQLI_ASSOC)):; 
                            ?>                         
                            <option value="<?php echo $category["Category_ID"];?> " name="<?php echo $category["Category_Name"] ?>">
                                <?php echo $category["Category_Name"];?>
                            </option>

                            <?php  endwhile; ?>
                    </select>
                    <input type="submit" value="Delete" name="delete-category" class="btn btn-danger bg-rounded btn-sm">
                </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary bg-rounded btn-sm" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container"id="bottom" style="padding-bottom:300px;"></div>
</div>




    <!-- script to handle comment add @  add_comment.php  -->
    <script>
    function loadXmlAddComment(comment, author, postid, avatar, date){
      var xmlhttp;
      if (window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
      }
      else{
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
                xmlhttp.onreadystatechange = function(){
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
    
                        let target = 'commentAdd' + postid;
                        let comment = 'comment' + postid;
                        let commentCount = 'commentCount' + postid;

                        let commentAddEl = document.getElementById(target);
                        commentAddEl.innerHTML += this.responseText;
                        document.getElementById(comment).value = '';
                        let commentNumber = document.getElementById(commentCount);
                        let count = Number(commentNumber.innerHTML);
                        
                        commentNumber.innerHTML = count + 1;
                  
                    };

                }
            xmlhttp.open("POST", "add_comment.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("comment=" + comment + "&" + "author=" + author + "&" + "postid=" + postid + "&" + "avatar=" + avatar + "&" + "date=" + date);
          }
      </script>


      <!-- js for drop down comment menu  -->
      <script>
        function commentDrop(id) {
          var x = document.getElementById(id);
          if (x.className.indexOf("w3-show") == -1) {
              x.className += " w3-show";
            } else { 
               x.className = x.className.replace(" w3-show", "");
            }
          }
      </script>


    <!-- script to handle like @  handle_like  -->
    <script>
      function loadXmlHandleLike(postid, userid, like, count, bool){
      let xmlhttp;

      if (window.XMLHttpRequest){
          xmlhttp = new XMLHttpRequest();
      }
      else{
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
                xmlhttp.onreadystatechange = function(){
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200){

                      //thumb icon span
                      let thumbs_id = 'thumbs' + postid;
                      let thumb = document.getElementById(thumbs_id); 
                      thumb.classList.toggle('text-dark');
                      
                      // input field that contains value of like 
                      let like_id = 'like' + postid;
                      let like = document.getElementById(like_id);
                      let likeBool = '';

                      // span that displays likes red circle
                      let likeCount_id = 'likeCount' + postid;
                      let likeCount = document.getElementById(likeCount_id);                     
                      let likes_id = 'likes' + postid;
                      let likes = document.getElementById(likes_id);

                                           
                      // like 
                      if (like.value == 'true') {

                        like.value = false;
                        thumb.innerHTML = 'thumbs_up_down';
                        likes.innerHTML = this.responseText;

                      
                      }
                      // unlike 
                      else {

                        like.value = true;
                        thumb.innerHTML = 'thumb_up';
                        likes.innerHTML = this.responseText;

                      }    
                      
                      // console.log('The response -->' + this.responseText);
                    };
                }
            xmlhttp.open("POST", "handle_like.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("postid=" + postid + "&" + "userid=" + userid + "&" + "like=" + like + "&" + "count=" + count + "&" + "bool=" + bool);
          }
      </script>