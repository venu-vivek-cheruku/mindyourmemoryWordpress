<?php 

 $bannerButton = get_field('banner_button');
 $subtitle = get_field('subtitle');
?>


<section class="page-hero-container h-full bg-primary overflow-hidden py-48">
    <div
        class="inner-container h-full justify-center flex flex-col gap-10 items-center lg:justify-between lg:flex-row-reverse">

        <div class="page-hero-content lg:flex-1 text-center lg:text-center">
            <h1
                class="page-hero-title text-3xl lg:text-5xl mb-4 leading-snug text-white font-bold font-primary lg:leading-snug">
                <?php echo the_title(); ?>
            </h1>
            <p class="page-hero-description text-base lg:text-xl font-primary text-secondaryTextLight max-w-xl mx-auto">
                <?php echo $subtitle ?>
            </p>
            <div class="cta-btn mt-10 flex flex-row-reverse justify-center items-center lg:justify-center">

            <div
            class="cta-btn mt-10 flex flex-row justify-center items-center lg:justify-start"
          >
                <?php
                    
                    echo " <a class='bg-ctaBg px-8 py-4 rounded-full text-white flex flex-row items-center w-fit'
                    href=\"javascript:history.go(-1)\">GO BACK<i
                                class='ml-2 fa-solid fa-arrow-left'></i></a>"
                    ?>
            </div>

            </div>
        </div>
    </div>
    <div class="page-hero-bottom-bg">
        <img src="<?php echo get_template_directory_uri() ?>/img/svgs/hero-bottom.svg" alt="" />
    </div>
</section>