<?php
$choose_containers = get_field('choose_containers', $post->ID);
$status = $choose_containers['status'];
if ($status) : ?>
    <section class="arcons-containers" id="arcons-containers">
        <div class="container">
            <div class="sec-content">
                <div class="sec-content-left">
                    <?php if (isset($choose_containers['heading']) && $choose_containers['heading']) : ?>
                        <h2><?php echo $choose_containers['heading']; ?></h2>
                    <?php endif; ?>
                    <?php if (isset($choose_containers['description']) && $choose_containers['description']) : ?>
                        <?php echo $choose_containers['description']; ?>
                    <?php endif; ?>
                    <!-- <div class="btn-wrapper">
                    <a href="javascript:;" class="one-way-cta use">Domestic</a>
                    <a href="javascript:;" class="one-way-cta supply">EXIM</a>
                </div> -->
                </div>
                <div class="sec-content-right">
                    <?php if (isset($choose_containers['image']['url']) && $choose_containers['image']['url']) : ?>
                        <div class="image-animation">
                            <img src="<?php echo $choose_containers['image']['url']; ?>" alt="arcon" class="overview-img" width="440" height="350" />
                        </div>
                    <?php endif; ?>
                    <div class="square-animation"></div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>