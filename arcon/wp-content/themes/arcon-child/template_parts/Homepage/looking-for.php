<?php
$looking = get_field('looking_for', $post->ID);
// print '<pre>'; print_r($looking);exit;

$status = $looking['status'];

if ($status) {
?>
<div class="looking-for">
    <div class="container">
        <div class="looking-for-sec">
            <?php if (isset($looking['heading_title']) && $looking['heading_title']) { ?>
                <h2><?php echo $looking['heading_title']; ?></h2>
            <?php } ?>
            <div class="looking-flexcol">
            <?php if (is_array($looking['repeater']) && count($looking['repeater'])) { ?>
            <?php foreach ($looking['repeater'] as $key => $slider) {
            // print'<pre>'; print_r($slider);exit;
                if ($slider['status']) { ?>
                    <div class="looking-sec-content">
                        <div class="looking-sec-content-left">
                            <div class="con-start">
                                <?php if (isset($slider['title']) && $slider['title']) { ?>
                                    <h3><?php echo $slider['title']; ?></h3>
                                <?php } ?>
                                <?php if (isset($slider['description']) && $slider['description']) { ?>
                                    <p><?php echo $slider['description']; ?></p>
                                <?php } ?>  
                                <?php if (isset($slider['pointers']) && $slider['pointers']) { ?>
                                    <ul>
                                        <?php echo $slider['pointers']; ?>
                                    </ul>
                                <?php } ?>                               
                                <div class="looking-ctas">
                                <?php if (!empty($slider['cta_1']['url']) && $slider['cta_1']['url'] !== '#') { ?>
                                    <a href="<?php echo $slider['cta_1']['url']; ?>" class="rounded-btn"><?php echo $slider['cta_1']['title']; ?></a>
                                <?php } ?>
                                <?php if (!empty($slider['cta_2']['url']) && $slider['cta_2']['url'] !== '#') { ?>
                                    <a href="<?php echo $slider['cta_2']['url']; ?>" class="rounded-btn"><?php echo $slider['cta_2']['title']; ?></a>
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="looking-sec-content-right">
                            <div class="image-animation">
                            <?php if (isset($slider['desktop_image']) && $slider['desktop_image']['url']) { ?>
                                <img loading="lazy"src="<?php echo $slider['desktop_image']['url']; ?>" alt="arcon" class="overview-img" width="440" height="350"/>
                            <?php } ?>
                            </div>
                            <div class="square-animation"></div>
                        </div>
                    </div>
                <?php }  
                } ?>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>