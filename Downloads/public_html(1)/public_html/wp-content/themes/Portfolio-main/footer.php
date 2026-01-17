<footer>
  <p>&copy; <?php echo date('Y'); ?> Isaac Valdes Development. All rights reserved.</p>
</footer>

</div>

<?php wp_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const hamburger = document.querySelector('.hamburger');
  const navMenu = document.querySelector('.nav-menu');

  hamburger.addEventListener('click', () => {
    navMenu.classList.toggle('active');
  });
});
</script>

</body>
</html>

