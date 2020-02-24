<?php

/**
 * Template name: contact
 */
?>

<?php get_header(); ?>

<section class="section-headline-contact container-fluid indent">
	<div class="container text-center text-md-left">
		<h2>
			<span class="headline d-inline-block text-uppercase"><?= __('Contacts', 'understrap'); ?></span>
		</h2>
	</div>
</section>
<section class="contact container-fluid indent py-5">
	<iframe
		src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.0936922385627!2d32.092326915694464!3d49.42604267934708!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3324e945f89c99c6!2z0KXRgNC40YHRgtC40Y_QvdGB0YzQutCwINGG0LXRgNC60LLQsA!5e0!3m2!1sru!2sua!4v1582555055363!5m2!1sru!2sua"
		width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="">
	</iframe>
</section>
<section class="message-form py-4">
	<div class="container">
		<div class="row indent">
			<div class="col-12 col-md-7 col-xl-8">
				<h3 class="message-headline text-uppercase d-inline-block mb-4">
					 <?= __('Send us a message', 'understrap'); ?>
				</h3>
				<div class="row">
					<div class="col-12 indent">
						<form action="#" method="POST">
							<div class="row indent">
								<div class="col-12 col-xl-4">
									<input type="text" name="name" placeholder="name ..." class="message-form-style">
								</div>
								<div class="col-12 col-xl-4">
									<input type="email" name="email" placeholder="email ..." class="message-form-style">
								</div>
								<div class="col-12 col-xl-4">
									<input type="text" name="subject" placeholder="subject ..."
									       class="message-form-style">
								</div>
								<div class="col-12">
									<textarea name="comment" placeholder="message ..." class="form-comment"></textarea>
								</div>
								<button type="submit" class="comment-btn ml-auto mr-3">Add a comment</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-5 col-xl-4">
				<h3 class="message-headline text-uppercase d-inline-block mb-4">
					Contact info
				</h3>
				<address>
					<ul>
						<li class="address-list d-flex align-content-start">
							<?php $contacts = get_theme_mod( 'understrap_contacts_settings' );
							if ( $contacts['headline'] ) { ?>
							<p class="contact-text">
								<span><?= __('Address:','understrap') ?> <?= $contacts['link']['Address'] ?></span>
							</p>
							<?php }
							if ( ! empty( $contacts['link'] ) ) {?>
						</li>
						<li class="phone-list d-flex align-content-start py-2">
							<ul>
								<li>
									<a href="tel:<?= $contacts['link']['Phone_1'] ?>" class="contact-text">
										<?= __('Phone:','understrap') ?>
										<?= $contacts['link']['Phone_1'] ?>
									</a>
								</li>
								<li class="text-right">
									<a href="tel:<?= $contacts['link']['Phone_2'] ?>" class="contact-text">
										<?= $contacts['link']['Phone_2'] ?>
									</a>
								</li>
							</ul>
						</li>
						<li class="mail-list d-flex align-content-center">
							<p class="contact-text">
								<span>
									<?= __('E-mail:','understrap') ?>
									<a href="mailto:<?= $contacts['link']['Email'] ?>" class="mail-link">
										<?= $contacts['link']['Email'] ?>
									</a>
								</span>
							</p>
						</li>
						<?php } ?>
					</ul>
				</address>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
