<?php  session_start(); ?>
<?php include_once('logic.php'); ?>
<?php include_once('head_section.php'); ?>
<?php include_once('nav.php'); ?>

<title>Home - faceblog</title>
</head>
<body>

<div class="container pb-5">
<?php  
    // select all records from db accesibly by $query 
    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);

?>

<?php if(isset($_REQUEST['info'])) { ?>

    <?php if($_REQUEST['info'] == "added") { ?>
 
        <div class="alert alert-success mt-3" role="alert">
            Post has been added successfully
        </div>

    <?php } else if($_REQUEST['info'] == "profile"){ ?> 

        <div class="alert alert-success mt-3" role="alert">
            Profile has been updated successfully
        </div>

    <?php } else if($_REQUEST['info'] == "newuser"){ ?> 

        <div class="alert alert-primary mt-3" role="alert">
            Succesfully created account
        </div>

    <?php } else if($_REQUEST['info'] == "invalid"){ ?> 

        <div class="bg-warning text dark p-3 mt-3 h6" role="alert">
            Invalid credentials please try again!
        </div>
    <?php } else if($_REQUEST['info'] == "log_out"){ ?> 

        <div class="alert alert-danger py-3 mt-3" role="alert">
            You have been successfully logged out!
        </div>        

        <div class="px-4 py-5 my-5 text-center">
            <h1 class="display-5 fw-bold text-body-emphasis">Goodbye!</h1>
            <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Come back soon....you hear!</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <!-- <button type="button" class="btn btn-primary btn-lg px-4 gap-3" fdprocessedid="das8is">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4" fdprocessedid="69e2lq">Secondary</button> -->
            </div>
            </div>
        </div>

    <?php } else if($_REQUEST['info'] == "comment"){ ?> 

        <div class="bg-info text dark p-3 m-1 h6" role="alert">
            Comment Added
        </div>

    <?php } else if($_REQUEST['info'] == "deleted"){ ?> 

        <div class="alert alert-danger mt-1 p-3" role="alert">
            Blog post has been deleted
        </div>
        
    <?php } ?>   

<?php }; ?>

   
   
</div>







