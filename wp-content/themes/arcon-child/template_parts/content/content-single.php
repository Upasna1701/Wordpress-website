<main class="article-details-main">
	<?php
	function get_category_names()
	{
		$categories = get_the_category();
		$category_names = array();
		if (!empty($categories)) {
			foreach ($categories as $category) {
				$category_names[] = $category->name;
			}
		}
		return implode(', ', $category_names);
	}

	if (have_posts()) :
		while (have_posts()) : the_post();
	?>
			<section class="privacy-sec">
				<img class="banner-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/blog-internal.webp" height="334" width="1440" alt="Privacy Banner">
				<div class="container">
					<div class="title-wrapper">
						<h2>ARCON - <?php echo get_category_names(); ?></h2>
					</div>
				</div>
			</section>

			<section class="art-dtl">
				<div class="container">
					<div class="art-breadcrums">
						<a href="<?php echo get_site_url(); ?>">Home</a>
						<a href="<?php echo get_site_url(); ?>/resources/articles/">Resources</a>
						<a href="#" class="a-active"><?php echo get_category_names(); ?></a>
					</div>

					<div class="art-data">
						<div class="art-dtl-content">
							<p class="article-date"><?php echo get_category_names(); ?> | <?php echo get_the_date('d M Y'); ?> | <?php the_author(); ?></p>
							<h1 class="article-title"><?php the_title(); ?></h1>
							<div class="article-tags">
								<?php
								$tags = get_the_tags();
								if ($tags) :
									foreach ($tags as $tag) :
								?>
										<p><?php echo $tag->name; ?></p>
								<?php
									endforeach;
								endif;
								?>
							</div>
							<?php 
								// Get the post ID
								$post_id = get_the_ID();
								// Get the alt text of the featured image
								$image_id = get_post_thumbnail_id($post_id);
								$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
								?>
							<?php if (has_post_thumbnail()) : ?>
								<div class="featureimg">
									<img loading="lazy" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="featured-image-article" alt="<?php echo esc_attr($image_alt); ?>" width="788" height="522" />
								</div>
							<?php endif; ?>

							<div class="article-content-start">
							<?php the_content(); ?>
							</div>

						</div>
						<?php get_template_part('template_parts/content/content-related-single'); ?>

					</div>
				</div>
			</section>
	<?php
		endwhile;
	else :
		echo '<p>No content found</p>';
	endif;
	?>
</main>
