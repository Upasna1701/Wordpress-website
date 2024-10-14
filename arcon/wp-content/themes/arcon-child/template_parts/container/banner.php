<!-- <section class="dry-banner" id="dry-banner">
    <picture>
        <source media="(max-width:640px)" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dry-containers/banner-mb.webp" />
        <img class="banner-image" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dry-containers/banner.webp" width="1366" height="768" alt="ARCON's Container" />
    </picture>
    <div class="container">
        <div class="content-wrapper">
            <div class="content-box">
                <h1>ARCON's Container</h1>
                <p>
                    Make the right move for your business with ARCON containers that are suitable for any type of cargo. Our containers fulfill all ISO criteria and have a valid CSC number. A global inspection system ensures that you get
                    best-in-class equipment.
                </p>
            </div>
        </div>
    </div>
</section> -->

<?php
$banner = get_field('banner', $post->ID);
$status = $banner['status'];
if ($status) { 
    ?>
<section class="about-banner" id="banner">
    <div class="aboutbanner">
        <picture class="about-banner-sec-img">
            <?php if (isset($banner['mobile_image']) && $banner['mobile_image']['url']) { ?>
                <source media="(max-width: 599px)" class="about-banner-sec-img" srcset="<?php echo $banner['mobile_image']['url']; ?>" width="390" height="778">
            <?php } ?>
            <?php if (isset($banner['desktop_image']) && $banner['desktop_image']['url']) { ?>
                <img loading="lazy"src="<?php echo $banner['desktop_image']['url']; ?>" alt="banner-img" class="about-banner-sec-img ab-banner-img" width="1366" height="650">
            <?php } ?>
        </picture>
        <div class="white-overlay"></div>
        <div class="container about-banner-sec">
            <div class="h-100">
                <div class="banner-content">
                <?php if (isset($banner['title']) && $banner['title']) { ?>
                    <h1 class="banner-h1"><?php echo $banner['title']; ?></h1>
                <?php } ?>
                    <div class="desc-content">
                        <?php if (isset($banner['description']) && $banner['description']) { ?>
                            <div class="banner-desc"><?php echo $banner['description']; ?></div>
                        <?php } ?>
                            
                        <?php if (!empty($banner['cta']['url']) && $banner['cta']['url'] !== '#') { ?>
                            <a href="<?php echo $banner['cta']['url']; ?>" class="about-banner-cta"><?php echo $banner['cta']['title']; ?>...</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>