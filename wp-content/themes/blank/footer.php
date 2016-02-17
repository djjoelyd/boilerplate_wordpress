<footer id="footer" role="contentinfo">
	<div class="col-left">
		<div class="address">
			<p class="title">joeldelane.com</p>
			<p>London</p>
			<p>WD6, United Kingdom</p>
			<p>+44 (0) 207 454 2567</p>
		</div>
	</div>
	<div class="col-right">
		<div class="new-business widget-area">
			<?php dynamic_sidebar( 'new-business-footer-widget' ); ?>
			<?php wp_nav_menu( array('menu' => 'Footer Nav' )); ?>
		</div>
		<div class="careers widget-area">
			<?php dynamic_sidebar( 'careers-footer-widget' ); ?>
			<?php wp_nav_menu( array('menu' => 'Footer Nav' )); ?>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>

	<!-- Live script links 
	<script src="./assets/javascripts/dist/libs/require.js"></script>
	<script  src="./assets/javascripts/dist/common.js"></script>
   	-->
	
    <!-- Dev Script links-->
    <script src="<?php echo get_bloginfo('template_directory');?>/assets/javascripts/libs/require.js"></script>
    <script type="text/javascript"> 
        require(["<?php echo get_bloginfo('template_directory');?>/assets/javascripts/common.js"], function (common) {
        	require(["<?php echo get_bloginfo('template_directory');?>/assets/javascripts/application.js"]);
        });      
    </script>
</body>
</html>