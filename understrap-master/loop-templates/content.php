<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<a href="<?php echo get_the_permalink( $post->ID ); ?>">
		<picture>
			<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
		</picture>
	</a>
	<div class="card-body news">
		<h3 class="card-title news-headline text-uppercase">
			<a href="<?php echo get_the_permalink( $post->ID ); ?>" class="news-link">
				<?php echo get_the_title( $post->ID ); ?>
			</a>
		</h3>
		<p class="card-text news-text">
			<?= get_the_excerpt(); ?>
		</p>
		<footer class="d-flex justify-content-between align-items-center pt-3">
			<a href="#" aria-label="heart">
				<span class="icon-heart card-heart"><?php echo '  '.$post->ID; ?></span>
			</a>
			<span class="footer-card-text text-right">
				<a href="#" class="footer-card-link">
					<?= __( 'by', 'understrap' ); ?> <?= get_the_author(); ?>
					<span class="comments-count">
						<?php echo get_comments_number( $post->ID ) . ' ';
						comments_number( $zero = 'comments', $one = 'comment', $more = 'comments', $deprecated = '' );?>
					</span>
					<?php
					$d = 'M. j Y';
					$t = 'Y-m-d';
					?>
					<time datetime="<?= get_the_date( $t ); ?>"><?= get_the_date( $d, $post->ID ); ?></time>
				</a>
			</span>
		</footer>
	</div>
</article><!-- #post-## -->
