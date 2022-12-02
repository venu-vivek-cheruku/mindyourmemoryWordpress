<?php
	//Custom Fields
  $benefitMainTitle = get_field('title');
  $benefitSubTitle = get_field('sub_title');
  $benefitOneImage = get_field('benefit_one');
  $benefitOneTitle = get_field('benefit_one_title');
  $benefitOneDescription = get_field('benefit_one_description');
  $benefitTwoImage = get_field('benefit_two');
  $benefitTwoTitle = get_field('benefit_two_title');
  $benefitTwoDescription = get_field('benefit_two_description');
  $benefitThreeImage = get_field('benefit_three');
  $benefitThreetitle = get_field('benefit_three_title');
  $benefitThreeDescription = get_field('benefit_three_description');


 
?>


<section id="benefits" class="mt-10 mb-20 overflow-hidden">
      <div class="inner-container">
        <div class="main-heading-center max-w-3xl m-auto pt-10 lg:mt-10">
          <h1
            class="center-title font-primary text-3xl text-center lg:text-4xl font-bold text-primary"
          >
            <?php echo $benefitMainTitle ?>
          </h1>
          <p
            class="text-sm md:text-base mt-2 lg:mt-4 text-center text-secondaryText font-primary opacity-90"
          >
         <?php echo $benefitSubTitle ?>
          </p>
          <!-- End of Main Heading Center  -->
        </div>

        <div class=" mt-20 lg:mt-24 benefits grid grid-cols-1 gap-20 place-items-start lg:grid-cols-3 ">
          <div class="benefit flex flex-col space-y-4  items-center text-center  rounded-xl ">
            <div class="benefit-image">
              <img class="h-64 object-contain" src="<?php echo esc_url($benefitOneImage['url'])?>" alt="" />
              
            </div>
            <div class="benefit-content flex flex-col items-center gap-y-2 mt-5">
              <h2 class="benefit-title text-xl font-bold font-primary lg:text-2xl text-primary"><?php echo $benefitOneTitle ?></h2>
              <p class="benefit-description"><?php echo $benefitOneDescription ?></p>
              
            </div>
          </div>
          <div class="benefit flex flex-col space-y-4  items-center text-center ">
            <div class="benefit-image rounded-xl">
              <img class="h-64 object-contain"  src="<?php echo esc_url($benefitTwoImage['url'])?>" alt="" />
            </div>
            <div class="benefit-content flex flex-col items-center gap-y-2">
              <h2 class="benefit-title text-xl font-bold font-primary lg:text-2xl text-primary"><?php echo $benefitTwoTitle ?></h2>
              <p class="benefit-description"><?php echo $benefitTwoDescription ?></p>
              
            </div>
          </div>
          <div class="benefit flex flex-col space-y-4  items-center text-center ">
            <div class="benefit-image rounded-xl">
              <img class="h-64 object-contain" src="<?php echo  esc_url($benefitThreeImage['url'])?>" alt="" />
            </div>
            <div class="benefit-content flex flex-col items-center gap-y-2">
              <h2 class="benefit-title text-xl font-bold font-primary lg:text-2xl text-primary"><?php echo $benefitThreetitle ?></h2>
              <p class="benefit-description"><?php echo $benefitThreeDescription ?></p>
              
            </div>
          </div>
        </div>

        <!-- End of inner Container  -->
      </div>
      <!-- End of howItWorks Container  -->
    </section>