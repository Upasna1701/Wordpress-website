<?php
    $whychoose = get_field('why_choose');
    $status = $whychoose['status'];
// print '<pre>'; print_r($whychoose);
    if ($status) {
?>
<section class="why-choose-us">
    <div class="container">
        <?php if (isset($whychoose['section_title']) && $whychoose['section_title']) { ?>
            <h2><?php echo $whychoose['section_title']; ?></h2>
        <?php } ?>
        <div class="why-choose-grid">
        <?php if (is_array($whychoose['why_choose_points']) && count($whychoose['why_choose_points'])) { ?>
            <?php foreach ($whychoose['why_choose_points'] as $key => $val) {
                if ($val['status']) { ?>
                <div class="why-choose-grid-col">
                    <?php if (isset($val['icon']) && $val['icon']['url']) { ?>
                        <img class="normal-icon" loading="lazy" src="<?php echo $val['icon']['url']; ?>" width="70" height="70" alt="<?php echo $val['icon']['alt']; ?>"/>
                    <?php } ?>
                    <?php if (isset($val['hover_icon']) && $val['hover_icon']['url']) { ?>
                        <img class="hover-icon" loading="lazy" src="<?php echo $val['hover_icon']['url']; ?>" width="70" height="70" alt="<?php echo $val['hover_icon']['alt']; ?>"/>
                    <?php } ?>
                    <?php if (isset($val['title']) && $val['title']) { ?>
                        <h3><?php echo $val['title']; ?></h3>
                    <?php } ?>
                    <?php if (isset($val['description']) && $val['description']) { ?>
                    <p><?php echo $val['description']; ?></p>
                    <?php } ?>
                </div>
                <?php }  
            } ?>
        <?php } ?>
        </div>
    </div>
</section>  
<?php } ?>