<?php 
$banner = get_field('3d_model', $post->ID);
// print_r($banner);
$status = $banner['status'];
if ($status) { 
?>
<section class="videos-3d" id="3d-modal">
    <div class="container">
        <h2><?php echo $banner['title']?></h2>
        <?php echo $banner['iframe']?>
        <!-- <iframe _ngcontent-serverapp-c31="" id="tank_model_3d" title="T14 TANK CONTAINERS" frameborder="0" allowfullscreen="" mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking="" execution-while-out-of-viewport="" execution-while-not-rendered="" web-share="" src="https://sketchfab.com/models/f07940e5ae284d85a7458fd0313a2052/embed" style="width: 100%; height: 35vw;"></iframe> -->
    </div>
</section>
<?php } ?>