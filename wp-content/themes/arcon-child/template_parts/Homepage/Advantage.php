<?php
$advantage = get_field('arcon_advantage', $post->ID);
// print '<pre>'; print_r($advantage);exit;

$status = $advantage['status'];

if ($status) {
?>
<section class="arcon-advantage">
    <div class="container">
        <div class="arcon-advantage-sec">
            <?php if (isset($advantage['heading_title']) && $advantage['heading_title']) { ?>
                <h2><?php echo $advantage['heading_title']; ?></h2>
            <?php } ?>
            <div class="advantages">
            <?php if (is_array($advantage['repeater']) && count($advantage['repeater'])) { ?>
            <?php foreach ($advantage['repeater'] as $key => $slider) {
            // print'<pre>'; print_r($slider);exit;
                if ($slider['status']) { ?>
                    <div class="arc-adv">
                        <div class="arc-adc-left-content">
                            <div class="content-adv">
                                <?php if (isset($slider['title']) && $slider['title']) { ?>
                                    <h3><?php echo $slider['title']; ?></h3>
                                <?php } ?>
                                <?php if (isset($slider['description']) && $slider['description']) { ?>
                                    <p><?php echo $slider['description']; ?></p>
                                <?php } ?>
                                <?php if (!empty($slider['cta']['url']) && $slider['cta']['url'] !== '#') { ?>
                                    <!-- <a>Know More...</a> -->
                                    <a href="<?php echo $slider['cta']['url']; ?>"><?php echo $slider['cta']['title']; ?>...</a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="arc-adc-right-content">
                        <?php if (isset($slider['desktop_image']) && $slider['desktop_image']['url']) { ?>
                            <img loading="lazy"src="<?php echo $slider['desktop_image']['url']; ?>" class="adv-img" alt="adv-image" width="500" height="500"/>
                        <?php } ?>
                        </div>
                    </div>
                    <!-- <div class="arc-adv">
                        <div class="arc-adc-left-content">
                            <div class="content-adv">
                                <h3>Our Phygital Edge</h3>
                                <p>We are leveraging the power of technology and people to forge lasting business relationships to redefine complex processes.</p>
                                <a>Know More...</a>
                            </div>
                        </div>
                        <div class="arc-adc-right-content">
                            <img loading="lazy"src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/advantage2.webp" class="adv-img" alt="adv-image" width="500" height="500"/>
                        </div>
                    </div>
                    <div class="arc-adv">
                        <div class="arc-adc-left-content">
                            <div class="content-adv">
                                <h3>Pioneering a Sustainable Future</h3>
                                <p>While we build innovative, tech driven solutions, we have a tremendous responsibility towards society, our stakeholders and the planet.</p>
                                <a>Know More...</a>
                            </div>
                        </div>
                        <div class="arc-adc-right-content">
                            <img loading="lazy"src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/advantage3.webp" class="adv-img" alt="adv-image" width="500" height="500"/>
                        </div>
                    </div>
                    <div class="arc-adv">
                        <div class="arc-adc-left-content">
                            <div class="content-adv">
                                <h3>Enriching Workspace</h3>
                                <p>Our efforts would fall short without a workspace which encourages innovation and empowerment where employees can express themselves freely. We are committed to this.</p>
                                <a>Know More...</a>
                            </div>
                        </div>
                        <div class="arc-adc-right-content">
                            <img loading="lazy"src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/advantage4.webp" class="adv-img" alt="adv-image" width="500" height="500"/>
                        </div>
                    </div> -->
                <?php }  
                } ?>
            <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>