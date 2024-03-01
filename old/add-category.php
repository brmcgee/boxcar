
<?php include_once('logic.php') ?>
<?php include_once('head_section.php') ?>



<title>Add Category</title>
</head>
<body>
    <?php include_once('nav.php') ?>

    <form method="POST">
        <label>New category add:</label> <br>
        <input type="text" name="categoryAdd" required>
        <br>
        <label class="py-5">Available Categories</label>
        <select name="Category" >
            <?php 
                while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $category["Category_Name"];?>">
                    <?php echo $category["Category_Name"]; ?>
                </option>
            <?php 
                endwhile; 
            ?>
        </select>
        <br>
        <input type="submit" value="submit" name="delete-category">
    </form>
    <br>
</body>
</html>