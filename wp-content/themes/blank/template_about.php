<?php /* Template Name: About Us Template */ get_header(); ?>
<main>
	<section class="hero about-hero full__screen">
		<article>
			<h3>About</h3>
			<p>We're live from London.</p>
			<a href="#about" class="down">Scroll down</a>
		</article>
	</section>
	<section class="about-blocks orange" id="about">
		<article class="text">
			<h3><?php the_block( blockTitle1, array('label' => __( 'Block Title 1', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
			<p><?php the_block( blockText1, array('label' => __( 'Block Text 1', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => false));?></p>
		</article>
		<article class="image">
			<?php the_block( blockImage1, array('label' => __( 'Block Image 1', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?>
		</article>
	</section>
	<section class="about-blocks blue">
		<article class="image">
			<?php the_block( blockImage2, array('label' => __( 'Block Image 2', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?>
		</article>
		<article class="text">
			<h3><?php the_block( blockTitle2, array('label' => __( 'Block Title 2', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
			<p><?php the_block( blockText2, array('label' => __( 'Block Text 2', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => false));?></p>
		</article>
	</section>
	<section class="about-blocks aqua">
		<article class="text">
			<p><?php the_block( blockText3, array('label' => __( 'Block Text 3', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?></p>
		</article>
		<article class="image">
			<?php the_block( blockImage3, array('label' => __( 'Block Image 3', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?>
		</article>
	</section>
	<section class="about-blocks orange">
		<article class="image">
			<?php the_block( blockImage4, array('label' => __( 'Block Image 4', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?>
		</article>
		<article class="text">
			<h3><?php the_block( blockTitle4, array('label' => __( 'Block Title 4', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
			<p><?php the_block( blockText4, array('label' => __( 'Block Text 4', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => false));?></p>
		</article>
	</section>
	<section class="about-services">
		<article class="text">
			<h3><?php the_block( servicesTitle, array('label' => __( 'Services Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
			<p><?php the_block( servicesSubTitle, array('label' => __( 'Services Sub Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></p>
			<p><?php the_block( servicesList, array('label' => __( 'Services List', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?></p>
		</article>
	</section>
	<section class="about-clients">
		<article class="text">
			<h3><?php the_block( clientsTitle, array('label' => __( 'Clients Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
			<p><?php the_block( clientsList, array('label' => __( 'Clients List', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?></p>
		</article>
	</section>
</main>
<?php get_footer(); ?>