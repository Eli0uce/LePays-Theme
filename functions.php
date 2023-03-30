<?php

// Add custom menus
function register_my_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Menu principal'),
            'footer-menu' => __('Menu du pied de page'),
        )
    );
}
add_action('init', 'register_my_menus');

// Add a custom post type
function my_custom_post_type()
{
    register_post_type(
        'produit',
        array(
            'labels' => array(
                'name' => __('Produits'),
                'singular_name' => __('Produit')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail'
            )
        )
    );
}
add_action('init', 'my_custom_post_type');

// Add a custom logo
function theme_setup()
{
    add_theme_support('custom-logo', array(
        'height'      => 'auto',
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}
add_action('after_setup_theme', 'theme_setup');


// Add a custom image size
function my_image_size()
{
    add_image_size('mon_format', 800, 600, true);
}
add_action('after_setup_theme', 'my_image_size');

// Disable admin bar for non-admins
function disable_admin_bar()
{
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'disable_admin_bar');

// Add a custom widget
function my_widget()
{
    register_sidebar(array(
        'name' => __('Mes widgets', 'montheme'),
        'id' => 'my-widget',
        'description' => __('Zone de widget personnalisée', 'montheme'),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'my_widget');

function customize_carousel($wp_customize)
{
    // Ajouter une section personnalisée pour les images de carousel
    $wp_customize->add_section('montheme_carousel_section', array(
        'title' => __('Carousel Images', 'montheme'),
        'description' => __('Customize the carousel images.', 'montheme'),
        'priority' => 30,
    ));

    // Ajouter un champ de personnalisation pour la première image du carousel
    $wp_customize->add_setting('montheme_carousel_image1');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'montheme_carousel_image1', array(
        'label' => __('Carousel Image 1', 'montheme'),
        'section' => 'montheme_carousel_section',
        'settings' => 'montheme_carousel_image1',
    )));

    // Ajouter un champ de personnalisation pour la deuxième image du carousel
    $wp_customize->add_setting('montheme_carousel_image2');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'montheme_carousel_image2', array(
        'label' => __('Carousel Image 2', 'montheme'),
        'section' => 'montheme_carousel_section',
        'settings' => 'montheme_carousel_image2',
    )));

    // Ajouter un champ de personnalisation pour la troisième image du carousel
    $wp_customize->add_setting('montheme_carousel_image3');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'montheme_carousel_image3', array(
        'label' => __('Carousel Image 3', 'montheme'),
        'section' => 'montheme_carousel_section',
        'settings' => 'montheme_carousel_image3',
    )));
}

add_action('customize_register', 'customize_carousel');

// Add a custom category
$category_name = 'Sports';
$category_slug = 'sports';
$category_description = 'Catégorie des articles de sports';

// Add a custom category
$category_name = 'Cultures';
$category_slug = 'cultures';
$category_description = 'Catégorie des articles de cultures';

// Add a custom category
$category_name = 'Evenements à venir';
$category_slug = 'evenements-a-venir';
$category_description = 'Catégorie des articles des evenements à venir';

// check if the category already exists
if (!term_exists($category_name, 'category')) {
    wp_insert_term(
        $category_name,  // name of the category
        'category',  // taxonomy
        array(
            'slug' => $category_slug, // slug of the category
            'description' => $category_description, // description of the category
        )
    );
}

// Add sections to the customizer
function contact_options($wp_customize)
{
    $wp_customize->add_section('montheme_contact_section', array(
        'title' => __('Informations de contact', 'montheme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('montheme_phone_number', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('montheme_phone_number', array(
        'label' => __('Numéro de téléphone', 'montheme'),
        'section' => 'montheme_contact_section',
        'priority' => 10,
        'type' => 'text',
    ));

    $wp_customize->add_setting('montheme_email_address', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('montheme_email_address', array(
        'label' => __('Adresse email', 'montheme'),
        'section' => 'montheme_contact_section',
        'priority' => 20,
        'type' => 'email',
    ));

    $wp_customize->add_setting('montheme_address', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('montheme_address', array(
        'label' => __('Adresse postale', 'montheme'),
        'section' => 'montheme_contact_section',
        'priority' => 30,
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'contact_options');


// Display contact info
function montheme_display_contact_info()
{
    $phone_number = get_theme_mod('montheme_phone_number');
    $email_address = get_theme_mod('montheme_email_address');
    $address = get_theme_mod('montheme_address');

    if ($phone_number || $email_address || $address) {
        echo '<div class="contact-info">';
        if ($phone_number) {
            echo '<p><i class="fa fa-phone"></i> ' . esc_html($phone_number) . '</p>';
        }
        if ($email_address) {
            echo '<p><i class="fa fa-envelope"></i> <a href="mailto:' . esc_attr($email_address) . '">' . esc_html($email_address) . '</a></p>';
        }
        if ($address) {
            echo '<p><i class="fa fa-map-marker"></i> ' . nl2br(esc_html($address)) . '</p>';
        }
        echo '</div>';
    }
}

// Add custom menu items
function contact_menu_items()
{
    add_menu_page('Messages de Contact', 'Messages de Contact', 'manage_options', 'messages-de-contact', 'display_contact_messages');
}
add_action('admin_menu', 'contact_menu_items');

// display contact messages
function display_contact_messages()
{
    // Récupération des valeurs du formulaire
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    // Affichage des valeurs
    echo "<p>Nom complet : $name</p>";
    echo "<p>Adresse email : $email</p>";
    echo "<p>Téléphone : $phone</p>";
    echo "<p>Sujet : $subject</p>";
    echo "<p>Message : $message</p>";
}
add_action('admin_post_nopriv_custom_contact_form', 'display_contact_messages');

// Add a custom sidebar
function custom_sidebar()
{
    register_sidebar(array(
        'name'          => __('Custom Sidebar', 'textdomain'),
        'id'            => 'custom-sidebar',
        'description'   => __('Add widgets here to appear in your custom sidebar.', 'textdomain'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'custom_sidebar');

// Add a custom filter to the custom category template
add_filter('template_include', 'wpse_category_template');

// Add a custom category template
function wpse_category_template($template)
{
    if (is_category('evenements-a-venir')) {
        $new_template = locate_template(array('category-coming.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}
add_action('pre_get_posts', 'wpse_category_template');
