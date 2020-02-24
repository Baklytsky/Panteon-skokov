<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<footer class="footer">
	<div class="container">
		<div class="row py-4">
			<div class="col-12 text-center col-md-4 col-lg-4">
				<?php dynamic_sidebar( 'footer-left' ); ?>
				<?php dynamic_sidebar( 'footer-gallery' ); ?>
			</div>
			<div class="col-12 col-md-4 col-lg-5">
				<?php dynamic_sidebar( 'footer-center' ); ?>
				<?php
					$soc_icons = get_theme_mod('understrap_social_icons_settings');

					if ($soc_icons['headline']) { ?>
						<h3 class="footer-headline text-center"><?= $soc_icons['headline'] ?></h3>
				<?php }
					if (!empty($soc_icons['links'])) { ?>
				<ul class="d-flex justify-content-center align-items-center">
					<?php $social_icons_order = array('facebook', 'twitter','linkedin', 'youtube', 'social-blogger', 'rss', 'dribbble');
					foreach ($social_icons_order as $item) {
						if (!empty($soc_icons['links'][$item])) { ?>
							<li>
								<a class="icon-<?= $item ?> icon-style footer-<?= $item ?>" href="<?=$soc_icons['links'][$item]?>"></a>
							</li>
					<?php }
					} ?>
					</ul>
				<?php
					}
				?>
			</div>
			<div class="col-12 d-flex flex-column align-items-center col-md-4 col-lg-3">
				<?php $contacts = get_theme_mod( 'understrap_contacts_settings' );
				if ( $contacts['headline'] ) { ?>
					<h3 class="footer-headline text-center"><?= $contacts['headline'] ?></h3>
				<?php }
				if ( ! empty( $contacts['link'] ) ) {?>
				<address>
					<ul>
						<li class="address-list d-flex align-items-center">
							<p class="footer-text">
								<span><?= __('Address:','understrap') ?> <?= $contacts['link']['Address'] ?></span>
							</p>
						</li>
						<li class="phone-list d-flex align-items-center">
							<ul>
								<li>
									<a href="tel:<?= $contacts['link']['Phone_1'] ?>" class="footer-text">
										<?= __('Phone:','understrap') ?>
										<?= $contacts['link']['Phone_1'] ?>
									</a>
								</li>
								<li class="text-right">
									<a href="tel:<?= $contacts['link']['Phone_2'] ?>" class="footer-text">
										<?= $contacts['link']['Phone_2'] ?>
									</a>
								</li>
							</ul>
						</li>
						<li class="mail-list d-flex align-items-center">
							<p class="footer-text">
								<span>
									<?= __('E-mail:','understrap') ?>
									<a href="mailto:<?= $contacts['link']['Email'] ?>" class="mail-link">
										<?= $contacts['link']['Email'] ?>
									</a>
								</span>
							</p>
						</li>
					</ul>
				</address>
				<?php } ?>
				<?php dynamic_sidebar( 'footer-right' ); ?>
			</div>
		</div>
	</div>
	<section class="footer-menu">
		<div class="container">
			<div class="row d-flex justify-content-between align-item-center">
				<div class="col-12 col-sm-auto d-flex">
					<p class="footer-menu-title text-center my-auto">
						&copy; Copyright <?= the_time('Y');?> - All Rights Reserved
					</p>
				</div>
					<?php $args = array(
						'theme_location'  => '',
						'menu'            => '',
						'container'       => 'div',
						'container_class' => 'col-12 col-lg-6',
						'container_id'    => '',
						'menu_class'      => 'footer-nav text-center text-uppercase d-sm-flex justify-content-sm-between align-items-center',
						'menu_id'         => 'footer-menu',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
						'depth'           => 0,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					);
					wp_nav_menu($args); ?>
			</div>
		</div>
	</section>
</footer>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

