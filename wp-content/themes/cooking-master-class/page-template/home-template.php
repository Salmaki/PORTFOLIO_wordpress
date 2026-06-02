<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
<?php if (get_theme_mod( 'cooking_master_class_slider_section_setting','' )) { ?>
  <section id="top-slider">
    <div class="container">
      <?php $cooking_master_class_slide_pages = array();
        for ( $cooking_master_class_count = 1; $cooking_master_class_count <= 3; $cooking_master_class_count++ ) {
          $cooking_master_class_mod = intval( get_theme_mod( 'cooking_master_class_top_slider_page' . $cooking_master_class_count ));
          if ( 'page-none-selected' != $cooking_master_class_mod ) {
            $cooking_master_class_slide_pages[] = $cooking_master_class_mod;
          }
        }
        if( !empty($cooking_master_class_slide_pages) ) :
          $cooking_master_class_args = array(
            'post_type' => 'page',
            'post__in' => $cooking_master_class_slide_pages,
            'orderby' => 'post__in'
          );
          $cooking_master_class_query = new WP_Query( $cooking_master_class_args );
          if ( $cooking_master_class_query->have_posts() ) :
            $i = 1;
        ?>
        <div class="owl-carousel" role="listbox">
          <?php  while ( $cooking_master_class_query->have_posts() ) : $cooking_master_class_query->the_post(); ?>
            <div class="slide-box">
              <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-12 align-self-center">
                  <div class="slider-inner-box">
                    <?php if(get_theme_mod('cooking_master_class_slider_video_button_url') != ''){ ?>
                      <span class="slide-video-btn">
                        <!-- Button to open the modal -->
                        <a id="openModalButton" data-modal-src="<?php echo esc_url(get_theme_mod('cooking_master_class_slider_video_button_url')); ?>"><i class="fab fa fa-play"></i>
                          <?php esc_html_e('WATCH VIDEO','cooking-master-class') ?></a>
                        <!-- The modal -->
                        <div id="myModal" class="modal">
                          <!-- Modal content -->
                          <div class="modal-content">
                            <span id="closeModalButton" class="close">&times;</span>
                            <?php if( get_theme_mod('cooking_master_class_slider_video_button_url') != ''){ ?>
                            <embed id="videoPlayer" height="369" src="<?php echo esc_url(get_theme_mod('cooking_master_class_slider_video_button_url')); ?>"  allow="accelerometer; autoplay; classipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></embed>
                            <?php }else{ ?>
                              <h3><?php esc_html_e('Add Video Url In Customizer To Display Video Here','cooking-master-class'); ?></h3>
                            <?php } ?>
                          </div>
                        </div> 
                      </span>
                    <?php } ?>
                    <?php if(get_theme_mod('cooking_master_class_slider_title_setting',1) == 1){ ?>
                      <h3 class="m-0"><?php the_title(); ?></h3>
                    <?php }?>
                    <?php if(get_theme_mod('cooking_master_class_slider_content_setting',1) == 1){ ?>
                      <p class="content mt-3 mb-4 pb-2"><?php echo esc_html( wp_trim_words( get_the_content(), esc_attr(get_theme_mod('cooking_master_class_slider_excerpt_length', 20)) )); ?></p>
                    <?php }?>
                    <span class="slide-btn1 mt-4 me-3">
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','cooking-master-class'); ?></a>
                    </span>
                    <?php if(get_theme_mod('cooking_master_class_slider_button_url') != '' || get_theme_mod('cooking_master_class_slider_button_text') != ''){ ?>
                      <span class="slide-btn mt-4">
                        <a href="<?php echo esc_url( get_theme_mod('cooking_master_class_slider_button_url') ); ?>"><?php echo esc_html( get_theme_mod('cooking_master_class_slider_button_text') ); ?><i class="fas fa-chevron-right ms-2"></i></a>
                      </span>
                    <?php }?>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 align-self-center">
                   <?php if (has_post_thumbnail()) { ?><img class="sider-img" src="<?php the_post_thumbnail_url('full'); ?>" /><?php } else { ?><div class="slide-bg"></div> <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
      </div>
  </section>
<?php }?>

<?php if (get_theme_mod( 'cooking_master_class_product_section_setting','' )) { ?>
  <section id="product" class="py-5">
    <div class="container">
      <div class="heading text-center">
        <?php if ( get_theme_mod('cooking_master_class_product_section_heading') != "" ) {?>
          <h3 class="main_heading m-3"><?php echo esc_html(get_theme_mod('cooking_master_class_product_section_heading')); ?>
          </h3>
        <?php }?>
        <?php if ( get_theme_mod('cooking_master_class_product_section_sub_heading') != "" ) {?>
          <p class="mb-4"><?php echo esc_html(get_theme_mod('cooking_master_class_product_section_sub_heading')); ?>
          </p>
        <?php }?>
      </div>
    </div>
      <div class="product-box py-5">
        <div class="container">
          <div class="owl-carousel product-home-box">
            <?php
            if ( class_exists( 'WooCommerce' ) ) {
              $cooking_master_class_args = array(
                'post_type' => 'product',
                'posts_per_page' => get_theme_mod('cooking_master_class_home_product_per_page', 4),
                'product_cat' => get_theme_mod('cooking_master_class_home_product'),
                'order' => 'ASC'
              );
              $loop = new WP_Query( $cooking_master_class_args );
              while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                <div class="products-box">
                  <div class="product-image">
                    <a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"> <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(wc_placeholder_img_src()).'" />'; ?></a>
                      <?php if(class_exists('YITH_WCWL')){ ?>
                        <span class="wishlist"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></span>
                      <?php }?>
                  </div>
                  <div class="product-content pt-3 text-center">
                    <h3 class="mb-2"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                    <div class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> m-0"><?php echo $product->get_price_html(); ?></div>
                    <div class="cart-btn mt-3 mb-2"><?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?></div>
                  </div>
                </div>
              <?php endwhile; wp_reset_postdata(); ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
  <section id="page-content">
    <div class="container">
      <div class="py-5">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>