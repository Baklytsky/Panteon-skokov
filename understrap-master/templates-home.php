<?php

/**
 * Template name: home
 */
?>

<?php get_header(); ?>
<section>
	<div class="section-slider">
		<div id="carouselControls" class="container-fluid carousel slide indent justify-content-center" data-ride="carousel">
			<ul class="carousel-indicators indicators-type">
				<li data-target="#carouselControls" data-slide-to="0" class="active"></li>
				<li data-target="#carouselControls" data-slide-to="1"></li>
			</ul>
			<div class="container">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="container row justify-content-center justify-content-md-between indent">
							<div class="slider-headline col-12 text-center col-md-6 text-md-left pt-5">
								<h2 class="text-uppercase pb-3">
									<span class="d-inline-block p-1 m-1">We believe</span>
									<span class="d-inline-block p-1 m-1">in quality design</span>
								</h2>
								<p class="pb-3">
									<span class="d-inline-block mb-1">Any creative project is unique</span>
									<span class="d-inline-block mb-1">and should be provided with</span>
									<span class="d-inline-block mb-1">the appropriate quality</span>
								</p>
								<div class="text-md-right">
									<a class="btn mx-auto" href="#" aria-label="Button to order">Order Now</a>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<?php
								$args = array(
									'post_type'      => 'Slider photos',
									'posts_per_page' => - 1,
									'orderby'        => 'date',
									'order'          => 'ASC',
								);

								$query = new WP_Query( $args );

								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post(); ?>

										<picture>
											<?php the_post_thumbnail(); ?>
										</picture>

									<?php }
								} else {
									echo 'Ooops';
								}
								wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
					<div class="carousel-item">
						<div class="container row justify-content-center justify-content-md-between indent">
							<div class="slider-headline col-12 text-center col-md-6 text-md-left pt-5">
								<h2 class="text-uppercase pb-3">
									<span class="d-inline-block p-1 m-1">We believe</span>
									<span class="d-inline-block p-1 m-1">in quality design</span>
								</h2>
								<p class="pb-3">
									<span class="d-inline-block mb-1">Any creative project is unique</span>
									<span class="d-inline-block mb-1">and should be provided with</span>
									<span class="d-inline-block mb-1">the appropriate quality</span>
								</p>
								<div class="text-md-right">
									<a class="btn mx-auto" href="#" aria-label="Button to order">Order Now</a>
								</div>
							</div>
							<div class="col-12 col-md-6">
								<?php
								$args = array(
									'post_type'      => 'Slider photos',
									'posts_per_page' => - 1,
									'orderby'        => 'date',
									'order'          => 'ASC',
								);

								$query = new WP_Query( $args );

								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post(); ?>

										<picture>
											<?php the_post_thumbnail(); ?>
										</picture>
									<?php }
								} else {
									echo 'Ooops';
								}
								wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev control-type" href="#carouselControls" role="button" data-slide="prev">
				<span class="icon-left-open-big size" aria-hidden="true"></span>
			</a>
			<a class="carousel-control-next control-type" href="#carouselControls" role="button" data-slide="next">
				<span class="icon-right-open-big size" aria-hidden="true"></span>
			</a>
		</div>
	</div>
</section>
<section class="development">
	<div class="container">
		<div class="row indent">
			<div class="col-12 text-center pt-3">
				<h2 class="text-uppercase design-headline">We create quality designs.</h2>
				<p class="design-text pt-3">We specialize in Web Design / Development and Graphic Design</p>
			</div>
		</div>
		<ul class="row pt-3 indent">
			<?php
			$args = array(
				'post_type'      => 'Our Specialize',
				'posts_per_page' => - 1,
				'orderby'        => 'date',
				'order'          => 'ASC',
				'tax_query'      => array(
					array(
						'taxonomy' => 'speciality type',
						'operator' => 'EXISTS',
					)
				)
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$tax = get_the_terms( get_the_ID(), 'speciality type' );
//							var_dump($tax); ?>
					<li class="mx-auto web-item motion-item pt-3 col-10 col-sm-5 col-lg-3">
				<div class="card">
					<div class="text-center layer-one">
						<span class="icon-<?=$tax[0]->description;?> icon-design"></span>
						<h3 class="icon-title text-uppercase"><?=$tax[0]->name;?></h3>
						<div class="layer-two">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" aria-label="Post image">
								<picture>
									<?php the_post_thumbnail(); ?>
								</picture>
							</a>
						</div>
					</div>
					<div class="card-body body-bg text-white layer-one-text">
						<p class="text-center">
							<?= get_the_excerpt(); ?>
						</p>
						<div class="card-body body-bg text-white layer-two-text d-flex justify-content-between align-items-end">
							<h3 class="title-card">
								<?= get_the_title(); ?>
							</h3>
							<a href="<?= get_the_permalink(); ?>" class="card-link">
								web design
							</a>
						</div>
					</div>
				</div>
			</li>
			<?php	}
			} else {
				echo 'Ooops';
			}
			wp_reset_postdata();
			?>
		</ul>
	</div>
</section>
<section class="work container-fluid indent">
	<div class="d-flex justify-content-center align-item-center">
		<h2 class="work-headline mx-auto text-uppercase">Our work</h2>
	</div>
	<div class="row text-center pt-4 mx-auto">
		<p class="col-12">
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt.
		</p>
	</div>
	<ul class="grid">
		<li class="grid-sizer"></li>
		<li class="gutter-sizer"></li>
		<?php
		$args = array(
			'post_type' => 'Our works',
			'posts_per_page' => -1,
			'orderby' => 'title',
			'order' => 'ASC'
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
		$query->the_post(); ?>
		<li class="grid-item grid-item--width1 p-1">
			<picture>
				<?php the_post_thumbnail(); ?>
			</picture>
		</li>
		<?php }
		} else {
			echo 'Something is wrong';
		}
		wp_reset_postdata(); ?>
	</ul>
</section>
<section class="clients container-fluid indent">
	<div class="d-flex justify-content-center align-item-center">
		<h2 class="clients-headline mx-auto text-uppercase">Our clients</h2>
	</div>
	<div class="row text-center pt-5 pb-3 mx-auto">
		<p class="col-12">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod
			tincidunt.
		</p>
	</div>
	<div id="carouselExample" class="carousel slide w-100" data-ride="carousel">
		<ul class="container carousel-inner row mx-auto w-100">
			<?php
			$args = array(
				'post_type' => 'clients',
				'posts_per_page' => -1,
				'orderby' => 'title',
				'order' => 'ASC'
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
			$query->the_post(); ?>
				<li class="carousel-item">
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" aria-label="our clients"
					   class="text-center col-12 col-sm-6 col-md-3 col-lg-2">
						<picture>
							<?php the_post_thumbnail(); ?>
						</picture>
					</a>
				</li>
			<?php }
			} else {
				echo 'Something is wrong';
			}
			wp_reset_postdata(); ?>
		</ul>
		<a class="carousel-control-prev control-type-mini" href="#carouselExample" role="button" data-slide="prev"
		   aria-label="Slide bar">
			<span class="icon-left-open-big size-mini" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next control-type-mini" href="#carouselExample" role="button" data-slide="next"
		   aria-label="Slide bar">
			<span class="icon-right-open-big size-mini" aria-hidden="true"></span>
		</a>
	</div>
</section>
<?php get_footer(); ?>
