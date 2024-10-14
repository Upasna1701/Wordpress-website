<?php 
    $floating_button = get_field('floating_button',$post->ID);
    $floating_status = $floating_button['status'];
    // print_r($floating_button);
    $tank_services = get_field('tank_services',$post->ID);
    //  print '<pre>'; print_r($tank_services);exit;
?>

<section class="arcons-services" id="arcons-services">
    <div class="container">
        <div class="title-wrapper">
        </div>
         <div class="services-pointers">
        </div> 
        <?php if($floating_status) { ?>

        <div class="sticky-services-pointers">
            <div class="sticky-wrapper">
                <?php 
                $counter = 1;
                    foreach ($floating_button['floating_text_repeater'] as $item) {
                ?>
                <p class="sticky-point sticky-<?=$counter?> scroll-sec" rel="sticky-sec-<?=$counter?>"><?php echo $item['title'];?></p>
                <?php  $counter++; }?>
            </div>
        </div>
        <?php } ?>

        <div class="pointers-list">
            <?php 
                $counter = 1;
                foreach ($tank_services as $key=>$value) { 
                    
                    
                  if (is_array($value)) { 
                   
                     foreach ($value as $subKey => $subValue) {   
                        $class = 'sec-content';
                         if ($counter%2 == 0) { $class = 'sec-content left';}
            ?>
            <div class="lease-with-ease sticky-sec-<?=$counter?>" id="lease-with-ease">
                <div class="<?php echo $class?>">
                    <div class="sec-content-left">
                        <h2><?php echo $subValue['title']?></h2>
                        <div>
                            <?php echo $subValue['description'] ?>

                        </div>
                        <div class="btn-wrapper">
                                <a href="<?php echo $subValue['cta_1']['url']?>" class="one-way-cta use"><?php echo $subValue['cta_1']['title']?></a>
                                <a href="<?php echo $subValue['cta_2']['url']?>" class="one-way-cta supply"><?php echo $subValue['cta_2']['title']?></a>
                        </div>
                    </div>
                    <div class="sec-content-right">
                        <div class="image-animation">
                            <img src="<?php echo $subValue['section_image']['url'];?>" alt="arcon" class="overview-img" width="440" height="350" />
                        </div>
                        <div class="square-animation"></div>
                    </div>
                </div>
            </div>
            <?php $counter++; } } } ?>
        </div>
    </div>
</section>