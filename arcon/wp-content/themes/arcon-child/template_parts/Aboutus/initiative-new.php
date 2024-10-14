<?php
$initiative_new = get_field('initiative_new', $post->ID);
// exit;
$status = $initiative_new['status'];
if ($status) { 
    // print '<pre>'; print_r($initiative_new['slider_points']);
    ?>
<section class="initiative-new" id="initiative-new">    
    <div class="container">
        <div class="initiative-new-secheading">
            <?php if (isset($initiative_new['maintitle']) && $initiative_new['maintitle']) { ?>
                <h2><?php echo $initiative_new['maintitle']; ?></h2>
            <?php } ?>
            <?php if (isset($initiative_new['description']) && $initiative_new['description']) { ?>
                <p><?php echo $initiative_new['description']; ?></p>
            <?php } ?>
        </div>

        <div class="initiative-slider-points">
            <?php if (is_array($initiative_new['slider_points']) && count($initiative_new['slider_points'])) { ?>
                <?php foreach ($initiative_new['slider_points'] as $key => $slider) {
                // print'<pre>'; print_r($slider);exit;
                if ($slider['status']) { ?>
                    <div class="points-repeater">
                        <div class="initiative-slider-points-left">
                            <?php if (isset($slider['slider_title']) && $slider['slider_title']) { ?>
                                <h3><?php echo $slider['slider_title']; ?></h3>
                            <?php } ?>
                            <?php if (isset($slider['slider_description']) && $slider['slider_description']) { ?>
                                <p><?php echo $slider['slider_description']; ?></p>
                            <?php } ?>
                        </div>
                        <div class="initiative-slider-points-right">
                            <div class="sliders-imges-ini">
                                <?php
                                ?>
                                <?php 
                                    // print '<pre>'; print_r($slider['slider_gallery']);
                                foreach ($slider['slider_gallery'] as $slider) { 
                                ?>
                                
                                <div>
                                    <img loading="lazy" src="<?php echo $slider['url']; ?>" alt="<?php echo $slider['alt']; ?>" width="704" height="562"/>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php }  
                } ?>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>