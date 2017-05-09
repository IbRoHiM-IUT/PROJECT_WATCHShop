<?php
  include "../libs/config.php";
  include "../libs/database.php";
  include "../functions.php";

  $db = new database();

  $query = "SELECT * FROM posts";

  $posts = $db->select($query);

  $query = "SELECT * FROM categories";

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

    <div class="container">

      <div class="row">

        <div class="col-sm-12 blog-main">
        <br/>
        <?php 
          if(isset($_GET['msg'])){
            echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
          }
         ?>

      <table class="table table-striped">
        <tr align="center">
          <td colspan="4"><h1>Manage Your Posts:</h1></td>
        </tr>
          <tr>
              <th>Post ID</th>
              <th>Post Title</th>
              <th>Post Author</th>
              <th>Post Date</th>
          </tr>
          <?php while ($row = $posts->fetch_array()) : ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td>
              <a href="edit_post.php?id=<?php echo $row['id']; ?>">
              <?php echo $row['title']; ?></a>
            </td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo formatDate($row['date']); ?></td>
          </tr>
        <?php endwhile; ?>
        </table>


        <table class="table table-striped">
        <tr align="center">
          <td colspan="4"><h1>Manage Your Categories:</h1></td>
        </tr>
          <tr>
              <th>Category ID</th>
              <th>Category Title</th>
          </tr>
          <?php while ($row1 = $cats->fetch_array()) : ?>
          <tr>
            <td><?php echo $row1['id']; ?></td>
            <td>
              <a href="edit_category.php?id=<?php echo $row1['id']; ?>">
              <?php echo $row1['title']; ?></a>
            </td>
          </tr>
        <?php endwhile; ?>
        </table>

        <table class="table table-striped">
        <tr align="center">
          <td colspan="4"><h1>Manage Your Products:</h1></td>
        </tr>
          <tr>
              <th>Product Title</th>
              <th>Product Price</th>
              <th>Product Image</th>
              <th>Product Category</th>
          </tr>
          <?php while ($row = $products->fetch_array()) : ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td>
              <a href="edit_product.php?id=<?php echo $row['id']; ?>">
              <?php echo $row['title']; ?></a>
            </td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['image']; ?></td>
            <td><?php echo $row['cat']; ?></td>
          </tr>
        <?php endwhile; ?>
        </table>

        <table class="table table-striped">
        <tr align="center">
          <td colspan="4"><h1>Manage Your Orders:</h1></td>
        </tr>
          <tr>
              <th>Order Title</th>
              <th>Order Price</th>
              <th>Order Quantity</th>
              <th>Customer Name</th>
              <th>Customer Surname</th>
              <th>Customer address</th>
              <th>Postal Address</th>
              <th>Customer Email</th>
              <th>Date</th>
              <th>Time</th>

          </tr>
          <?php while ($row = $orders->fetch_array()) : ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td>
              <a href="edit_order.php?id=<?php echo $row['id']; ?>">
              <?php echo $row['title']; ?></a>
            </td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['s_name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['time']; ?></td>
          </tr>
        <?php endwhile; ?>
        </table>


         </div><!-- /.blog-main -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>