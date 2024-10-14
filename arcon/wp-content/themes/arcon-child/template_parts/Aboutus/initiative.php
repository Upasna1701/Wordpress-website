<?php
$initiatives = get_field('initiatives_arcon', $post->ID);
$status = $initiatives['status'];
// print '<pre>'; print_r($status);exit;
if ($status) { 
    ?>
<section class="initiative" id="initiative">
    <div class="container">
        <div class="initiative-content">
            <div class="content-left">
                <div class="ini-con">
                    <?php if (isset($initiatives['title']) && $initiatives['title']) { ?>
                        <h2><?php echo $initiatives['title']; ?></h2>
                    <?php } ?>
                    <?php if (isset($initiatives['description']) && $initiatives['description']) { ?>
                        <p><?php echo $initiatives['description']; ?></p>
                    <?php } ?>
                    <?php if (isset($initiatives['content']) && $initiatives['content']) { ?>
                        <?php echo $initiatives['content']; ?>
                    <?php } ?>
                </div>
            </div>
            <div class="content-right">
                <div class="image-animation">
                <?php if (isset($initiatives['desktop_image']) && $initiatives['desktop_image']['url']) { ?>
                    <img loading="lazy"src="<?php echo $initiatives['desktop_image']['url']; ?>" alt="arcon" class="initiative-img" width="440" height="350"/>
                <?php } ?>
                </div>
                <div class="square-animation"></div>
            </div>
        </div>
    </div>
</section>
<?php } ?>