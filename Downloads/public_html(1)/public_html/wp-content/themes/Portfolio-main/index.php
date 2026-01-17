<?php get_header(); ?>

<main class="site-main">
<!--
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-content">
          <?php the_excerpt(); ?>
        </div>

        <footer class="entry-footer">
          <p>Posted on <?php the_date(); ?> by <?php the_author(); ?></p>
        </footer>
      </article>
    <?php endwhile; ?>

    <div class="pagination">
      <?php the_posts_navigation(); ?>
    </div>

  <?php else : ?>
    <section class="no-results">
      <h2>No content found</h2>
      <p>Sorry, there are no posts to show right now.</p>
    </section>
  <?php endif; ?>
-->



</main>

<?php// get_sidebar(); ?>
<?php get_footer(); ?>
