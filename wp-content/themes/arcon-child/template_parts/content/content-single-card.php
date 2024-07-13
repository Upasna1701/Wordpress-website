<?php
// echo 'hello';
?>
<div class="resources-cards">
	<a href="<?php the_permalink(); ?>" class="card-link">
		<div class="card-img-animation">

			<?php if (has_post_thumbnail()) : ?>
				<img loading="lazy" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="" alt="<?php the_title(); ?>" width="409" height="281" />
			<?php else : ?>
				<img loading="lazy" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/default-image.webp" class="" alt="default image" width="409" height="281" />
			<?php endif; ?>
		</div>

	<div class="card-content">
		<p class="card-title"><?php the_title(); ?></p>
		<p class="card-date">By <?php the_author(); ?> on <?php echo get_the_date('d M, Y'); ?></p>
		<p class="card-description"><?php echo wp_trim_words(get_the_excerpt(), 10, '...'); ?></p>
	</div>
	</a>

</div>