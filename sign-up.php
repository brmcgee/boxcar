<?php include_once('logic.php'); ?>
<?php include_once('head_section.php'); ?>
<style>
  html,
  body {
      height: 100%;
    }

  body {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      padding-top: 20px;
      padding-bottom: 40px;
  }
  </style>

  <body>
  <?php if(isset($_REQUEST['info'])) { ?>
    <?php if($_REQUEST['info'] == "error") { ?>
        <div class="alert alert-danger mt-3" role="alert">
            Email already exists, select new email.
        </div>
  <?php } 
  }?>


    <form action="" method="post">
      <div class="imgcontainer">
        <img src="b_avatar.ico" alt="Avatar" class="avatar">
      </div>

      <div class="container">

        <label for="uDisplay">Display Name</label>
        <input type="text" id="uDisplay" name="uDisplay" required />

        <label for="uEmail">Your Email</label>
        <input type="email" id="uEmail" name="uEmail" required />

        <label class="form-label" for="uAvatar">Your Avatar URL</label>
        <input type="text" id="uAvatar" value="uploads/man.gif" name="uAvatar"class="form-control" required/>

        <label class="form-label" for="uPassword">Password</label>
        <input type="password" id="uPassword" name="uPassword" class="form-control" required />

        <button name="signup" class="button button-primary w100">Register</button>

      </div>
      
      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="button cancelbtn button-danger">Cancel</button>
        <span class="psw"><a href="index.php">Home</a></span>
      </div>
    </form>


  <!-- <section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-2">Sign up</p>

                <form class="mx-1 mx-md-1" method="post">

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="uDisplay" name="uDisplay" class="form-control" required />
                      <label class="form-label" for="uDisplay">Display Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="uEmail" name="uEmail" class="form-control" required />
                      <label class="form-label" for="uEmail">Your Email</label>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="uAvatar" name="uAvatar"class="form-control" required/>
                      <label class="form-label" for="uAvatar">Your Avatar URL</label>
                    </div>
                  </div>



                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="uPassword" name="uPassword" class="form-control" required />
                      <label class="form-label" for="uPassword">Password</label>
                    </div>
                  </div>


                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button name="signup" class="btn btn-primary btn-lg">Register</button>

                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->


  </body>
</html>

