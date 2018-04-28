<?php
/*
 * CUSTOM FIELDS
 * @package Serotonin
 *
 * Serotonin Wordpress Theme
 * (c) Collision Studio http://collision.studio
 */

# Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

# HOMEPAGE TEMPLATE

# If Advanced Custom Fields plugin is installed and activated
if( class_exists('acf') ) {
	register_field_group(array(
	    'id'                    => 'acf_homepage_main',
	    'title'                 => esc_html__( 'Featured Content', 'serotonin' ),
	    'menu_order'            => 0,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-homepage.php', 
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Sticky post
	            'key'           => 'field_3284firstpostonoff335',
	            'label'         => esc_html__( 'Featured sticky post', 'serotonin' ),
	            'name'          => 'serotonin-sticky-post',
	            'type'          => 'checkbox',
	            'choices'       => array(
	                'on'        => esc_html__( 'Turn on featured sticky post', 'serotonin' ),
	            ),
	            'default_value' => 'on',
	        ),
	        array( # First featured category
	            'key'           => 'field_3284category335',
	            'label'         => esc_html__( 'First featured category', 'serotonin' ),
	            'name'          => 'serotonin-first-featured-category',
	            'type'          => 'taxonomy',
	        ),
	        array( # Second featured category
	            'key'           => 'field_32categorysmallerposts335',
	            'label'         => esc_html__( 'Second featured category', 'serotonin' ),
	            'name'          => 'serotonin-second-featured-category',
	            'type'          => 'taxonomy',
	        ),
	        array( # Third featured category
	            'key'           => 'field_32categorysmallerposts4335',
	            'label'         => esc_html__( 'Third featured category', 'serotonin' ),
	            'name'          => 'serotonin-third-featured-category',
	            'type'          => 'taxonomy',
	        ),
	    ),
	));
	# About me section
	register_field_group(array(
	    'id'                    => 'acf_homepage_aboutme',
	    'title'                 => esc_html__( 'About Me', 'serotonin' ),
	    'menu_order'            => 1,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-homepage.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Image
	            'key'           => 'field_33image435',
	            'label'         => esc_html__( 'Upload image', 'serotonin' ),
	            'name'          => 'serotonin-image',
	            'type'          => 'image',
	        ),
	        array( # Title
	            'key'           => 'field_33dtitle45735',
	            'label'         => esc_html__( 'Title', 'serotonin' ),
	            'name'          => 'serotonin-about-title',
	            'type'          => 'text',
	            'default_value' => 'About me',
	            'placeholder'   => esc_html__( 'Enter title here', 'serotonin' ),
	        ),
	        array( # Subtitle
	            'key'           => 'field_334subtitle95',
	            'label'         => esc_html__( 'Subtitle', 'serotonin' ),
	            'name'          => 'serotonin-about-subtitle',
	            'type'          => 'text',
	            'default_value' => 'This is a subtitle',
	            'placeholder'   => esc_html__( 'Enter subtitle here', 'serotonin' ),
	        ),
	        array( # Content
	            'key'           => 'field_22wysiwyg390437',
	            'label'         =>  esc_html__( 'Content', 'serotonin' ),
	            'name'          => 'serotonin-about-wysiwyg',
	            'type'          => 'wysiwyg',
	        ),
	    ),
	));
	# Links
	register_field_group( array(
	    'id'                    => 'acf_homepage_links',
	    'title'                 =>  esc_html__( 'Links', 'serotonin' ),
	    'menu_order'            => 1,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-homepage.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Link 1 text
	            'key'           => 'field_33link245',
	            'name'          => 'serotonin-link-1-text',
	            'type'          => 'text',
	            'placeholder'   => esc_html__( 'Enter link name here', 'serotonin' ),
	        ),
	        array( # Link 1 URL
	            'key'           => 'field_34809link53596',
	            'name'          => 'serotonin-link-1-url',
	            'type'          => 'text',
	            'placeholder'   => esc_html__( 'Enter link URL here', 'serotonin' ),
	        ),
	        array( # Link 2 text
	            'key'           => 'field_2link4867',
	            'name'          => 'serotonin-link-2-text',
	            'type'          => 'text',
	            'placeholder'   => esc_html__( 'Enter link name here', 'serotonin' ),
	        ),
	        array( # Link 2 URL
	            'key'           => 'field_link4847438634',
	            'name'          => 'serotonin-link-2-url',
	            'type'          => 'text',
	            'placeholder'   => esc_html__( 'Enter link URL here', 'serotonin' ),
	        ),
	        array( # Link 3 text
	            'key'           => 'field_4363409dmbielink67',
	            'name'          => 'serotonin-link-3-text',
	            'type'          => 'text',
	            'placeholder'   => esc_html__( 'Enter link name here', 'serotonin' ),
	        ),
	        array( # Link 3 URL
	            'key'           => 'field_link4287534',
	            'name'          => 'serotonin-link-3-url',
	            'type'          => 'text',
	            'placeholder'   => esc_html__( 'Enter link URL here', 'serotonin' ),
	        ),
	    ),
	));

	# ABOUT TEMPLATE
	register_field_group( array(
	    'id'                    => 'acf_about_subtitle',
	    'title'                 => esc_html__( 'Header', 'serotonin' ),
	    'menu_order'            => 0,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-about.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Page subtitle
	            'key'           => 'field_444page_subtitle64354',
	            'label'         => esc_html__( 'Subtitle', 'serotonin' ),
	            'name'          => 'serotonin-page-subtitle',
	            'type'          => 'text',
	            'default_value' => 'This is a subtitle',
	            'placeholder'   => 'Enter subtitle here',
	        ),
	        array( # Cover photo
	            'key'           => 'field_44image4s64354',
	            'label'         => esc_html__( 'Cover photo', 'serotonin' ),
	            'name'          => 'serotonin-image',
	            'type'          => 'image',
	        ),
	    ),
	));
	# Social Section
	register_field_group( array(
	    'id'                    => 'acf_about_social',
	    'title'                 => esc_html__( 'Social Networks', 'serotonin' ),
	    'menu_order'            => 2,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-about.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Facebook
	            'key'           => 'field_444sociald68',
	            'label'         => 'Facebook',
	            'name'          => 'serotonin-facebook',
	            'type'          => 'text',
	            'default_value' => 'facebook.com',
	            'placeholder'   => 'Facebook',
	        ),
	        array( # Twitter
	            'key'           => 'field_444social68',
	            'label'         => 'Twitter',
	            'name'          => 'serotonin-twitter',
	            'type'          => 'text',
	            'default_value' => 'twitter.com',
	            'placeholder'   => 'Twitter',
	        ),
	        array( # Instagram
	            'key'           => 'field_444social368',
	            'label'         => 'Instagram',
	            'name'          => 'serotonin-instagram',
	            'type'          => 'text',
	            'default_value' => 'instagram.com',
	            'placeholder'   => 'Instagram',
	        ),
	        array( # Tumblr
	            'key'           => 'field_444social648',
	            'label'         => 'Tumblr',
	            'name'          => 'serotonin-tumblr',
	            'type'          => 'text',
	            'default_value' => 'tumblr.com',
	            'placeholder'   => 'Tumblr',
	        ),
	        array( # Pinterest
	            'key'           => 'field_444social628',
	            'label'         => 'Pinterest',
	            'name'          => 'serotonin-pinterest',
	            'type'          => 'text',
	            'default_value' => 'pinterest.com',
	            'placeholder'   => 'Pinterest',
	        ),
	    ),
	));
	# Content Section
	register_field_group( array(
	    'id'                    => 'acf_about_content',
	    'title'                 => esc_html__( 'Content', 'serotonin' ),
	    'menu_order'            => 3,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-about.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Content
	            'key'           => 'field_444wysiwyg64354',
	            'name'          => 'serotonin-about_wysiwyg',
	            'type'          => 'wysiwyg',
	        ),
	    ),
	));

	# CONTACT TEMPLATE
	register_field_group( array(
	    'id'                    => 'acf_contact_page',
	    'title'                 => esc_html__( 'Header', 'serotonin' ),
	    'menu_order'            => 0,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-contact.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Page subtitle
	            'key'           => 'field_444592ab31',
	            'label'         => esc_html__( 'Subtitle', 'serotonin' ),
	            'name'          => 'serotonin-page-subtitle',
	            'type'          => 'text',
	            'default_value' => 'Get in touch',
	            'placeholder'   => 'Enter subtitle here',
	        ),
	    ),
	));
	# Contact details section 
	register_field_group( array(
	    'id'                    => 'acf_contact_details',
	    'title'                 => esc_html__( 'Contact Details', 'serotonin' ),
	    'menu_order'            => 1,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-contact.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Name
	            'key'           => 'field_44459234',
	            'label'         => esc_html__( 'Name', 'serotonin' ),
	            'name'          => 'serotonin-name',
	            'type'          => 'text',
	            'default_value' => 'Collision Studio Inc.',
	            'placeholder'   => esc_html__( 'Enter your name here', 'serotonin' ),
	        ),
	        array( # Address
	            'key'           => 'field_444592535',
	            'label'         => esc_html__( 'Address', 'serotonin' ),
	            'name'          => 'serotonin-address',
	            'type'          => 'text',
	            'default_value' => '13 Street Avenue, New York',
	            'placeholder'   => esc_html__( 'Enter your address here', 'serotonin' ),
	        ),
	        array( # Phone
	            'key'           => 'field_533adad492ab36',
	            'label'         => esc_html__( 'Phone', 'serotonin' ),
	            'name'          => 'serotonin-phone',
	            'type'          => 'text',
	            'default_value' => '',
	            'placeholder'   => esc_html__( 'Enter your phone number here', 'serotonin' ),
	        ),
	        array( # E-mail
	            'key'           => 'field_555674',
	            'label'         => esc_html__( 'E-mail', 'serotonin' ),
	            'name'          => 'serotonin-email',
	            'type'          => 'email',
	            'default_value' => 'contact@collision.studio',
	            'placeholder'   => esc_html__( 'Enter your e-mail here', 'serotonin' ),
	        ),
	    ),
	));
	# Admin e-mail section 
	register_field_group(array(
	    'id'                    => 'acf_email_settings',
	    'title'                 => esc_html__( 'Contact Form', 'serotonin' ),
	    'menu_order'            => 1,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-contact.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Admin email
	            'key'           => 'field_44em4592000034',
	            'label'         => esc_html__( 'Select contact form from "Contact Form 7"', 'serotonin' ),
	            'name'          => 'serotonin-contact-form-7',
	            'type'          => 'acf_cf7'
	        ),
			array( # Serotonin styling for cf7
	            'key'           => 'field_44em459200006670934',
	            'label'         => esc_html__( 'Serotonin style for "Contact Form 7"', 'serotonin' ),
	            'name'          => 'serotonin-contact-form-7-serotonin-styling',
	            'type'          => 'checkbox',
	            'choices'       => array(
	                'enabled'        => esc_html__( 'Enable', 'serotonin' ),
	            ),
	            'default_value' => 'disabled',
	        )
	    )
	));
	# Map section
	register_field_group(array(
	    'id'                    => 'acf_map_details',
	    'title'                 =>  esc_html__( 'Map', 'serotonin' ),
	    'menu_order'            => 1,
	    'location'              => array(
	        array(
	            array(
	                'param'     => 'page_template',
	                'operator'  => '==',
	                'value'     => 'template-contact.php',
	                'order_no'  => 0,
	                'group_no'  => 0,
	            ),
	        ),
	    ),
	    'options'               => array(
	        'position'          => 'normal',
	        'layout'            => 'default',
	        'hide_on_screen'    => array(
	            0               => 'the_content',
	        ),
	    ),
	    'fields'                => array(
	        array( # Latitude
	            'key'           => 'field_533lat',
	            'label'         => esc_html__( 'Latitude', 'serotonin' ),
	            'name'          => 'serotonin-map-latitude',
	            'type'          => 'text',
	            'placeholder'   => esc_html__( 'Latitude', 'serotonin' ),
	            
	        ),
	        array( # Longitude
	            'key'           => 'field_533long',
	            'label'         => esc_html__( 'Longitude', 'serotonin' ),
	            'name'          => 'serotonin-map-longitude',
	            'type'          => 'text',
	            'placeholder'   => esc_html__( 'Longitude', 'serotonin' ),
	        ),
	    ),
	));
}
?>