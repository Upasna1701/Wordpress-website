<?php 

$offer = get_field('offer',$post->ID);
$status = $offer['status'];
if($status) {
?>
<section class="offer-sec" id="offer">
    <div class="container">
        <!-- <h2><?php echo $offer['offer_title'];?></h2> -->
        <div class="offer-wrapper">
            <p><?php echo $offer['offer_title'];?></p>
            <div class="button">
            <?php foreach ($offer['cta_repeater'] as $key => $button) { ?>
                <?php if (!empty($button['cta']['url']) && $button['cta']['url'] !== '#') { ?>
                    <a href="<?php echo $button['cta']['url']; ?>"><?php echo $button['cta']['title']; ?></a>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>