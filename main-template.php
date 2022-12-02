<?php 
/* Template Name: Main Template */
get_header();
?>

<?php
	//Custom Fields
  $bannerImage = get_field('main_image');
  $pageFeaturedImage = get_the_post_thumbnail_url();
  $bodycontent= get_the_content();
  $specialities = get_field('specialities');
  $contactSection = get_field('contact_section');
  $shortcode = get_field('short_code');
 
?>

<div class=" content-container mt-32 overflow-hidden hidden lg:block"> 
<div class="inner-container flex flex-col lg:flex-row gap-x-10">

<div class="header-content-container flex-1">

<?php get_template_part( 'content', 'header' ); ?>

</div>
<!-- Content Container -->

<section class="content-container flex-1">
   
        <h2 class=" content-title text-xl lg:text-2xl font-semibold font-primary text-primary text-left">
            <?php echo the_title(); ?> :
        </h2>

        <p class="text-secondaryText text-base lg:text-lg mt-4 lg:mt-8">

            <?php echo the_content(); ?>
            <?php echo  do_shortcode( $shortcode )  ?>
        </p>
    
</section>
</div>
</div>

<div class="mobile-content-container mt-32 overflow-hidden lg:hidden"> 
<div class="inner-container flex flex-col lg:flex-row">

<div class="header-content-container flex-1">

<?php get_template_part( 'content', 'header' ); ?>

</div>
<!-- Content Container -->

<section class="content-container flex-1">
   
        <h2 class=" content-title text-xl lg:text-2xl font-semibold font-primary text-primary text-left">
            <?php echo the_title(); ?> :
        </h2>

        <p class="text-secondaryText text-base lg:text-lg mt-4 lg:mt-8">

            <?php echo the_content(); ?>
            <?php echo  do_shortcode( $shortcode )  ?>
        </p>
    
</section>
</div>
</div>

<!-- benefits-container -->

<?php if($specialities == 'true') 
        get_template_part( 'content', 'specialities' );
               ?>


<!-- contact Container -->

<?php
if($contactSection == 'true')
get_template_part( 'content', 'contact' ); ?>





<?php get_footer(); ?>