<?php
    include_once('head_section.php');
    include_once('db.php');
?>
    <title>All users</title>
 
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
            *{
        transition:ease all 0.5s;
        }
        @font-face {
            font-family: Source;
            src: url('css/fonts/SourceSansPro-Regular.ttf');
        }

        a {
            text-decoration: none;
        }

        table,
        td,
        th {
            /* border: 1px solid rgb(255 152 0); */
            padding: 15px;
        }
        
        table {
            border-collapse: collapse;

        }
        .table{
            background: #fff;
            border-radius:1em;
            padding:2em;
        }

        #truncate:hover,
        .addnew:hover {
            background-color:#d6293e;
            color:#fff;
            animation: ease 1s;
        }

        .profiles{
            border-radius:50%;
            object-fit: cover;
            object-position:top;
        }

</style>

</head>

<body>






    <?php

    if (!$conn) {
        echo "Connection not successfull" . mysqli_connect_error();
    } 
    else {
        $sql = "SELECT * FROM users;";
        $select = mysqli_query($conn, $sql) or die("Error occured" . mysqli_error($connection));
    ?>
    <div class="container-fluid mx-auto" style="max-width:1400px;">

        <div class="d-flex justify-content-between" style="width:300px;">
            <a href="sign-up.php" class="addnew">Add user</a>
            <a href="index.php" class="addnew">Home</a>
            <a href="display_blogs.php" class="addnew">Blogs</a>
            <a href="logout.php" class="addnew">Logout</a>
        </div>

        <br>
        <form action="deleteall.php"><input disabled type="submit" value="Delete all users" id="truncate"></form>
    
      <div class="container" style="width:1000px;">
        <div class="table">
            <table>
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>ID</th>
                    <th>Display Name</th>
                    <th>Password</th>
                    <th>Reg date</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php

            while ($row = mysqli_fetch_assoc($select)) {

            ?>
                <tr>
                    <td><a href="edit.php?id=<?php echo $row['user_id'];?>"><i style='color:blue;' class="material-icons">note_alt</i></a></td>
                    <td> <?php echo $row['user_id'] ?> </td>
                    <td> <?php echo $row['display_name'] ?> </td>
                    <td><?php  echo  $row['user_password']; ?></td>
                    <td><?php  echo $row['r_date']; ?></td>
                    <td><img src="<?php echo $row['avatar'] ?>" width=50 height=50 class='profiles' alt=""></td>
                    <td><?php   echo $row['email']; ?></td>
                    <td>...</td>
                    <td>...</td>
                    <td><a href="edit.php?id=<?php echo $row['user_id'];?>"><i style='color:red;' class="material-icons">delete_outline</i></a></td>
                </tr>
        <?php }; 
            };
        ?>
      </table>
    </div>
    </div>
  </div>
</body>

</html>