<?php
$overview = get_field('overview', $post->ID);
// print '<pre>'; print_r($overview);
// print '<pre>'; print_r($overview['title']);exit;

$status = $overview['status'];

if ($status) {
?>
<section class="overview-sec">
    <div class="container">
        <div class="overview-sec-content">
            <div class="overview-sec-content-left">
            <?php if (isset($overview['title']) && $overview['title']) { ?>
                <h2><?php echo $overview['title']; ?></h2>
            <?php } ?>
            <?php if (isset($overview['description']) && $overview['description']) { ?>
                <div class="description"><?php echo $overview['description']; ?></div>
            <?php } ?>

                <!-- <p>Containerization is an industry that has rapidly evolved since its inception. Constant fluctuations and technological advancements in global supply trade has underscored the need to redefine container solutions.</p>
                <p>ARCON is born out of a growing need to use technology and solutions to increase operational efficiency and enhancing sustainability while creating an enriching workspace to reimagine the global logistics’ landscape.</p>
                <p class="expand-rest">ARCON is part of the Saksham Group of Companies, amongst the largest conglomerates in logistics spanning project logistics, chemical transportation, container trading, custom broking, and IT solutions.</p> -->
                <a class="overview-cta expand-cta">Expand</a>
            </div>
            <div class="overview-sec-content-right">
                <div class="image-animation">
                <?php if (isset($overview['desktop_image']) && $overview['desktop_image']['url']) { ?>
                    <img loading="lazy"src="<?php echo $overview['desktop_image']['url']; ?>" alt="arcon" class="overview-img" width="440" height="350"/>
                <?php } ?>
                </div>
                <div class="square-animation"></div>
            </div>
        </div>
    </div>
</section>
<?php } ?>