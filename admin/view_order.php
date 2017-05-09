<?php
  include "../libs/config.php";
  include "../libs/database.php";
  include "../functions.php";

  //Creating database object
  $db = new database();

  //Selecting categories
  $query = "SELECT * FROM orders";

  $cats = $db->select($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <table class="table table-striped">
        <tr align="center">
          <td colspan="12"><h1>All Orders:</h1></td>
        </tr>
          <tr>
              <th>Order Title</th>
              <th>Order Price</th>
              <th>Order Quantity</th>
              <th>Customer name</th>
              <th>Customer Surname</th>
              <th>Customer Address</th>
              <th>Postal index</th>
              <th>Email</th>
              <th>Date</th>
              <th>Time</th>
              
          </tr>
          <?php while ($row = $cats->fetch_array()) : ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td>
              <a href="view_order.php?id=<?php echo $row['id']; ?>">
              <?php echo $row['product']; ?></a>
            </td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['s_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['post_index']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['date1']; ?></td>
            <td><?php echo $row['time1']; ?></td>
          </tr>
        <?php endwhile; ?>
        </table>


        </div><!-- /.blog-main -->

<?php 
    include "includes/footer.php";
?>