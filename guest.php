<?php include_once('logic.php'); ?>
<?php include_once('head_section.php'); ?>
<?php include_once('db.php'); ?>



  <body>
  <?php if(isset($_REQUEST['info'])) { ?>
    <?php if($_REQUEST['info'] == "error") { ?>
        <div class="alert alert-danger mt-3" role="alert">
            Email already exists, select new email.
        </div>
  <?php } 
  }?>



    <?php 
    
      // $sql = "SELECT * FROM myblogs INNER JOIN users ON myblogs.author_id = users.user_id ORDER BY id DESC";
      $sql = "SELECT * FROM myblogs INNER JOIN users ON myblogs.author_id = users.user_id ORDER BY RAND()";
      $query = mysqli_query($conn, $sql);
      $blog_id = '';      


      
      foreach ($query as $q) {  
      $blog_id =  $q['id']; 
      $blog_id_name = 'blog' . $q['id'];  
      $date = $q['reg_date'];
      $avatar = $q['avatar'];
      $display_name = $q['display_name'];

      echo '<section class="mx-auto col-sm-12 col-md-7 col-lg-7 mt-2">';
      echo '<div class="card mx-auto" style="max-width:49rem;">';
      echo '<div class="card-body d-flex flex-nowrap  flex-row align-items-start">';
      echo '<img src="'.  $q['avatar']  . '" class="rounded-circle me-3" height="50px" width="50px" alt="'.  $q['author']    . '">';
      echo '<div class="w-100">';
      echo '<h4 class="card-title mb-1 oswald"><strong>'.  $q['title'] .'</strong></h4>';
      echo '<p class="card-text text-primary">'.  $q['author']  . ' <span class="text-dark float-end pe-5">' .  time_elapsed_string($q['reg_date']) .'</span></p>';
      echo '</div>';
      echo '</div>';
      echo '<div class="rounded-0 d-flex justify-content-around">';
      echo '<img class="img-fluid" style="max-height:390px; " src="'.  $q['img']  . '" alt="'.  $q['title'] .'">';
      echo '</div>';
      echo '<div class="card-body">';
      echo '<p class="card-text" style="text-indent:12px;text-align: justify;">';
      echo  $q['body'];
      echo '</p>';
      echo '<p class="card-text badge badge-dark bg-dark text-light fs-5">'.  $q['category'] .'</p>';
      echo '<a href="index.php" class="card-text badge badge-dark bg-primary text-light fs-6 text-decoration-none float-end "><span class="material-symbols-outlined">edit</span></a>';
      echo '</div>';
      echo '<div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</section>';

      }

    ?>



      <!-- time elapsed  -->
      <?php function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $w = floor($diff->d / 7);
        $diff->d -= $w * 7;
        $string = ['y' => 'year','m' => 'month','w' => 'week','d' => 'day','h' => 'hour','i' => 'minute','s' => 'second'];
        foreach ($string as $k => &$v) {
            if ($k == 'w' && $w) {
                $v = $w . ' week' . ($w > 1 ? 's' : '');
            } else if (isset($diff->$k) && $diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
      }?>


  </body>
</html>

