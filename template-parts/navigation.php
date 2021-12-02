<?php
/**
 * Displays the next and previous post navigation in single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$postsTop;
$post_not_in_past = [get_the_ID()];
$postsLast;

$query_top = new WP_Query( array (
	'post_type'=> 'post',
	'posts_per_page' => -1,
	'tag'=> array('highlighted1', 'highlighted3') ));

$postsTop = $query_top->posts;

foreach($postsTop as $p) {
	array_push($post_not_in_past, $p->ID);
}

$query_last = new WP_Query( array (
	'post_type'=> 'post',
	'posts_per_page' => 5,
	'post__not_in' => $post_not_in_past,
	'orderby' => 'date'));

$postsLast = $query_last->posts;
?>

<h3>Nos articles mis en avant</h3>

<nav class="articles-hint articles-hint--five-columns">
	<ul>
		<?php
		foreach($postsTop as $p) :
			$post_id        = $p->ID;
			$post_url       = get_permalink($p->ID);
			$post_title     = $p->post_title;
			$post_content   = $p->post_content;
			$post_thumbnail_url = get_the_post_thumbnail_url($p->ID);
        ?>

		<li class="articles-hint__posts">
			<a href="<?php echo $post_url ?>">
				<div class="squared-container">
					<img src="<?php echo $post_thumbnail_url; ?>" />
				</div>

				<h4>
					<?php echo $post_title ?>
				</h4>
			</a>
		</li>

		<?php
		endforeach;
		?>
	</ul>
</nav>

<nav class="articles-hint articles-hint--five-columns" style="display: none;">
	<h3>Nos derniers articles</h3>
	<ul>
		<?php
		foreach($postsLast as $p) :
			$post_id        = $p->ID;
			$post_url       = get_permalink($p->ID);
			$post_title     = $p->post_title;
			$post_content   = $p->post_content;
			$post_thumbnail_url = get_the_post_thumbnail_url($p->ID);
        ?>

			<li class="articles-last__posts">
				<a href="<?php echo $post_url ?>">
					<div class="squared-container">
						<img src="<?php echo $post_thumbnail_url; ?>" />
					</div>

					<h4>
						<?php echo $post_title ?>
					</h4>
				</a>
			</li>

		<?php
		endforeach;
		?>
	</ul>
</nav>
