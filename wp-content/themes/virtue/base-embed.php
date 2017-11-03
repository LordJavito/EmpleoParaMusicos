<?php 
if ( ! headers_sent() ) {
  header( 'X-WP-embed: true' );
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?php
	/**
	* Print scripts or data in the embed template <head> tag.
	*
	* @since 4.4.0
	*/
	do_action( 'embed_head' );
	?>
</head>
<body <?php body_class(); ?>>
	<?php
	include kadence_template_path(); 

	do_action( 'embed_footer' );
?>
</body>
</html>