<?php
require('access.php');
?>

<?php include("logic.php"); ?>
<?php include_once("head_section.php") ?>

    <title>Edit Guest</title>
</head>
<body class="bg-light">
    
        <!-- nav bar  -->
        
        <a href="#top" class="position-fixed" style="z-index:100; bottom:05px;right:10px;font-size:50px;width:50px;"><span class="material-symbols-outlined">arrow_upward</span></a>
        
        <div class="row" id="top">   
        <div class="container-md border-bottom shadow-xl mb-1 bg-light">
            <header class="d-flex justify-content-end py-3">
                <div class="user-chip me-5"  id="userChip" data-bs-toggle="modal" data-bs-target="#profileModal" style="cursor: pointer">
                    <img src=" <?php echo $_SESSION['a_avatar'];?>" alt="" width="96" height="96">
                    <small class="mb-5"><?php echo $_SESSION['a_user'];?></small>
                </div>
                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="index.php" class="" aria-current="page"><span class="material-symbols-outlined fs-1">home</span></a></li>
                    <!-- <li class="nav-item"><a href="create.php" data-bs-toggle="modal" data-bs-target="#cmodal" class="border-none ms-3"><span class="material-symbols-outlined fs-1">add_circle</span></a></li> -->
                    <li class="nav-item"><a href="logout.php" class="border-none ms-3 pe-3" id="logOutBtn"><span class="material-symbols-outlined fs-1">logout</span></a></li>
                </ul>
            </header>
        </div>  


<div class="container-lg px-3 mt-5 pb-5 col-sm-11 col-md-6 mb-5">
<?php foreach ($query as $q) {   
?>
    <form method="PUT" enctype="multipart/form-data" class="form-group" style="width:100%;max-width:700px;">
        <h3>Welcome <span class="text-primary"><?php echo  $_SESSION['a_user'];?></span>!</h3>
        <div class="row m-0 p-0">

            <div class="col-12">
                <label for="id" hidden>Id</label>
                <input  type="text" name="id" hidden placeholder="id" value="<?php echo $q['id']; ?>" class="form-control bg-light  my-3 text-center">
            </div>

            <div class="col-sm-12 col-md-6">
                <label for="author" hidden>Author</label>
                <input type="text" hidden name="author" value="<?php echo $q['author']; ?>" class="form-control bg-light  my-3 text-center"> 
            </div>

            <div class="col-sm-12 col-md-6">
                <label hidden for="date">Date</label>
                <input hidden type="text"  name="date" value="<?php echo $q['reg_date']; ?>" class="form-control bg-light  my-3 text-center">
            </div>
            <div class="col-12">
                <label for="body">Body</label>
                <input type="text" name="body" value="<?php echo $q['body']; ?>" class="form-control bg-light  my-3 text-center">
            </div>
            <div class="col-12">
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php echo $q['title']; ?>" class="form-control bg-light  my-3 text-center"> 
            </div>



            <!-- <div class="col-12">
                <label  for="category1">Category</label>
                <input  type="text" name="category"  value="<?php echo $q['category']; ?>" class="form-control bg-light  my-3 text-center"> 
            </div> -->

            <div class=" col-8 col-lg-10">
                <label for="category">Category</label>
                <!-- <input type="text" name="category" placeholder="category" class="form-control bg-light  my-3 text-center">  -->
                
                <select name="category"  class="form-select form-control bg-light  my-3 text-center">
                    <option value="<?php echo $q['category']; ?>"><?php echo $q['category']; ?></option>
                    
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
                <button type="button" class="btn btn-primary btn-sm" style="margin-top:35px;" data-bs-toggle="modal" data-bs-target="#catModal"><span class="material-symbols-outlined" style="color:#fff !important;">edit</span>Categories</button>
            </div>


            <div class="col-12">
                <label for="image">Image</label>
                <input type="text" name="image" value="<?php echo $q['img']; ?>" class="form-control bg-light  my-3 text-center">
            </div>

        </div> 
    
    
        <button name="update" class="btn btn-dark">Update</button>

        <!-- Delete Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGuest">Delete</button>

    </form>
</div>



<!-- Delete Modal -->
<div class="modal fade" id="deleteGuest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Warning Delete Contact</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">
            <input type="text" hidden name="id" value="<?php echo $q['id']; ?>">
            <div class="container text-center">
                <p><?php echo  $_SESSION['a_user'];?>, you are about to delete a contact. Once a contact is deleted it can not be undone. Are you sure you want to delete contact?</p>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger ms-1" name="delete">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- categories Modal -->
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
                    <br>
                    
                    <br>
                    <input type="submit" value="Add" name="add-category" class="btn btn-success btn-sm">
                </form>
            </div>
            

             <!-- delete category widget  -->
            <div class="container-md mx-auto">
                <form method="POST">
                    <br>
                    <label>Delete Category:</label> <br>
                    <br>
                    <select name="category" class="form-select form-control bg-light  my-1 text-center">
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
                    <input type="submit" value="Delete" name="delete-category" class="btn btn-danger btn-sm">
                </form>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<?php } ?>

