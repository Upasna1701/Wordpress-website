<?php include("header.php"); 
/* Template Name: Tanks Template */?>

<main class="tanks-page">

<?php 
get_template_part('template_parts/Aboutus/banner'); 
get_template_part('template_parts/Homepage/Advantage'); 
get_template_part('template_parts/Homepage/looking-for'); 
get_template_part('template_parts/Tanks/video-model'); 
// get_template_part('template_parts/Aboutus/vision'); 
get_template_part('template_parts/product/why-choose');

get_template_part('template_parts/Tanks/tanks-services');
get_template_part('template_parts/Aboutus/initiative'); 
get_template_part('template_parts/Aboutus/life-at-arcon'); 
get_template_part('template_parts/Tanks/industries');
get_template_part('template_parts/container/offer');

?>

</main>

<?php include("footer.php"); ?>