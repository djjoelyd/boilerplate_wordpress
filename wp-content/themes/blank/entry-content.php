<section class="entry-content" id="article">
	<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
	<?php the_content(); ?>
	<span class="entry-author">By <?php echo $author = get_the_author(); ?></span>
	<span class="entry-date"><?php the_time('d.m.y'); ?></span>
	<div class="social">
		<a href="https://www.linkedin.com/cws/share?url=<?php echo get_permalink( $post->ID ); ?>" class="linkedin" target="_blank">Share via LinkedIn</a>
		<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?> <?php echo get_permalink( $post->ID ); ?> via @djjoelyd" class="twitter" target="_blank">Share via Twitter</a>
	</div>
	<a href="<?php echo esc_url( home_url( '/archive' ) ); ?>" class="archive-link">Archive</a>
</section>