<?php
/*
Template Name: Login Page
*/

global $wpdb;
$table = $wpdb->prefix . 'custom_users';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    $user = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE email = %s", $email));

    if ($user && password_verify($password, $user->password)) {
        session_start();
        $_SESSION['custom_user'] = [
            'email' => $user->email,
            'is_admin' => $user->is_admin
        ];
        if ($user->is_admin) {
            wp_redirect(home_url('/admin-dashboard'));
        } else {
            wp_redirect(home_url('/user-dashboard'));
        }
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}

get_header(); ?>
<main>
    <h2>Login</h2>
    <?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">

        <!-- registration button -->

        <p>Don't have an account?</p>
        <a href="<?php echo site_url('/Register'); ?>">
            <button type="button">Create an Account</button>
        </a>

    </form>
</main>
<?php get_footer(); ?>
