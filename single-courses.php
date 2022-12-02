<?php

get_header(); ?>


<!-- Custom Fields -->

<?php
  $courseMainImage = get_field('course_image');
  $courseShortDescription = get_field('course_short_description');

?>
<!-- courses-page-container Container -->

<section class="courses-page-container mt-20 overflow-hidden">
    <div class="inner-container">
        <!-- Course Boxes Container -->

        <div class="course-boxes mt-20 lg:mt-24 w-full">
            <!-- Course Box 1 -->
            <div class="course-box flex flex-col gap-5 lg:gap-y-10">
                <div
                    class="course-header flex flex-col-reverse lg:text-left justify-between gap-5 w-full items-center lg:flex-row  border-b pb-5">
                    <div class="course-title flex-1">
                        <h1 class="text-primary text-2xl lg:text-3xl font-semibold lg:leading-snug">
                            <?php echo the_title(); ?>
                        </h1>
                        <div class="course-paragraph">
                            <p class="text-secondaryText text-base lg:text-md mt-4">
                                <?php echo $courseShortDescription ?>
                            </p>
                            <div class="cta-btn mt-8">
                                <a class="bg-ctaBg px-8 py-4 rounded-full text-white   flex flex-row items-center w-fit"
                                    href="<?php echo get_permalink( get_page_by_title('Enquiry')) ?>">Enroll Now
                                     <i class="ml-2 fa-solid fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="intro-image w-4/5 lg:w-2/4 flex flex-row lg:items-end lg:justify-end">

                    <?php 
                        if( !empty( $courseMainImage ) ): ?>
                            <img  class=" w-full lg:w-3/5 mx-auto lg:justify-end"  src="<?php the_field('course_image'); ?>" alt="<?php echo esc_attr($courseMainImage['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                </div>
                <div
                    class="course-content-container flex flex-col justify-between gap-5 lg:gap-10 items-center lg:items-start">
                    <div class="course-content text-left flex-1">
                        <h2 class="text-primary text-xl lg:text-2xl font-semibold lg:leading-snug">
                            Description:
                        </h2>
                        <p class="text-secondaryText text-base lg:text-md mt-4">
                            <?php echo the_content(); ?>
                        </p>

                    </div>
                </div>

                <!-- End of course Box 1 Container -->
            </div>

            <!-- End of course Boxes Container -->
        </div>

        <!-- End of inner Container -->
    </div>
    <!-- End of course Container -->
</section>

<!-- Related courses container  -->

<section class="related-courses-container mt-32 overflow-hidden">
    <div class="inner-container">
        <!-- Main Heading Center  -->

        <div class="main-heading-center max-w-3xl m-auto pt-10 lg:mt-10">
            <h1 class="center-title font-primary text-3xl text-center lg:text-4xl font-bold text-primary">
                Related Courses
            </h1>
            <p class="text-sm md:text-base mt-2 lg:mt-4 text-center text-secondaryText font-primary opacity-90">
                Discover more courses based on the needs.
            </p>
            <!-- End of Main Heading Center  -->
        </div>


        <div
            class="related-courses-boxes mt-20 mx-auto w-full flex flex-col lg:flex-row justify-center gap-10 flex-wrap lg:mt-24 md:max-w-xl lg:max-w-none">
            <!-- related-courses Box 1 -->

            <?php
            $args = array(
        'post_type' => 'courses',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'post__not_in' => array ($post->ID),
        );
        $loop = new WP_Query($args);
        while($loop->have_posts()): $loop->the_post();      
        $courseImage = get_field('course_image');
        $courseShortDescription = get_field('course_short_description');
        $studentsEnrolled = get_field('students_enrolled');
        $ratings = get_field('ratings');
?>


            <div
                class="related-courses-box grid grid-cols-3 gap-5 place-items-center lg:grid-cols-3 text-left border-2 px-4 py-4  rounded-xl bg-primary">
                <div class="realted-course-image mx-auto flex flex-col justify-center items-center">
                    <img class="bg-white p-2 rounded-xl" src="<?php the_field('course_image'); ?>" alt="" />
                </div>
                <div class="speciality-content col-span-2 lg:col-span-2">
                    <h2 class="text-white text-base lg:text-xl font-semibold">
                        <?php echo the_title(); ?>
                    </h2>
                    <p class="text-secondaryTextLight text-sm lg:text-base mt-2">
                        <?php echo  wp_trim_words( $courseShortDescription, 20); ?>
                    </p>
                    <div class="course-meta flex flex-row justify-between mt-4 items-center w-full">
                        <div class="flex flex-1 gap-10 w-full">
                            <p class="text-xs text-secondaryTextLight lg:text-sm">
                                <i class="fa-solid fa-people-group"></i> <?php echo $studentsEnrolled ?> +
                            </p>
                            <p class="text-xs text-secondaryTextLight lg:text-sm">
                                <i class="fa-solid fa-star text-yellow-300 opacity-100"></i>
                                <?php echo $ratings ?>
                            </p>
                        </div>
                        <div class="cta-btn flex flex-row justify-end items-right flex-1">
                            <a class="bg-ctaBg px-6 py-3 rounded-full text-white   flex flex-row items-center w-fit text-xs lg:text-base"
                                href="<?php the_permalink();?>">Read More <i class="ml-2 fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end of related-courses Box 1 -->
            </div>


            <?php
    endwhile;
    wp_reset_query();
?>
            <!-- End of related-courses Boxes Container -->
        </div>
        <!-- end of Inner Container -->
    </div>

</section>



<?php get_footer(); ?>