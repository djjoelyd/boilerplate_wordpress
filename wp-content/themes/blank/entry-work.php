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
			<?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?><?php the_title(); ?><?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
			<h2><?php the_block( subTitle, array('label' => __( 'Sub Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h2>
			<p><?php the_block( summary, array('label' => __( 'Summary', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></p>
			<a href="#opportunity" class="down">Scroll down</a>
		</div>
	</header>
	<?php
		$opportunitybg = get_field('opportunity_block_background_colour');
	?>
	<section class="opportunity" style="background: <?php echo $opportunitybg ; ?>" id="opportunity">
		<article>
			<h3>Opportunity</h3>
			<p><?php the_block( opportunity, array('label' => __( 'Opportunity', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?></p>
		</article>
	</section>
	<section class="image1">
		<?php the_block( image1, array('label' => __( 'Image1', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?>
	</section>
	<?php
		$ideabg = get_field('idea_block_background_colour');
	?>
	<section class="idea" style="background: <?php echo $ideabg ; ?>">
		<article>
			<h3>Idea</h3>
			<p><?php the_block( idea, array('label' => __( 'Idea', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?></p>
		</article>
	</section>
	<section class="image2">
		<?php the_block( image2, array('label' => __( 'Image2', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?>
	</section>
	<?php
		$resultsbg = get_field('results_block_background_colour');
	?>
	<section class="results" style="background: <?php echo $resultsbg ; ?>">
		<article>
			<h3>Results</h3>
			<p><?php the_block( results, array('label' => __( 'Results', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?></p>
		</article>
	</section>
	<?php next_post_link( $format, $link, $in_same_term = false, $excluded_terms = '', $taxonomy = 'work' ); ?>
	<div class="article-nav">	
		<?php
			$prev_link = get_previous_post();
			$next_link = get_next_post();
			$work_url = home_url('/work');
			$nextthumbnail = wp_get_attachment_url( get_post_thumbnail_id($next_link->ID) );
			$prevthumbnail = wp_get_attachment_url( get_post_thumbnail_id($prev_link->ID) );
	
			if(empty($prev_link)){
				echo('<a href="' . $work_url . '"><div class="nav-previous empty"><span>View Work</span></div></a>');
			}
			if(empty($next_link)){
				previous_post_link( '%link', '<div class="nav-previous" style="background-image:url('. $prevthumbnail .');"><div>Previous<span>%title</span>' . '</div></div>' );
				echo('<a href="' . $work_url . '"><div class="nav-next empty"><span>View Work</span></div></a>');
			}
			else {
				previous_post_link( '%link', '<div class="nav-previous" style="background-image:url('. $prevthumbnail .');"><div>Previous<span>%title</span>' . '</div></div>' );
				next_post_link( '%link', '<div class="nav-next" style="background-image:url('. $nextthumbnail .');"><div>Next<span>%title</span>' . '</div></div>' );
			}
		?>
	</div>
</article>