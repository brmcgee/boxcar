<?php    
    include_once('access.php');
    include_once('head_section.php');

?>

<title>Edit Profile | boxcar</title>

</head>
<body>
    

    <div class="container-fluid mx-auto" style="max-width:1200px;">
    <div class="container">
        <h3>Edit profile</h3>
    </div>
        <form class= "mx-1 order-0" method="post">
            
            <div class="d-flex flex-row align-items-center mb-1">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" hidden id="uID" name="uID" class="form-control"  value="<?php echo $_SESSION['a_ID']?>" />
                  <label class="form-label" hidden for="uID">ID</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uDisplay" name="uDisplay" class="form-control"  value="<?php echo $_SESSION['a_user']?>" />
                  <label class="form-label ms-3" for="uDisplay">Display Name</label>
                </div>
            </div>



            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uAvatar" name="uAvatar"class="form-control"  value="<?php echo $_SESSION['a_avatar']?>" />
                  <label class="form-label ms-3" for="uAvatar">Your Avatar URL</label>
               </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uFeeling" name="uFeeling"class="form-control"  value="<?php echo $_SESSION['a_feeling']?>" />
                  <label class="form-label ms-3" for="uFeeling">Your Feeling</label>
               </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uAvatar" name="uAvatar"class="form-control"  value="<?php echo $_SESSION['a_avatar']?>" />
                  <label class="form-label ms-3" for="uAvatar">Your Avatar URL</label>
               </div>
            </div>
            

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uPassword" name="uPassword" class="form-control"  value="<?php echo $_SESSION['a_password']?>"/>
                  <label class="form-label" for="uPassword">Password</label>
                </div>
            </div>

            
            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uEmail" name="uEmail" class="form-control"  value="<?php echo $_SESSION['a_email']?>"/>
                  <label class="form-label" for="uEmail">Email</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-2">
                <div class="form-outline flex-fill mb-0">
                  <input type="text" id="uHero" name="uHero" class="form-control"  value="<?php echo $_SESSION['a_hero']?>"/>
                  <label class="form-label" for="uHero">Hero Image</label>
                </div>
            </div>
 

            <div class="d-flex justify-content-center mx-1 mb-0 mb-lg-12">
                <div class="modal-footer">
                    <button name="edit-profile" class="w3-button w3-theme-d5">Save</button>
                    <button type="button" class="w3-button w3-red" data-bs-toggle="modal" data-bs-target="#deleteProfileModal" data-bs-dismiss="modal">Delete </button>
                    <button type="button" class="w3-button w3-theme-d2" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </form>
        </div>

        </body>
    </html>
