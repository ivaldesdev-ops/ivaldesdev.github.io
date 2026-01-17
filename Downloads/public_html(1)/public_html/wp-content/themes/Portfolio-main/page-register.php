<?php
/*
Template Name: Register Page
*/

global $wpdb;
$table = $wpdb->prefix . 'custom_users';
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];

    if (!is_email($email)) {
        $error = "Invalid email format.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters.";
    } else {
        $exists = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $table WHERE email = %s", $email));
        if ($exists > 0) {
            $error = "User already exists.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $wpdb->insert($table, [
                'email' => $email,
                'password' => $hashed_password
            ]);
            $success = "Account created! You can now log in.";
        }
    }
}

get_header(); ?>

<h2>Register</h2>

<?php if ($error): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php elseif ($success): ?>
<p style="color:green;"><?php echo $success; ?></p>
<?php endif; ?>

<form method="POST">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required minlength="8"><br><br>
    <input type="submit" value="Register">
</form>

<?php get_footer(); ?>
