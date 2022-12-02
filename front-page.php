<?php get_header(); ?>
<?php
	//Custom Fields
 
  $pageFeaturedImage = get_the_post_thumbnail_url();
  $bodycontent= get_the_content();
  $heroContentExcerpt= get_the_excerpt();
  $contactSection = get_field('contact_section');
  $shortcode = get_field('short_code');
 
?>

<!-- Hero Container -->

    <section class="hero-container h-screen bg-primary overflow-hidden ">
      <div
        class="inner-container h-full justify-between flex flex-col-reverse md:gap-10 items-center md:justify-between lg:flex-row-reverse"
      >
        <div class="hero-image h-1/2 md:h-2/4 pt-5 origin-bottom md:pt-0  lg:flex-1 relative lg:top-0  md:w-full lg:h-full">
        
            <img  class="w-full h-full object-contain" src="<?php echo $pageFeaturedImage; ?>" alt="">
        </div>
        <div class="hero-content mt-40 lg:mt-0 md:flex-1 text-center lg:text-left md:px-20">
          <h1
            class="hero-title text-2xl md:text-4xl lg:text-5xl mb-4 leading-snug text-white font-bold font-primary md:leading-snug lg:leading-snug"
          >
           <?php echo $bodycontent ?>
          </h1>
          <p
            class="hero-description text-base lg:text-lg font-primary text-white opacity-80 mt-4"
          >
         
                <?php echo $heroContentExcerpt ?>
          </p>
       

          <div
            class="cta-btn mt-10 flex flex-row justify-center items-center lg:justify-start"
          >
       
                <a class="bg-ctaBg px-8 py-4 rounded-full text-white flex flex-row items-center w-fit"
                    href="#benefits">Scroll to find out more<i
                        class="ml-2 fa-solid fa-arrow-down"></i></a>
            </div>
            </div>
        </div>
        <div class="bottom-bg">
            <img src="<?php echo get_template_directory_uri()?>/img/svgs/hero-bottom.svg" alt="" />
        </div>
      

    </section>

<!--End of Hero Container  -->

<!-- Benefits Container -->
    <?php get_template_part( 'content', 'benefits' ); ?>
<!-- End of Benefits  Container -->


<!-- Benefits Container -->
    <?php get_template_part( 'content', 'howItWorks' ); ?>
<!-- End of Benefits  Container -->


<!-- contact Container -->
<?php
if($contactSection == 'true')
get_template_part( 'content', 'contact' ); ?>



<?php get_footer(); ?>