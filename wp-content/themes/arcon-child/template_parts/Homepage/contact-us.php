<?php
$contact_us = get_field('contact_us', $post->ID);
// print '<pre>'; print_r($contact_us);exit;

$status = $contact_us['status'];

if ($status) {
?>
<section class="contact-us">
    <div class="container">
        <div class="contact-details">
            <div class="contact-form">
                <?php if (isset($contact_us['title']) && $contact_us['title']) { ?>
                    <h3><?php echo $contact_us['title']; ?></h3>
                <?php } ?>
                <?php if (isset($contact_us['description']) && $contact_us['description']) { ?>
                    <p class="contact-text"><?php echo $contact_us['description']; ?></p>
                <?php } ?>
                <div class="form-starts">
                    <?php if (isset($contact_us['contact_form_shrotcode']) && $contact_us['contact_form_shrotcode']) { ?>
                    <?php echo do_shortcode($contact_us['contact_form_shrotcode']);?>
                    <?php } ?>
                </div>
            </div>
            <div class="contact-map">
                <?php if (isset($contact_us['map']) && $contact_us['map']) { ?>
                    <?php echo do_shortcode($contact_us['map']);?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>
