<?php
$background = '';
if (has_post_thumbnail( $post->ID ) ):
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$background = 'url('.$image_attributes[0].')'; 
else:
$image_attributes = array( ' ' ); 
$background = get_field('background_colour');
endif;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header style="background: <?php echo $background ; ?>">
		<div class="overlay">
			<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><?php the_title(); ?><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
			<a href="#article" class="down">Scroll down</a>
		</div>
	</header>
	<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
	<?php next_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $taxonomy = 'category' ); ?>
	<div class="article-nav">	
		<?php
			$prev_link = get_previous_post();
			$next_link = get_next_post();
			$latest_url = home_url('/latest');
			$nextthumbnail = wp_get_attachment_url( get_post_thumbnail_id($next_link->ID) );
			$prevthumbnail = wp_get_attachment_url( get_post_thumbnail_id($prev_link->ID) );
	
			if(empty($prev_link)){
				echo('<div class="nav-previous empty"><a href="' . $latest_url . '"><span>View Latest</span></a>' . '</div>');
			}
			if(empty($next_link)){
				previous_post_link( '%link', '<div class="nav-previous" style="background-image:url('. $prevthumbnail .');"><div>Previous<span>%title</span>' . '</div></div>' );
				echo('<div class="nav-next empty"><a href="' . $latest_url . '"><span>View Latest</span></a>' . '</div>');
			}
			else {
				previous_post_link( '%link', '<div class="nav-previous" style="background-image:url('. $prevthumbnail .');"><div>Previous<span>%title</span>' . '</div></div>' );
				next_post_link( '%link', '<div class="nav-next" style="background-image:url('. $nextthumbnail .');"><div>Next<span>%title</span>' . '</div></div>' );
			}
		?>
	</div>
</article>