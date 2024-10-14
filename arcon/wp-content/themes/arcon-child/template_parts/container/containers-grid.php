<?php
$container_info = get_field('container_info', $post->ID);

// Debugging output (remove in production)
// echo '<pre>';
// print_r($container_info);
// exit;

foreach ($container_info['container'] as $key => $value) :
?>

    <!-- Dry Containers Section -->
    <section class="dry-containers">
        <div class="container">
            <div class="sec-content<?php echo ($key % 2 != 0) ? ' left' : ''; ?>">
                <div class="sec-content-left">
                    <h2><?php echo $value['heading']; ?></h2>
                    <p><?php echo $value['description']; ?></p>
                </div>
                <div class="sec-content-right">
                    <?php if (isset($value['image']['url']) && $value['image']['url']) : ?>
                        <div class="image-animation">
                            <img src="<?php echo $value['image']['url']; ?>" alt="<?php echo $value['image']['alt']; ?>" class="overview-img" width="440" height="350">
                        </div>
                    <?php endif; ?>
                    <div class="square-animation"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Standard Boxes Section for the current Dry Container -->
    <section class="standard-boxes" id="standard-boxes-<?php echo $key; ?>">
        <div class="container">
            <?php if (!empty($value['standard_box'])) : ?>
                <div class="container-wrapper">
                    <div class="box-wrapper">
                        <?php foreach ($value['standard_box'] as $box_key => $box_value) : ?>
                            <div class="standard-box">
                                <a href="<?php echo $box_value['cta_link']['url']; ?>">
                                    <?php if (isset($box_value['standard_box_image']['url']) && $box_value['standard_box_image']['url']) : ?>
                                        <img loading="lazy" src="<?php echo $box_value['standard_box_image']['url']; ?>" height="328" width="515" alt="<?php echo $box_value['standard_box_image']['alt']; ?>" />
                                    <?php endif; ?>
                                </a>
                                <div class="hover-box">
                                    <?php if (isset($box_value['standard_']) && $box_value['standard_']) : ?>
                                        <h4><?php echo $box_value['standard_']; ?></h4>
                                    <?php endif; ?>
                                    <?php if (isset($box_value['cta_link']['url']) && $box_value['cta_link']['url']) : ?>
                                        <a class="btn know-more" href="<?php echo $box_value['cta_link']['url']; ?>"><?php echo $box_value['cta_link']['title']; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($box_key == 1) break; // Display only 2 standard boxes ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php
endforeach;
?>