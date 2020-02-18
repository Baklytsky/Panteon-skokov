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
	<section class="blog">
		<div class="single-blog-wrapper">
			<div class="share-post row py-5 indent">
				<div class="col-12 pb-3 col-lg-5 pb-lg-0 d-flex justify-content-center justify-content-lg-start align-item-center indent">
					<h3 class="share-post-headline text-uppercase">
						Share this post
					</h3>
				</div>
				<?php $url = urlencode(get_the_permalink()); $title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>
				<ul class="d-flex col-12 col-lg-7 justify-content-center justify-content-lg-end align-item-center social-share indent">
					<li class="d-flex pr-2 align-item-center">
						<a class="icon-facebook share-icon share-facebook d-block" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo $url;?>"></a>
						<?php
						$facebook_like_share_count = function ( $url ) {
							$fb_api   = file_get_contents( 'http://graph.facebook.com/?id=' . $url );
							$fb_count = json_decode( $fb_api );

							return $fb_count->shares;
						};
						?>
						<span class="share-item d-block">
							<?php
							if ($facebook_like_share_count( '' . $url ) > 0) {
								echo $facebook_like_share_count( '' . $url );
							} else {
								echo ('15');
							}
							 ?>
						</span>
					</li>
					<li class="d-flex pr-2">
						<a class="icon-twitter-1 share-icon share-twitter d-block" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $url;?>&text=<?php echo $title; ?>"></a>
						<?php
						$twitter_tweet_count = function ( $url ) {
							$tw_api   = file_get_contents( 'https://twitter.com/intent/tweet?url=' . $url );
							$tw_count = json_decode( $tw_api );

							return $tw_count->count;
						};
						?>
						<span class="share-item d-block">
							<?php
							if ($twitter_tweet_count( '' . $url ) > 0 ) {
								echo $twitter_tweet_count( '' . $url );
							} else {
								echo ('56');
							}
							?>
						</span>
					</li>
					<li class="d-flex">
						<a class="icon-linkedin-1 share-icon share-linkedin d-block" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url;?>"></a>
						<span class="share-item d-block">7</span>
					</li>
				</ul>
			</div>
		</div>
	</section>
</article><!-- #post-## -->

<h3 class="comment-count-title">

	<?php
	echo get_comments_number( $post->ID ) . ' ';
	comments_number( $zero = 'comments', $one = 'comment', $more = 'comments', $deprecated = '' );
	?>

</h3>
