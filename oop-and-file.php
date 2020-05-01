<?php
  ini_set( 'display_errors', 1 );
  ini_set( 'display_startup_errors', 1 );
  error_reporting( E_ALL );
  include './includes/Blogs.Class.php';
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Local and International Companies</title>
</head>
<body>
  <h1>Top Consulting Companies in Canada</h1>
  <?php include './includes/navigation.php'; ?>
  <?php
    // New object instance of "Blogs" class.
    $blogs = new Blogs( dirname( __FILE__ ) . '/data/oop-and-file.json' );
    // Output ALL the blogs we found!
    $blogs->output();
  ?>
  <!-- <h2>Find Blog by Index Number</h2>
  <p>The third blog is:</p>
  <?php
    // Output just the third blog (remember, arrays start at index: 0.)
    $blogs->findBlogByIndex( 2 );
  ?> -->
</body>
</html>