<?php
    $industries = get_field('industries_we_cater',$post->ID);
    //  print "<pre>"; print_r($industries);exit;    
    $status = $industries['status'];
    if($status) {
?>

<div class="indutries-we-cater">
    <div class="container">
        <h2><?php echo $industries['title'];?></h2>
        <div class="industries-grid">
            <?php foreach($industries['repeater'] as $key=>$value) {
             ?>
            <div class="industries-grid-col">
                <img loading="lazy" src="<?php echo $value['image']['url']?>" alt="chemicals" width="250" height="180"/>
                <h4 class="image-text"><?php echo $value['image_title']?></h4>
            </div>
            <?php }?>
        </div>
    </div>
</div>

<?php } ?>