<?php get_header(); ?>
<main>
<section id="content" role="main" class="single-post">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; ?>
</section>
</main>
<?php get_footer(); ?>