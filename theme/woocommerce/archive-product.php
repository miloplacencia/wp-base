<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 * 
 * Template Name: Categorias
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="syb-banner-bienvenida mb-48">
  <img src="<?php echo get_template_directory_uri(); ?>/img/header_PRODUCTOS.png" width="1350" height="201" alt="Bienvenidos a Sano y Bueno" />
</div>
<div class="syb-prodcat__container container">
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
// do_action( 'woocommerce_before_main_content' );
woocommerce_output_content_wrapper();
// WC_Structured_Data::generate_website_data();

  /**
   * Hook: woocommerce_before_shop_loop.
   *
   * @hooked woocommerce_output_all_notices - 10
   * @hooked woocommerce_result_count - 20
   * @hooked woocommerce_catalog_ordering - 30
   */
  ?>
  <div class="syb-prodcat__filters">
    <?php
      woocommerce_breadcrumb();
      woocommerce_output_all_notices();
      // woocommerce_result_count();
      woocommerce_catalog_ordering();
      // do_action( 'woocommerce_before_shop_loop' );
    ?>
  </div>
  <div class="syb-prodcat__container-grid">
    <div class="syb-prodcat__cats-container">
      <button class="syb-prodcat__sidebar-btn">
        <span class="">Ver todos los productos</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
      </button>
      
      <div class="syb-sidebar__menu-container">
        <ul class="syb-sidebar__menu">
          <?php
            $terms = get_terms( array(
              'taxonomy' => 'product_cat',
              'hide_empty' => false,
            ));

            foreach($terms as $key => $term):
              if ($key > 0):
              $link = get_term_link($term->term_id, 'product_cat');
          ?> 
            <li class="menu-item">
              <a href="<?php echo $link; ?>"><?php echo $term->name; ?></a>
            </li>
          <?php endif; endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="syb-prodcat__grid">
    <?php
    // woocommerce_product_loop_start();

    if ( woocommerce_product_loop() ) {

    if ( wc_get_loop_prop( 'total' ) ) {
      while ( have_posts() ) {
        the_post();

        /**
         * Hook: woocommerce_shop_loop.
         */
        // do_action( 'woocommerce_shop_loop' );

        wc_get_template_part( 'content', 'product' );
      }
    }
      /**
      * Hook: woocommerce_after_shop_loop.
      *
      * @hooked woocommerce_pagination - 10
      */
      do_action( 'woocommerce_after_shop_loop' );

    } else {
      /**
       * Hook: woocommerce_no_products_found.
       *
       * @hooked wc_no_products_found - 10
       */
    ?>
    <div class="col-span-4">
      <?php wc_no_products_found(); ?>
    </div>
    <?php }

    // woocommerce_product_loop_end();
    ?>
    </div>
  </div>

  <?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>
  <div class="syb-prodcat__caracs-container">
    <?php get_template_part('template-caracteristicas'); ?>
  </div>
</div>
<?php
get_footer( 'shop' );
