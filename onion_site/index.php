
<?php 
get_header(); 

?>
<div id="main">
<div id="content">
<h1 class="center_text">POSTS</h1>

<?php  
$argst = array('post_type' => 'tutorial');
$argsp = array('post_type' => 'project');
//Define the loop based on arguments
 
$loopt = new WP_Query( $argst );
$loopp = new WP_Query( $argsp );
//Display the contents
?>

<?php	
 if (have_posts()) : while (have_posts()) : the_post();
?>

<!-- Test -->


<!-- Tutorials -->
<?php if($_REQUEST){if(isset($_GET['post_type'])&&$_GET['post_type']=="tutorial"):?>
<div id="tutorials">	
<span id="ttitle" > <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
 </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> </span> <?php the_terms( $post->ID, 'related-product', 'Related Product: ', ' / ' ); ?>
</div>

<!-- Projects -->
<?php elseif(isset($_GET['post_type'])&&$_GET['post_type']=="project"): ?>
<div id="projects">
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<img src="<?php echo $url; ?>">
<span id="ttitle"> <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> <?php the_terms( $post->ID, 'related-product', 'Related Product: ', ' / ' ); ?>
</div>

<!-- Ohter stuff -->
<?php else: ?>
<div id="tutorials">	
<span id="ttitle"> <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> <?php the_terms( $post->ID, 'related-product', 'Related Product: ', ' / ' ); ?>
</div>
<?php endif;} ?>

<?php 
// product redirection
if(isset($_GET['related-product'])&&$_GET['related-product']=="omega"){  
	wp_redirect("https://store.onion.io/products/omega-dock"); 
}

if(isset($_GET['related-product'])&&$_GET['related-product']=="expansion"){  
	wp_redirect("https://store.onion.io/collections/onion-omega-expansions/products/the-dock"); 
}

 ?>


<?php endwhile; elseif( $loopt->have_posts() || $loopt->have_posts() ): 
// echo contents in tutorial
while ( $loopt->have_posts() ) : $loopt->the_post();
?>
<div id="tutorials">	
<span> Tutorial: </span>
<span id="ttitle"> <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> <?php the_terms( $post->ID, 'related-product', 'Related Product: ', ' / ' ); ?>
</div>

<?php endwhile;
// echo contents in projects
 while ( $loopp->have_posts() ) : $loopp->the_post(); ?>
<div id="tutorials">	
<span> Project: </span>
<span id="ttitle"> <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </span> 
<span id="ttime"> Posted on <?php the_time('F jS, Y') ?></span>
</br>
<span id="tauther"> by <?php the_author(); ?> </span> <?php the_terms( $post->ID, 'related-product', 'Related Product: ', ' / ' ); ?>
</div>
<?php endwhile;else: ?>

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
<?php echo $a; ?>
</div>

<?php get_sidebar(); ?>
</div>
<div id="delimiter">
</div>
<?php get_footer(); 

?>
