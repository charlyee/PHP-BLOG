<?php
  /**
   * DEBUG error reporting!
   * !!! REMOVE BEFORE PUSHING TO PROD !!!
   */
  ini_set( 'display_errors', 1 );
  ini_set( 'display_startup_errors', 1 );
  error_reporting( E_ALL );
 
  /**
   * Include our class / blueprint file, so we can use our class.
   */
  include './includes/Blog.Class.php';

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP OOP</title>
</head>
<body>
  <h1>PHP OOP</h1>
  <?php include './includes/navigation.php'; ?>
  <h2>$myObject dump:</h2>
  <pre><?php var_dump( $myObject ); ?></pre>
  <h2>Blogs</h2>
  <?php if ( count( $blogs ) > 0 ) : ?>
    <ul>
      <?php foreach ( $blogs as $blog ) : ?>
        <li>
          <?php $blog->output( TRUE ); // Run our method! It echoes the blog for us :) ?>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</body>
</html>