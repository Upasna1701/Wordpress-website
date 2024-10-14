<?php
$banner = get_field('banner_image');

if($banner){
?>

<section class="contact-banner">
    <div class="container">
        <div class="banner-wrapper">
            <img src="<?php echo $banner['url']; ?>" height="622" width="1242" alt="Contact Banner">
        </div>
    </div>
</section>

<?php
}
?>