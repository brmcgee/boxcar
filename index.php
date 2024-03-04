<?php require_once('access.php') ?>
<?php include_once('head_section.php') ?>
    <title>Home - boxcar</title>
  </head>
      <!-- get date  -->
      <?php
        function getDateOnly($d) {
              $mydatetime = $d;
              $datetimearray = explode(" ", $mydatetime);
              $date = $datetimearray[0];
              $time = $datetimearray[1];
              $reformatted_date = date('F j, Y',strtotime($date)); // March 10, 2001
              $reformatted_date = date('m.d.y',strtotime($date)); // 03.10.01
              $reformatted_time = date('g:i a',strtotime($time));  
              return $reformatted_date . ' ' . $reformatted_time;
          };
          function getDateTimeDifferenceString() {
            return;
          }
      ?>
  <body class="bg-gray" style="max-width:900px;">
    <!-- nav bar  --> 
    <a href="#bottom" class="position-fixed" style="z-index:100; bottom:05px;left:10px;font-size:50px;width:50px;"><span class="material-symbols-outlined">arrow_downward</span></a>
    <a href="#top" class="position-fixed" style="z-index:100; bottom:05px;right:10px;font-size:50px;width:50px;"><span class="material-symbols-outlined">arrow_upward</span></a>
    <div class="row" id="top">   
    <div class="container-md border-bottom shadow-xl mb-1 bg-light">
        <header class="d-flex justify-content-between py-1">
            <div class="user-chip ms-3"  id="userChip" data-bs-toggle="modal" data-bs-target="#profileModal" style="cursor: pointer">
                <img src=" <?php echo $_SESSION['a_avatar'];?>" alt="" width="96" height="96">
                <small class="fs-4"></small><?php echo $_SESSION['a_user'];?> 
            </div>
            <ul class="nav nav-pills">
              <li class="nav-item"><a href="create.php" data-bs-toggle="modal" data-bs-target="#cmodal" class="border-none ms-3"><span class="material-symbols-outlined fs-1">add_circle</span></a></li>
              <li class="nav-item"><a href="logout.php" class="border-none ms-3 pe-3" id="logOutBtn"><span class="material-symbols-outlined fs-1">logout</span></a></li>
            </ul>
        </header>
    </div>

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

          <?php } else if($_REQUEST['info'] == "invalid"){ ?> 

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

      <!-- masthead -->
      <div class="container-xl overflow-hidden p-1 mt-1">
          <div class="px-1 pt-2 my-1 text-center border-bottom" style="background-color:rgb(204, 206, 209);">
              <h1 class="display-6 fw-bold text-body-emphasis">Blog App Beta</h1>
              <h5 class="fw-bold text-body-emphasis">Welcome <span class="text-primary"><?php echo $_SESSION['a_user'];?></span></h5>
              <div class="col-lg-6 mx-auto">
                  <p class="lead mb-4 px-6">Beta version of blog app. Visit back for updates. Sign in and add a post.</p>
              </div>
              <div class="btn-group">
                      <!-- button for create new widget  -->
                      <p class="nav-item"><a href="landing.php" class="btn btn-outline-dark btn-sm ms-1 bg-rounded">Landing</a></p>
                      <small class="nav-item"><button type="button" class="btn btn-dark btn-sm ms-1 bg-rounded " data-bs-toggle="modal" data-bs-target="#cmodal">New Post</button></small>   
                    </div>
              <div class="overflow-hidden" style="max-height: 24vh;">
                  <div class="container px-5">
                      <img src="https://tse1.mm.bing.net/th?id=OIP.wAbYX1LSFymbu8-8YMASKAHaD4&pid=Api&P=0&h=220" class="img-fluid rounded-3 shadow-lg mb-4" alt="Food" width="700" height="500" loading="lazy">
                  </div>
              </div>
           </div> 
      </div>

      <?php 
            $sql = 'SELECT * FROM myblogs';
            $query = mysqli_query($conn, $sql);
            foreach ($query as $q) {   
            $blog_id_name = 'blog' . $q['id'];  
      ?> 
     <!-- blog posts from db query  -->
     <section class="col-sm-12 col-lg-10 mt-2 mx-auto" style="max-width: 48rem;" >
        <div class="card" id="<?php echo $blog_id_name; ?>">
          <div class="card-body d-flex flex-row justify-content-start">
            <button type="button" class="btn-close position-absolute bg-gray" style="top:5px;right:5px;" aria-label="Close" onclick="document.getElementById('<?php echo $blog_id_name; ?>').style.display = 'none';"></button>
            <img src="<?php echo $q['author_avatar']; ?>" class="rounded-circle me-1 " height="50px" width="50px" alt="<?php echo $q['author']; ?>">
          <div>
              <h5 class="card-title font-weight-bold mb-1" style="font-size:18px;"><?php echo $q['title']; ?></h5>
              <p class="card-text"><i class="far fa-clock pe-2" aria-hidden="true"></i><?php echo ($q['author']);?></p>
          </div>
        </div>
        <div class="rounded-0">
          <img class="img-fluid" width="100%" src="<?php echo $q['img']; ?>" alt="<?php echo $q['title']; ?>">
        </div>
        <div class="card-body">
          <p class="card-text lh-sm" style="text-indent:12px;text-align:justify;"><?php echo $q['body']; ?></p>
        </div>
                <div class="mt-1 d-flex justify-content-between border border-top p-2 bg-light ">
                <?php $form_id = 'form' . $q['id'];?>             
                  <!-- like buttons  -->
                  <form action="" name="like" id="<?php echo $form_id;?>">
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
                            <button name="add-like" class="border-0 bg-rounded">
                              <i class="text-muted p-md-1" title="Like this post" aria-hidden="true">
                                <span class="material-symbols-outlined fs-2">thumbs_up_down</span>
                                <span class="badge bg-danger bg-rounded fs-6"><?php echo $q['likes']; ?></span>
                              </i>
                            </button>
                          <?php
                      } else {
                        ?> 
                          <button name="del-like" class="border-0 bg-rounded">
                          <span class="material-symbols-outlined bg-rounded text-dark fs-2" style="color:red !important;">thumb_up</span>
                            <i class="text-muted p-md-1 bg-rounded" title="unlike this post" aria-hidden="true">you
                              <span class="badge bg-primary bg-rounded fs-6"><?php echo $q['likes']-1;?></span> others
                            </i>
                          </button>
                        <?php
                      };
                  ?>
                  </div>
                </form>   
                <?php if (($q['author_id'] == $_SESSION['a_ID']) || ( $_SESSION['a_ID'] == '34')) {?>
                  <a class="ms-1 position-absolute" style="top:2px;right:2px;" href="edit.php?id=<?php echo $q['id']; ?>">
                    <span class="btn btn-light btn-sm bg-rounded ">
                    <span class="material-symbols-outlined fs-2">edit</span></span>
                  </a>
                <?php } ?>

                <a class="ms-1" href="view.php?id=<?php echo $q['id']; ?>">
                  <span class="btn  btn-sm bg-rounded ">
                    <span class="material-symbols-outlined fs-2">add_comment</span>
                  </span>
                </a>
                
                <div class="dropdown mt-0">
                    <button class="btn btn-light btn-sm ms-1 bg-rounded" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="material-symbols-outlined fs-2">comment</span>
                      <span class="badge bg-danger bg-rounded fs-6"><?php echo $q['comment_count']; ?></span></button>
                        <div class="dropdown-menu px-1 py-1 bg-white position-relative mb-5" style="left:-100px;" aria-labelledby="dropdownMenuButton1">  
                        <!-- comment output -->
                        <?php 
                            $post_id = $q['id'];
                            $sql = "SELECT * FROM myblogs INNER JOIN comments ON myblogs.id = comments.post_id WHERE myblogs.id = $post_id ";
                            $view_query = mysqli_query($conn, $sql);
                            $comment_counter = 0;

                          foreach ($view_query as $vq) {
                            $comment_counter = $comment_counter + 1;
                          }      
                          foreach($view_query as $q) {
                            $renderID = $q['post_id'];
                            if($comment_counter === 0) {
                              $renderID = $q['post_id'] ;
                            } else {
                              $renderID = $q['post_id'];
                            }
                          ?>      
                      <div class="">
                        <div class="chip g-1 bg-white" style="max-width:25rem; min-width:auto;">
                          <img src="<?php echo $q['auth_avatar']; ?>" class="ms-1"alt=" <?php echo $q['author']; ?>" width="50" height="50">
                            <div class="d-flex justify-content-around">
                                <div class="container px-3 bg-gray bg-rounded" style="">
                                  <p class="mb-1"><?php echo $q['comment']; ?> </p>
                                  <p class="mb-0 font-primary">- <?php echo $q['author']; ?> </p>
                                  <p class ="m-0 p-0 small"><?php echo getDateOnly($q['date']) . '  ' . getDateTimeDifferenceString($q['date']);?></p>
                                </div>
                              </div>
                            </div>
                        </div>              
                        <?php }; ?> 

                        <!-- <a class="ms-1 d-flex justify-content-center text-decoration-none " href="view.php?id=<?php echo $renderID ; ?>#comment">
                        <span class="btn btn-light btn-sm bg-rounded">
                          <span class="material-symbols-outlined fs-1">add_comment</span>
                          </span>
                        </a> -->
               
                        <!-- comment add button ajax jq -->
                        <form id="commentForm<?php echo $renderID ?>" class="mx-1 mx-md-1" method="post">
                        <div class="row m-0 pb-3">
                            <div class="col-6">
                                <label for="cm_postid" hidden >Post Id</label>
                                <input type="text" hidden name="cm_postid" placeholder="id" value="<?php echo $renderID ?>" class="form-control bg-light  my-3 text-center">
                            </div>
                            <div class="col-12">
                                <label for="cm_comment" class="text-muted fst-italic fw-bold">Drop a comment</label>
                                <input disabled type="text" name="cm_comment" value="" id="comment<?php echo $renderID ?>" value="" placeholder="" class="form-control bg-light  my-3 text-center bg-rounded" /> 
                            </div>
                            <div class="col-12">
                                <label for="cm_author" hidden>Author</label>
                                <input type="text" hidden name="cm_author" value="<?php echo  $_SESSION['a_user'];?>" class="form-control bg-light  my-3 text-center"> 
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
                          <div class="text-center mb-2">
                            <input  disabled type="submit" value="Post Comment" class="btn btn-primary bg-rounded"/>

                            <a class="ms-1" href="view.php?id=<?php echo $renderID; ?>">
                              <span class="btn  btn-sm bg-rounded ">
                                <span class="material-symbols-outlined fs-2">add_comment</span>
                              </span>
                            </a>

                          </div>
                      </form>
                      </div>
                    </div>
                </div>
              </div>
        </section>
      <!-- on the fly ajax jq comment form handle without reload  -->
        <!-- <script type="text/javascript">
          function el(str){
            return document.getElementById(str);
          };

          document.addEventListener("DOMContentLoaded", () => {
            
            let formId = '#commentForm' + <?php echo $renderID ?>;
       
            $('formId').on("submit", function() {
                $.ajax({
                  type: "post",
                  url: "./logic.php",
                  data: $("formId").serialize(),
                  success: function() {
                    console.log("success");
                    $(function () {
                     console.log('added to db');
                     console.log('comment<?php echo $renderID ?>')
                     document.getElementById('comment<?php echo $renderID ?>').value = "";
                    });
                  }
                });
                return false;
            });
          });  -->
    </script> 
        <?php
          };
        ?>
<!-- Edit Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="mx-1 mx-md-1" method="post">           
            <div class="d-flex flex-row align-items-center mb-1">
              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="text" hidden id="uID" name="uID" class="form-control"  value="<?php echo $_SESSION['a_ID']?>" />
                  <label class="form-label" hidden for="uID">ID</label>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-2">
              <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uDisplay" name="uDisplay" class="form-control"  value="<?php echo $_SESSION['a_user']?>" />
                  <label class="form-label" for="uDisplay">Display Name</label>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-2">
              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="email" id="uEmail" hidden name="uEmail" class="form-control"  value="<?php echo $_SESSION['a_email']?>" />
                  <label class="form-label" for="uEmail" hidden>Your Email</label>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-2">
              <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uAvatar" name="uAvatar"class="form-control"  value="<?php echo $_SESSION['a_avatar']?>" />
                  <label class="form-label" for="uAvatar">Your Avatar URL</label>
               </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-2">
              <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uPassword" name="uPassword" class="form-control"  value="<?php echo $_SESSION['a_password']?>"/>
                  <label class="form-label" for="uPassword">Password</label>
                </div>
            </div>
            <div class="d-flex justify-content-center mx-1 mb-0 mb-lg-12">
                <div class="modal-footer">
                    <button name="edit-profile" class="btn btn-primary bg-rounded">Save</button>
                    <button type="button" class="btn btn-danger bg-rounded" data-bs-toggle="modal" data-bs-target="#deleteProfileModal" data-bs-dismiss="modal">Delete </button>
                    <button type="button" class="btn btn-secondary bg-rounded" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

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
  <div class="modal fade" id="cmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height:100%vh;">
  <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new blog</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">     
        <div class="container mt-2 col-sm-12 col-md-11">
        <form method="POST" enctype="multipart/form-data" class="form-group">
        <div class="row">
            <h3>Hello <?php echo $_SESSION['a_user'];?></h3>
            <div class="col-12">
                <label for="author" hidden >Author</label>
                <input type="text" name="author" hidden value="<?php echo $_SESSION['a_user'];?>" class="form-control bg-light  my-1 text-center"> 
            </div>
            <div class="col-12">
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="title" class="form-control bg-light  my-1 text-center"> 
            </div>
            <div class="col-12">
                <label for="body">Post Content</label>
                <textarea  type="text" name="body" placeholder="blog post content" class="form-control bg-light  my-3 text-center" rows="3"></textarea>
            </div>
            <div class=" col-8 col-lg-9">
                <label for="category">Category</label>
                <!-- <input type="text" name="category" placeholder="category" class="form-control bg-light  my-3 text-center">  -->
                
                <select name="category"  class="form-select form-control bg-light  my-1 text-center">
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
            <div class="col-3">
                <button type="button" class="btn btn-primary btn-sm bg-rounded" style="margin-top:30px;" data-bs-toggle="modal" data-bs-target="#catModal" data-bs-dismiss="modal"><span class="material-symbols-outlined" style="color:#fff !important;">edit</span>Categories</button>
            </div>
            <div class="col-12">
                <label for="image">Image</label>
                <input type="text" name="image" placeholder="image URL" class="form-control bg-light  my-1 text-center">
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
        <a href="index.php" class="btn btn-dark mt-2 btn-sm bg-rounded" aria-current="page"><span class="material-symbols-outlined" style="color:#fff !important;">home</span>Home</a>
        <!-- <a href="add-category.php" class="btn btn-primary mt-5" aria-current="page">Add category</a> -->
        <button name="new_post" class="btn btn-success mt-2 ms-1 btn-sm bg-rounded" id="btnAdd"><span class="material-symbols-outlined" style="color:#fff !important;">done</span>Add Post</button>
      </form>
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
  </body>
</html>







