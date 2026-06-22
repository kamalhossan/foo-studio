<?php
// Pitstop VC Modules
add_action( 'vc_before_init', 'bison_custom_widgets' );

function bison_custom_widgets(){

    vc_map( array(
        "name" => __("Featured Work", "salient"),
        "base" => "featured_work_shortcode", 
        "category" => __("FOO Studio", "salient"),
        "params" => array(
            array(
                "type" => "textfield",
                "heading" => __("Extra Class", "salient"),
                "param_name" => "extra-class",
                "description" => __("Enter any extra CSS classes for styling.", "salient")
            ),
            array(
                "type" => "textfield",
                "heading" => (__("Number of Posts", "salient")),
                "param_name" => "number-of-posts",
                "description" => __("Enter the number of posts to display.", "salient")
            ),
            array(
                "type" => "checkbox",
                "heading" => __("Portfolio Page?", "salient"),
                "param_name" => "portfolio-page",
                "value" => array(
                    __("Yes", "salient") => "yes"
                ),
                "description" => __("Check this box if you're using this in portfolio page.", "salient")
            ),
        )
    ));
    // for Foo Toggler
    vc_map( array(
        "name" => __("Foo Toggler", "salient"),
        "base" => "foo_toggler_shortcode", 
        "category" => __("FOO Studio", "salient"),
        "params" => array(
            array(
                'type' => 'param_group',
                'heading' => __('Toggle Items', 'salient'),
                'param_name' => 'toggle-items',
                'params' => array(
                    array(
                        "type" => "textfield",
                        "heading" => __("Toggle Title", "salient"),
                        "param_name" => "title",
                        "description" => __("Enter the toggle title.", "salient")
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Content Title", "salient"),
                        "param_name" => "content-title",
                         "description" => __("Enter the Left Content title.", "salient")
                    ),
                    array(
                        "type" => "textarea",
                        "heading" => __("1st Column Description", "salient"),
                        "param_name" => "first-column-description",
                        "description" => __("Enter the 1st Column description.", "salient")
                    ),
                    array(
                        "type" => "textarea",
                        "heading" => __("2nd Column Description", "salient"),
                        "param_name" => "second-column-description",
                        "description" => __("Enter the 2nd Column description.", "salient")
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => __("1st Content Image", "salient"),
                        "param_name" => "first-content-image",
                        "description"=> __("Add First Content Image", "salient")
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => __("2nd Content Image", "salient"),
                        "param_name" => "second-content-image",
                        "description"=> __("Add Second Content Image", "salient")
                    )
                )
            ),
            array(
                "type" => "textfield",
                "heading" => __("Extra Class", "salient"),
                "param_name" => "extra-class",
                "description" => __("Enter any extra CSS classes for styling.", "salient")
            )
        )
    ));

    
    vc_map( array(
        "name" => __("Collaboration Card", "salient"),
        "base" => "collaboration_card_shortcode", 
        "category" => __("FOO Studio", "salient"),
        "params" => array(
            array(
                'type' => 'param_group',
                'heading' => __('Card Items', 'salient'),
                'param_name' => 'card-items',
                'params' => array(
                    array(
                        "type" => "textfield",
                        "heading" => __("Card Title", "salient"),
                        "param_name" => "title",
                        "description" => __("Enter the card title.", "salient")
                    ),
                    array(
                        "type" => "textfield",
                        "heading" => __("Card Subtitle", "salient"),
                        "param_name" => "sub-title",
                         "description" => __("Enter the card subtitle.", "salient")
                    ),
                    array(
                        "type" => "textarea",
                        "heading" => __("Card Description", "salient"),
                        "param_name" => "card-description",
                        "description" => __("Enter the card description.", "salient")
                    ),
                    array(
                        "type" => "attach_image",
                        "heading" => __("Card Image", "salient"),
                        "param_name" => "card-image",
                        "description"=> __("Add Card Image", "salient")
                    )
                )
            )
        )
    ));
    vc_map( array(
        "name" => __("Single Post Header", "salient"),
        "base" => "single_post_header_shortcode", 
        "category" => __("FOO Studio", "salient"),
        "params" => array(
            array(
                'type' => 'textfield',
                'heading' => __('Extra Class', 'salient'),
                'param_name' => 'extra-class',
                'description' => __('Enter any extra CSS classes for styling.', 'salient')              
                
            )
        )
    ));


    vc_map( array(
        "name" => __("Single Portfolio Header", "salient"),
        "base" => "single_portfolio_header_shortcode", 
        "category" => __("FOO Studio", "salient"),
        "params" => array(
            array(
                'type' => 'textfield',
                'heading' => __('Extra Class', 'salient'),
                'param_name' => 'extra-class',
                'description' => __('Enter any extra CSS classes for styling.', 'salient')              
                
            )
        )
    ));


}


// /**
//  * Add Salient Navigation Transparency & Page Header settings to Custom Post Types
//  */
// function salient_child_add_cpt_metaboxes( $post_types ) {
    
//     // Add your CPT slugs to this array
//     $my_cpts = array( 'development', 'property', 'portfolio', 'post' );

//     return array_merge( $post_types, $my_cpts );
// }



// // 1. For Navigation Transparency settings
// add_filter( 'nectar_metabox_post_types_navigation_transparency', 'salient_child_add_cpt_metaboxes', 10, 1 );

// // 2. For Page Header settings (Background image, height, etc)
// add_filter( 'nectar_metabox_post_types_page_header', 'salient_child_add_cpt_metaboxes' );

// // 3. For Post Header settings (Specific to the "Single Post" look)
// add_filter( 'nectar_metabox_post_types_post_header', 'salient_child_add_cpt_metaboxes' );



add_shortcode( 'featured_work_shortcode', 'featured_work_shortcode_callback' );

function featured_work_shortcode_callback( $atts ) {
    ob_start();


    $atts = shortcode_atts( array(
        'extra-class' => '',
        'number-of-posts' => 3,
        'portfolio-page' => '',
    ), $atts, 'featured_work_shortcode' );


    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $atts['number-of-posts'] ? $atts['number-of-posts'] : 3,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
    );

    $portfolio_class = '';

    if( $atts['portfolio-page'] ) {
        $portfolio_class = 'portfolio-page';
    }

    $query = new WP_Query( $args );

    if( $query->have_posts() ) {
        echo '<div class="featured-work-wrapper ' . esc_attr( $atts['extra-class'] ) . ' ' . esc_attr( $portfolio_class ) . '">';
            while( $query->have_posts() ) {
                $query->the_post();
                $featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                echo '<div class="featured-work-item" style="background-image: url(' . esc_url( $featured_image_url ) . ');">';
                    echo '<div class="featured-work-content">';
                        echo '<div class="contentdetails">';
                        echo '<h3 class="featured-work-title">' . get_the_title() . '</h3>';
                        echo '<p class="featured-work-description">' . get_the_excerpt() . '</p>';
                        echo '</div>';
                        echo '<div class="content-cta">';
                        echo '<a href="' . get_permalink() . '" class="featured-work-link">View case study</a>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';
    } else {
        echo 'No featured work found.';
    }

    // echo 'featured_work_shortcode_callback';
    return ob_get_clean();
}


add_shortcode( 'foo_toggler_shortcode', 'foo_toggler_shortcode_callback' );

function foo_toggler_shortcode_callback( $atts ) {
    ob_start();

    $atts = shortcode_atts( array(
        'toggle-items' => '',
        'extra-class' => '',
    ), $atts, 'foo_toggler_shortcode' );

    $toggle_items = vc_param_group_parse_atts( $atts['toggle-items'] );
    $extra_class = $atts['extra-class'];
    // var_dump($toggle_items);

    echo '<div class="foo-toggler-wrapper ' . esc_attr( $extra_class ) . '">';
    foreach ( $toggle_items as $key => $item  ) {
        
        $toggle_icon = get_stylesheet_directory_uri() . '/images/plus.png';
        // if($key === 0) {
        //     $toggle_icon = get_stylesheet_directory_uri() . '/images/minus.png';
        // }
        $decimal_key = sprintf( '%02d', $key + 1 );

        // $active_class = $key === 0 ? 'active' : '';
        $active_class = 'active';

        if($active_class == 'active') {
            $toggle_icon = get_stylesheet_directory_uri() . '/images/minus.png';
        }
        
        echo '<div class="foo-toggler-item ' . $active_class . '">';
        echo '<div class="foo-toggler-header">';
        echo '<div class="foo-toggler-title">';
        echo '<span class="number">(' . $decimal_key . ')</span>' . '<h4 class="title">' . esc_html( $item['title'] ) . '</h4>';
        echo '</div>';
        echo '<div class="toggle-icon">';
        echo '<img src="' . $toggle_icon . '" alt="Toggle Icon">';
        echo '</div>';
        echo '</div>';
        echo '<div class="foo-toggler-content">';
        echo '<div class="foo-toggler-content-wrapper">';
        echo '<div class="foo-toggler-content-left">';
        echo '<h5 class="content-title">' . esc_html( $item['content-title'] ) . '</h5>';
        echo '<div class="content-description">';
        echo '<div class="first-column">';
        echo '<p>' . esc_html( $item['first-column-description'] ) . '</p>';
        echo '</div>';
        echo '<div class="second-column">';
        echo '<p>' . esc_html( $item['second-column-description'] ) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="foo-toggler-content-right">';
        if ( ! empty( $item['first-content-image'] ) ) {
            $first_image_url = wp_get_attachment_image_url( $item['first-content-image'], 'full' );
            echo '<div class="content-image first">';
            echo '<img src="' . esc_url( $first_image_url ) . '" alt="First Content Image">';
            echo '</div>';
        }
        if ( ! empty( $item['second-content-image'] ) ) {
            $second_image_url = wp_get_attachment_image_url( $item['second-content-image'], 'full' );
            echo '<div class="content-image second">';
            echo '<img src="' . esc_url( $second_image_url ) . '" alt="Second Content Image">';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';




    // echo 'foo_toggler_shortcode_callback';
    return ob_get_clean();
}



add_shortcode( 'collaboration_card_shortcode', 'collaboration_card_shortcode_callback' );

function collaboration_card_shortcode_callback( $atts ) {
    ob_start();

    $atts = shortcode_atts( array(
        'card-items' => '',
    ), $atts, 'collaboration_card_shortcode' );

    $card_items = vc_param_group_parse_atts( $atts['card-items'] );

    // var_dump($card_items);

    echo '<div class="collaboration-card-wrapper">';
    foreach ( $card_items as $item  ) {
        echo '<div class="collaboration-card-item">';
        echo '<div class="collaboration-card-image">';
        if ( ! empty( $item['card-image'] ) ) {
            $card_image_url = wp_get_attachment_image_url( $item['card-image'], 'full' );
            echo '<img src="' . esc_url( $card_image_url ) . '" alt="Card Image">';
        }
        echo '</div>';
        echo '<div class="collaboration-card-content">';
        echo '<h3 class="card-title">' . esc_html( $item['title'] ) . '</h3>';
        echo '<h4 class="card-subtitle">' . esc_html( $item['sub-title'] ) . '</h4>';
        echo '<p class="card-description">' . esc_html( $item['card-description'] ) . '</p>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';

    // echo 'collaboration_card_shortcode_callback';
    return ob_get_clean();
}

add_shortcode( 'single_post_header_shortcode', 'single_post_header_shortcode_callback' );

function single_post_header_shortcode_callback($atts) {
    ob_start();


    echo '<div class="foo-single-post-header">';
    echo '<h1 class="single-post-header">' . get_the_title() . '</h1>';
    echo '<div class="post-meta">';
    echo '<div class="post-author">';
    echo '<div class="author-image">';
    echo get_avatar( get_the_author_meta( 'ID' ), 50 );
    echo '</div>';
    echo '<div class="author-meta">';
    echo '<span class="title">Words</span>';
    echo '<span class="author">' . get_the_author() . '</span>';
    echo '</div>';
    echo '</div>';
    echo '<div class="post-date">';
    echo '<span class="title">Published</span>';
    echo '<span class="date">' . get_the_date() . '</span>';
    echo '</div>';
    echo '</div>';
    return ob_get_clean();
}

add_shortcode('single_portfolio_header_shortcode', 'single_portfolio_header_shortcode_callback');

function single_portfolio_header_shortcode_callback($atts) {
    ob_start();

    echo '<div class="foo-single-portfolio-header" style="background-image: url(' . get_the_post_thumbnail_url() . ')">';
    echo '<div class="bison-container">';
    echo '<div class="single-portfolio-header-content">';
    echo '<h1 class="single-portfolio-header">' . get_the_title() . '</h1>';
    echo '<div class="post-description">';
    echo '<p>' . get_the_excerpt() . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    return ob_get_clean();
}