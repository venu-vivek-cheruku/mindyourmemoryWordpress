<?php
	// Allow theme support for specific elements
	function mym_setup() {
		add_theme_support( 'custom-header' );
		add_theme_support( 'menus' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'woocommerce' );
		add_post_type_support( 'page', 'excerpt' );

	}
	add_action( 'after_setup_theme', 'mym_setup' );

	//Set styles
	function mym_theme_styles(){
		wp_enqueue_style( 'main_css', get_template_directory_uri() . '/css/main.css' );
	}
	add_action( 'wp_enqueue_scripts', 'mym_theme_styles' );
	//Set scripts
	function mym_theme_js(){
		wp_enqueue_script( 'jquery_js', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'ajax_google_js', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array('jquery'), '', true );
		
	}
	add_action( 'wp_enqueue_scripts', 'mym_theme_js' );


	//Set Widget Areas
	function mym_create_widget( $name, $id, $description ) {

		register_sidebar(array(
			'name' => __( $name ),
			'id' => $id,
			'description' => __( $description ),
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="module-heading">',
			'after_title' => '</h2>'
		));


		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Logo', 'widleandwilde' ),
				'id'            => 'footer-logo',
				'description'   => esc_html__( 'Add widgets here.', 'widleandwilde' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Sidebar 2', 'widleandwilde' ),
				'id'            => 'footer-sidebar-2',
				'description'   => esc_html__( 'Add widgets here.', 'widleandwilde' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</sectdivion>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Sidebar 3', 'widleandwilde' ),
				'id'            => 'footer-sidebar-3',
				'description'   => esc_html__( 'Add widgets here.', 'widleandwilde' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Sidebar 4', 'widleandwilde' ),
				'id'            => 'footer-sidebar-4',
				'description'   => esc_html__( 'Add widgets here.', 'widleandwilde' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

	}

	mym_create_widget( 'Site-wide Message', 'message', 'Displays below the main navigation' );
	mym_create_widget( 'Header', 'header', 'Displays between the logo and contact info' );
	mym_create_widget( 'Footer', 'footer', 'Displays in the footer next to the menu items' );
	mym_create_widget( 'Mailing List', 'mailing-list', 'Space for mailing list in the footer below the Get in touch... details' );

	//Search
	if (!is_admin()) {
		function wpb_search_filter($query) {
			if ($query->is_search) {
				//Only show pages in Search
				$query->set('post_type', 'page');
			}
			return $query;
		}
		add_filter('pre_get_posts','wpb_search_filter');
	}

	//Navigation
	function mym_register_theme_menus(){
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu' ),
        		'header-links' => __( 'Header Links' ),
				'footer-links' => __( 'Footer Links' ),
				'footer-course-links' => __( 'Footer Course Links' ),
			)
		);
	}
	add_action( 'init', 'mym_register_theme_menus' );

	class F6_DRILL_MENU_WALKER extends Walker_Nav_Menu
	{
		/*
		 * Add vertical menu class
		 */

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"vertical menu\">\n";
		}
	}

	function f6_drill_menu_fallback($args)
	{
		/*
		 * Instantiate new Page Walker class instead of applying a filter to the
		 * "wp_page_menu" function in the event there are multiple active menus in theme.
		 */

		$walker_page = new Walker_Page();
		$fallback = $walker_page->walk(get_pages(), 0);
		$fallback = str_replace("children", "children vertical menu", $fallback);
		echo '<ul class="vertical menu" data-drilldown="">'.$fallback.'</ul>';
	}

	//Set the excerpt length
	function custom_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

	//Count the total number of published posts
	function count_all_posts(){
    $count_posts = wp_count_posts();

    $published_posts = $count_posts->publish;
    return $published_posts;
}

	function bidirectional_acf_update_value( $value, $post_id, $field  ) {

		// vars
		$field_name = $field['name'];
		$field_key = $field['key'];
		$global_name = 'is_updating_' . $field_name;

		// bail early if this filter was triggered from the update_field() function called within the loop below
		// - this prevents an inifinte loop
		if( !empty($GLOBALS[ $global_name ]) ) return $value;

		// set global variable to avoid inifite loop
		// - could also remove_filter() then add_filter() again, but this is simpler
		$GLOBALS[ $global_name ] = 1;

		// loop over selected posts and add this $post_id
		if( is_array($value) ) {

			foreach( $value as $post_id2 ) {

				// load existing related posts
				$value2 = get_field($field_name, $post_id2, false);

				// allow for selected posts to not contain a value
				if( empty($value2) ) {
					$value2 = array();
				}

				// bail early if the current $post_id is already found in selected post's $value2
				if( in_array($post_id, $value2) ) continue;

				// append the current $post_id to the selected post's 'related_posts' value
				$value2[] = $post_id;

				// update the selected post's value (use field's key for performance)
				update_field($field_key, $value2, $post_id2);
			}
		}

		// find posts which have been removed
		$old_value = get_field($field_name, $post_id, false);

		if( is_array($old_value) ) {

			foreach( $old_value as $post_id2 ) {

				// bail early if this value has not been removed
				if( is_array($value) && in_array($post_id2, $value) ) continue;

				// load existing related posts
				$value2 = get_field($field_name, $post_id2, false);

				// bail early if no value
				if( empty($value2) ) continue;

				// find the position of $post_id within $value2 so we can remove it
				$pos = array_search($post_id, $value2);

				// remove
				unset( $value2[ $pos] );

				// update the un-selected post's value (use field's key for performance)
				update_field($field_key, $value2, $post_id2);
			}
		}

		// reset global varibale to allow this filter to function as per normal
		$GLOBALS[ $global_name ] = 0;

		// return
	    return $value;
	}

	add_filter('acf/update_value/name=page_feature_boxes', 'bidirectional_acf_update_value', 10, 3);
	add_filter('acf/update_value/name=page_documents', 'bidirectional_acf_update_value', 10, 3);

	//Define a new Theme Customizer
	function mym_customize_register( $wp_customize ){

		//Add 'Change Your Logo' section
		$wp_customize->add_section( 'mym_logo_section', array(
			'title'		=> __( 'Change Your Logo', 'mindyourmemory' ),
			'priority'	=> 30,
		) );

		//Add 'Change Your Favicon' section
		// $wp_customize->add_section( 'mym_favicon_section', array(
		// 	'title'		=> __( 'Change Your Favicon', 'mindyourmemory' ),
		// 	'priority'	=> 40,
		// ) );

		//Add 'Company Details' section
		$wp_customize->add_section( 'mym_company_details_section', array(
			'title'		=> __( 'Company Details', 'mindyourmemory' ),
			'priority'	=> 30,
		) );

		//Add 'Logo' setting
		$wp_customize->add_setting( 'mym_logo', array(
			'default'	=> get_template_directory_uri() . '/img/logo.png',
			'transport'	=> 'refresh',
		) );

		//Add 'Favicon' setting
		// $wp_customize->add_setting( 'mym_favicon', array(
		// 	'default'	=> get_template_directory_uri() . '/img/favicon.ico',
		// 	'transport'	=> 'refresh',
		// ) );

		//Add 'Company Name' setting
		$wp_customize->add_setting( 'mym_company_name', array(
			'default'	=> 'mindyourmemory',
			'transport'	=> 'refresh',
		) );

		//Add 'Telephone' setting
		$wp_customize->add_setting( 'mym_telephone', array(
			'default'	=> '',
			'transport'	=> 'refresh',
		) );

		//Add 'Fax' setting
		$wp_customize->add_setting( 'mym_fax', array(
			'default'	=> '',
			'transport'	=> 'refresh',
		) );

		//Add 'Address' setting
		$wp_customize->add_setting( 'mym_address', array(
			'default'	=> '',
			'transport'	=> 'refresh',
		) );

		//Add 'Email' setting
		$wp_customize->add_setting( 'mym_email', array(
			'default'	=> '',
			'transport'	=> 'refresh',
		) );

		//Add 'Website' setting
		$wp_customize->add_setting( 'mym_website', array(
			'default'	=> '',
			'transport'	=> 'refresh',
		) );

		//Add 'Opening Times' setting
		$wp_customize->add_setting( 'mym_opening_times', array(
			'default'	=> '',
			'transport'	=> 'refresh',
		) );

		//Link 'Logo' setting to 'Change Your Logo' section and assign image uploader
		$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'logo', array (
			'label'		=> __( 'Logo', 'mindyourmemory' ),
			'section'	=> 'mym_logo_section',
			'settings'	=> 'mym_logo'
		) ) );

		//Link 'Favicon' setting to 'Change Your Logo / Favicon' section and assign image uploader
		$wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'favicon', array (
			'label'		=> __( 'Favicon', 'mindyourmemory' ),
			'section'	=> 'mym_favicon_section',
			'settings'	=> 'mym_favicon'
		) ) );

		//Link 'Company Name' setting to 'Company Details' section and assign text field
		$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'company_name', array (
			'label'		=> __( 'Company Name', 'mindyourmemory' ),
			'section'	=> 'mym_company_details_section',
			'settings'	=> 'mym_company_name'
		) ) );

		//Link 'Telephone' setting to 'Company Details' section and assign text field
		$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'telephone', array (
			'label'		=> __( 'Telephone', 'mindyourmemory' ),
			'section'	=> 'mym_company_details_section',
			'settings'	=> 'mym_telephone'
		) ) );

		//Link 'Fax' setting to 'Company Details' section and assign text field
		$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'fax', array (
			'label'		=> __( 'Fax', 'mindyourmemory' ),
			'section'	=> 'mym_company_details_section',
			'settings'	=> 'mym_fax'
		) ) );

		//Link 'Address' setting to 'Company Details' section and assign text field
		$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'address', array (
			'label'		=> __( 'Address', 'mindyourmemory' ),
			'section'	=> 'mym_company_details_section',
			'settings'	=> 'mym_address'
		) ) );

		//Link 'Email' setting to 'Company Details' section and assign text field
		$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'email', array (
			'label'		=> __( 'Email', 'mindyourmemory' ),
			'section'	=> 'mym_company_details_section',
			'settings'	=> 'mym_email'
		) ) );

		//Link 'Website' setting to 'Company Details' section and assign text field
		$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'website', array (
			'label'		=> __( 'Website', 'mindyourmemory' ),
			'section'	=> 'mym_company_details_section',
			'settings'	=> 'mym_website'
		) ) );

		//Link 'Opening Times' setting to 'Company Details' section and assign text field
		$wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'opening_times', array (
			'label'		=> __( 'Opening Times', 'mindyourmemory' ),
			'section'	=> 'mym_company_details_section',
			'settings'	=> 'mym_opening_times'
		) ) );

		//Remove sections not required for theme
		$wp_customize->remove_section( 'colors' );
		$wp_customize->remove_section( 'header_image' );

		//Remove Tagline
		$wp_customize->remove_control('blogdescription');
		$wp_customize->remove_control('display_header_text');

		//Rename 'Site Title & Tagline' section to 'Site Title'
		$wp_customize->add_section( 'title_tagline', array(
			'title'		=> __( 'Site Title', 'mindyourmemory' ),
			'priority'	=> 20,
		) );

		//Rename 'Static Front Page' section to 'Home Page Preferences'
		$wp_customize->add_section( 'static_front_page', array(
			'title'		=> __( 'Home Page Preferences', 'mindyourmemory' ),
			'priority'	=> 120,
		) );

		//Create custom panels
		$wp_customize->add_panel( 'configuration', array(
			'priority'			=> 10,
			'theme_supports'	=> '',
			'title'				=> __( 'Configuration', 'mindyourmemory' ),
			'description'		=> __( 'Sets the initial options for the theme', 'mindyourmemory' ),
		) );

		$wp_customize->add_panel( 'design', array(
			'priority'			=> 20,
			'theme_supports'	=> '',
			'title'				=> __( 'Design', 'mindyourmemory' ),
			'description'		=> __( 'Sets the design options for the theme', 'mindyourmemory' ),
		) );

		//Assign sections to panels
		$wp_customize->get_section('static_front_page')->panel = 'configuration';
		$wp_customize->get_section('title_tagline')->panel = 'configuration';
		$wp_customize->get_section('mym_company_details_section')->panel = 'configuration';
		$wp_customize->get_section('mym_logo_section')->panel = 'design';
		// $wp_customize->get_section('mym_favicon_section')->panel = 'design';

	}

	add_action( 'customize_register', 'mym_customize_register' );

	//Redirect specific custom post type single pages
	function mym_redirect_post() {
		$queried_post_type = get_query_var('post_type');

		//Testimonial
		if ( is_single() && 'resource-centre' ==  $queried_post_type ) {
			wp_redirect( 'home', 301 );
			exit;
		}

	}
	add_action( 'template_redirect', 'mym_redirect_post' );

	//Login Logo
	function mym_login_logo() {

		wp_register_style( 'login_css', get_template_directory_uri() . '/css/login.css', false, '1.0.0' );
		wp_enqueue_style( 'login_css' );

	}
	add_action( 'login_enqueue_scripts', 'mym_login_logo' );

	//Login Logo Link
	function mym_login_url() {  return home_url(); }
	add_filter( 'login_headerurl', 'mym_login_url' );

	//Login Logo Title
	function mym_login_title() { return get_option( 'blogname' ); }
	add_filter( 'login_headertext', 'mym_login_title' );

	//Assign custom dashboard themes
	function mym_admin_color_schemes(){

		$theme_dir = get_template_directory_uri();

		wp_admin_css_color(
			'urbanfeather', __( 'Urban Feather' ),
			$theme_dir . '/admin-colors/urbanfeather/colors.css',
			array( '#404040', '#f1f1f1', '#EA195E', '#FFF')
		);

		wp_admin_css_color(
			'mindyourmemory', __( 'Mind Your Memory' ),
			$theme_dir . '/admin-colors/mindyourmemory/colors.css',
			array( '#2b2b2b', '#6a7635', '#FFF')
		);

	}
	add_action( 'admin_init', 'mym_admin_color_schemes' );

	//Remove default dashboard widgets
	function mym_remove_dashboard_widgets() {
		global $wp_meta_boxes;

		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);

		update_user_meta( get_current_user_id(), 'show_welcome_panel', false );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
		remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'normal');
		remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'normal');
		remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'normal');

	}
	add_action('wp_dashboard_setup', 'mym_remove_dashboard_widgets' );

	//Add in custom support dashboard widget
	function gs_custom_dashboard_widgets() {
		global $wp_meta_boxes;

		wp_add_dashboard_widget('urban_feather_help_widget', 'Urban Feather Website Support', 'urban_feather_dashboard_help');
	}

	function urban_feather_dashboard_help() {
		echo '<p><strong>Welcome to the Dashboard!</strong></p>';
		echo '<p>Should you need any help please feel free to contact Urban Feather using the contact details located on <a href="https://urbanfeather.com/contact-us" target="_blank" title="Contact Urban Feather">our website</a>.</p>';
		echo '<a href="https://urbanfeather.com" target="_blank" title="Urban Feather"><img src="' . get_template_directory_uri() . '/img/urban-feather-logo.png" alt="Urban Feather Logo" /></a>';
	}
	add_action('wp_dashboard_setup', 'gs_custom_dashboard_widgets');

	//Add custom dashboard stylesheet
	function mym_load_custom_wp_admin_style() {
        wp_register_style( 'dashboard_css', get_template_directory_uri() . '/css/dashboard.css', false, '1.0.0' );
        wp_enqueue_style( 'dashboard_css' );
	}
	add_action( 'admin_enqueue_scripts', 'mym_load_custom_wp_admin_style' );

	
	//custom class for menu items
	
	function add_additional_class_on_li($classes, $item, $args) {
	if(isset($args->add_li_class)) {
	$classes[] = $args->add_li_class;
	}
	return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


	// Enqueue GSAP script

	function theme_gsap_script() {
		wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), '3.11.3', true );
		wp_enqueue_script( 'gsap_scrollTrigger', get_template_directory_uri() . '/gsap-public/minified/ScrollTrigger.min.js', array(), '3.11.3', true );
		wp_enqueue_script( 'main_js', get_template_directory_uri() .'/js/app.js', array('gsap-js'), '', true );
	
	}
	add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );
	
?>