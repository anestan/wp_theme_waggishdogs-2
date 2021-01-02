<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores_tailwind
 */

?>

	<footer id="colophon" class="site-footer bg-green-400 text-white">
		<div class="py-10 text-center text-xl">
			<a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo( 'name' ) ?></a>
			
		</div>
		<div class="tw-apply-footer-menu pb-10 text-lg">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'footer-menu',
			)
		);
		?>

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101285822);</script>
<script async src="//static.getclicky.com/js"></script>

</body>
</html>
