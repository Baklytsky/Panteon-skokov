<?php
/**
 * Single post partial template
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<section class="blog">
		<div class="single-blog-wrapper">
			<div class="card card-item mb-5">
					<?php echo get_the_post_thumbnail( $post->ID ); ?>
				<div class="card-body news">
					<h1 class="card-title news-headline text-uppercase post-headline">
						<a href="#" class="news-link">
							<?= the_title();?>
						</a>
					</h1>
					<footer class="d-flex justify-content-end align-items-center pt-3">
						<a href="#" aria-label="heart" class="pr-5">
							<span class="icon-heart card-heart"> 15</span>
						</a>
						<span class="footer-card-text text-right">
                                <a href="#" class="footer-card-link">
                                <?= __('by', 'understrap');?> <?= get_the_author();?>
	                                <span class="comments-count">
		                                <?php
		                                echo get_comments_number( $post->ID ) . ' ';
		                                comments_number($zero = 'comments', $one = 'comment', $more = 'comments', $deprecated = '' );
		                                ?>
	                                </span>
	                                <?php
	                                $d = 'M. j Y';
	                                $t = 'Y-m-d';
	                                ?>
	                                <time datetime="<?= get_the_date($t); ?>"><?= get_the_date( $d, $post->ID ); ?></time>
                                </a>
                            </span>
					</footer>
				</div>
			</div>
		</div>
	</section>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article><!-- #post-## -->
<h3 class="comment-count-title">

	<?php
	echo get_comments_number( $post->ID ) . ' ';
	comments_number( $zero = 'comments', $one = 'comment', $more = 'comments', $deprecated = '' );
	?>

</h3>
