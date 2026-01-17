<?php
/*
Template Name: Contact Page
*/

get_header();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_contact'])) {
    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $to      = 'ivaldesdev@gmail.com';
    $subject = 'New Message from Portfolio Contact Form';
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

    // ✅ Use get_permalink and exit immediately after
    wp_redirect(get_permalink() . '?success=true');
    exit;
}

?>
<div class="content-box">
<main class="contact-page">
  <h1>Contact Me</h1>
	
	<?php if (isset($_GET['success']) && $_GET['success'] === 'true') : ?>
	  <p class="success-message">Message sent successfully!</p>
	<?php elseif (isset($_GET['error'])) : ?>
	  <p class="error-message">Please fill in all fields.</p>
	<?php endif; ?>

  <?php /* if (isset($_GET['success']) && $_GET['success'] === 'true') : ?>
    <p class="success-message">Message sent successfully!</p>
  <?php endif; */?>

  <form method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
	  <input type="hidden" name="action" value="send_contact_form">

	  <label for="name">Name:</label>
	  <input type="text" id="name" name="name" required>

	  <label for="email">Email:</label>
	  <input type="email" id="email" name="email" required>

	  <label for="message">Message:</label>
	  <textarea id="message" name="message" rows="5" required></textarea>

	  <button type="submit">Send Message</button>
	</form>

</main>
</div>
<?php get_footer(); ?>
