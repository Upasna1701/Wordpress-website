<?php
    $banner = get_field('banner');
    $parent_id = wp_get_post_parent_id(get_the_ID());
    $product_info = get_field('product_info');

    $parent_post = get_post($parent_id);
    $parent_title = get_the_title($parent_post);
    $parent_link = get_permalink($parent_post);

    if($product_info['status']):
?>

<section class="prd-stl">
    <div class="container">
        <div class="prd-breadcrums">
            <a href="<?php echo site_url(); ?>/">Home</a>
            <a href="<?php echo $parent_link; ?>"><?php echo $parent_title; ?></a>
            <a href="<?php echo get_permalink(); ?>" class="a-active"><?php echo $banner['banner_title'] ?></a>
        </div>

        <div class="prd-description">
            <?php
                $gallery = $product_info['image_gallery'];
                if(count($gallery) > 0):
            ?>
                <div class="prd-sliders">
                    <div class="prdslider-img">
                        <div class="product-slider-main">

                            <?php 
                                foreach($gallery as $index => $image):
                            ?>
                            <div class="product-slider-main__item">
                                <img src="<?php echo $image['url']; ?>" width='538' height='359'
                                    alt="<?php echo $image['alt'] ? esc_attr($image['alt']) : 'Product-' . $index; ?>">
                            </div>
                            <?php 
                                endforeach; 
                            ?>

                        </div>
                        <div class="product-slider-thumbnail">

                            <?php 
                                foreach($gallery as $index => $image):
                            ?>
                            <div class="product-slider-thumbnail__item">
                                <img src="<?php echo $image['url']; ?>" width='114' height='76'
                                alt="<?php echo $image['alt'] ? esc_attr($image['alt']) : 'Product-Thumbnail' . $index; ?>">
                            </div>
                            <?php 
                                endforeach; 
                            ?>
                            

                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="prd-alldesc">
                <?php if($product_info['product_title']): ?>
                    <h2><?php echo $product_info['product_title']; ?></h2>
                <?php endif; ?>
                <?php if($product_info['product_description']): ?>
                    <p class="prd-desc-more"><?php echo $product_info['product_description']; ?></p>
                <?php endif; ?>
                <?php if($product_info['tag_title']): ?>
                <h3><?php echo $product_info['tag_title']; ?></h3>
                <?php endif; ?>
                <?php 
                    $tags = $product_info['tags_repeater'];
                    if(count($tags) > 0):
                ?>
                <div class="product-tags">
                    <?php
                        foreach($tags as $tag):
                    ?>
                        <p><?php echo $tag['tag']; ?></p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>

<?php endif; ?>