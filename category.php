<?php
/**
 *	Category Page
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
?>

<?php get_header(); ?>

<?php
	$cat = $wp_query->get_queried_object();
	// print_r($cat);
?>

<header class="entry-header has-text-align-center header-footer-group">
	<div class="entry-header-inner section-inner medium">
		<h1 class="entry-title">
			<?php echo $cat->name; ?>
		</h1>
	</div>
</header>

<div class="entry-content">
	<p>
		<?php echo $cat->description ?>
	</p>

	<?php 
		category_description($cat_id);
	?>

	<?php
	$query_top = new WP_Query( array (
		'post_type'=> 'post',
		'posts_per_page' => -1,
		'cat'=> $cat->cat_ID));

	$postsTop = $query_top->posts;
	?>

	<nav class="articles-hint articles-hint--two-columns full-width">
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
</div>