<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
//echo esc_attr( $container );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

	<section class="section-headline-blog container-fluid indent indent mb-5">
		<div class="container text-center text-md-left">
			<h2>
				<span class="headline d-inline-block text-uppercase"><?= __('Blog', 'understrap'); ?></span>
			</h2>
		</div>
	</section>

<div class="blog container-fluid" id="index-wrapper">

	<div class="" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>
				<ul class="grid">
					<li class="grid-sizer"></li>
					<li class="gutter-sizer"></li>
					<li class="card card-item grid-item mb-3">
						<h2 class="blog-headline">
							<a href="#" class="quote-link">
								<q>Ability may get you to the top, but it takes character to keep you there.</q>
							</a>
							<span class="text-right d-block">
                            <a href="#" class="footer-card-link"><cite title="John Wooden">John Wooden</cite></a>
                        </span>
						</h2>
					</li>
					<?php while ( have_posts() ) :
					the_post(); ?>
					<li class="card card-item grid-item mb-3">

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

						<?php endwhile; ?>

						<?php else : ?>

							<?php get_template_part( 'loop-templates/content', 'none' ); ?>

						<?php endif; ?>
					</li>

				</ul>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer();
