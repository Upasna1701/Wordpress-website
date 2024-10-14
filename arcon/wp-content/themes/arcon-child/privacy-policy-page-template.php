<?php include("header.php"); 
/* Template Name: Privacy Policy Page Template */?>
<main>
<?php
$banner = get_field('banner', $post->ID);
$status = $banner['status'];
if ($status) { 
    ?>
    <section class="privacy-sec">
    <?php if (isset($banner['background']) && $banner['background']['url']) { ?>
        <img class="banner-img"
            src="<?php echo $banner['background']['url']; ?>" height="334"
            width="1440" alt="Privacy Banner">
            <?php } ?>
        <div class="container">
            <div class="title-wrapper">
            <?php if (isset($banner['banner_title']) && $banner['banner_title']) { ?>
                <h1><?php echo $banner['banner_title']; ?></h1>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>



    <section class="policy-content">
        <div class="container">
            <?php echo the_content();  ?>
        </div>
    </section>
</main>
<?php include("footer.php"); ?>