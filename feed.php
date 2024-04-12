<?php require_once('access.php') ?>
<?php include_once('head_section.php') ?>


<style>
  html {scroll-behavior:smooth}
</style>

  <div class="px-1" style="max-width:99%;margin:auto;">
    <!-- nav bar  --> 


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
      $sql = 'SELECT * FROM myblogs ORDER BY id DESC';

      $sql = "SELECT * FROM myblogs INNER JOIN users ON myblogs.author_id = users.user_id ORDER BY id DESC";
      $query = mysqli_query($conn, $sql);
      $blog_id = '';      


      
      foreach ($query as $q) {  
      $blog_id =  $q['id']; 
      $blog_id_name = 'blog' . $q['id'];  
      $date = $q['reg_date'];
      $avatar = $q['avatar'];
      $display_name = $q['display_name'];

    ?> 


    <!-- blog posts from db query  -->
    
    <section class="col-sm-12 col-lg-12 mt-2 mx-auto" style="max-width: 40rem;" >
        <div class="card" id="<?php echo $blog_id_name; ?>">
          <div class="card-body d-flex flex-row justify-content-start">
            <button type="button" class="btn-close position-absolute bg-gray" style="top:5px;right:5px;" aria-label="Close" onclick="document.getElementById('<?php echo $blog_id_name; ?>').style.display = 'none';"></button>
            <img src="<?php echo $q['avatar']; ?>" class="rounded-circle me-2 " height="50px" width="50px" alt="<?php echo $q['display_name']; ?>">
          <div>
              <h4 class="card-title fw-bold mb-1 me-5" style="font-size:18px;"><?php echo $q['title']; ?></h4>
              <p class="card-text"><span class="me-3"><?php echo $q['display_name']; ?></span><span class="fst-italic"><?php echo getDateOnly($q['reg_date']);?></span></p>
          </div>
        </div>
        <div class="rounded-0">
          <img class="img-fluid" width="100%" src="<?php echo $q['img']; ?>" alt="<?php echo $q['title']; ?>">
        </div>
        <div class="card-body">
          <p class="card-text lh-sm" style="text-indent:12px;text-align:justify;"><?php echo $q['body']; ?></p>
        </div>
            
        <!-- Comment post Footer  -->
        <div class="mt-1 d-flex justify-content-between border border-top p-2 bg-light flex-row">

              <!-- edit button form top/left START -->
              <?php if (($q['author_id'] == $_SESSION['a_ID']) || ( $_SESSION['a_ID'] == '34')) {?>
                <a class="ms-1 position-absolute" style="top:2px;right:2px;" href="edit.php?id=<?php echo $q['id']; ?>">
                  <span class="btn btn-light btn-sm bg-rounded ">
                  <span class="material-symbols-outlined fs-2">edit</span></span>
                </a>
              <?php } ?>
              <!-- edit button form top/left END -->
         
              <!-- like button form START  -->
              <?php $form_id = 'form' . $q['id'];?>  
                  <form action="" name="like" id="<?php echo $form_id;?>" class="bg-transparent border-0">
                    <div class="col-12">
                        <label hidden for="authorID">Author ID</label>
                        <input hidden type="text" name="authorID"  value="<?php echo $_SESSION['a_ID'];?>" class="form-control bg-light  my-1 text-center"> 
                    </div>
                    <div class="col-12">
                        <label hidden for="blogID">Blog ID</label>
                        <input hidden type="text" name="blogID"  value="<?php echo $q['id'];?>" class="form-control bg-light  my-1 text-center"> 
                    </div>
                    <div class="pe-1">
                    
                      <?php 
                        $q_sql = "SELECT * FROM likes";
                        $query = mysqli_query($conn, $q_sql);
                        $bool = true;
                        foreach($query as $like_q) {
                            if ($like_q['post_id'] == $q['id'] && $like_q['user_id'] == $_SESSION['a_ID'] ) {
                                $bool = false;
                            };
                        };
                        if ($bool) {
                            ?> 
                              <button name="add-like" class="bg-rounded p-0 m-0 " style="background-color:transparent; border:0;">
                                <i class="text-muted " title="Like this post" aria-hidden="true">
                                  <span class="material-symbols-outlined">thumbs_up_down</span>
                                  <span class="badge bg-danger bg-rounded" style="border-radius:50%;"><?php echo $q['likes']; ?></span>
                                </i>
                              </button>
                            <?php
                        } else {
                          ?> 
                            <button name="del-like" class="border-0 bg-rounded p-0 m-0" style="background-color:transparent; border:0;">
                            <span class="material-symbols-outlined bg-rounded text-dark" style="color:red !important;">thumb_up</span>
                              <i class="text-muted " title="unlike this post" aria-hidden="true">you
                                <span class="badge bg-primary bg-rounded" style="border-radius:50%;"><?php echo $q['likes']-1;?></span> others
                              </i>
                            </button>
                        <?php }; ?>
                     </div>
                  </form>  
              <!-- like button form END -->


              <!-- add comment button START -->
               <!-- <a class="ms-1" href="view.php?id=<?php echo $q['id']; ?>">
              <a class="ms-1" href="view.php?id=<?php echo $q['id']; ?>" data-bs-toggle="modal" data-bs-target="#commentModal">
                  <span class="btn  btn-sm bg-rounded ">
                    <span class="material-symbols-outlined">add_comment</span>
                  </span>
              </a>  -->
              <!-- add comment button END -->

              <!-- Comments at drop down START -->
              <div class="dropdown mt-0">

                    <button class="btn btn-light btn-sm ms-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="material-symbols-outlined">comment</span>
                      <span class="badge bg-danger bg-rounded" style="border-radius:50%;"><?php echo $q['comment_count']; ?></span>
                    </button>

                    <div class="dropdown-menu px-1 py-1 bg-white position-relative mb-5" style="left:-100px;" aria-labelledby="dropdownMenuButton1" id="<?php echo $comment_card_id;?>">  
                      
                    <!-- Comment Chip output -->
                    <?php 
                      $post_id = $q['id'];
                      $sql = "SELECT * FROM myblogs INNER JOIN comments ON myblogs.id = comments.post_id WHERE myblogs.id = $post_id ";
                      $view_query = mysqli_query($conn, $sql);

                      $comment_counter = 0;
                      $comment_card_id = 'commentCard' . $post_id;

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
                     ?>    
  
                      <!-- Comment Card chips  -->
                      <div class="g-2 p-2" >

                        <ul class="comment-wrap list-unstyled">
                          <!-- Comment item START -->
                          <li class="comment-item">
                            <div class="d-flex position-relative">
                              <!-- Avatar -->
                              <div class="avatar avatar-xs">
                                <p class="">
                                  <img class="rounded-circle mt-1" src="<?php echo $q['auth_avatar']; ?>" alt="<?php echo $q['author']; ?>" width="30" height="30">
                                </p>
                              </div>
                              <div class="ms-2">
                                <!-- Comment by -->
                                <div class="bg-light rounded rounded-start-top-0 p-3 w3-light-grey">
                                  <div class="d-flex justify-content-between">
                                    <p class="mb-1 text-secondary"><?php echo $q['author']; ?> </p>
                                    <small class="ms-2"><?php echo time_elapsed_string($q['reg_date']);?></small>
                                  </div>
                                  <p class="small mb-0"><?php echo $q['comment']; ?></p>
                                </div>
                              </div>
                          </li>
                          <!-- Comment item END -->
						            </ul>
                    <?php }; ?> 



                        

                        <!-- Comment add widget  -->
                        <div class="d-flex justify-content-center p-2">

                            <!-- Avatar -->
                            <div class="mt-3 me-2">
                              <a href="#"> <img class="avatar-img rounded-circle" src="<?php echo $_SESSION['a_avatar'];?>" width="50" height="50" alt=""> </a>
                            </div>
                        
                            <!-- comment add button ajax jq -->
                            <form id="commentForm<?php echo $renderID ?>" class="mx-1 mx-md-1 border-0" method="post">
                            
                              <div class="row m-0 pb-3">
                                  <div class="col-6">
                                      <label for="cm_postid" hidden >Post Id</label>
                                      <input type="text" hidden name="cm_postid" placeholder="id" value="<?php echo $renderID ?>" class="form-control bg-light  my-3 text-center">
                                  </div>
                                  <div class="col-12">
                                      <input type="text" hidden name="cm_comment" value="" id="comment<?php echo $renderID ?>" value="" placeholder="Share your thoughts...." 
                                              class="form-control bg-light  my-3 text-center border-rounded" /> 
                                  </div>
                                  <div class="col-12">
                                      <label for="cm_author" hidden>Author</label>
                                      <input type="text" hidden name="cm_author" value="<?php echo  $_SESSION['a_user'];?>" class="form-control bg-light  my-3 text-center"> 
                                  </div>
                                  <div class="col-12">
                                      <label for="cm_avatar" hidden>Author Avatar</label>
                                      <input type="text" hidden name="cm_avatar" value="<?php echo  $_SESSION['a_avatar'];?>" class="w-100 form-control bg-light  my-3 text-center"> 
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

                              <div class="text-center mb-2">
                                <input  disabled type="submit" value="Post Comment" class="button w3-theme-d4 d-none"/>

                                <a class="button w3-theme-d4" href="view.php?id=<?php echo $blog_id ?>">
                                  <span class="btn  btn-sm bg-rounded ">
                                    <span class="material-symbols-outlined fs-2 text-white">add_comment</span>
                                  </span>
                                </a>

                              </div>
                            </form>
                        </div>
                      </div>
                    </div>
              </div>
              <!-- Comment at drop doen END  -->
                
                
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


    