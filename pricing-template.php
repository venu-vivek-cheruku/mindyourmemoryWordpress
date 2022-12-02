<?php 
/* Template Name: Pricing Template */
get_header();
?>

<?php
	//Custom Fields
  $bannerImage = get_field('main_image');
  $pageFeaturedImage = get_the_post_thumbnail_url();
  $bodycontent= get_the_content();
  $specialities = get_field('specialities');
  $contactSection = get_field('contact_section');

?>

<!-- Content Container -->


<section class="pricing-content-container overflow-hidden">
    <div class="inner-container">
        <?php
            $args = array(
            'post_type' => 'our_prices',
            'orderby' => 'publish_date',
            'order' => 'ASC',
            'post_status' => 'publish',
            'orderby' => 'date_created',
            'post__not_in' => array ($post->ID),
            );
            $loop = new WP_Query($args);
            while($loop->have_posts()): $loop->the_post();      
            $price = get_field('price_plan');
            $pricePlanImage = get_field('price_plan_image');
            $description = get_the_content();
          
        ?>
        <!--pricing contents 1  -->
        <div class="pricing-contents-wrapper mt-32">
            <h2 class="text-2xl lg:text-3xl text-center font-semibold font-primary text-primary lg:text-center">
                <?php echo the_title(); ?>
            </h2>
            <div class="pricing-contents  mt-10 flex flex-col-reverse gap-10 lg:gap-20 items-start  ">
                <div class="pricing-content lg:w-3/5">
                    <div class="pricing-description">
                        <?php echo $description ?>
                    </div>
                    <div class="cta-btn mt-10 flex flex-row justify-center items-center lg:justify-start ml-8">
                        <a class="bg-ctaBg px-8 py-4 rounded-full text-white  flex flex-row items-center w-fit"
                            href="<?php echo get_permalink(get_page_by_title('Enquiry'));?>">Get Enquiry<i
                                class="ml-2 fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="pricing-image w-4/5 lg:w-2/5 mx-auto">
                    <img class="lg:h-80 lg:object-contain w-full h-full" src="<?php echo esc_url($pricePlanImage['url']) ?>" alt="" />
                </div>
            </div>
            <!-- end of pricing content 1 -->
        </div>
        <?php
            endwhile;
            wp_reset_query();
        ?>

    </div>
</section>

<!-- benefits-container -->

<?php if($specialities == 'true') 
get_template_part( 'content', 'specialities' );
               ?>


<!-- contact Container -->

<?php
if($contactSection == 'true')
get_template_part( 'content', 'contact' ); ?>




<?php get_footer(); ?>