<?php
global $post;
$banner = get_field('banner', $post->ID);
$banner_slider = $banner['banner_slider'];
$status = $banner['status'];
// print '<pre>'; print_r($banner_slider);exit;

    ?>

<section class="main-banner" id="banner">
    <div class="container pos-rel">
    <h1 style="display:none;">shipping container solutions</h1>
        <div class="banner-slider">
    <?php if (is_array($banner_slider) && count($banner_slider)) { ?>
        <?php foreach ($banner_slider as $key => $slider) {
            // print'<pre>'; print_r($slider['title_color']);exit;
            if ($slider['slider_status']) {
                    if ($slider['title_color'] != '') {
                        $title_color = $slider['title_color'];
                    }else{
                        $title_color = '';
                    }
                    if ($slider['subtitle_color'] != '') {
                        $subtitle_color = $slider['subtitle_color'];
                    }else{
                        $subtitle_color = '';
                    }
                    if ($slider['description_color'] != '') {
                        $description_color = $slider['description_color'];
                    }else{
                        $description_color = '';
                    }

                ?>
                    <div class="banner-slides">
                        <picture class="main-banner-sec-img">
                        <?php if (isset($slider['mobile_image']) && $slider['mobile_image']['url']) { ?>
                            <source media="(max-width: 599px)" class="main-banner-sec-img" srcset="<?php echo $slider['mobile_image']['url']; ?>" alt="banner-img" width="390" height="778">
                        <?php } ?>
                        <?php if (isset($slider['desktop_image']) && $slider['desktop_image']) { ?>
                            <img loading="lazy" src="<?php echo $slider['desktop_image']['url']; ?>" alt="banner-img" class="main-banner-sec-img" width="1366" height="650">
                        <?php } ?>
                        </picture>
                        <div class="main-banner-sec">
                            <div class="banner-content">
                                
                            <?php if (isset($slider['title']) && $slider['title']) { ?>
                                <h2 class="banner-h2-one" style="color: <?php echo $title_color; ?>;"><?php echo $slider['title']; ?></h2>
                            <?php } ?>
                            <?php if (isset($slider['subtitle']) && $slider['subtitle']) { ?>
                                <h2 class="banner-h2-two" style="color: <?php echo $subtitle_color; ?>;"><?php echo $slider['subtitle']; ?></h2>
                            <?php } ?>
                            <?php if (!empty($slider['description']) && $slider['description']) {  ?>
                                <div class="banner-desc" style="color: <?php echo $description_color; ?>;"><?php echo $slider['description']; ?></div>
                            <?php } ?>
                                <div class="banner-ctas">
                                <?php foreach ($slider['button_repeater'] as $key => $button) {
                                    // print'<pre>'; print_r($button);exit;
                                    if ($button['cta_status']) { ?>
                                        <?php if (!empty($button['cta']['url']) && $button['cta']['url'] !== '#') { ?>
                                            <a href="<?php echo $button['cta']['url']; ?>"><?php echo $button['cta']['title']; ?></a>
                                        <?php } ?>
                                    
                                    <?php }  
                                } ?>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <?php }  
                } ?>
            <?php } ?>
        </div>
        
    </div>
</section>

