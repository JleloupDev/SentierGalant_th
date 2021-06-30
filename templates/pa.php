<?php
/*
    Template Name: PageAccueil
    */

// global $post;
$postId = $post->ID;

$highlight1_Id = get_post_meta($post->ID, 'HighlightPost1', true);
$highlight2_Id = get_post_meta($post->ID, 'HighlightPost2', true);
$highlight3_Id = get_post_meta($post->ID, 'HighlightPost3', true);

$highlight1 = array(
    "Post" => get_post($highlight1_Id),
    "Thumbnail" => get_the_post_thumbnail_url($highlight1_Id),
    "Url" => get_permalink($highlight1_Id)
);

$highlight2 = array(
    "Post" => get_post($highlight2_Id),
    "Thumbnail" => get_the_post_thumbnail_url($highlight2_Id),
    "Url" => get_permalink($highlight2_Id)
);

$highlight3 = array(
    "Post" => get_post($highlight3_Id),
    "Thumbnail" => get_the_post_thumbnail_url($highlight3_Id),
    "Url" => get_permalink($highlight3_Id)
);
?>

<?php get_header(); ?>

<div id="main_ba">
    <!-- <div class="square_articles"> -->
        <div class="article_container" id="img_1">
            <a href="<?php echo $highlight1["Url"]; ?>">
                <img src="<?php echo $highlight1["Thumbnail"]; ?>" alt="Thumbnail for first pic">
            </a>

            <div class="article_text">
                <div class="article_title">
                    <h3>
                        <?php echo $highlight1["Post"]->post_title; ?>
                    </h3>

                    <p class="article_excerpt">
                        <?php echo $highlight1["Post"]->post_excerpt; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="article_container" id="img_2">
            <a href="<?php echo $highlight2["Url"]; ?>">
                <img src="<?php echo $highlight2["Thumbnail"]; ?>" alt="Thumbnail for second pic">
            </a>

            <div class="article_text">
                <div class="article_title">
                    <h3>
                        <?php echo $highlight2["Post"]->post_title; ?>
                    </h3>

                    <p class="article_excerpt">
                        <?php echo $highlight2["Post"]->post_excerpt; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="article_container" id="img_3">
            <a href="<?php echo $highlight3["Url"]; ?>">
                <img src="<?php echo $highlight3["Thumbnail"]; ?>" alt="Thumbnail for third pic">
            </a>

            <div class="article_text">
                <div class="article_title">
                    <h3>
                        <?php echo $highlight3["Post"]->post_title; ?>
                    </h3>

                    <p class="article_excerpt">
                        <?php echo $highlight3["Post"]->post_excerpt; ?>
                    </p>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>

<hr id="hr_bonus_1" />

<div id="bonus_popup_btn">
    <h3>Découvrez notre vision de l'élégance</h3>
    <a class="button" href="#popup1">Notre guide des chemins du gentleman !</a>
</div>

<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Notre vision de l'élégance</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <div class="wrapper rounded6" id="templateContainer">
                <div id="templateBody" class="bodyContent rounded6">
                    <div class="indicates-required">
                        <span class="asterisk">*</span> indications requises
                    </div>

                    <form action="https://gmail.us7.list-manage.com/subscribe/post" method="POST">
                        <input type="hidden" name="u" value="7fc5d18dc2bc474cf151f4f14">
                        <input type="hidden" name="id" value="2c2a06e942">

                        <div id="mergeTable" class="mergeTable">
                            <div class="mergeRow dojoDndItem mergeRow-email" id="mergeRow-0">
                                <label for="MERGE0">Address Email<span class="req asterisk">*</span></label>
                                <div class="field-group">
                                    <div class="fx-relay-email-input-wrapper"><input type="email" autocapitalize="none" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="" style="padding-right: 50px;">
                                        <div class="fx-relay-icon" style="top: 0px; bottom: 0px;"><button class="fx-relay-button" id="fx-relay-button" type="button" title="Generate new alias"></button></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mergeRow dojoDndItem mergeRow-number" id="mergeRow-1">
                                <label for="MERGE1">Code postal</label>
                                <div class="field-help">Simplement pour savoir ou sont nos lecteurs ! Vous n'êtes pas obligé de donner votre code postal.</div>
                                <div class="field-group">
                                    <input type="text" name="MERGE1" id="MERGE1" size="25" value="">
                                </div>
                            </div>

                            <div class="mergeRow dojoDndItem mergeRow-number" id="mergeRow-3">
                                <label for="MERGE3">Année de naissance</label>
                                <div class="field-help">Pour savoir quel age ont nos lecteurs ! Vous n'êtes pas obligé de nous communiquer cette information</div>
                                <div class="field-group">
                                    <input type="text" name="MERGE3" id="MERGE3" size="25" value="">
                                </div>
                            </div>
                        </div>

                        <div class="submit_container clear">
                            <input type="submit" class="formEmailButton" name="submit" value="S'abonner">
                        </div>
                        <input type="hidden" name="ht" value="236858dc84bc929390f597d3ca6de7ac51528fa7:MTYxMjE3NjQ1MS45NTE0">
                        <input type="hidden" name="mc_signupsource" value="hosted">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>



<hr id="hr_bonus_2" />

<div class="nav_articles">
    <h2>Nos derniers articles</h2>

    <nav class="last_articles_content">
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

            <div class="recent_post">
                <a href="<?php echo $post_url ?>">
                    <img src="<?php echo $post_thumbnail_url; ?>" />

                    <a class="pa_nav_articles_title">
                        <?php echo $post_title ?>
                    </a>
                </a>
            </div>

        <?php
        endforeach;
        ?>
    </nav>
</div>

<?php get_footer(); ?>