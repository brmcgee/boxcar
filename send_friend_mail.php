<!-- MODAL mail message -->

<?php
    include_once('db.php');
    

    $str = htmlspecialchars($_POST['str']);
    $uid = htmlspecialchars($_POST['uid']);
    
  // mailto 
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

    // mailfrom 
    $a_sql = "SELECT * FROM users WHERE user_id = $uid";
    $a_query = mysqli_query($conn, $a_sql);
    foreach ($a_query as $a) {
        $a_avatar = $a['avatar'];
        $a_feeling = $a['feeling'];
        $a_name = $a['display_name'];
        $a_hero = $a['hero'];
    };


?>



   
      <!-- Mail Card-->
      <div class="w3-card w3-round w3-white">

        <div class="col col-12">
          <div class="card">

          

            <div class="d-flex justify-content-end m-0 p-0 position-absolute" style="right:10px;">

              <button type="button" class="button w3-green p-0 px-1 positon-absolute rounded" 
                      onclick = "document.getElementById('id01').style.display='none';" style="z-index: 1;">
                      <span style="" class="bg-light p-1 material-symbols-outlined w3-green fs-2">close</span>
              </button>

            </div>

            
          

            <div class="card-body px-4 my-4 pt-0 text-black">

                <h3 class="text-dark roboto-medium mb-3">Boxcar Mail</h3>

            <!-- message confirmation output  -->
            <div id="message" class="p-1"></div>


                <div class="px-2 d-flex justify-content-start align-items-left rounded" style="background-color: #f8f9fa;">
                      <p class="col-3 fs-5 ">To</p>
                      <img src="<?php echo $avatar;?>" alt="<?php echo $name; ?>" style="border-radius:50%;" width="25" height="25">
                       <p class="roboto-medium fs-5 px-2"><?php echo $name; ?></p>
                </div>
                <div class="px-2 d-flex justify-content-start align-items-left" style="background-color: #f8f9fa;">
                      <p class="col-3 fs-5">From</p>
                      <img src="<?php echo $a_avatar;?>" alt="<?php echo $a_name; ?>" style="border-radius:50%;" width="25" height="25">
                       <p class="roboto-medium fs-5 px-2"><?php echo $a_name; ?></p>
                </div>



            </div>

            <div class="mt-2 d-flex justify-content-between align-items-center mb-0 px-2">
  
                <form action="#" name="f_message" class="mx-auto border-0 d-flex flex-column">
                  <p class="lead fw-normal my-0">Message</p>
                  <input hidden type="number" name="friendId" value="<?php echo $str;?>">
                  <input hidden type="number" name="userId"  value="<?php echo $uid;?>">
                  <textarea type="text" name="friendMessage" id="mailMessage" value="" rows="6" cols="30" class="form-control"></textarea>

                  <button type="button" id="delBtn<?php echo $fq['user_id']?>" name="submit" value="Send" 
                          onclick="sendMail(friendMessage.value, friendId.value, userId.value)"
                          class="p-2 border-0 button w3-theme-d4">
                    <span id="" class="material-symbols-outlined w3-text-white">check</span> Send Mail
                  </button>
                </form>

            </div>
            

            </div>
          </div>
        </div>
      </div>



