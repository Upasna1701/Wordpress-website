<?php
/* Template Name: Resources Blog Template */
get_header();

?>

<main class="articles-main">
    <section class="articles-banner">
        <div class="articlesbanner">

            <picture class="articles-banner-sec-img">
                <source class="articles-banner-sec-img" media="(max-width:640px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/resources-banner.webp" />
                <img class="articles-banner-sec-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/resources-banner.webp" width="1366" height="768" alt="ARCON's Container" />
            </picture>
            <div class="container">
                <div class="articles-banner-sec">
                    <div class="content-box">
                        <h1 class="banner-h1">Blogs</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>  





    <section class="resources-sec">
        <div class="container">
            <div class="resources-data">
                <?php
                // Define the query arguments
                $args = array(
                    'category_name' => 'blogs', // Change 'article' to the slug of your category
                    'posts_per_page' => -1, // Number of posts to display, -1 for all posts
                    'post_status' => 'publish' // Only fetch published posts
                );

                // Fetch the posts
                $article_query = new WP_Query($args);

                // Check if there are posts
                if ($article_query->have_posts()) :
                    while ($article_query->have_posts()) : $article_query->the_post();
                        get_template_part('template_parts/content/content-single-card');
                    endwhile;
                    // Reset post data
                    wp_reset_postdata();
                else : ?>
                    <p>No blogs found.</p>
                <?php endif; ?>
            </div>
        </div>

    </section>
</main>

<?php
get_footer();
