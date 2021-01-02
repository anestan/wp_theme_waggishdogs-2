<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscores_tailwind
 */

 if ( is_singular() ) {
	$post_classes = array(
		'w-full'
	);
 } 
 else {
	$post_classes = array(
		'mb-7',
		'md:mb-0',
		'shadow-xl',
		'rounded-md',
		
	);
 }

?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<?php 

	if ( is_singular() ) {
		?>
		<header class="entry-header mb-5">
		<?php 
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<div id="breadcrumbs" class="text-purple-700 mt-4">','</div>' );
			}
		the_title( '<h1 class="entry-title text-4xl font-bold mt-1">', '</h1>' );

		if ( 'post' === get_post_type() ) :
			?>
	
				<?php
					underscores_tailwind_post_author_meta()
				?>
			
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php underscores_tailwind_post_thumbnail(); ?>

	<div class="entry-content prose prose-lg mx-auto mt-4">
		
		<?php
		if ( is_singular() ) {
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'underscores_tailwind' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links tw-apply-post-links">',
					'after'  => '</div>',
				)
			);
		}
			
		else {
			the_excerpt();
		}
			
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
		
	</footer><!-- .entry-footer --> 

	<?php 
	}
	else {
		?> 

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
							'class' => 'object-cover h-60 w-full'
						)
					);
				?>
			</a>
			<div class="px-4 py-2 flex flex-col h-64">
			<div class="text-purple-700 mt-2"><?php echo get_the_category_list( esc_html__( ', ', 'underscores_tailwind' ) )  ?></div>
			<?php the_title( '<h2 class="entry-title text-2xl font-bold mt-2"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>') ?>
			<div class="text-gray-600 flex-1">
				<?php the_excerpt() ?>
			</div>
			<?php underscores_tailwind_post_author_meta() ?>
		</div>

	<?php
	} ?>
	
</article><!-- #post-<?php the_ID(); ?> -->
