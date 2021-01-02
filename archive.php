<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores_tailwind
 */

get_header();
?>

	<main id="primary" class="site-main pt-5 px-5 flex-1 w-full max-w-6xl mx-auto">

		<?php if ( have_posts() ) : ?>

			<header class="page-header mt-5 mb-8">
				<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<div id="breadcrumbs" class="text-purple-700 mt-4">','</div>' );
					}
				the_archive_title( '<h1 class="page-title text-3xl font-bold">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class=" md:px-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-5">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
			
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
			<div class="tw-apply-pagination">
			
			<?php underscores_tailwind_pagination_bar(); ?>
			
			</div>
			

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
