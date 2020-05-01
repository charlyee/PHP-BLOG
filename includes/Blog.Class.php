<?php
// Class declaration.
class Blog {
  /**
   * Properties (with default values.)
   */
  // PUBLIC means it can be overwritten OUTSIDE of what's in the class methods.
  public $name  = '';
  public $website = '';
  public $about  = '';
  /**
   * Methods.
   */
  // __construct executes each time we make a new instance of this class (a new object.)
  function __construct ( $name = 'No Name', $website = 'Weblink', $about = 'Uncategorized' )
  {
    if ( is_string( $name ) && !empty( $name ) )
      $this->name = $name;
    if ( is_string( $website ) && !empty( $website ) )
      $this->website = $website;
    if ( is_string( $about ) && !empty( $about ) )
      $this->about = $about;
  }
  // Outputs a blog.
  public function output ( $echo = TRUE )
  {
    $output = '';
    ob_start(); // Begins an output buffer.
    ?>
      <dl>
        <dt>Name: </dt>
        <dd><?php echo $this->name; ?></dd>
        <dt>Website: </dt>
        <dd><?php echo $this->website; ?></dd>
        <dt>About: </dt>
        <dd><?php echo $this->about; ?></dd>
      </dl>
    <?php // ob_get_clean() clears the output buffer, and returns what the string was.
    $output = ob_get_clean(); // We now have the buffered (echo'd) string contents saved in a variable.
    if ( $echo === TRUE ) echo $output; // Output, if our argument tells us to.
    return $output; // Return the string.
  }
}