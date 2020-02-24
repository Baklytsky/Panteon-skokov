<?php

/**
 * Template name: portfolio
 */
?>

<?php get_header(); ?>
	<div class="lightbox-gallery">
		<div class="lightbox d-flex justify-content-center align-items-center">
			<div class="lightbox-images flex-column text-right">
				<span class="lightbox-icons close icon-cancel"></span>
				<img src="#" alt="Image" class="lightbox-item d-block my-3">
				<div class="lightbox-info d-flex justify-content-between pt-3">
					<span class="img-name pl-5"></span>
					<span class="img-number pr-5"></span>
				</div>
			</div>
			<ul class="lightbox-controls">
				<li><span class="lightbox-icons prev icon-hand-o-left"></span></li>
				<li><span class="lightbox-icons next icon-hand-o-right"></span></li>
			</ul>
		</div>
	</div>
<section class="section-headline container-fluid indent">
	<div class="container text-center text-md-left">
		<h2>
			<span class="headline d-inline-block text-uppercase"><?= __('Portfolio', 'understrap'); ?></span>
		</h2>
	</div>
</section>
<section class="portfolio container-fluid indent">
	<div class="row indent pb-5">
		<div class="col-12 text-center pt-3">
			<h2 class="text-uppercase portfolio-headline">
				<?php echo get_post_meta($post->ID, 'meta1_field_1', true); ?>
			</h2>
			<p class="portfolio-title pt-3">
				<?php echo get_post_meta($post->ID, 'meta1_textfield_1', true); ?>
			</p>
		</div>
	</div>
	<div class="container">
		<div class="row filter-list">
				<?php
				$args = array(
					'post_type'      => 'Our Portfolio',
					'posts_per_page' => - 1,
					'orderby'        => 'date',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'portfolio type',
							'operator' => 'EXISTS',
						)
					)
				);

				$terms = get_terms( 'portfolio type' );

				if( $terms && ! is_wp_error($terms) ) { ?>
					<ul class="filters col-12 d-flex justify-content-center justify-content-md-start button-group filters-button-group">
						<li>
							<button class="btn-filter button is-checked" data-filter="*">All</button>
						</li>
					<?php foreach( $terms as $term ) {?>
						<li>
							<button class="btn-filter button" data-filter=".<?= $term->term_id; ?>">
								<?= $term->name; ?>
							</button>
						</li>
					<?php } ?>
					</ul>
				<?php } ?>
		</div>
	</div>
	<ul class="portfolio-list row indent">
		<?php
		$args = array(
			'post_type'      => 'Our Portfolio',
			'posts_per_page' => - 1,
			'orderby'        => 'date',
			'order'          => 'ASC',
			'tax_query'      => array(
				array (
					'taxonomy' => 'portfolio type',
					'operator' => 'EXISTS',
				)
			)
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				$taxonomy = get_the_terms( $post->ID, 'portfolio type' );
				if (is_array($taxonomy)) {
					foreach ($taxonomy as $selected) { ?>

					<li class="card indent col-12 col-md-4 element-item <?= $selected->term_id; ?>" data-category="<?= $selected->term_id; ?>" id="portfolio-item">
						<picture>
							<?= get_the_post_thumbnail() ?>
						</picture>
						<div class="portfolio-layer d-flex justify-content-center align-items-center">
							<div class="arrow text-center">
								<span class="icon-forward icon-arrow"></span>
							</div>
						</div>
					</li>
					<?php }
				}
			}
		} else {
			echo 'Ooops';
		}
		wp_reset_postdata();
		?>
	</ul>
</section>
<?php get_footer(); ?>
