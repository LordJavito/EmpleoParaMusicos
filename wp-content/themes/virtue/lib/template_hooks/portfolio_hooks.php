<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
function pinnacle_portfolio_nav() { 
   wp_link_pages(array('before' => '<nav class="pagination kt-pagination">', 'after' => '</nav>', 'link_before'=> '<span>','link_after'=> '</span>'));
}
add_action( 'kadence_single_portfolio_footer', 'pinnacle_portfolio_nav', 10 );
function pinnacle_portfolio_bottom_carousel() { 
  global $post;  
  $portfolio_carousel_recent = get_post_meta( $post->ID, '_kad_portfolio_carousel_recent', true ); 
  if ($portfolio_carousel_recent == 'recent') { 
    get_template_part('templates/recentportfolio', 'carousel');
  }
}

add_action( 'kadence_single_portfolio_after', 'pinnacle_portfolio_bottom_carousel', 30 );
function pinnacle_portfolio_comments() { 
  global $virtue; 
  if(isset($virtue['portfolio_comments']) && $virtue['portfolio_comments'] == 1) { 
      comments_template('/templates/comments.php'); 
    } 
}

add_action( 'kadence_single_portfolio_after', 'pinnacle_portfolio_comments', 40 );
