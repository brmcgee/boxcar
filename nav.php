<?php include_once("head_section.php") ?>

<?php 
    // sets value of session variable info, if none adds login link 
    if (isset($_SESSION['a_avatar'])) {
        $avatar = $_SESSION['a_avatar'];
    } else {
        $avatar = 'https://tse1.mm.bing.net/th?id=OIP.T8KxdBzU1cndmTwhxMCsLwHaHa&pid=Api&P=0&h=220';
    };

    if (isset($_SESSION['a_user'])) {
        $display_name = $_SESSION['a_user'];
    } else {
        $display_name = '<a href="index.php" class="text-decoration-none text-dark">
                            <span class="icon-reg text-primary fs-5">Login</span>
                        </a>';
    };
    if (isset($_SESSION['a_date'])) {
        $display_date = $_SESSION['a_date'];
    } else {
        $display_date = '';
    };
?>
    <!-- top botton -->
    <a href="#top" class="position-fixed" style="z-index:100; bottom:05px;right:20px;font-size:50px;width:50px;"><span class="material-symbols-outlined">arrow_upward</span></a>
    
    <div class="row" id="top">   
      <div class="container-md border-bottom shadow-xl mb-1 bg-light">
        <header class="d-flex justify-content-end py-3">
            <div class="user-chip me-5"  id="userChip">
                <img src=" <?php echo $avatar;?>" alt="" width="96" height="96">
                <small class="mb-5"><?php echo $display_name;?></small>
            </div>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="index.php" class="" aria-current="page"><span class="material-symbols-outlined fs-1">home</span></a></li>
                <li class="nav-item"><a href="create.php" class="border-none ms-3"><span class="material-symbols-outlined fs-1">add_circle</span></a></li>
                <li class="nav-item"><a href="logout.php" class="border-none ms-3 pe-3" id="logOutBtn"><span class="material-symbols-outlined fs-1">logout</span></a></li>
            </ul>
        </header>
    </div>


