<?php
    $banner = get_field('banner');
    if($banner['status'] && $banner['banner_image']['url']){
?>
<section class="privacy-sec">
    <img class="banner-img"
        src="<?php echo $banner['banner_image']['url']; ?>" height="334"
        width="1440" alt="Privacy Banner">
    <div class="container">
        <div class="title-wrapper">
            <?php if($banner['banner_title']){ ?>
                <h1><?php echo $banner['banner_title']; ?></h1>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>