<?php
/*
    Template Name: PageAccueil
    */

// global $post;
$postId = $post->ID;

$headpage_posts = array_merge(
    get_posts(array('tag' => 'headpage1')),
    get_posts(array('tag' => 'headpage2')),
    get_posts(array('tag' => 'headpage3'))
);

$headpage_posts_i = array();

if (!empty($headpage_posts)) {
    foreach ($headpage_posts as $p) {
        $headpage_posts_i[] = array(
            "Post" => get_post($p),
            "Thumbnail" => get_the_post_thumbnail_url($p),
            "Url" => get_permalink($p)
        );
    }
}


?>

<?php get_header(); ?>

<div id="main_ba">
    <div class="article_container" id="img_1">
        <a href="<?php echo $headpage_posts_i[0]["Url"]; ?>">
            <img src="<?php echo $headpage_posts_i[0]["Thumbnail"]; ?>" alt="Thumbnail for first pic">
        </a>

        <div class="article_text">
            <div class="article_title">
                <h3>
                    <?php echo $headpage_posts_i[0]["Post"]->post_title; ?>
                </h3>

                <p class="article_excerpt">
                    <?php echo $headpage_posts_i[0]["Post"]->post_excerpt; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="article_container" id="img_2">
        <a href="<?php echo $headpage_posts_i[1]["Url"]; ?>">
            <img src="<?php echo $headpage_posts_i[1]["Thumbnail"]; ?>" alt="Thumbnail for second pic">
        </a>

        <div class="article_text">
            <div class="article_title">
                <h3>
                    <?php echo $headpage_posts_i[1]["Post"]->post_title; ?>
                </h3>

                <p class="article_excerpt">
                    <?php echo $headpage_posts_i[1]["Post"]->post_excerpt; ?>
                </p>
            </div>
        </div>
    </div>

    <div class="article_container" id="img_3">
        <a href="<?php echo $headpage_posts_i[2]["Url"]; ?>">
            <img src="<?php echo $headpage_posts_i[2]["Thumbnail"]; ?>" alt="Thumbnail for third pic">
        </a>

        <div class="article_text">
            <div class="article_title">
                <h3>
                    <?php echo $headpage_posts_i[2]["Post"]->post_title; ?>
                </h3>

                <p class="article_excerpt">
                    <?php echo $headpage_posts_i[2]["Post"]->post_excerpt; ?>
                </p>
            </div>
        </div>
    </div>
</div>

<hr id="hr_bonus_1" />

<?php get_template_part('template-parts/sgpopup'); ?>


<hr id="hr_bonus_2" />

<div>
    <h2>Nos derniers articles</h2>

    <nav class="articles-hint">
        <ul>
            <?php
            $args = array(
                'numberposts' => '5',
            );
            $recent_posts = wp_get_recent_posts($args);
            foreach ($recent_posts as $recent) :
                $post_id        = $recent['ID'];
                $post_url       = get_permalink($recent['ID']);
                $post_title     = $recent['post_title'];
                $post_content   = $recent['post_content'];
                $post_thumbnail_url = get_the_post_thumbnail_url($recent['ID']);
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

<?php get_footer(); ?>