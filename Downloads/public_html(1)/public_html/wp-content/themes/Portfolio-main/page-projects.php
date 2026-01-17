<?php
/*
Template Name: Projects
*/

get_header();
?>
<div class="content-box">
  <!-- Page content here -->


<main class="projects-page">
  <h1>My Projects</h1>
  <p>Below is a curated list of my past and current projects. Each one represents a unique challenge and learning opportunity in my journey as a developer.</p>

  <section class="project-list">
    <!-- Example Project 1 -->
    <div class="project">
      <h2><a href="<?php echo site_url('/home'); ?>">Responsive Portfolio Website</a></h2>
      <p>A fully responsive, mobile-friendly portfolio site built using HTML5, CSS3, PHP, and WordPress. This site includes a contact form and links to all of my projects.</p>
      <p><strong>Status:</strong> Present</p>
    </div>

    <!-- Example Project 2 -->
    <div class="project">
      <h2><a href="<?php echo site_url('/rock-paper-scissors'); ?>">Rock Paper Scissors Bot</a></h2>
      <p>Developed a small game of Rock Paper Scissors which is capable of learning from the player's moves and adapting gameplay using Python.</p>
      <p><strong>Status:</strong> Past</p>
    </div>

    <!-- Example Project 3 -->
  
	<div class="project">
      <h2><a href="https://ivaldesdev-ops.github.io/habit-tracker-app/" target="_blank">Habit Tracker App →</a></h2>
      <p>Developed a small habit tracking app using React, TypeScript, and NodeJS</p>
      <p><strong>Status:</strong> Present</p>
    </div>
	  
	

    <!-- Add more projects as needed -->
  </section>
</main>
</div>

<?php
get_footer();
?>
