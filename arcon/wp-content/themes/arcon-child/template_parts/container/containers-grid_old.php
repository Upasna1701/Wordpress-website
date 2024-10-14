<?php

$container_info = get_field('container_info', $post->ID);

$status = $container_info['status'];
if ($status) :
    // print '<pre>';
    // print_r($container_info);
    if ($container_info['container']['status']) :

?>
        <section class="grid-box-sec">
            <div class="container">
                <?php foreach ($container_info['container']['information'] as $key => $value) : ?>
                    <div class="sec-content<?php echo ($key % 2 != 0) ? 'left' : ''; ?>">
                    <div class="sec-content-left">
                        <?php if (isset($value['heading']) && $value['heading']) : ?>
                            <h2><?php echo $value['heading']; ?></h2>
                        <?php endif; ?>
                        <?php if (isset($value['description']) && $value['description']) : ?>
                            <?php echo $value['description']; ?>
                        <?php endif; ?>
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
        <?php endforeach; ?>
        </section>
    <?php endif;
    //    print '<pre>';
    //    print_r($container_info['container_info']);
    if ($container_info['standard_box']['status']) :
       
      
    ?>
        <section class="standard-boxes" id="standard-boxes">
            <div class="container">
                <?php if (isset($container_info['standard_box']['heading']) && $container_info['standard_box']['heading']) : ?>
                    <div class="title-wrapper">
                        <h2 class="sec-title"><?php echo $container_info['standard_box']['heading']; ?></h2>
                    </div>
                <?php endif; ?>
                <div class="container-wrapper">
                    <div class="box-wrapper">
                        <?php foreach ($container_info['standard_box']['product_info'] as  $value) : 
                            ?>
                            <div class="standard-box">
                                <a href="<?php $value['cta_link']['url']; ?>">
                                    <?php if (isset($value['image']['url']) && $value['image']['url']) : ?>
                                        <img loading="lazy" src="<?php echo $value['image']['url']; ?>" height="328" width="515" alt="<?php echo $value['image']['alt']; ?>" />
                                    <?php endif; ?>
                                </a>
                                <div class="hover-box">
                                    <?php if (isset($value['heading']) && $value['heading']) : ?>
                                        <h4><?php echo $value['heading']; ?></h4>
                                    <?php endif; ?>
                                    <?php if (isset($value['cta_link']['url']) && $value['cta_link']['url']) : ?>
                                        <?php if (isset($value['heading']) && $value['heading']) : ?>
                                            <a class="btn know-more" href="<?php echo $value['cta_link']['url']; ?>"><?php echo $value['cta_link']['title']; ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                      
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php endif; ?>