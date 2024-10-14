<?php
$management = get_field('management', $post->ID);
// print '<pre>'; print_r($management);exit;
$status = $management['status'];
// print '<pre>'; print_r($status);exit;
if ($status) { 
    ?>
<section class="management" id="management">
    <div class="container">
        <?php if (isset($management['heading_title']) && $management['heading_title']) { ?>
            <h2><?php echo $management['heading_title']; ?></h2>
        <?php } ?>
        <div class="management-details">
            <div class="management-content-right">
                <div class="image-animation">
                <?php if (isset($management['desktop_image']) && $management['desktop_image']['url']) { ?>
                    <img loading="lazy"src="<?php echo $management['desktop_image']['url']; ?>" alt="arcon" class="management-img" width="440" height="350"/>
                <?php } ?>
                </div>
                <div class="square-animation"></div>
            </div>
            <div class="management-content-left">
                <div class="content-side">
                    <?php if (isset($management['title']) && $management['title']) { ?>
                        <h3><?php echo $management['title']; ?></h3>
                    <?php } ?>
                    <?php if (isset($management['designation']) && $management['designation']) { ?>
                        <p class="designation"><?php echo $management['designation']; ?></p>
                    <?php } ?>
                    <?php if (!empty($management['email']['url']) && $management['email']['url'] !== '#') { ?>
                        <p><a href="<?php echo $management['email']['url']; ?>" class="email-id"><?php echo $management['email']['title']; ?></a></p>
                    <?php } ?>
                    <?php if (isset($management['description']) && $management['description']) { ?>
                        <div class="description"><?php echo $management['description']; ?></div>
                    <?php } ?>
                    <a class="management-cta expand-cta">Expand</a>
                </div>
            </div>
            
        </div>
    </div>
</section>
<?php } ?>