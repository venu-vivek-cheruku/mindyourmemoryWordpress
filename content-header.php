<!-- Custom Fields  -->

<?php 
    $headerImage = get_the_post_thumbnail_url();
    $name = get_field('name');
?>

<section class="aboutMe-introduction-container  overflow-hidden">
    <div class="inner-container flex flex-col-reverse justify-center items-center text-center font-primary gap-y-20">
        <div class="intro-content">
            <h1 class="text-primary text-3xl lg:text-4xl font-semibold lg:leading-snug">
                <?php echo $name ?>

            </h1>

        </div>
        <div class="intro-image">
           
            <img class="w-full " src="<?php echo $headerImage; ?>" alt="">
        </div>
    </div>
</section>