<?php
// Get the current post category
$categories = get_the_category();
$category_slug = '';
if (!empty($categories)) {
	$category_slug = $categories[0]->slug;
	// echo $category_slug;
}

// Define secondary query arguments
$args = array(
	'post_type' => 'post', 
	'posts_per_page' => 5, 
	'category_name' => 'blogs', 
	'post__not_in' => array(get_the_ID()), 
	'orderby' => 'date', 
	'order' => 'DESC', 
);

// Secondary query to fetch more articles from the same category
$more_articles_query = new WP_Query($args);

// Check if there are more articles
if ($more_articles_query->have_posts()) :
?>
	<div class="related-articles">
		<h4>More Blogs</h4>
		<?php
		while ($more_articles_query->have_posts()) : $more_articles_query->the_post();
		?>
			<div class="all-related">
				<a href="<?php the_permalink(); ?>" class="new-related-articles">
					<div class="hover-img">
						<?php if (has_post_thumbnail()) : ?>
							<img loading="lazy" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" class="small-img" alt="<?php the_title(); ?>" width="113" height="73" />
						<?php else : ?>
							<img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/default-image.webp" class="" alt="default image" width="113" height="73" />
						<?php endif; ?>
					</div>
					<p><?php the_title(); ?></p>
				</a>
			</div>
		<?php endwhile; ?>
	</div>
<?php
endif;

// Restore original post data
wp_reset_postdata();
?>
