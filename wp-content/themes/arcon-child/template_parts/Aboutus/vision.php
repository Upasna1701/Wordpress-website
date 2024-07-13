
<?php
$vision = get_field('arcon_vision', $post->ID);
// print '<pre>'; print_r($vision);exit;
$status = $vision['status'];
// print '<pre>'; print_r($status);exit;
if ($status) { 
    ?>
<section class="vision-mission" id="vision-mission">
    <div class="container">
        <?php if (isset($vision['heading_title']) && $vision['heading_title']) { ?>
            <h2><?php echo $vision['heading_title']; ?></h2>
        <?php } ?>

        <div class="vision-mission-values">
        <?php if (is_array($vision['repeater']) && count($vision['repeater'])) { ?>
            <?php foreach ($vision['repeater'] as $key => $slider) {
            // print'<pre>'; print_r($slider);exit;
                if ($slider['status']) { ?>
                    <div class="vision-mission-sec">
                        <div class="svg-sec">
                        <?php if (isset($slider['desktop_image']) && $slider['desktop_image']['url']) { ?>
                            <img loading="lazy"src="<?php echo $slider['desktop_image']['url']; ?>" alt="vision" width="55" height="90"/>
                        <?php } ?>
                        <?php if (isset($slider['title']) && $slider['title']) { ?>
                            <h2><?php echo $slider['title']; ?></h2>
                        <?php } ?>
                        </div>
                        <div class="vision-statement">
                        <?php if (isset($slider['description']) && $slider['description']) { ?>
                            <?php echo $slider['description']; ?>
                        <?php } ?>
                        </div>
                    </div>
                <?php }  
            } ?>
        <?php } ?>

        </div>

    </div>
</section>
<?php } ?>