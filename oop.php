<?php
  /**
   * DEBUG error reporting!
   * !!! REMOVE BEFORE PUSHING TO PROD !!!
   */
  ini_set( 'display_errors', 1 );
  ini_set( 'display_startup_errors', 1 );
  error_reporting( E_ALL );
  /**
   * A basic object.
   */
  // $myObject = new stdClass(); // "new" keyword is REQUIRED when making an object from a CLASS (or BLUEPRINT.)
  // // To add a property to our object, we use the -> arrow syntax.
  // $myObject->name      = 'Jim Bob-Bob';
  // $myObject->age       = 41;
  // $myObject->interests = array( 'PHP', 'CSS' );
  /**
   * Include our class / blueprint file, so we can use our class.
   */
  include './includes/Blog.Class.php';
  // Let's make a blog...
  $cheetos       = new Blog( 'Cheetos', 3.99, 'Chip' );
  $gushers       = new Blog( 'Fruit Gushers', 2.56, 'Fruit' );
  $jollyRanchers = new Blog( 'Jolly Ranchers', 1.25, 'Fruit' );
  $sharwarma     = new Blog( 'Sharwarma', 7.86, 'Wrap' );
  // Let's throw them in an array for easy output...
  $blogs = array( $cheetos, $gushers, $jollyRanchers, $sharwarma );
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