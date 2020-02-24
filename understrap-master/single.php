<?php
/**
 * The template for displaying all single posts
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
	<section class="section-headline-blog container-fluid indent mb-5">
		<div class="container text-center text-md-left">
			<h2>
				<span class="headline d-inline-block text-uppercase"><?= __('Blog', 'understrap'); ?></span>
			</h2>
		</div>
	</section>
<div class="container-fluid px-5" id="single-wrapper">

<!--	<div class="--><?php //echo esc_attr( $container ); ?><!--" id="content" tabindex="-1">-->

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

<!--	</div><!-- #content -->-->

</div><!-- #single-wrapper -->

<?php get_footer();
