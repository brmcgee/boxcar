<?php  session_start(); ?>
<?php include("logic.php"); ?>
<?php include_once("head_section.php") ?>

    <title>Blog View</title>
</head>
<body class="">
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

        <!-- nav bar  -->
        
        <a href="#top" class="position-fixed" style="z-index:100; bottom:05px;right:10px;font-size:50px;width:50px;"><span class="material-symbols-outlined">arrow_upward</span></a>
        
        <div class="row" id="top">   
        <div class="container-md border-bottom shadow-xl mb-1 bg-light">
            <header class="d-flex justify-content-between py-1">
                <div class="user-chip ms-3"  id="userChip" data-bs-toggle="modal" data-bs-target="#profileModal" style="cursor: pointer">
                    <img src=" <?php echo $_SESSION['a_avatar'];?>" alt="" width="96" height="96">
                    <small class="mb-5"><?php echo $_SESSION['a_user'];?></small>
                </div>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="index.php" class="" aria-current="page"><span class="material-symbols-outlined fs-1">home</span></a></li>
                    <li class="nav-item"><a href="create.php" data-bs-toggle="modal" data-bs-target="#cmodal" class="border-none ms-3"><span class="material-symbols-outlined fs-1">add_circle</span></a></li>
                    <li class="nav-item"><a href="logout.php" class="border-none ms-3 pe-3" id="logOutBtn"><span class="material-symbols-outlined fs-1">logout</span></a></li>
                </ul>
            </header>
        </div>


    <?php 
        $post_id = $_REQUEST['id'];
        $sql = "SELECT * FROM myblogs INNER JOIN comments ON myblogs.id = comments.post_id WHERE myblogs.id = $post_id ";
        $view_query = mysqli_query($conn, $sql);
    ?>    
    <!-- render all blog from db from $query in logic.php  -->
    <div class="row m-0 p-0 container-md">   

      <?php foreach($query as $q) {
      ?>

      <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center mb-2 mt-3">
              <div class="card" style="max-width:40rem;min-height:28rem;box-shadow:0px 0px 32px rgb(186, 189, 192);"> 
                  <div class="overflow-hidden" style="max-height: 36vh;">
                      <div class="container px-0">
                          <img src="<?php echo $q['img']; ?>" class="img-fluid" alt="<?php echo $q['category']; ?>" width="900" height="600" loading="lazy">
                      </div>
                  </div>         
                  <div class="card-body"> 
                      <div class="clearfix mb-3"> 
                          <p><span class="float-end"></span></p>
                          <span class="float-start badge rounded-pill bg-primary fs-5"><?php echo $q['category']; ?></span> 
                      </div> 
                      <h5><?php echo $q['title']; ?></h5>
                      <p class="card-title fs-strong pb-5"><?php echo $q['body']; ?></p> 
                      <div class="d-flex justify-content-between"> 

                         <p class="" ><?php echo getDateOnly($q['reg_date']) . '  ' . getDateTimeDifferenceString($q['reg_date']);?></span></p>
                         <a class="ms-1" href="#"><span class="btn btn-dark btn-sm bg-rounded">Comments
                              <span class="badge bg-danger"><?php echo $q['comment_count']; ?></span>
                            </span>
                          </a>
                      <?php 
                        if (($q['author_id'] == $_SESSION['a_ID']) || ( $_SESSION['a_ID'] == '34')) {
                      ?>   
                      <a class="ms-1"  href="edit.php?id=<?php echo $q['id']; ?>"><span class="btn btn-primary btn-sm mb-1">Edit</span></a>
                  <?php } ?>
                    </div> 
                  </div> 
              </div> 
            </div>

<?php }  ?>


<?php 
        $post_id = $_REQUEST['id'];
        $sql = "SELECT * FROM myblogs INNER JOIN comments ON myblogs.id = comments.post_id WHERE myblogs.id = $post_id ";
        $view_query = mysqli_query($conn, $sql);
        $comment_counter = 0;

       foreach ($view_query as $vq) {
        $comment_counter = $comment_counter + 1;
       }      
?>
    <!-- comment form  -->
    <div class="container mt-1 mb-1 col-sm-10 col-md-5  mx-auto ">
    
        <?php foreach($view_query as $q) { 
   ?> 
        <div class="d-flex justify-content-center align-items-center">
          <div class="chip g-3 bg-white m-0 ms-3" style="width:95%;">
            <img src="<?php echo $q['auth_avatar']; ?>" alt=" <?php echo $q['author']; ?>" width="50" height="50">
              <div class="d-flex justify-content-between">
                <div class="container  bg-gray bg-rounded">
                  <p class=""><?php echo $q['comment']; ?> </p>
                  <p class="mb-0">- <?php echo $q['author']; ?> </p>
                  <p class ="m-0 p-0 small"><?php echo getDateOnly($q['date']) . '  ' . getDateTimeDifferenceString($q['date']);?></p>

                </div>
              </div>
            </div>
        </div>              

<?php }; ?>
    </div>



    <h5 class="text-dark ps-3" id="comment">Commenting as <?php echo  $_SESSION['a_user'];?></h5>
        <form method="POST" enctype="multipart/form-data" class="form-group">
            <div class="row m-0 p-0">
                <div class="col-6">
                    <label for="post_id" hidden>Post Id</label>
                    <input disabled type="text" hidden name="post_id" placeholder="id" value="<?php echo $q['id']; ?>" class="form-control bg-light  my-3 text-center">
                </div>
                <div class="col-6">
                    <label for="id" hidden>Comment Id</label>
                    <input disabled type="text" name="id" placeholder="auto" value="" hidden class="form-control bg-light  my-3 text-center">
                </div>
                <div class="col-12">
                    <label for="comment" hidden>Comment</label>
                    <textarea type="text" name="comment" placeholder="comment" class="form-control bg-light  my-3 text-center bg-rounded" rows="4"> </textarea>
                </div>
                <div class="col-12">
                    <label for="authAvatar" hidden>Author Avatar</label>
                    <input type="text" hidden name="authAvatar" value="<?php echo  $_SESSION['a_avatar'];?>" class="form-control bg-light  my-3 text-center"> 
                </div>
                <div class="col-12">
                    <label for="author" hidden>Author</label>
                    <input type="text" hidden name="author" value="<?php echo  $_SESSION['a_user'];?>" class="form-control bg-light  my-3 text-center"> 
                </div>
                <div class="col-12">
                    <label for="counter" hidden>Counter</label>
                    <input type="number" hidden name="counter" value="<?php echo $comment_counter + 1; ?>" class="form-control bg-light  my-3 text-center"> 
                </div>
            </div> 

            <button name="add-comment" class="btn btn-primary btn-sm ms-3 mb-2 bg-rounded ">Post Comment</button>

        </form>



<div class="container  pb-5 mb-5"></div>

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
                    <button name="edit-profile" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProfileModal" data-bs-dismiss="modal">Delete </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <button name="delete-profile" class="btn btn-danger btn-lg">Delete</button>
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
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





    <!-- Create new post Modal -->
    <div class="modal fade" id="cmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height:100%vh;">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add new blog</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
        <div class="container mt-2 col-sm-12 col-md-8">
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

            <div class=" col-8 col-lg-10">
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
            <div class="col-1">
                <button type="button" class="btn btn-primary" style="margin-top:35px;" data-bs-toggle="modal" data-bs-target="#catModal" data-bs-dismiss="modal"><span class="material-symbols-outlined" style="color:#fff !important;">edit</span>Categories</button>
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
                <label for="date" hidden>Date</label>
                <input type="text" hidden name="date" value="<?php print strftime('%D'); ?>" class="form-control bg-light  my-1 text-center">
            </div>

        </div> 
        <a href="index.php" class="btn btn-dark mt-2" aria-current="page"><span class="material-symbols-outlined" style="color:#fff !important;">home</span>Home</a>
        <!-- <a href="add-category.php" class="btn btn-primary mt-5" aria-current="page">Add category</a> -->
        <button name="new_post" class="btn btn-success mt-2 ms-5" id="btnAdd"><span class="material-symbols-outlined" style="color:#fff !important;">done</span>Add Post</button>

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
            <div class="container-md mx-auto w-50">
                <form method="POST">
                    <label>Add ategory:</label> <br>
                    <input type="text" name="categoryAdd" required>
                    <br>
                    
                    <br>
                    <input type="submit" value="Add" name="add-category" class="btn btn-success">
                </form>
            </div>
            

             <!-- delete category widget  -->
            <div class="container-md mx-auto w-50">
                <form method="POST">
                    <br>
                    <label>Delete Category:</label> <br>
                    <br>
                    <select name="category"  class="form-select form-control bg-light  my-3 text-center">
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
                    <input type="submit" value="Delete" name="delete-category" class="btn btn-danger">
                </form>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



  </body>
</html>





