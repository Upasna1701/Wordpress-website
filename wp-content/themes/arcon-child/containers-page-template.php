<?php include("header.php"); 
/* Template Name: Containers Page Template */?>

<main class="container-main">
<?php 
get_template_part('template_parts/container/banner');
get_template_part('template_parts/container/cargo');
get_template_part('template_parts/container/containers-grid');
get_template_part('template_parts/Tanks/tanks-services');
get_template_part('template_parts/product/why-choose');
// get_template_part('template_parts/container/arcons-containers');
get_template_part('template_parts/container/offer');

?>
</main>
<?php include("footer.php"); ?>