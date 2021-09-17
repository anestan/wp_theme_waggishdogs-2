<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package underscores_tailwind
 */

?>
<!doctype html>
<html <?php language_attributes();?>>

<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<style>
		[x-cloak] {
			display: none;
		}
	</style>
	<?php wp_head();?>
</head>

<body <?php body_class(array( 'antialiased' , 'text-gray-900' , ));?>>
	<?php wp_body_open();?>
	<div id="page" class="site min-h-screen flex flex-col">
		<a class="skip-link screen-reader-text sr-only" href="#primary">
			<?php esc_html_e('Skip to content', 'underscores_tailwind');?>
		</a>

		<header id="masthead" class="site-header" x-data="{ menuOpen: false }">

			<div id="site-navigation" x-on:click="menuOpen = true" class="fixed bottom-0 right-0 z-50 md:bottom-auto md:top-0 mr-4 mt-5 mb-5">
				<button id="nav_button"  style="width: 55px; height: 55px"
					class="bg-green-400  p-2 rounded-full shadow-lg text-white">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 576 576" style="enable-background:new 0 0 576 576;" xml:space="preserve"><path style="fill:#fff" d="M151.841,240.182c21.674,49.02,12.437,100.609-20.632,115.23
					c-33.068,14.621-77.446-13.264-99.12-62.281c-21.673-49.02-12.436-100.609,20.632-115.232
					C85.79,163.278,130.167,191.163,151.841,240.182z M198.179,19.39c-35.729,5.545-57.475,56.56-48.57,113.946
					c8.906,57.385,45.089,99.412,80.817,93.868c35.729-5.546,57.474-56.56,48.57-113.946C270.09,55.871,233.908,13.846,198.179,19.39z
					M413.593,30.844c-34.487-10.856-76.583,25.246-94.021,80.641c-17.438,55.393-3.617,109.099,30.871,119.956
					c34.488,10.856,76.583-25.245,94.021-80.64C461.902,95.408,448.08,41.701,413.593,30.844z M524.843,217.244
					c-33.344-16.458-79.167,8.272-102.349,55.237c-23.182,46.966-14.943,98.38,18.401,114.837
					c33.344,16.459,79.167-8.271,102.349-55.236C566.426,285.118,558.188,233.703,524.843,217.244z M259.255,532.816
					c33.817-9.451,48.736-6.465,69.125,1.988c20.39,8.455,47.906,18.068,76.087,11.439c47.741-12.602,49.067-47.412,38.79-87.029
					c-55.698-147.701-127.655-167.613-158.143-168.09c-91.542-1.432-159.137,139.744-170.575,167.096
					c-18.898,50.725,0.208,69.426,1.823,70.781C165.541,579.957,225.438,542.266,259.255,532.816z"></path></svg>
				</button>

				<nav id="nav_menu" class="absolute bottom-16 right-0 md:bottom-auto md:top-16 bg-green-500 w-60 rounded-md p-5 text-white transition-all" 
				x-show="menuOpen" x-cloak x-on:click.away="menuOpen = false"
				x-transition:enter="transition ease-out duration-200"
				x-transition:enter-start="opacity-0 transform scale-90"
				x-transition:enter-end="opacity-100 transform scale-100"
				x-transition:leave="transition ease-in duration-200"
				x-transition:leave-start="opacity-100 transform scale-100"
				x-transition:leave-end="opacity-0 transform scale-90">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb( '<div id="breadcrumbs" class="text-white">You are here: ','</div>' );
							}?>
					<hr class="my-2" />
					<div class="text-xl">
						<?php

						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id' => 'primary-menu',
								'menu_class' => 'mt-5 space-y-4'
							)
						);
						?>
					</div>

				</nav><!-- #site-navigation -->

			</div>

		</header><!-- #masthead -->