<?php include("header.php"); 
/* Template Name: Home Page Template */?>

<main>

<?php 
get_template_part('template_parts/Homepage/banner'); 
get_template_part('template_parts/Homepage/overview'); 
get_template_part('template_parts/Homepage/Advantage'); 
get_template_part('template_parts/Homepage/looking-for'); 
get_template_part('template_parts/Homepage/resources'); 
get_template_part('template_parts/Homepage/contact-us'); 

?>

</main>

<?php include("footer.php"); ?>