<?php /* Template Name: Latest Template */ get_header(); ?>
<main>
	<section class="hero latest full__screen">
		<article>
			<h3><?php the_block( heroTitle, array('label' => __( 'Hero Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
			<p><?php the_block( heroSubTitle, array('label' => __( 'Hero Subtitle', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></p>
			<a href="#latest-posts" class="down">Scroll down</a>
		</article>
	</section>
	<section class="latest-posts" id="latest-posts">
	    <?php
	    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	    $aBlogArgs = array(
	        'post_type' => 'post',
	        'paged' => $paged,
			'posts_per_page' => '8'
	    );
		$counter = 1;
	    $oBlogQuery = new wp_query( $aBlogArgs );
	    if ( $oBlogQuery->have_posts() ) :
	    while ( $oBlogQuery->have_posts() ) : $oBlogQuery->the_post();		
	    ?>
			<article class="<?php if ($counter == 4): echo "right";  ?><?php elseif ($counter == 1 || $counter == 7): echo "left"; else: echo "none"; endif; ?>">
			 	 <?php
			 	 $background = '';
			 	 if (has_post_thumbnail( $post->ID ) ):
			 	    $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			 	    $background = 'url('.$image_attributes[0].')'; 
					$backgroundcolor = get_field('background_colour');
			 	else:
			 	    $image_attributes = array( ' ' ); 
			 	    $backgroundcolor = get_field('background_colour');
			 	endif;
			 	?>
				<a href="<?php the_permalink() ?>" class="archiveItemThumb" title="<?php the_title_attribute() ?>" style="background: <?php echo $background; echo $backgroundcolor; ?>">
					<div class="overlay">
				    <?php
					    $aCategories = wp_get_post_terms( $post->ID, 'category' );
					    if ( $aCategories && !is_wp_error( $aCategories ) ) :
					    $s = count($aCategories);
					    $i = 1;
					    foreach ( $aCategories as $oTerm ) {
					
					
					        echo '<p class="categoryLink">'.esc_html( $oTerm->name ).'</p>';
					        if ($i < $s) echo ', ';
					        $i++;
					    }
					    endif;
					    ?>
						<h3><?php the_title() ?></h3>
					</div>
                </a>
			</article>
	    <?php
		$counter++;
	    endwhile;
	    endif;
	    wp_reset_postdata();
	    ?>
		<article>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>archive" class="archiveItemThumb" style="background:#006880;">
				<div class="overlay">
					<p class="categoryLink">Archive</p>
					<h3>Take a look at our full collection of articles</h3>
				</div>
            </a>
		</article>
	</section>
</main>
<?php get_footer(); ?>