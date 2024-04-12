<?php

    include_once('db.php');
    

    $str = htmlspecialchars($_POST['str']);

    $sql = "SELECT * FROM users WHERE user_id = $str";
    $query = mysqli_query($conn, $sql);
    
    

   foreach ($query as $q) {
        $avatar = $q['avatar'];
        $feeling = $q['feeling'];
        $name = $q['display_name'];
        $hero = $q['hero'];
        $profileId = $q['user_id'];
        $email = $q['email'];
        $date = $q['r_date'];
   };

?>

   
      <!-- Profile Card-->
      <div class="w3-card w3-round w3-white">

        <div class="col col-12">
          <div class="card">
            <div class="d-flex justify-content-end m-0 p-0 position-absolute" style="right:10px;">
                  <button type="button" class="button w3-green p-0 px-1 positon-absolute rounded" onclick = "document.getElementById('id01').style.display='none';" style="z-index: 1;">
                          <span style="" class="bg-light p-1 material-symbols-outlined w3-green fs-2">close</span>
                  </button>
                </div>

            <div class="rounded-top text-white d-flex flex-row w3-theme-d5" id="heroImg"
                 style="height:210px; background-image:url(<?php echo $hero?>); background-position:center;
                 background-position:center; background-repeat:no-repeat; background-size:cover;">
             
             <!-- avatar image  -->
              <div class="ms-4 mt-5 pt-2 d-flex flex-column" style="width: 200px; height:270px;">             
                <img src="<?php echo $avatar?>" alt="<?php echo $name?>" 
                  class=" " style="z-index: 1; border-radius:50%; border:6px solid #fff; width:155px; height:155px; margin-top:65px;"id="avatarImg">
                        
              </div>

              <div class="ms-0" style="margin-top: 210px; margin-left:-55px;">
                <h4 class="bg-light w3-theme-d1 px-3 py-2 rounded"><?php echo $name?></h4>
              </div>
            </div>


          </div>
            <div class="card-body px-4 pt-0 text-black">
              <div class="mt-5">
                <p class="lead fw-normal mb-1 mt-4">About</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                <p class="mb-1 text-secondary"><strong class=" protest-riot-regular fs-4"><?php echo $feeling;?></strong></p>
                  <p class="font-italic mb-1"><?php echo $email; ?></p>
                  <p class="font-italic mb-0">since <?php echo date('m-d-Y',strtotime($date));?></p>
                </div>
              </div>

              <div class="mt-2 d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">Recent photos</p>
                <p class="mb-0"><a href="#Demo3" class="text-muted"></a></p>
              </div>
              <div class="row g-2">


              <?php 
              $userId = $profileId;
              $catsql = "SELECT * FROM myblogs WHERE $profileId ORDER BY id DESC ";
              $query =  mysqli_query($conn, $catsql);
              $count = 0;
              foreach ($query as $q) {  
                if (($q['author_id'] == $userId)) {
                  if ($count < 2) {
              ?>

                <div class="col mb-2 d-flex justify-content-around">
                  <img src="<?php echo $q['img']?>" alt="<?php echo $q['title']?>" class="w-100 img-thumbnail m-0 p-0 border-0" style="max-width:250px; border-radius:7px;">
                </div>

              <?php 
                $count = $count + 1;
              }}}?>

              </div>



            </div>
          </div>
        </div>
      </div>



