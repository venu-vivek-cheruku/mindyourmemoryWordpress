<?php
	//Custom Fields

?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Content -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- gsap scripts  -->



    <?php wp_head(); ?>

</head>


<body>
    <!-- Header  -->
    <header class="bg-primary text-white fixed top-0 left-0 z-50 w-full shadow-md">
        <div class="inner-container relative">
            <nav class="flex flex-row w-full h-full justify-between items-center">
                <!-- logo container  -->
                <div class="logo-container">

                    <a id="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        title="<?php echo get_theme_mod( 'mym_company_name' ); ?>">
                        <img class="w-24 lg:w-32 h-auto" src="<?php echo get_theme_mod( 'mym_logo' ); ?>"
                            alt="<?php echo get_theme_mod( 'mym_company_name' ); ?>_logo" />
                    </a>
                    <!-- End of logo container  -->
                </div>

                <!-- nav menu items -->

                <div class="header-menu">


                    <?php

                    $defaults = array(
                    'container' => 'ul',
                    'theme_location' => 'main-menu',
                    'menu_class' => 'nav-links list-none gap-10 hidden lg:flex font-medium font-primary',  
                    'add_li_class'  => 'nav-link text-lg flex flex-row items-center gap-3 hover:text-ctaBg hover:underline hover:underline-offset-4 list-none'
                    );

                    wp_nav_menu( $defaults );

                    ?>
                </div>

                <!-- cta btn  -->

                <div class="cta-btn flex flex-row-reverse gap-5 items-center">
                    <div id="menu" class="menu btn1 lg:hidden" onclick="openMenu()" data-menu="1">
                        <div class="icon-left"></div>
                        <div class="icon-right"></div>
                    </div>

                    <a class="px-6 py-2 lg:px-8 text-white bg-ctaBg rounded-full text-base lg:text-lg flex flex-row items-center"
                        href="<?php  echo get_permalink( get_page_by_title( 'Enquiry' ) )  ?>">Enquiry
                        <i class="ml-2 fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- mobile nav  -->

                <div
                    class="mobile-menu-container lg:hidden absolute bg-primary h-screen transition-all left-0 top-14 overflow-hidden">

                    <?php

                        $defaults = array(
                        'container' => 'ul',
                        'theme_location' => 'header-links',
                        'menu_class' => 'list-none gap-10 w-full h-full flex flex-col justify-center items-start ml-32',  
                        'add_li_class'  => 'flex flex-row justify-center items-center gap-5 text-3xl font-semibold font-primary'
                        );

                        wp_nav_menu( $defaults );

                        ?>

                </div>
            </nav>
        </div>
    </header>

    <!--End of Header  -->