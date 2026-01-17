<?php

if (!session_id()) {
    session_start();
}

function portfolio_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'portfolio_theme_setup');

function portfolio_theme_scripts() {
  wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'portfolio_theme_scripts');

// Redirect wp-login.php attempts to custom login page
function redirect_login_page() {
  $login_page = home_url('/login/');
  $page_viewed = basename($_SERVER['REQUEST_URI']);

  if ($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] === 'GET') {
    wp_redirect($login_page);
    exit;
  }
}
add_action('init', 'redirect_login_page');

// Remove Admin bar for non-admins
function remove_admin_bar_for_non_admins() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
add_action('after_setup_theme', 'remove_admin_bar_for_non_admins');

function create_custom_users_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'custom_users';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100) NOT NULL UNIQUE,
        password TEXT NOT NULL,
        is_admin BOOLEAN DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
add_action('after_setup_theme', 'create_custom_users_table');

function insert_default_admin_user() {
    global $wpdb;
    $table = $wpdb->prefix . 'custom_users';
    $email = 'ivaldesdev@gmail.com';
    $password = 'Genesis1:1';

    $existing = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table WHERE email = %s", $email));

    if ($existing == 0) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $wpdb->insert($table, [
            'email' => $email,
            'password' => $hashed_password,
            'is_admin' => 1
        ]);
    }
}
add_action('after_setup_theme', 'insert_default_admin_user');

add_filter('show_admin_bar', '__return_false');

function handle_custom_contact_form() {
    if (!isset($_POST['name'], $_POST['email'], $_POST['message'])) {
        wp_redirect(home_url('/contact/?error=missing'));
        exit;
    }

    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $to      = 'ivaldesdev@gmail.com';
    $subject = 'New Contact Form Message';
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $email
    ];
    $body    = "
        <h2>New Contact Message</h2>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Message:</strong><br>{$message}</p>
    ";

    wp_mail($to, $subject, $body, $headers);

    wp_redirect(home_url('/contact/?success=true'));
    exit;
}
add_action('admin_post_nopriv_send_contact_form', 'handle_custom_contact_form');
add_action('admin_post_send_contact_form', 'handle_custom_contact_form');

/* mail test */ 
add_action('init', function () {
    if (isset($_GET['test_mail'])) {
        wp_mail('ivaldesdev@gmail.com', 'Test Email', 'This is a test email from WordPress.');
        echo 'Test email sent.';
        exit;
    }
});

/*Habit Tracker
add_action( 'init', 'add_habit_tracker_page' );
function add_habit_tracker_page() {
  $slug = 'habit-tracker';
  $title = 'Habit Tracker App';
  $content = '';
  $parent_id = get_option( 'page_on_front' );
  $menu_order = 5; // set a higher value for the menu order if you want this page to appear before other pages
  $post_status = 'publish';
  $post_type = 'page';
  $post_author = get_current_user_id();
  
  wp_insert_post( array(
    'post_title' => $title,
    'post_content' => $content,
    'post_status' => $post_status,
    'post_type' => $post_type,
    'post_author' => $post_author,
    'menu_order' => $menu_order,
  ) );
  
  update_option( 'page_on_front', $parent_id );
}*/

?>
