
<?php get_header() ?>
<main id="main" class="pagina-single container">
  <h1 class="titulo-seccion"><?php the_title(); ?></h1>
  
  <?php if (have_posts(  )): while(have_posts()): the_post(); ?>
  <?php the_content(); ?>
  
  <?php endwhile; endif; ?>
</main>

<?php get_footer() ?>