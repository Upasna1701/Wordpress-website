<?php
$resources = get_field('resources', $post->ID);
$status = $resources['status'];

// print'<pre>'; print_r($resources); exit;

if ($status) :
?>
    <section class="resources-sec">
        <div class="container">
            <?php if (isset($resources['heading']) && $resources['heading']) : ?>
                <h2><?php echo $resources['heading']; ?></h2>
            <?php endif; ?>
            <?php if (isset($resources['sub_heading']) && $resources['sub_heading']) : ?>
                <h3><?php echo $resources['sub_heading']; ?></h3>
            <?php endif; ?>
            <div class="resources-data">
                <?php
                // Define the query arguments
                $args = array(
                    'category_name' => 'blogs', // Change 'articles' to the slug of your category
                    'posts_per_page' => 3, // Number of posts to display
                    'post_status' => 'publish', // Only fetch published posts
                    'orderby' => 'date', // Order by date
                    'order' => 'DESC' // Display the newest posts first
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
                    <p>No articles found.</p>
                <?php endif; ?>
            </div>
            <?php
            // Query to check the total number of posts in the category
            $total_articles_query = new WP_Query(array(
                'category_name' => 'blogs', // Change 'articles' to the slug of your category
                'post_status' => 'publish', // Only fetch published posts
                'posts_per_page' => -1, // Get all posts
            ));
            $total_articles_count = $total_articles_query->found_posts;

            // Display the "View All Articles" button if there are more than 3 articles
            if ($total_articles_count > 3) : ?>
                <?php if (isset($resources['all_article_link']['url']) && $resources['all_article_link']['url']) : ?>
                    <div class="resource-cta">
                        <a href="<?php echo $resources['all_article_link']['url']; ?>" class="rounded-btn"><?php echo $resources['all_article_link']['title']; ?></a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>