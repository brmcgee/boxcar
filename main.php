<?php require_once('access.php') ?>
<?php include_once('head_section.php') ?>

    <title>Home - boxcar</title>
  </head>
    <body>
        <!-- nav bar  -->
        <a href="#top" class="position-fixed" style="z-index:100; bottom:05px;right:20px;font-size:50px;width:50px;"><span class="material-symbols-outlined">arrow_upward</span></a>
        <div class="row" id="top">   
        <div class="container-md border-bottom shadow-xl mb-1 bg-light">
            <header class="d-flex justify-content-end py-3">
                <div class="user-chip me-5"  id="userChip" data-bs-toggle="modal" data-bs-target="#profileModal" style="cursor: pointer">
                    <img src=" <?php echo $_SESSION['a_avatar'];?>" alt="" width="96" height="96">
                    <small class="mb-5"><?php echo $_SESSION['a_user'];?></small>
                </div>
                <ul class="nav nav-pills">
                    <!-- <li class="nav-item"><a href="index.php" class="" aria-current="page"><span class="material-symbols-outlined fs-1">home</span></a></li> -->
                    <li class="nav-item"><a href="create.php" class="border-none ms-3"><span class="material-symbols-outlined fs-1">add_circle</span></a></li>
                    <li class="nav-item"><a href="logout.php" class="border-none ms-3 pe-3" id="logOutBtn"><span class="material-symbols-outlined fs-1">logout</span></a></li>
                </ul>
            </header>
        </div>


        <div style="padding-bottom:1px;">
            <h1>Welcome <?php echo($_SESSION['a_user']);?></h1>
        </div>

        <?php 
            $sql = 'SELECT * FROM users';
            $query = mysqli_query($conn, $sql);

            foreach ($query as $q) {
                ?><li><?php echo $q['email'] . ' --> ' . $q['user_password']; ?> </li> <?php
            }
        ?>






  

            
        










<!-- Edit Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Welcome <?php echo $_SESSION['a_user']?> - Edit Profile</h5>
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
                  <input type="email" id="uEmail" name="uEmail" class="form-control"  value="<?php echo $_SESSION['a_email']?>" />
                  <label class="form-label" for="uEmail">Your Email</label>
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
                    <button name="edit-profile" class="btn btn-primary btn-lg">Save changes</button>
                    <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#deleteProfileModal" data-bs-dismiss="modal">Delete </button>
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Warning - Delete Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="mx-1 mx-md-1" method="post">
           <h5>Are you sure you want to delete profile</h5>
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


  </body>
</html>

<?php 
    session_destroy();
?>








