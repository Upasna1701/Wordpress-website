<?php

$info_description = get_field('info_description', $post->ID);
$status = $info_description['status'];
if ($status) :
?>
    <section class="cargo-sec" id="container">
        <div class="container">
            <?php if (isset($info_description['heading']) && $info_description['heading']) : ?>
                <h2><?php echo $info_description['heading']; ?></h2>
            <?php endif; ?>
            <?php if (isset($info_description['description']) && $info_description['description']) : ?>
                <p><?php echo $info_description['description']; ?></p>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>