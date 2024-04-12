<?php include_once('db.php'); ?>
<?php

    


    if(!$conn){
        echo "<h3 class='container bg-dark text-center p-3 text-warning rounded-lg mt-5'>
                Not able to establish Database Connection</h3>";
    };
    if(isset($_REQUEST['signup'])) {       
        $display_name = htmlspecialchars($_REQUEST['uDisplay']);
        $user_password = htmlspecialchars($_REQUEST['uPassword']);
        $email = htmlspecialchars($_REQUEST['uEmail']);
        $email = strtolower($email);
        
        $avatar = $_REQUEST['uAvatar'];
        $user_exist = false;

        $all_sql = "SELECT * FROM users";
        $user_sql = "INSERT INTO users (display_name, user_password, email, avatar) 
                     VALUES ('$display_name', '$user_password', '$email', '$avatar')";
                     
        $query = mysqli_query($conn, $all_sql);

        foreach ($query as $q) {
            if ($email == $q['email']) {
                $user_exist = true;
            }
        }

        if (!$user_exist) {
            mysqli_query($conn, $user_sql);

    
            
            $to_email = $email;
            $subject = 'Welcome to Boxcar';
            $headers['From'] = 'boxcarsi@boxcar.site';
            $headers['MIME-Version'] = 'MIME-Version: 1.0';
            $headers['Content-type'] = 'text/html; charset=iso-8859-1';
            $message = "
            
            <html>
            <head>
                <title>Boxcar | New Member</title>
            </head>
            <body>
                <h1>Welcome  $display_name ! </h1>
                <h2>Thank you for joining #1 social media appr</h2>
                <div style='width: 18rem; border:2px solid #333;max-width:450px; text-align:center;background-color:rgb(209, 208, 208); border-radius:8px; box-shadow:2px 2px 22px rgb(209, 208, 208);'>
                <div style='margin:auto;'>
                    <img src='$avatar' alt='$display_name' style='width:150px;height:150px;border-radius:50%; margin-top:10px;'>
                    <div class='card-body mx-auto'>
                        <p class='card-text'>Welcome your username is <strong>$email</strong></p>
                        <p class='card-text'>Your password is <strong>$user_password</strong></p>
                    </div>
                        <a href='https://www.boxcar.site' style='background-color:#32911a;font-size:18px; text-transform:uppercase; 
                            color:white; padding:8px 10px; border-radius:8px; margin-bottom:12px; text-decoration:none;'>Open boxcar</a>
                    </div>

                </div>
            </body>
        </html>
            ";

            mail($to_email,$subject,$message,$headers);
           

            header("Location: index.php?info=new-user");
        } else {
            header("Location: index.php?info=user-exists");
        }
    };
    
    if(isset($_REQUEST['add-like'])) {

        $blog_id = $_REQUEST['blogID'];
        $user_id = $_REQUEST['authorID'];

        $sql = "INSERT INTO likes (post_id, user_id) VALUES ('$blog_id','$user_id')";
        $sql_blog = "UPDATE `myblogs` SET `likes` = `likes` + 1 WHERE `id`='$blog_id'";

        $q_sql = "SELECT * FROM likes";
        $query = mysqli_query($conn, $q_sql);
        $bool = true;
        
        foreach($query as $q) {
            if ($q['post_id'] == $blog_id && $q['user_id'] == $user_id) {
                $bool = false;
            };
        }

        if ($bool) {
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql_blog);
        }
        
        header("Location: index.php?info=liked#blog$blog_id");
        exit();  
    }
    if(isset($_REQUEST['del-like'])) {

        $blog_id = $_REQUEST['blogID'];
        $user_id = $_REQUEST['authorID'];

        $sql = "DELETE FROM likes WHERE post_id='$blog_id' AND user_id='$user_id'";
        $sql_blog = "UPDATE `myblogs` SET `likes` = `likes` - 1 WHERE `id`= '$blog_id' ";

        $query = mysqli_query($conn, $sql);
        $bool = true;
        
        foreach($query as $q) {
            if ($q['post_id'] == $blog_id && $q['user_id'] == $user_id) {
                $bool = false;
            };
        }

        if ($bool) {
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql_blog);
        }
        
        header("Location: index.php?info=unliked#blog$blog_id");
        exit();  
    }
    if(isset($_REQUEST['edit-profile'])) {      


        $id = $_REQUEST['uID'];
        $display = htmlspecialchars($_REQUEST['uDisplay']);
        $email = htmlspecialchars($_REQUEST['uEmail']);
        $avatar = htmlspecialchars($_REQUEST['uAvatar']);
        $password = htmlspecialchars($_REQUEST['uPassword']);
        $feeling = htmlspecialchars($_REQUEST['uFeeling']);
        $hero = htmlspecialchars($_REQUEST['uHero']);
        
        $sql = "UPDATE `users` SET `display_name`='$display',`user_password`='$password',
        `avatar`='$avatar',`email`='$email', `feeling`='$feeling', `hero`='$hero' WHERE `user_id`='$id'";
        mysqli_query($conn, $sql);


    
        // location where to be directed to after sql query 
         
        header("Location: logout.php");
        exit();
    };
    if(isset($_REQUEST['delete-profile'])) {  

        $id = $_REQUEST['uID'];

        $sql = "DELETE FROM `users` WHERE `user_id` = '$id'";
        $query = mysqli_query($conn, $sql);


        header("Location: logout.php");
        exit();
    };
    if(isset($_REQUEST["new_post"])) {
           
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
            $author = $_REQUEST['author'];
            $body = $_REQUEST['body'];
            $body = htmlspecialchars($body);
            $title = htmlspecialchars($_REQUEST['title']);
            $category = htmlspecialchars($_REQUEST['category']);
            $reg_date = $_REQUEST['date'];
            $avatar = $_REQUEST['avatar'];
            $author_id = $_REQUEST['authId'];
            $post_image = $_REQUEST['image'];
            if (empty($_REQUEST['image'])) {
                $img = 'https://tse2.mm.bing.net/th?id=OIP.Z6Ev8tnsqd7Pw5CpuHykFQHaE8&pid=Api&P=0&h=220';
            } 
            else {
                $img = $_REQUEST['image'];
            };

            $img = $target_file;

            $sql = "INSERT INTO myblogs (author, title, body, category, img, author_id, author_avatar) 
            VALUES ('$author', '$title',  '$body', '$category', '$img', '$author_id', '$avatar')";

            mysqli_query($conn, $sql);

            header("Location: index.php?info=added");
            exit();
         
    };      
    if(isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM myblogs WHERE id = $id";
        $query = mysqli_query($conn, $sql);
    };
    if(isset($_REQUEST['update'])) {

        $id = $_REQUEST['id'];
        $author = $_REQUEST['author'];
        $title = htmlspecialchars($_REQUEST['title']);
        $body = htmlspecialchars($_REQUEST['body']);
        $category = htmlspecialchars($_REQUEST['category']);
        $img = $_REQUEST['image'];
        $reg_date = $_REQUEST['date'];
        $user_id = $_SESSION['a_ID'];
        
        
        $sql = "UPDATE myblogs 
                SET author = '$author', 
                    title = '$title',     
                    body = '$body',  
                    category = '$category', 
                    img = '$img', 
                    reg_date = '$reg_date' 
                WHERE id = $id ";


// if (!$user_id == $id) {
//     mysqli_query($conn, $sql);
//     header("Location: index.php?info=is-post");
// } else {
    
//     header("Location: index.php?info=not-post");
// }
        mysqli_query($conn, $sql);

        

        // location where to be directed to after sql query 
        header("Location: index.php?info=updated");
        exit();
    };
  
    if(isset($_REQUEST['delete'])) {
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM myblogs WHERE id = $id";
        $query = mysqli_query($conn, $sql);

        $comment_sql = "DELETE FROM comments WHERE post_id = $id";
        $comment_query = mysqli_query($conn, $comment_sql);


        // location where to be directed to after sql query 
        header("Location: index.php?info=deleted");
        exit();
    }; 

    if(isset($_REQUEST['add-comment'])) {

        $post_id = $_REQUEST['id'];
        $comment = htmlspecialchars($_REQUEST['comment']);
        $author = $_REQUEST['author'];
        $date = $_REQUEST['date'];
        $comment_counter = $_REQUEST['counter'];
        $auth_avatar = $_REQUEST['authAvatar'];
        
        
        // add comment to table 
        $sql = "INSERT INTO comments (post_id, comment, author, auth_avatar) 
        VALUES ('$post_id', '$comment', '$author', '$auth_avatar')";
        mysqli_query($conn, $sql);

        // add comment counter to table 
        $counter_sql =  "UPDATE myblogs SET comment_count = '$comment_counter' WHERE id = $post_id ";
        mysqli_query($conn, $counter_sql);



        // location where to be directed to after sql query 
        header("Location: view.php?id=$post_id");
        exit();
    };

    
    // if(isset($_POST['cm_comment'])) {
            
    //             $post_id = $_REQUEST['cm_postid'];
    //             $comment = htmlspecialchars($_REQUEST['cm_comment']);
    //             $author = $_REQUEST['cm_author'];
    //             $comment_counter = $_REQUEST['cm_counter'];
    //             $auth_avatar = $_REQUEST['cm_avatar'];
    
    //             $sql = "INSERT INTO comments (post_id, comment, author, auth_avatar) 
    //             VALUES ('$post_id', '$comment', '$author', '$auth_avatar')";
    //             mysqli_query($conn, $sql);
    
    //             $counter_sql =  "UPDATE myblogs SET comment_count = '$comment_counter' WHERE id = $post_id ";
    //             mysqli_query($conn, $counter_sql);
    //             $_POST['cm_comment'] = '';
    //             return;        
    // };


    if(isset($_REQUEST['view'])) {

        $post_id = $_REQUEST['id'];

        $comment_post_sql = "SELECT * FROM myblogs INNER JOIN comments ON myblogs.id = comments.post_id WHERE myblogs.id = $post_id ";
        mysqli_query($conn, $comment_post_sql);
        
        header("Location: home.php?info=view");
        exit();
    };



    if (isset($_SESSION['loggedIn'])) {

        if(isset($_REQUEST['delete'])) {
            $id = $_REQUEST['id'];

            $sql = "DELETE FROM brm WHERE id = $id";
            $query = mysqli_query($conn, $sql);

            // location where to be directed to after sql query 
            header("Location: index.php?info=deleted");
            exit();
        } 

    }; 

    if(isset($_REQUEST['delete'])) {
        if (!isset($_SESSION['loggedIn'])) {
            header("Location: index.php?info=invalid");
            exit();
        }
    };

?>
<?php

if(isset($_REQUEST["like"])) {

    $post_id = $_REQUEST['postId'];
    $author = $_REQUEST['authId'];
    
    
    // add comment to table 
    $sql = "INSERT INTO likes (post_id, user_id) 
    VALUES ('$post_id', '$author')";
    mysqli_query($conn, $sql);

    header("Location: landing.php");
            exit();

exit();

};
?>
<?php

    $sql = "SELECT * FROM `category`";
    $all_categories = mysqli_query($conn,$sql);
  
    // The following code checks if the submit button is clicked 
    // and inserts the data in the database accordingly
    if(isset($_POST['add-category']))
    {
        // Store the Product name in a "name" variable
        $name = mysqli_real_escape_string($conn,$_POST['categoryAdd']);
        
        // Store the Category ID in a "id" variable
        $id = mysqli_real_escape_string($conn,$_POST['Category']); 
        
        // Creating an insert query using SQL syntax and
        // storing it in a variable.
        $sql_insert = 
        "INSERT INTO `category`(`Category_ID`, `Category_Name`)
            VALUES ('$id','$name')";
        
        mysqli_query($conn,$sql_insert);

        header("Location: index.php");
        exit();
    }
?>
<?php
     $sql = "SELECT * FROM `category`";
    $all_categories = mysqli_query($conn,$sql);
  
    if(isset($_POST['delete-category']))
    {
        $category = $_REQUEST['category'];

        $sql = "DELETE FROM category WHERE Category_ID = $category";
        $query = mysqli_query($conn, $sql);

        header("Location: index.php?info=post-deleted");
        exit();
    }
?>



