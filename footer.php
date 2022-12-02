<?php wp_footer(); ?>

<?php
    //Appearance Config
    $companyName = get_theme_mod('mym_company_name');
    $email_address = get_theme_mod( 'mym_email' );
    $telephone_no = get_theme_mod( 'mym_telephone' );
    $address = get_theme_mod( 'mym_address' );
  ?>


<!-- footer  -->
<footer class="section-starts bg-primary text-white footer-container pt-52 ">
    <div class="footer-bg">
        <img src="<?php echo get_template_directory_uri() ?>/img/svgs/hero-bottom.svg" alt="" />
    </div>
    <!-- inner container  -->
    <div class="inner-container">
        <!-- grid container -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 justify-between gap-x-10 gap-y-10 py-10 lg:py-20">
            <!-- footer 1 container  -->
            <div class="footer-1-container">
                <div class="footer-logo-w w-4/5">
                    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        title="<?php echo get_theme_mod( 'mym_company_name' ); ?>">
                        <?php dynamic_sidebar('footer-logo'); ?>
                    </a>
                </div>
            </div>

            <!-- footer 2 container  -->
            <div class="footer-2-container">
                <h2 class="text-xl font-medium">Important Links</h2>
                <?php

                    $defaults = array(
                    'container' => 'ul',
                    'theme_location' => 'footer-links',
                    'menu_class' => 'footer-links mt-4 list-none text-base lg:text-lg leading-relaxed',  
                    'add_li_class'  => 'footer-link'
                    );

                    wp_nav_menu( $defaults );

                ?>
            </div>

            <!-- footer 3 container  -->
            <div class="footer-3-container">
                <h2 class="text-xl font-medium">Courses</h2>


                <?php

                    $defaults = array(
                    'container' => 'ul',
                    'theme_location' => 'footer-course-links',
                    'menu_class' => 'footer-links mt-4 list-none text-base lg:text-lg leading-relaxed',  
                    'add_li_class'  => 'footer-link'
                    );

                    wp_nav_menu( $defaults );

                    ?>
            </div>

            <!-- footer 4 container  -->
            <div class="footer-4-container lg:col-span-2">
                <h2 class="text-xl font-medium">Get in touch</h2>
                <ul class="footer-links mt-4 list-none text-base lg:text-lg leading-10">

                    <?php dynamic_sidebar( 'footer-sidebar-4' ) ?>

                    <li style="footer-link line-break: anywhere" class="flex flex-row gap-2 items-center">
                        <span><svg width="25" height="25" viewBox="0 0 33 31" fill="#54ABA7"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.8876 5.07275H5.37749C3.89867 5.07275 2.70216 6.21418 2.70216 7.60925L2.68872 22.8282C2.68872 24.2233 3.89867 25.3647 5.37749 25.3647H26.8876C28.3664 25.3647 29.5764 24.2233 29.5764 22.8282V7.60925C29.5764 6.21418 28.3664 5.07275 26.8876 5.07275ZM26.8876 10.1457L16.1326 16.487L5.37749 10.1457V7.60925L16.1326 13.9505L26.8876 7.60925V10.1457Z"
                                    fill="#54ABA7" fill-opacity="0.5" />
                            </svg>
                        </span>

                        <a href="mailto:<?php echo $email_address; ?>"><?php echo $email_address; ?></a>


                    </li>
                    <li class="footer-link mt-2 flex flex-row gap-2 items-center">
                        <span>
                            <svg width="25" height="25" viewBox="0 0 33 31" fill="#54ABA7"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M20.9377 20.4315L23.253 18.3008C23.5649 18.0174 23.9594 17.8234 24.3887 17.7424C24.8181 17.6613 25.2638 17.6967 25.6717 17.8442L28.4934 18.881C28.9056 19.035 29.2591 19.2978 29.5092 19.6364C29.7594 19.9749 29.8951 20.374 29.8991 20.7834V25.5393C29.8967 25.8178 29.8331 26.093 29.7121 26.3483C29.5911 26.6035 29.4152 26.8336 29.1951 27.0247C28.9749 27.2157 28.715 27.3638 28.431 27.46C28.147 27.5562 27.8447 27.5985 27.5425 27.5844C7.76952 26.4525 3.77978 11.0433 3.02524 5.14591C2.99021 4.85631 3.02222 4.56317 3.11914 4.28576C3.21607 4.00836 3.37572 3.75299 3.58759 3.53645C3.79947 3.3199 4.05877 3.1471 4.34843 3.02939C4.63808 2.91169 4.95154 2.85177 5.26818 2.85355H10.2605C10.706 2.85477 11.1409 2.9786 11.5093 3.20914C11.8777 3.43967 12.1627 3.76635 12.3277 4.14717L13.4544 6.74391C13.62 7.11779 13.6623 7.52829 13.5759 7.92415C13.4895 8.32 13.2783 8.68366 12.9686 8.96968L10.6533 11.1003C10.6533 11.1003 11.9867 19.4042 20.9377 20.4315Z"
                                    fill="#54ABA7" fill-opacity="0.5" />
                            </svg>
                        </span>

                        <a href="tel:<?php echo $telephone_no; ?>"><?php echo $telephone_no; ?></a>
                    </li>
                    <li class="footer-link mt-2 flex flex-row gap-2 items-center">
                        <span>
                            <svg width="25" height="25" viewBox="0 0 33 37" fill="#54ABA7"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.9962 33.0606C20.9973 29.2341 27.842 19.9598 27.842 14.7505C27.842 8.43253 22.8108 3.30664 16.6097 3.30664C10.4086 3.30664 5.37744 8.43253 5.37744 14.7505C5.37744 19.9598 12.2221 29.2341 15.2232 33.0606C15.9428 33.9726 17.2766 33.9726 17.9962 33.0606ZM16.6097 18.5651C14.5446 18.5651 12.8656 16.8545 12.8656 14.7505C12.8656 12.6465 14.5446 10.9359 16.6097 10.9359C18.6748 10.9359 20.3538 12.6465 20.3538 14.7505C20.3538 16.8545 18.6748 18.5651 16.6097 18.5651Z"
                                    fill="#54ABA7" fill-opacity="0.5" />
                            </svg>
                        </span>
                        <p class="flex flex-col">
                            <a href="<?php echo $address; ?>"><?php echo $address; ?></a>
                        </p>
                    </li>
                    <li class="social icons flex flex-row gap-8 mt-8">
                        <span class="hover:animate-pulse"><a href=""><svg width="40" height="40" viewBox="0 0 50 50"
                                    fill="#54ABA7" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0 24.134C0 36.066 8.666 45.988 20 48V30.666H14V24H20V18.666C20 12.666 23.866 9.334 29.334 9.334C31.066 9.334 32.934 9.6 34.666 9.866V16H31.6C28.666 16 28 17.466 28 19.334V24H34.4L33.334 30.666H28V48C39.334 45.988 48 36.068 48 24.134C48 10.86 37.2 0 24 0C10.8 0 0 10.86 0 24.134Z"
                                        fill="#54ABA7" />
                                </svg>
                            </a>
                        </span>
                        <span class="hover:animate-pulse"><a href=""><svg width="40" height="40" viewBox="0 0 50 50"
                                    fill="#54ABA7" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M32.5 25C32.5 26.9891 31.7098 28.8968 30.3033 30.3033C28.8968 31.7098 26.9891 32.5 25 32.5C23.0109 32.5 21.1032 31.7098 19.6967 30.3033C18.2902 28.8968 17.5 26.9891 17.5 25C17.5 24.5725 17.545 24.155 17.6225 23.75H15V33.7425C15 34.4375 15.5625 35 16.2575 35H33.745C34.0781 34.9993 34.3973 34.8666 34.6326 34.6308C34.8679 34.3951 35 34.0756 35 33.7425V23.75H32.3775C32.455 24.155 32.5 24.5725 32.5 25ZM25 30C25.6568 29.9998 26.3071 29.8703 26.9138 29.6188C27.5205 29.3673 28.0718 28.9988 28.5361 28.5343C29.0003 28.0698 29.3686 27.5183 29.6198 26.9115C29.871 26.3046 30.0002 25.6543 30 24.9975C29.9998 24.3407 29.8703 23.6904 29.6188 23.0837C29.3673 22.477 28.9988 21.9257 28.5343 21.4614C28.0698 20.9972 27.5183 20.6289 26.9115 20.3777C26.3046 20.1265 25.6543 19.9973 24.9975 19.9975C23.6711 19.9978 22.3991 20.5251 21.4614 21.4632C20.5238 22.4014 19.9972 23.6736 19.9975 25C19.9978 26.3264 20.5251 27.5984 21.4632 28.5361C22.4014 29.4737 23.6736 30.0003 25 30ZM31 19.75H33.9975C34.1966 19.75 34.3877 19.6711 34.5287 19.5305C34.6698 19.3899 34.7493 19.1991 34.75 19V16.0025C34.75 15.8029 34.6707 15.6115 34.5296 15.4704C34.3885 15.3293 34.1971 15.25 33.9975 15.25H31C30.8004 15.25 30.609 15.3293 30.4679 15.4704C30.3268 15.6115 30.2475 15.8029 30.2475 16.0025V19C30.25 19.4125 30.5875 19.75 31 19.75ZM25 1C18.6348 1 12.5303 3.52856 8.02944 8.02944C3.52856 12.5303 1 18.6348 1 25C1 31.3652 3.52856 37.4697 8.02944 41.9706C12.5303 46.4714 18.6348 49 25 49C28.1517 49 31.2726 48.3792 34.1844 47.1731C37.0962 45.967 39.742 44.1992 41.9706 41.9706C44.1992 39.742 45.967 37.0962 47.1731 34.1844C48.3792 31.2726 49 28.1517 49 25C49 21.8483 48.3792 18.7274 47.1731 15.8156C45.967 12.9038 44.1992 10.258 41.9706 8.02944C39.742 5.80083 37.0962 4.033 34.1844 2.82689C31.2726 1.62078 28.1517 1 25 1ZM37.5 34.7225C37.5 36.25 36.25 37.5 34.7225 37.5H15.2775C13.75 37.5 12.5 36.25 12.5 34.7225V15.2775C12.5 13.75 13.75 12.5 15.2775 12.5H34.7225C36.25 12.5 37.5 13.75 37.5 15.2775V34.7225Z"
                                        fill="#54ABA7" />
                                </svg>
                            </a>
                        </span>
                        <span class="hover:animate-pulse"><a href=""><svg width="40" height="40" viewBox="0 0 50 50"
                                    fill="#54ABA7" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M25 1C11.7464 1 1 11.7464 1 25C1 38.2536 11.7464 49 25 49C38.2536 49 49 38.2536 49 25C49 11.7464 38.2536 1 25 1ZM36.5339 19.0911C36.55 19.3429 36.55 19.6054 36.55 19.8625C36.55 27.7268 30.5607 36.7857 19.6161 36.7857C16.2411 36.7857 13.1125 35.8054 10.4768 34.1179C10.9589 34.1714 11.4196 34.1929 11.9125 34.1929C14.6982 34.1929 17.2589 33.25 19.3 31.6536C16.6857 31.6 14.4893 29.8857 13.7393 27.5286C14.6554 27.6625 15.4804 27.6625 16.4232 27.4214C15.0771 27.1479 13.8672 26.4169 12.999 25.3524C12.1308 24.2879 11.658 22.9557 11.6607 21.5821V21.5071C12.4482 21.9518 13.375 22.225 14.3446 22.2625C13.5295 21.7193 12.861 20.9833 12.3985 20.1198C11.9359 19.2563 11.6935 18.2921 11.6929 17.3125C11.6929 16.2036 11.9821 15.1911 12.5018 14.3125C13.9959 16.1518 15.8603 17.6561 17.9739 18.7277C20.0875 19.7992 22.4029 20.414 24.7696 20.5321C23.9286 16.4875 26.95 13.2143 30.5821 13.2143C32.2964 13.2143 33.8393 13.9321 34.9268 15.0893C36.2714 14.8375 37.5571 14.3339 38.7036 13.6589C38.2589 15.0357 37.3268 16.1982 36.0893 16.9321C37.2893 16.8036 38.4464 16.4714 39.5179 16.0054C38.7089 17.1946 37.6964 18.25 36.5339 19.0911Z"
                                        fill="#54ABA7" />
                                </svg>
                            </a>
                        </span>
                    </li>
                </ul>
                <!-- end of footer 4 container  -->
            </div>
            <!-- end of grid container  -->
        </div>
        <!-- credits container  -->
        <div class="credits-container grid grid-cols-3 justify-between mt-4 pb-2">
            <div class="flex flex-col lg:flex-row gap-4 justify-center items-center">
                <h3>© <?php echo date('Y'); ?> <span> &nbsp; </span> <?php  echo $companyName ?>. &nbsp;  All Rights Reserved.</h3>
            </div>
            <div class="flex flex-col lg:flex-row gap-4 justify-center items-center">
                <a href="<?php echo get_permalink(get_page_by_title('Privacy Policy'))?>">Privacy Policy</a>
                <span class="hidden lg:inline-block"> | </span>
                <a href="<?php echo get_permalink(get_page_by_title('Cookie Policy'))?>">Cookie Policy</a>
            </div>
            <div class="developer">
                <h3 class="flex flex-col lg:flex-row text-center items-center lg:gap-1">
                    Design and Development by
                    <span><a class="font-semibold" href=""> Urban Feather Ltd</a></span>
                </h3>
            </div>
            <!-- end of credits container  -->
        </div>
        <!-- end of inner container  -->
    </div>
    <!-- end of footer  -->
</footer>
<!-- end of footer  -->











</body>

</html>