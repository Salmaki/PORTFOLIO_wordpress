<?php
/**
 * Displays main header
 *
 * @package Cooking Master Class
 */
?>
<?php
$cooking_master_class_sticky_header = get_theme_mod('cooking_master_class_sticky_header');
    $cooking_master_class_data_sticky = "false";
    if ($cooking_master_class_sticky_header) {
    $cooking_master_class_data_sticky = "true";
    }
?>
<div class="main-header text-center py-2" data-sticky="<?php echo esc_attr($cooking_master_class_data_sticky); ?>">
    <div class="container">
        <div class="row nav-box">
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6 col-12 align-self-center">
                <div class="logo-box">
                    <div class="navbar-brand ">
                        <?php if ( has_custom_logo() ) : ?>
                            <div class="site-logo"><?php the_custom_logo(); ?></div>
                        <?php endif; ?>
                        <?php $cooking_master_class_blog_info = get_bloginfo( 'name' ); ?>
                            <?php if ( ! empty( $cooking_master_class_blog_info ) ) : ?>
                                <?php if ( is_front_page() && is_home() ) : ?>
                                    <?php if( get_theme_mod('cooking_master_class_logo_title_text',true) != ''){ ?>
                                        <h1 class="site-title pt-2"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    <?php } ?>
                                <?php else : ?>
                                    <?php if( get_theme_mod('cooking_master_class_logo_title_text',true) != ''){ ?>
                                        <p class="site-title "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                    <?php } ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php
                                $cooking_master_class_description = get_bloginfo( 'description', 'display' );
                                if ( $cooking_master_class_description || is_customize_preview() ) :
                            ?>
                            <?php if( get_theme_mod('cooking_master_class_theme_description',false) != ''){ ?>
                                <p class="site-description pb-2"><?php echo esc_html($cooking_master_class_description); ?></p>
                            <?php } ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 col-md-2 col-sm-1 col-12 align-self-center header-box">
                <?php get_template_part('template-parts/navigation/nav'); ?>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-5 col-sm-5 col-12 align-self-center header-right-box">
                <span class="cart_no">
                    <?php if(class_exists('woocommerce')){ ?>
                        <div class="user-account">
                            <?php if ( is_user_logged_in() ) { ?>
                                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','cooking-master-class'); ?>"><i class="fas fa-user me-2"></i><?php esc_html_e('My Account','cooking-master-class'); ?></a>
                            <?php }
                            else { ?>
                                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','cooking-master-class'); ?>"><i class="fas fa-sign-in-alt me-2"></i><?php esc_html_e('Login / Register','cooking-master-class'); ?></a>
                            <?php } ?>
                        </div>
                    <?php }?>
                </span>
                <span class="cart_no">
                    <?php if(class_exists('woocommerce')){ ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','cooking-master-class' ); ?>"><i class="fas fa-shopping-cart me-2"></i><?php esc_html_e('Cart','cooking-master-class'); ?></a>
                    <?php }?>
                </span>
            </div>
        </div>
    </div>
</div>
