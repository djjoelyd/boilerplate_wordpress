<?php /* Template Name: Homepage Template */ get_header(); ?>
<main>
	<section class="hero home full__screen">
		<article>
			<h3><?php the_block( heroTitle, array('label' => __( 'Hero Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
			<p><?php the_block( heroSubTitle, array('label' => __( 'Hero Sub Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></p>
			<a class="button more" href="<?php the_block( heroButtonLink, array('label' => __( 'Hero Button Link', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?>"><?php the_block( heroButtonText, array('label' => __( 'Hero Button Text', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></a>
			<a href="#carousel" class="down">Scroll down</a>
		</article>
	</section>
	<section class="carousel" id="carousel">
		<div class="carousel__list">
			<?php $loop = new WP_Query( array( 'post_type' => 'homepageSlider', 'posts_per_page' => -1) ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="carousel__list-item">
					<a href="<?php echo get_field('slide_link') ?>">
						<div class="overlay">
							<div>
								<p class="client-name"><?php the_title() ?></p>
								<p class="client-summary"><?php echo $post->post_content; ?></p>
							</div>
						</div>
						<?php $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'custom-size' ); ?>
						<img src="<?php echo $large_image_url[0]; ?>" alt="<?php the_title() ?>">
					</a>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</section>
	<section class="featured">
		<?php
			$block1BG = get_field('homepage_feat_block_1_bg_colour');
			$block1Text = get_field('homepage_feat_block_1_text_colour');
			$block2BG = get_field('homepage_feat_block_2_bg_colour');
			$block2Text = get_field('homepage_feat_block_2_text_colour');
			$block3BG = get_field('homepage_feat_block_3_bg_colour');
			$block3Text = get_field('homepage_feat_block_3_text_colour');
		?>
		<article class="large" style="background-color: <?php echo $block1BG; ?>; color: <?php echo $block1Text; ?>;">
			<div class="overlay">
				<h4><a href="<?php the_block( featBlockLink1, array('label' => __( 'Featured Block 1 Link', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?>"><?php the_block( featBlockCat1, array('label' => __( 'Featured Block 1 Category', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></a></h4>
				<h3><a href="<?php the_block( featBlockLink1, array('label' => __( 'Featured Block 1 Link', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?>"><?php the_block( featBlockTitle1, array('label' => __( 'Featured Block 1 Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></a></h3>
			</div>
			<a href="<?php the_block( featBlockLink1, array('label' => __( 'Featured Block 1 Link', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?>">
				<?php the_block( featBlockImg1, array('label' => __( 'Featured Block 1 Image', 'text-domain' ), 'type'  => 'editor', 'apply_filters' => true));?>
            </a>
		</article>
		<article style="background-color: <?php echo $block2BG; ?>; color: <?php echo $block2Text; ?>;">
			<a href="<?php the_block( featBlockLink2, array('label' => __( 'Featured Block 2 Link', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?>">
				<h4><?php the_block( featBlockCat2, array('label' => __( 'Featured Block 2 Category', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h4>
				<h3><?php the_block( featBlockTitle2, array('label' => __( 'Featured Block 2 Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
            </a>
		</article>
		<article style="background-color: <?php echo $block3BG; ?>; color: <?php echo $block3Text; ?>;">
			<a href="<?php the_block( featBlockLink3, array('label' => __( 'Featured Block 3 Link', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?>">
				<h4><?php the_block( featBlockCat3, array('label' => __( 'Featured Block 3 Category', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h4>
				<h3><?php the_block( featBlockTitle3, array('label' => __( 'Featured Block 3 Title', 'text-domain' ), 'type'  => 'one-liner', 'apply_filters' => false));?></h3>
            </a>
		</article>
	</section>
</main>
<?php get_footer(); ?>