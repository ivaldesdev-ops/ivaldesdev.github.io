<?php
/*
Template Name: Admin Dashboard
*/

if (!is_user_logged_in() || wp_get_current_user()->user_email !== 'ivaldesdev@gmail.com') {
    wp_redirect(home_url('/login'));
    exit;
}

get_header(); ?>

<main>
  <section class="admin-dashboard">
    <h2>Admin Task Manager</h2>
    <p>Welcome, admin! This is your task management interface.</p>
    <!-- Embed or link to your task app here -->
  </section>
</main>

<?php get_footer(); ?>
