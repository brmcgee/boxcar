

<?php
    include_once('head_section.php');
    include_once('access.php');

    // select all records from db accesibly by $query 
    $sql = "SELECT * FROM myblogs";
    $query = mysqli_query($conn, $sql);    
?>
    <title>Home - faceblog</title>
  </head>
    <body class="bg-main">

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


      <!-- masthead -->
      <div class="container-xl overflow-hidden p-1 mt-1">
          <div class="px-1 pt-2 my-1 text-center border-bottom" style="background-color:rgb(204, 206, 209);">
              <h1 class="display-4 fw-bold text-body-emphasis">Blog App Beta</h1>
              <h5 class="fw-bold text-body-emphasis">Welcome <span class="text-primary"></span></h5>
              <div class="col-lg-6 mx-auto">
                  <p class="lead mb-4">All posts by author <?php echo  $_SESSION['a_user'];?></p>
              </div>
              <div class="overflow-hidden" style="max-height: 30vh;">
                  <div class="container px-5">
                      <img src="https://tse1.mm.bing.net/th?id=OIP.wAbYX1LSFymbu8-8YMASKAHaD4&pid=Api&P=0&h=220" class="img-fluid rounded-3 shadow-lg mb-4" alt="Food" width="700" height="500" loading="lazy">
                  </div>
              </div>
        </div> 

     <!-- blog post cards all  -->
      <div class="row m-0 p-0">
  
<?php foreach($query as $q) { ?>

<?php
    // sets img and avatar if empty values 
    if (empty($q['author_avatar'])) {
        $avatar_img = 'https://tse1.mm.bing.net/th?id=OIP.2FEmD6CuQH9Ac_9dFNcaoAHaHa&pid=Api&P=0&h=220';
    } 
    else {
        $avatar_img  = $q['author_avatar'];
    };
    
    if (($q['author_id'] == $_SESSION['a_ID']) || ( $_SESSION['a_ID'] == '34')) {
?>  

    <section class="mx-auto col-sm-12 col-md-6 col-lg-5 mt-2" style="max-width: 29rem; min-height: 80vh;">
      <div class="card">
        <div class="card-body d-flex flex-row">
          <img src="<?php echo $avatar_img; ?>" class="rounded-circle me-3 " height="50px" width="50px" alt="<?php echo $q['author']; ?>">
          <div>
            <h5 class="card-title font-weight-bold mb-2"><?php echo $q['title']; ?></h5>
            <p class="card-text"><i class="far fa-clock pe-2" aria-hidden="true"></i><?php echo $q['reg_date']; ?>9</p>
          </div>
        </div>
        <div class="rounded-0">
          <img class="img-fluid" width="100%" src="<?php echo $q['img']; ?>" alt="Card image cap">
        </div>
        <div class="card-body">
          <p class="card-text"><?php echo $q['body']; ?></p>

        </div>
            <div class="mt-1 d-flex justify-content-start border border-top p-2 bg-light ">
                <a href="edit.php?id=<?php echo $q['id']; ?> " class="btn btn-dark btn mx-2">Edit <span class="text-light">&rarr;</span></a>
                <a href="comment.php?id=<?php echo $q['id']; ?> "><span class="btn btn-dark btn">Comment</span></a>


            </div>
      </div>
    </section> 
    
<?php
    } 
} 
?>
    </div>

    

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

<!-- Comment Profile Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="mx-1 mx-md-1" method="post">
           <p>Deleting a profile can not be undone. Are you sure you want to delete profile?</p>
           <?php
                  if (array_key_exists('QUERY_STRING', $_SERVER)) {
                    $uri = $_SERVER['QUERY_STRING'];
                } else {
                    $uri = 'no';
                }
            ?>
            <h2><?php echo $uri?></h2>
            <h2>hello</h2>
            <div class="d-flex justify-content-center mx-1 mb-0 mb-lg-12">
                <div class="modal-footer">
                    <button name="" class="btn btn-danger btn-lg">OK</button>
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
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
                <button type="button" class="btn btn-primary btn-sm" style="margin-top:30px;" data-bs-toggle="modal" data-bs-target="#catModal" data-bs-dismiss="modal"><span class="material-symbols-outlined" style="color:#fff !important;">edit</span>Categories</button>
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
        <a href="index.php" class="btn btn-dark mt-2 btn-sm" aria-current="page"><span class="material-symbols-outlined" style="color:#fff !important;">home</span>Home</a>
        <!-- <a href="add-category.php" class="btn btn-primary mt-5" aria-current="page">Add category</a> -->
        <button name="new_post" class="btn btn-success mt-2 ms-1 btn-sm" id="btnAdd"><span class="material-symbols-outlined" style="color:#fff !important;">done</span>Add Post</button>

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
                    <input type="submit" value="Add" name="add-category" class="btn btn-success ">
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


