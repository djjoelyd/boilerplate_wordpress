<?php /* Template Name: Archive Template */ get_header(); ?>
<main id="archive">
	<section class="archive">
		<article class="left">
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
				<div>					
					<input onfocus="if(this.value == 'Search.') { this.value = ''; }" class="text" type="text" value="<?php if(trim(wp_specialchars($s,1))!='') echo trim(wp_specialchars($s,1));else echo 'Search.';?>" name="s" id="s" />
				</div>
			</form>
		</article>
		<article class="right">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>latest" class="button">Back to latest</a>
			<?php the_post(); ?>
			<ul>
				<?php       
				$counter = 0;
				$ref_month = '';
				$monthly = new WP_Query(array('posts_per_page' => -1));
				if( $monthly->have_posts() ) : while( $monthly->have_posts() ) : $monthly->the_post();

				    if( get_the_date('mY') != $ref_month ) { 
				        if( $ref_month ) echo "\n".'</ul>';
				        echo "\n".'<h6>'.get_the_date('F').'</h6>';
				        echo "\n".'<ul>';
				        $ref_month = get_the_date('mY');
				        $counter = 0;
				    }

				if( $counter++ < 5 ) echo "\n".'   <li><a href='.get_permalink($post->ID).'>'.get_the_title($post->ID).'</a></li>';

				endwhile; 
				echo "\n".'</ul>';
				endif; 
				?>
			</ul>
		</article>
	</section>
</main>
<?php get_footer(); ?>