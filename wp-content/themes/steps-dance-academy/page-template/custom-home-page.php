<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'steps_dance_academy_above_slider' ); ?>

	<?php if( get_theme_mod('steps_dance_academy_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel" data-ride="carousel"> 
			    <?php $steps_dance_academy_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'steps_dance_academy_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $steps_dance_academy_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($steps_dance_academy_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $steps_dance_academy_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
			        	<div class="slider-img">
            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
            			</div>
			            <div class="inner-carousel">
			              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			              	<p><?php $steps_dance_academy_excerpt = get_the_excerpt(); echo esc_html( steps_dance_academy_string_limit_words( $steps_dance_academy_excerpt,20 ) ); ?></p>
			              	<a href="<?php the_permalink(); ?>" class="read-btn"><?php esc_html_e('Read More','steps-dance-academy'); ?><span class="screen-reader-text"><?php esc_html_e('Read More','steps-dance-academy'); ?></span></a>
	            		</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
		      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','steps-dance-academy' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','steps-dance-academy' );?></span>
			    </a>
			</div>
			<div class="social-icons text-center">
				<?php if(get_theme_mod('steps_dance_academy_topheader_facebook_url')) {?>
					<a href="<?php echo esc_url(get_theme_mod('steps_dance_academy_topheader_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'steps-dance-academy'); ?></span></a>
				<?php }?>
				<?php if(get_theme_mod('steps_dance_academy_topheader_twitter_url')) {?>
					<a href="<?php echo esc_url(get_theme_mod('steps_dance_academy_topheader_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'steps-dance-academy'); ?></span></a>
				<?php }?>
				<?php if(get_theme_mod('steps_dance_academy_topheader_instagram_url')) {?>
					<a href="<?php echo esc_url(get_theme_mod('steps_dance_academy_topheader_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'steps-dance-academy'); ?></span></a>
				<?php }?>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('steps_dance_academy_below_slider'); ?>

	<?php if( get_theme_mod('steps_dance_academy_services_category') != ''){ ?>
		<section id="services-section">
			<div class="container">
	            <div class="row">
		      		<?php $steps_dance_academy_catData1 =  get_theme_mod('steps_dance_academy_services_category');
	  				if($steps_dance_academy_catData1){ 
						$args = array(
							'post_type' => 'post',
							'category_name' => esc_html($steps_dance_academy_catData1 ,'steps-dance-academy'),
				          'posts_per_page' => get_theme_mod('steps_dance_academy_service_number', 3)
				        );
				        $i=1;
				        $page_query = new WP_Query( $args);?>
		        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
		          			<div class="col-lg-4 col-md-4 px-md-0">
		          				<div class="services-box">
	          						<?php the_post_thumbnail(); ?>
			      					<div class="service-content">
			      						<i class="<?php echo esc_attr(get_theme_mod('steps_dance_academy_service_icon' . $i, 'fas fa-music')); ?>"></i>
					            		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					            	</div>
		          				</div>
						    </div>
		          		<?php $i++; endwhile; 
		          		wp_reset_postdata();
		      		}?>
	      		</div>
				<div class="clearfix"></div>
			</div>
		</section>
	<?php }?>

	<?php do_action('steps_dance_academy_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>