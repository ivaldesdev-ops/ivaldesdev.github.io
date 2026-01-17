<?php
/*
Template Name: User Dashboard
*/

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login'));
    exit;
}

get_header(); ?>

<main>
  <section class="user-dashboard">
    <h2>User Dashboard</h2>
    <p>Welcome! You’ll see the status of messages you've sent here.</p>
    <!-- Add message tracking content here -->
  </section>
</main>

<?php get_footer(); ?>
