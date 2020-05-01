<?php // include_once is used to ensure this code is not included/run multiple times.
// In the case of a class declaration, it would cause an error to run multiple times!
include_once dirname( __FILE__ ) . '/Blog.Class.php';
class Blogs
{
  // Properties.
  private $allBlogs = array();

  // Methods.

  function __construct ( $jsonFilePath = '' )
  { // Check if the file exists.
    if ( file_exists( $jsonFilePath ) )
    { // Will retrieve the file contents as a string.
      $jsonString = file_get_contents( $jsonFilePath );
      // Convert the JSON string to a PHP object.
      $jsonObject = json_decode( $jsonString );
      // Check if the "blogs" are an array.
      if ( is_array( $jsonObject->blogs ) )
      { // Store the array in our property.
        $this->allBlogs = $jsonObject->blogs;
      }
      // If blogs are NOT an array.
      else
      { // Show a warning in the browser.
        echo '<p>WARNING: The blogs appear to be malformed!</p>';
      }
    }
    // If file doesn't exist.
    else
    { // Show a warning in the browser.
      echo '<p>WARNING: Your file doesn\'t exist!</p>';
    }
  }

  // Output all of the blogs.
  public function output ()
  { // If there ARE blogs.
    if ( is_array( $this->allBlogs ) && !empty( $this->allBlogs ) )
    { // Heading, and open our unordered list.
      echo '<h2>Blogs List</h2><ul>';
      // Loop through the blogs!
      foreach ( $this->allBlogs as $blog )
      { // Create an instance of our OTHER class: Blog! Pass in the values.
        $newBlog = new Blog( $blog->name, $blog->website, $blog->about );
        // Echo out our result.
        echo '<li>'.$newBlog->output( FALSE ).'</li>';
      } // Close the unordered list.
      echo '</ul>';
    }
  }

  // Find a particular blog.
  public function findBlogByIndex ( $id = FALSE )
  { // Check if the submission is a number (integer.)
    if ( is_integer( $id ) )
    { // Check if the blog at this INDEX even EXISTS!?
      if ( isset( $this->allBlogs[$id] ) )
      { // Retrieve that blog from the array!
        $foundBlog = new Blog(
          $this->allBlogs[$id]->name,
          $this->allBlogs[$id]->website,
          $this->allBlogs[$id]->about
        );
        // Output that blog!
        $foundBlog->output();
      }
      // If the Blog is not found...
      else
      { // Output a warning for the user.
        echo '<p>Sorry, we couldn\'t find a blog at ID: '.$id.'!</p>';
      }
    }
    // No ID, or an invalid ID was passed.
    else
    { // Output a warning for the user.
      echo '<p>No ID, or an invalid ID was passed; unable to find blog for ID: '.$id.'.</p>';
    }
  }
}