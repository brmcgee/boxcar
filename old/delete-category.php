
<?php include_once('logic.php') ?>
<?php include_once('head_section.php') ?>



<title>Add Category</title>
</head>
<body>
    <?php include_once('nav.php') ?>


    <!-- delete category widget  -->
    <div class="container-md mx-auto w-50">
        <form method="POST">
            <br>
            <label>Delete Category:</label> <br>
            <br>
            <select name="category"  class="form-select form-control bg-light  my-3 text-center">
                    <?php 

                    $sql = "SELECT * FROM `category`";
                    $all_categories = mysqli_query($conn,$sql);

                    while ($category = mysqli_fetch_array(
                            $all_categories,MYSQLI_ASSOC)):; 
                    ?>
                    
                    <option value="<?php echo $category["Category_ID"];?> " name="<?php echo $category["Category_Name"] ?>">
                        <?php echo $category["Category_Name"];?>
                    </option>

                    <?php  endwhile; ?>
            </select>
            <input type="submit" value="submit" name="delete-category">
        </form>
    </div>

    <br>

</body>
</html>