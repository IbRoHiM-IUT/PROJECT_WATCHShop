<?php
  include "../libs/config.php";
  include "../libs/database.php";
  include "../functions.php";

  //Creating database object
  $db = new database();

  //Selecting categories
  $query = "SELECT * FROM categories";

  $cats = $db->select($query);

  //Inserting posts
  if (isset($_POST['submit'])) {

    //creating variables for text
    $title = $_POST['title'];
    $content = $_POST['content'];
    $cat = $_POST['cat'];
    $author = $_POST['author'];
    $tags = $_POST['tags'];

    //creating variables for image
    $image= $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if($title=='' || $content=='' || $cat=='' || $author=='' || $tags==''){
      echo "Please fill in all the fields";
    }
    else{
      move_uploaded_file($image_tmp, "../images/$image");
      $query = "INSERT INTO posts (category_id, title, content,author,image,tags) VALUES ('$cat','$title','$content','$author', '$image', '$tags')";

      $run = $db->insert($query);
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Panel</title>

    <!-- Bootstrap core CSS -->
    <link href="../styles/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../styles/custom.css" rel="stylesheet">

    </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add New Post</a>
          <a class="blog-nav-item" href="add_category.php">Add New Category</a>
          <a class="blog-nav-item" href="add_product.php">Add New Product</a>
          <a class="blog-nav-item" href="view_user.php">Add New User</a>
          <a class="blog-nav-item" href="view_order.php">View all Orders</a>
          <a class="blog-nav-item pull-right" href="../index.php">View Blog</a>
          <a class="blog-nav-item pull-right" href="logout.php">Logout</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="row">

        <div class="col-sm-12 blog-main">
        <br/>
        <h2>Insert New Post:</h2><hr>
  <form action="add_post.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Post title:</label>
    <input type="text" name="title" class="form-control" placeholder="Enter a title">
  </div>

  <div class="form-group">
  <label>Post Content:</label>
   <textarea class="form-control" rows="3" name="content" placeholder="Enter a content"></textarea>
   </div>
    <select name="cat" class="form-control">
        <option>Select a Category</option>
        <?php while ($row = $cats->fetch_array()) :?>
        <option value="<?php echo $row['id'];?>"><?php echo $row['title']; ?></option>
      <?php endwhile; ?>
    </select>

  <div class="form-group">
    <label>Author Name:</label>
    <input type="text" name="author" class="form-control" placeholder="Enter author name">
  </div>
  <div class="form-group">
    <label>Post Image:</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label>Tags:</label>
    <input type="text" name="tags" class="form-control" placeholder="Enter tags">
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <a href="index.php" class="btn btn-danger">Cancel</a>
</form>

        </div><!-- /.blog-main -->

<?php 
    include "includes/footer.php";
?>