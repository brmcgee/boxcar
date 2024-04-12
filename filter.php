<?php
include('db.php');

// $q = intval($_GET['q']);
$q = ($_REQUEST['q']);
$id = ($_REQUEST['uid']);



$sql="SELECT * FROM users WHERE user_id = $q";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)) {
  
  echo '<!-- Friend card  -->';
  echo '<div class="d-flex w3-pale-yellow text-dark p-2 border justify-content-between " id="friendCard<?php echo $friendId ?>">';
  echo '<div class="d-flex flex-row align-items-center">';
  echo '<img src="'.  $row['avatar'] .'" style="width:60px;height:60px;border-radius:50%;" class="me-2 mt-1">';
  echo '<p class="oswald fs-4">'.  $row['display_name'] .'</p>';
  echo '</div>';
  echo '<div class="d-flex">';
  echo '<!-- mail to modal  -->';
  echo '<button id="'.  $row['user_id'] .'" onclick="sendMailFriend(this.id,'.  $id .')" class="bg-transparent border-0">';
  echo '<span class="material-symbols-outlined text-primary">mail</span>';
  echo '</button>';
  echo '<!-- view friend modal  -->';
  echo '<button id="'. $row['user_id'].'" onclick="loadUserCard(this.id)" class="bg-transparent border-0">';
  echo '<span class="material-symbols-outlined w3-text-green">account_box</span>';
  echo '</button>';
  echo '</form>';
  echo '</div>';
  echo '</div>';

};
  ?>



