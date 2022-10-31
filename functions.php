<?php

/**
 * Theme setup.
 */
function tailpress_setup()
{
    add_theme_support('title-tag');

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'tailpress'),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        )
    );

    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');

    add_theme_support('editor-styles');
    add_editor_style('css/editor-style.css');
}

add_action('after_setup_theme', 'tailpress_setup');

require 'inc/navigation.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts()
{
    $theme = wp_get_theme();

    wp_enqueue_style('tailpress', tailpress_asset('css/app.css'), array(), $theme->get('Version'));
    wp_enqueue_script('tailpress', tailpress_asset('js/app.js'), array(), $theme->get('Version'));
}

add_action('wp_enqueue_scripts', 'tailpress_enqueue_scripts');

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset($path)
{
    if (wp_get_environment_type() === 'production') {
        return get_stylesheet_directory_uri() . '/' . $path;
    }

    return add_query_arg('time', time(),  get_stylesheet_directory_uri() . '/' . $path);
}

/**
 * Add page and post slugs to body class
 */

function add_slug_body_class($classes)
{
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'add_slug_body_class');



/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class($classes, $item, $args, $depth)
{
    if (isset($args->li_class)) {
        $classes[] = $args->li_class;
    }

    if (isset($args->{"li_class_$depth"})) {
        $classes[] = $args->{"li_class_$depth"};
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4);

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class($classes, $args, $depth)
{
    if (isset($args->submenu_class)) {
        $classes[] = $args->submenu_class;
    }

    if (isset($args->{"submenu_class_$depth"})) {
        $classes[] = $args->{"submenu_class_$depth"};
    }

    return $classes;
}

add_filter('nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3);


//Defer parsing of JS
// function defer_parsing_of_js($url)
// {
//     if (is_user_logged_in()) return $url; //don't break WP Admin
//     if (FALSE === strpos($url, '.js')) return $url;
//     if (strpos($url, 'jquery.js')) return $url;
//     return str_replace(' src', ' defer src', $url);
// }
// add_filter('script_loader_tag', 'defer_parsing_of_js', 10);


if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Thema Opties',
        'menu_title'    => 'Thema Opties',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Navigatie',
        'menu_title'    => 'Navigatie',
        'parent_slug'    => 'theme-general-settings',
    ));

    // acf_add_options_sub_page(array(
    // 	'page_title' 	=> 'Theme Footer Settings',
    // 	'menu_title'	=> 'Footer',
    // 	'parent_slug'	=> 'theme-general-settings',
    // ));

}

function remove_editor()
{
    remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');


add_filter('wpcf7_autop_or_not', '__return_false');


//redirect non-admins to the coming soon page
// function coming_soon_redirect()
// {
// 	global $pagenow;

// 	if (!current_user_can('manage_options') && !is_page("login") && !is_page("coming-soon") && $page_now != "wp-login.php") {
// 		wp_redirect(home_url("coming-soon"));
// 		exit;
// 	}
// }
// add_action('template_redirect', 'coming_soon_redirect');

remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);


function get_breadcrumb()
{
    global $post;
    if (is_category() || is_single()) {
        the_category(' / ');
        if (is_single()) {
            echo ' / ';
            the_title();
        }
    } elseif (is_page()) {
        if ($post->post_parent) {
            $anc = get_post_ancestors($post->ID);
            $title = get_the_title();
            foreach ($anc as $ancestor) {
                $output = '<a class="uppercase text-xs inline" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a> <p class="text-xs inline">></p>';
                // $output = '<p class="uppercase text-xs inline" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</p> <p class="text-xs inline">></p>';
            }
            echo $output;
            echo '<p class="uppercase text-xs inline" title="' . $title . '"> ' . $title . '</p>';
        } else {
            echo '<span class="text-[11px] uppercase"> ' . get_the_title() . '</span>';
        }
    } elseif (is_tag()) {
        single_tag_title();
    } elseif (is_day()) {
        echo "Archive for ";
        the_time('F jS, Y');
    } elseif (is_month()) {
        echo "Archive for ";
        the_time('F, Y');
    } elseif (is_year()) {
        echo "Archive for ";
        the_time('Y');
    } elseif (is_author()) {
        echo "Author Archive";
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
        echo "Blog Archives";
    } elseif (is_search()) {
        echo "Search Results";
    }
}

add_filter('woocommerce_form_field', 'herman_checkout_fields_in_label_error', 10, 4);

function herman_checkout_fields_in_label_error($field, $key, $args, $value)
{
    if (strpos($field, '</label>') !== false && $args['required']) {
        $error = '<span class="error" style="display:none">';
        $error .= sprintf(__('%S IS A REQUIRED FIELD.', 'woocommerce'), $args['label']);
        $error .= '</span>';
        $field = substr_replace($field, $error, strpos($field, '</label>'), 0);
    }
    return $field;
}

add_filter('woocommerce_account_menu_items', 'herman_rename_address_my_account', 9999);

function herman_rename_address_my_account($items)
{

    $items['edit-account'] = 'ACCOUNT DETAILS';
    $items['orders'] = 'ORDERS';
    $items['edit-address'] = 'DELIVERY ADDRESS';
    $items['customer-logout'] = 'LOGOUT';

    unset($items['dashboard']);
    unset($items['edit-address']);
    unset($items['subscriptions']);
    unset($items['downloads']);

    return $items;
}
// Insert the content of the Addresses tab into an existing tab (edit-account in this case)

add_action('woocommerce_account_edit-account_endpoint', 'woocommerce_account_edit_address');

// Add to cart message disabled
// add_filter('wc_add_to_cart_message_html', '__return_false');

/**
 * Change the default country on the checkout for non-existing users only
 */
add_filter('default_checkout_billing_country', 'change_default_checkout_country', 10, 1);

function change_default_checkout_country($country)
{
    // If the user already exists, don't override country
    if (WC()->customer->get_is_paying_customer()) {
        return $country;
    }

    return 'NL'; // Override default to Netherlands
}

add_action('woocommerce_register_form_start', 'herman_add_name_woo_account_registration');

function herman_add_name_woo_account_registration()
{
?>

    <p class="form-row form-row-first">

        <input type="text" class="input-text woocommerce-invalid-required-field" name="billing_first_name" id="reg_billing_first_name" placeholder="NAME" required class="peer border border-slate-400" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
        <!-- <p class="invisible peer-invalid:visible text-red-700 font-light">
                Please enter your name
            </p> -->
    </p>

    <p class="form-row form-row-last">
        <input type="text" class="input-text woocommerce-invalid-required-field" name="billing_last_name" id="reg_billing_last_name" required class="peer border border-slate-400" placeholder="SURNAME" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
        <!-- <p class="invisible peer-invalid:visible text-red-700 font-light">
                Please enter your surname
            </p> -->
    </p>

    <div class="clear"></div>

    <?php
}

///////////////////////////////
// 2. VALIDATE FIELDS

add_filter('woocommerce_registration_errors', 'herman_validate_name_fields', 10, 3);

function herman_validate_name_fields($errors, $username, $email)
{
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
        $errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
        $errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
    }
    if (isset($_POST['billing_country']) && empty($_POST['billing_country'])) {
        $errors->add('billing_country_error', __('<strong>Error</strong>: Country is required!.', 'woocommerce'));
    }
    return $errors;
}

///////////////////////////////
// 3. SAVE FIELDS

add_action('woocommerce_created_customer', 'herman_save_name_fields');

function herman_save_name_fields($customer_id)
{
    if (isset($_POST['billing_first_name'])) {
        update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
        update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
    }
    if (isset($_POST['billing_last_name'])) {
        update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
        update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
    }
    if (isset($_POST['billing_country'])) {
        update_user_meta($customer_id, 'billing_country', sanitize_text_field($_POST['billing_country']));
        update_user_meta($customer_id, 'shipping_country', sanitize_text_field($_POST['shipping_country']));
    }
}

/**
 * Add new register fields for WooCommerce registration.
 */
function wooc_extra_register_fields()
{

    wp_enqueue_script('wc-country-select');

    woocommerce_form_field('billing_country', array(
        'type'      => 'country',
        'class'     => array('chzn-drop'),
        'placeholder' => __('CHOOSE YOUR COUNTRY'),
        'required'  => true,
        'clear'     => true,
        'default'     => 'NL'
    ));
}
add_action('woocommerce_register_form_start', 'wooc_extra_register_fields');

add_filter('woocommerce_registration_redirect', 'custom_redirection_after_registration', 10, 1);
function custom_redirection_after_registration($redirection_url)
{
    // Change the redirection Url
    $redirection_url = get_permalink(get_option('woocommerce_myaccount_page_id'));

    return $redirection_url; // Always return something
}

function filter_woocommerce_add_notice($message)
{
    // Equal to (Must be exactly the same).
    // If the message is displayed in another language, adjust where necessary!
    if ($message == 'Checkout is not available whilst your cart is empty.') {
        return false;
    }

    return $message;
}
add_filter('woocommerce_add_notice', 'filter_woocommerce_add_notice', 10, 1);

// ===========================================================================
//  Redirect Empty Checkout to Shop 
// ===========================================================================

add_action('template_redirect', 'redirection_function');

function redirection_function()
{
    global $woocommerce;

    if (is_checkout() && 0 == sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'herman'), $woocommerce->cart->cart_contents_count) && !isset($_GET['key'])) {
        wp_safe_redirect(get_permalink(woocommerce_get_page_id('shop')));
        exit;
    }
}

add_filter('woocommerce_form_field', 'bbloomer_checkout_fields_in_label_error', 10, 4);

function bbloomer_checkout_fields_in_label_error($field, $key, $args, $value)
{
    if (strpos($field, '</label>') !== false && $args['required']) {
        $error = '<span class="error" style="display:none">';
        $error .= sprintf(__('%s is a required field.', 'woocommerce'), $args['label']);
        $error .= '</span>';
        $field = substr_replace($field, $error, strpos($field, '</label>'), 0);
    }
    return $field;
}
add_action('woocommerce_register_form', 'herman_add_registration_privacy_policy', 11);

function herman_add_registration_privacy_policy()
{

    woocommerce_form_field('privacy_policy_reg', array(
        'type'          => 'checkbox',
        'class'         => array('form-row privacy'),
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true,
        'label'         => 'I AGREE TO RECEIVE NEWS, STYLE TIPS AND MARKETING INFORMATION',
    ));
}

// Show error if user does not tick

add_filter('woocommerce_registration_errors', 'herman_validate_privacy_registration', 10, 3);

function herman_validate_privacy_registration($errors, $username, $email)
{
    if (!is_checkout()) {
        if (!(int) isset($_POST['privacy_policy_reg'])) {
            $errors->add('privacy_policy_reg_error', __('POLICY CONSENT IS REQUIRED', 'woocommerce'));
        }
    }
    return $errors;
}

add_action('wp_footer', 'teleport_container', 999);
function teleport_container()
{
    if (is_product()) : // Only for archives pages
    ?>

        <div id="teleport-container"></div>
<?php
    endif;
}


function redirect_to_holding()
{
    $holding_page = get_page_by_path('coming-soon');
    if (($holding_page != NULL) && ($holding_page->post_status == 'publish')) {
        /* We have a holding page */
        $current_page = get_post();

        if ($holding_page != $current_page) {
            /* not trying to display the holding page so ok to redirect to holding page */
            if (current_user_can('delete_users') == false) {
                /* we are not logged on to an admin account */
                wp_redirect(get_permalink($holding_page));
                exit;
            }
        }
    }
}
add_action( 'get_header', 'redirect_to_holding')


add_action('woocommerce_after_order_itemmeta', 'add_item_color', 10, 3);
add_action('woocommerce_order_item_meta_end', 'add_item_color', 10, 3);

function add_item_color($item_id, $item, $product)
{
    $item_color = get_field('color', $item['product_id'])[0];


    if ($item['product_id'] && $item_color) {
        echo '<span style="color:#888;font-weight:bold;font-size:12px;">COLOR: </span><span style="color:#888;font-size:12px;">' . $item_color . '</span>';
    }
}
