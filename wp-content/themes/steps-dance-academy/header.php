<?php
/**
 * The header for our theme
 *
 * @subpackage Steps Dance Academy
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'steps-dance-academy' ); ?></a>

<div id="header">
	<div class="topbar py-3">
		<div class="container">
			<div class="row">
				<div class="offset-lg-6 offset-md-4 col-lg-3 col-md-4">
					<?php if(get_theme_mod('steps_dance_academy_topheader_email')) {?>
						<a href="mailto:<?php echo esc_attr(get_theme_mod('steps_dance_academy_topheader_email')); ?>"><p class="callno mb-md-0 text-md-right text-center"><i class="fas fa-envelope"></i><?php echo esc_html(get_theme_mod('steps_dance_academy_topheader_email')); ?></p><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('steps_dance_academy_topheader_email')); ?></span></a>
					<?php }?>
				</div>
				<div class="col-lg-3 col-md-4">
					<?php if(get_theme_mod('steps_dance_academy_topheader_phone_no')) {?>
						<a href="tel:<?php echo esc_attr(get_theme_mod('steps_dance_academy_topheader_phone_no')); ?>"><p class="callno mb-0 text-md-right text-center"><i class="fas fa-phone"></i><?php echo esc_html(get_theme_mod('steps_dance_academy_topheader_phone_no')); ?></p><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('steps_dance_academy_topheader_phone_no')); ?></span></a>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-header">
		<div class="container">
			<div class="menu-section">
				<div class="row mx-md-0">
					<div class="col-lg-3 col-md-4 col-9 align-self-center">
						<div class="logo">
							<?php if ( has_custom_logo() ) : ?>
			            		<?php the_custom_logo(); ?>
				            <?php endif; ?>
			             	<?php if (get_theme_mod('steps_dance_academy_show_site_title',true)) {?>
			          			<?php $blog_info = get_bloginfo( 'name' ); ?>
				                <?php if ( ! empty( $blog_info ) ) : ?>
				                  	<?php if ( is_front_page() && is_home() ) : ?>
				                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				                  	<?php else : ?>
			                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			                  		<?php endif; ?>
				                <?php endif; ?>
				            <?php }?>
				            <?php if (get_theme_mod('steps_dance_academy_show_tagline',true)) {?>
				                <?php
			                  		$description = get_bloginfo( 'description', 'display' );
				                  	if ( $description || is_customize_preview() ) :
				                ?>
			                  	<p class="site-description">
			                    	<?php echo esc_attr($description); ?>
			                  	</p>
			              		<?php endif; ?>
			          		<?php }?>
						</div>
					</div>
					<div class="col-lg-8 col-md-6 col-3 align-self-center">
						<div class="toggle-menu responsive-menu">
							<?php if(has_nav_menu('primary')){ ?>
				            	<button onclick="steps_dance_academy_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','steps-dance-academy'); ?></span></button>
				            <?php }?>
				        </div>
						<div id="sidelong-menu" class="nav sidenav">
			                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'steps-dance-academy' ); ?>">
			                  	<?php if(has_nav_menu('primary')){
				                    wp_nav_menu( array( 
										'theme_location' => 'primary',
										'container_class' => 'main-menu-navigation clearfix' ,
										'menu_class' => 'clearfix',
										'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
										'fallback_cb' => 'wp_page_menu',
				                    ) ); 
			                  	} ?>
			                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="steps_dance_academy_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','steps-dance-academy'); ?></span></a>
			                </nav>
			            </div>
					</div>
					<div class="col-lg-1 col-md-2 text-md-right text-center pl-md-0 align-self-center">
						<span class="search-box">
							<button  onclick="steps_dance_academy_search_open()" class="search-toggle"><i class="fas fa-search"></i></button>
						</span>
						<?php if(class_exists('woocommerce')){ ?>
						    <span class="cart_icon position-relative">
						        <a class="cart-contents" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-bag"></i></a>
					            <li class="cart_box">
					              <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
					            </li>
						    </span>
						<?php } ?>
					</div>
				</div>
				<div class="search-outer">
					<div class="search-inner">
			        	<?php get_search_form(); ?>
		        	</div>
		        	<button onclick="steps_dance_academy_search_close()" class="search-close"><i class="fas fa-times"></i></button>
		        </div>
			</div>
		</div>
	</div>
</div>