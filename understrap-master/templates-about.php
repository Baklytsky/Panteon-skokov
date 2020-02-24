<?php

/**
 * Template name: about
 */
?>

<?php get_header(); ?>

<section class="section-headline-about container-fluid indent">
	<div class="container text-center text-md-left">
		<h2>
			<span class="headline d-inline-block text-uppercase"><?= __('About us', 'understrap'); ?></span>
		</h2>
	</div>
</section>
<section class="about">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-5 indent pb-3">
				<a href="#">
					<picture>
						<?= get_the_post_thumbnail($post->id);?>
					</picture>
				</a>
			</div>
			<div class="col-12 col-lg-7">
				<div class="row">
					<div class="col-12 text-center text-md-left pb-3">
						<h2 class="text-uppercase about-headline pb-2">
							<?php echo get_post_meta($post->ID, 'meta1_field_1', true); ?>
						</h2>
						<p class="about-subtitle pb-2">
							<?php echo get_post_meta($post->ID, 'meta1_textfield_1', true); ?>
						</p>
					</div>
					<div class="col-12 column">
						<p class="about-text">
							<?php echo get_post_meta($post->ID, 'meta1_textfield_2', true); ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="skills pb-5">
	<div class="container">
		<div class="d-flex justify-content-center align-item-center pb-4">
			<h2 class="text-uppercase mx-auto skills-title">
				<?php echo get_post_meta($post->ID, 'meta1_field_1_1', true); ?>
			</h2>
		</div>
		<p class="skills-text text-center pb-4">
			<?php echo get_post_meta($post->ID, 'meta1_textfield_3', true); ?>
		</p>
		<ul class="row indent d-flex justify-content-center align-items-center">
			<?php
			$args = array(
				'post_type'      => 'Our Skill',
				'posts_per_page' => - 1,
				'orderby'        => 'date',
				'order'          => 'ASC',
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post(); ?>

					<li class="statistics col-12 mb-4 mr-3 col-lg-5 col-xl-6">
						<span class="percent"> <?= get_the_content()?> % </span>
						<div class="percent-scale" style="width: calc(<?= get_the_content()?>% - 45px);">
							<span class="text-uppercase percent-item"><?= get_the_title()?></span>
						</div>
					</li>
				<?php }
			} else {
				echo 'Ooops';
			}
			wp_reset_postdata();
			?>
		</ul>
	</div>
</section>
<section class="our-team pb-5">
	<div class="container">
		<div class="d-flex justify-content-center align-item-center pb-4">
			<h2 class="text-uppercase mx-auto team-title">
				<?php echo get_post_meta($post->ID, 'meta1_field_1_2', true); ?>
			</h2>
		</div>
		<p class="team-text text-center pb-4">
			<?php echo get_post_meta($post->ID, 'meta1_textfield_4', true); ?>
		</p>
		<ul class="row pb-5">
			<?php
			$args = array(
				'post_type'      => 'Our Team',
				'posts_per_page' => - 1,
				'orderby'        => 'date',
				'order'          => 'ASC',
			);

			$query = new WP_Query( $args );

			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
			$query->the_post(); ?>
			<li class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center pb-3 pb-md-5">
				<a href="<?= get_the_permalink()?>" class="personal-link">
					<?= get_the_post_thumbnail()?>
					<span class="professions text-uppercase d-block text-center"><?= get_the_title()?></span>
				</a>
			</li>
			<?php }
			} else {
				echo 'Ooops';
			}
			wp_reset_postdata();
			?>
			<li class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center pb-3 pb-md-5">
				<form action="#" method="post" enctype="multipart/form-data">
					<label for="file" class="form-cv-img">
							<img src="<?= get_stylesheet_directory_uri()?>/img/img-about/photo_8.png" class="img-fluid mx-auto" alt="CV"/>
						<input id="file" type="file" name="file" multiple>
					</label>
					<input type="submit" class="text-uppercase d-block text-center btn-send" value="Send CV">
				</form>
			</li>
		</ul>
	</div>
</section>

<?php get_footer(); ?>
