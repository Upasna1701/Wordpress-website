<?php
$team = get_field('meet_team', $post->ID);
// print '<pre>'; print_r($team);exit;
$status = $team['status'];
// print '<pre>'; print_r($status);exit;
if ($status) { 
    ?>
<section class="our-team" id="our-team">
    <div class="container">
        <?php if (isset($team['heading_title']) && $team['heading_title']) { ?>
            <h2><?php echo $team['heading_title']; ?></h2>
        <?php } ?>
        <div class="team-members-grid">
        <?php if (is_array($team['repeater']) && count($team['repeater'])) { ?>
            <?php foreach ($team['repeater'] as $key => $slider) {
                if ($slider['status']) {
                ?>
                <div class="team-members-grid-col">
                    <div class="img-div">
                    <?php if (isset($slider['desktop_image']) && $slider['desktop_image']['url']) { ?>
                        <img loading="lazy" src="<?php echo $slider['desktop_image']['url']; ?>" alt="<?php echo $slider['desktop_image']['alt']; ?>" width="240" height="240"/>
                    <?php } ?>
                    </div>
                    <div class="team-member-detail">
                        <?php if (isset($slider['title']) && $slider['title']) { ?>
                            <h5><?php echo $slider['title']; ?></h5>
                        <?php } ?>
                        <?php if (isset($slider['designation']) && $slider['designation']) { ?>
                            <p class="designation"><?php echo $slider['designation']; ?></p>
                        <?php } ?>
                        <?php if (isset($slider['location']) && $slider['location']) { ?>
                            <p class="location"><?php echo $slider['location']; ?></p>
                            <?php } ?>
                        <?php if (!empty($slider['email']['url']) && $slider['email']['url'] !== '#') { ?>
                            <p class="mailto"><a href="<?php echo $slider['email']['url']; ?>"><?php echo $slider['email']['title']; ?></a></p>
                        <?php } ?>
                    </div>
                </div>
                <?php }
            } ?>
        <?php } ?>
           
        </div>
    </div>
</section>
<?php } ?>