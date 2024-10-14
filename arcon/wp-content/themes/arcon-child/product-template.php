<?php include("header.php"); 
/* Template Name: Product Page Template */?>

<main class="tanks-page">
<?php
    get_template_part('template_parts/product/banner');
    get_template_part('template_parts/product/gallery'); 
    get_template_part('template_parts/product/specifications');
?>
</main>

<?php include("footer.php"); ?>