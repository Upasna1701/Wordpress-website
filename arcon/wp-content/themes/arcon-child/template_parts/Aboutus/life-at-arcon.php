<?php
$life = get_field('life_arcon', $post->ID);
// print '<pre>'; print_r($life);exit;
$status = $life['status'];
if ($status) { 
    ?>
<section class="life-at-arcon" id="life-at-arcon">
    <!-- <div class="container"> -->
        <?php if (isset($life['heading_title']) && $life['heading_title']) { ?>
            <h2><?php echo $life['heading_title']; ?></h2>
        <?php } ?>
        <?php if (isset($life['description']) && $life['description']) { ?>
            <p><?php echo $life['description']; ?></p>
        <?php } ?>
        <div class="slider-class-life">
        <?php if (is_array($life['gallary_repeater']) && count($life['gallary_repeater'])) { ?>
            <?php 
            foreach ($life['gallary_repeater'][0] as $key => $slider) { ?>
            <div class="life-slider-one">
                <?php foreach ($slider as $key => $image) {  ?>
                    <?php if (isset($image) && $image['url']) { ?>
                        <img loading="lazy" src="<?php echo $image['url']; ?>" alt="life at arcon" width="800" height="463"/>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php } ?>
        <?php } ?>
        <?php foreach ($life['gallary_repeater'][1] as $key => $sslider) { ?>
            <div class="life-slider-two">
            <?php foreach ($sslider as $key => $image) {  ?>
                <?php if (isset($image) && $image['url']) { ?>
                    <img loading="lazy" src="<?php echo $image['url']; ?>" alt="life at arcon" width="800" height="463"/>
                <?php } ?>
            <?php } ?>
            </div>
        <?php } ?>
        </div>
</section>
<?php } ?>