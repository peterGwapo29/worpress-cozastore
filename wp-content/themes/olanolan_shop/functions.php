<?php
/**
 * Cleaned olanolan_shop functions and definitions
 *
 * @package olanolan_shop
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

/* ---------------------------------------------------------------------------
 * Theme setup
 * --------------------------------------------------------------------------- */
if ( ! function_exists( 'olanolan_shop_setup' ) ) {
	function olanolan_shop_setup() {
		load_theme_textdomain( 'olanolan_shop', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'olanolan_shop' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'olanolan_shop_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
}
add_action( 'after_setup_theme', 'olanolan_shop_setup' );

/* ---------------------------------------------------------------------------
 * Content width
 * --------------------------------------------------------------------------- */
function olanolan_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'olanolan_shop_content_width', 640 );
}
add_action( 'after_setup_theme', 'olanolan_shop_content_width', 0 );

/* ---------------------------------------------------------------------------
 * Widgets
 * --------------------------------------------------------------------------- */
function olanolan_shop_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'olanolan_shop' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'olanolan_shop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'olanolan_shop_widgets_init' );

/* ---------------------------------------------------------------------------
 * Enqueue styles & scripts (properly registered with dependencies)
 * --------------------------------------------------------------------------- */
function olanolan_shop_scripts() {
	$ver = _S_VERSION;

	/* --- Styles --- */
	wp_enqueue_style( 'olanolan_shop-style', get_stylesheet_uri(), array(), $ver );
	wp_style_add_data( 'olanolan_shop-style', 'rtl', 'replace' );

	// Vendor & theme styles
	wp_enqueue_style( 'olanolan-favicon', get_template_directory_uri() . '/assets/images/icons/favicon.png', array(), $ver );
	wp_enqueue_style( 'olanolan-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), $ver );
	wp_enqueue_style( 'olanolan-fontawesome', get_template_directory_uri() . '/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css', array(), $ver );
	wp_enqueue_style( 'olanolan-material-iconic', get_template_directory_uri() . '/assets/fonts/iconic/css/material-design-iconic-font.min.css', array(), $ver );
	wp_enqueue_style( 'olanolan-linearicons', get_template_directory_uri() . '/assets/fonts/linearicons-v1.0.0/icon-font.min.css', array(), $ver );
	wp_enqueue_style( 'olanolan-animate', get_template_directory_uri() . '/assets/vendor/animate/animate.css', array(), $ver );
	wp_enqueue_style( 'olanolan-hamburgers', get_template_directory_uri() . '/assets/vendor/css-hamburgers/hamburgers.min.css', array(), $ver );
	wp_enqueue_style( 'olanolan-animsition', get_template_directory_uri() . '/assets/vendor/animsition/css/animsition.min.css', array(), $ver );
	wp_enqueue_style( 'olanolan-select2', get_template_directory_uri() . '/assets/vendor/select2/select2.min.css', array(), $ver );
	wp_enqueue_style( 'olanolan-daterangepicker', get_template_directory_uri() . '/assets/vendor/daterangepicker/daterangepicker.css', array(), $ver );
	wp_enqueue_style( 'olanolan-slick', get_template_directory_uri() . '/assets/vendor/slick/slick.css', array(), $ver );
	wp_enqueue_style( 'olanolan-magnific-popup', get_template_directory_uri() . '/assets/vendor/MagnificPopup/magnific-popup.css', array(), $ver );
	wp_enqueue_style( 'olanolan-perfect-scrollbar', get_template_directory_uri() . '/assets/vendor/perfect-scrollbar/perfect-scrollbar.css', array(), $ver );
	wp_enqueue_style( 'olanolan-util', get_template_directory_uri() . '/assets/css/util.css', array(), $ver );
	wp_enqueue_style( 'olanolan-main', get_template_directory_uri() . '/assets/css/main.css', array(), $ver );

	/* --- Scripts --- */
	// Load WP's jQuery (no custom replacement).
	wp_enqueue_script( 'jquery' );

	// Navigation script (if you use it) - keep in footer
	wp_enqueue_script( 'olanolan-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $ver, true );

	// Vendor scripts (all loaded in footer)
	wp_enqueue_script( 'olanolan-animsition', get_template_directory_uri() . '/assets/vendor/animsition/js/animsition.min.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-popper', get_template_directory_uri() . '/assets/vendor/bootstrap/js/popper.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', array( 'jquery', 'olanolan-popper' ), $ver, true );
	wp_enqueue_script( 'olanolan-select2', get_template_directory_uri() . '/assets/vendor/select2/select2.min.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-moment', get_template_directory_uri() . '/assets/vendor/daterangepicker/moment.min.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-daterangepicker', get_template_directory_uri() . '/assets/vendor/daterangepicker/daterangepicker.js', array( 'jquery', 'olanolan-moment' ), $ver, true );
	wp_enqueue_script( 'olanolan-slick', get_template_directory_uri() . '/assets/vendor/slick/slick.min.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-slick-custom', get_template_directory_uri() . '/assets/js/slick-custom.js', array( 'olanolan-slick' ), $ver, true );
	wp_enqueue_script( 'olanolan-parallax100', get_template_directory_uri() . '/assets/vendor/parallax100/parallax100.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-magnific-popup', get_template_directory_uri() . '/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-isotope', get_template_directory_uri() . '/assets/vendor/isotope/isotope.pkgd.min.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-sweetalert', get_template_directory_uri() . '/assets/vendor/sweetalert/sweetalert.min.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-perfect-scrollbar', get_template_directory_uri() . '/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js', array( 'jquery' ), $ver, true );
	wp_enqueue_script( 'olanolan-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $ver, true );

	// Add inline initializers AFTER the script they depend on is enqueued.
	// Select2 initializer depends on select2
	$select2_init = <<<JS
        jQuery(function($){
            $(".js-select2").each(function(){
                $(this).select2({
                    minimumResultsForSearch: 20,
                    dropdownParent: $(this).next('.dropDownSelect2')
                });
            });
        });
JS;
	wp_add_inline_script( 'olanolan-select2', $select2_init );

	// Parallax initializer
	$parallax_init = <<<JS
        jQuery(function($){
            if ( typeof $.fn.parallax100 !== 'undefined' ) {
                $('.parallax100').parallax100();
            }
        });
JS;
	wp_add_inline_script( 'olanolan-parallax100', $parallax_init );

	// Magnific popup initializer
	$magnific_init = <<<JS
        jQuery(function($){
            $('.gallery-lb').each(function() {
                $(this).magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery: { enabled:true },
                    mainClass: 'mfp-fade'
                });
            });
        });
JS;
	wp_add_inline_script( 'olanolan-magnific-popup', $magnific_init );

	// SweetAlert wishlist/cart initializer
	$sweetalert_init = <<<JS
jQuery(function($){
	$('.js-addwish-b2').on('click', function(e){
		e.preventDefault();
	});

	$('.js-addwish-b2').each(function(){
		var nameProduct = $(this).closest('.some-product-wrapper').find('.js-name-b2').html() || $(this).parent().parent().find('.js-name-b2').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to wishlist !", "success");
			$(this).addClass('js-addedwish-b2');
			$(this).off('click');
		});
	});

	$('.js-addwish-detail').each(function(){
		var nameProduct = $(this).closest('.product-detail-wrapper').find('.js-name-detail').html() || $(this).parent().parent().parent().find('.js-name-detail').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to wishlist !", "success");
			$(this).addClass('js-addedwish-detail');
			$(this).off('click');
		});
	});

	$('.js-addcart-detail').each(function(){
		var nameProduct = $(this).closest('.product-detail-wrapper').find('.js-name-detail').html() || $(this).parent().parent().parent().parent().find('.js-name-detail').html();
		$(this).on('click', function(){
			swal(nameProduct, "is added to cart !", "success");
		});
	});
});
JS;
	wp_add_inline_script( 'olanolan-sweetalert', $sweetalert_init );

	// PerfectScrollbar initializer
	$ps_init = <<<JS
jQuery(function($){
	$('.js-pscroll').each(function(){
		$(this).css('position','relative');
		$(this).css('overflow','hidden');
		if ( typeof PerfectScrollbar !== 'undefined' ) {
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});
			$(window).on('resize', function(){ ps.update(); });
		}
	});
});
JS;
	wp_add_inline_script( 'olanolan-perfect-scrollbar', $ps_init );

	// comment-reply (if needed)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'olanolan_shop_scripts', 20 );

/* ---------------------------------------------------------------------------
 * Shortcodes (cleaned & escaped where appropriate)
 * I kept the markup close to your original structure but cleaned formatting.
 * --------------------------------------------------------------------------- */

function olanolan_shop_carousel_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts'   => 3,
			'order'   => 'DESC',
			'orderby' => 'date',
		),
		$atts,
		'carousel'
	);

	$args = array(
		'post_type'      => 'carousel',
		'posts_per_page' => intval( $atts['posts'] ),
		'order'          => sanitize_text_field( $atts['order'] ),
		'orderby'        => sanitize_text_field( $atts['orderby'] ),
	);

	$query = new WP_Query( $args );

	ob_start();
	if ( $query->have_posts() ) : ?>
		<section class="section-slide">
			<div class="wrap-slick1">
				<div class="slick1">
					<?php while ( $query->have_posts() ) : $query->the_post();
						$bg_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
						if ( ! $bg_image ) {
							$bg_image = get_template_directory_uri() . '/images/default-slide.jpg';
						}
					?>
						<div class="item-slick1" style="background-image: url('<?php echo esc_url( $bg_image ); ?>');">
							<div class="container h-full">
								<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
									<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
										<span class="ltext-101 cl2 respon2"><?php echo esc_html( get_the_title() ); ?></span>
									</div>

									<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
										<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1"><?php echo wp_kses_post( get_the_content() ); ?></h2>
									</div>

									<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
										<a href="http://localhost/olanolan_shop/?page_id=68" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
											<?php echo esc_html( get_field( 'shopnow' ) ?: 'Shop Now' ); ?>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	<?php
	endif;
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'carousel', 'olanolan_shop_carousel_shortcode' );

function olanolan_shop_product_categories_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts'   => 3,
			'order'   => 'ASC',
			'orderby' => 'date',
		),
		$atts,
		'product-categories'
	);

	$args = array(
		'post_type'      => 'product-categories',
		'posts_per_page' => intval( $atts['posts'] ),
		'order'          => sanitize_text_field( $atts['order'] ),
		'orderby'        => sanitize_text_field( $atts['orderby'] ),
	);

	$query = new WP_Query( $args );
	ob_start();
	if ( $query->have_posts() ) : ?>
		<div class="row">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<div class="block1 wrap-pic-w">
						<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8"><?php echo esc_html( get_the_title() ); ?></span>
								<span class="block1-info stext-102 trans-04"><?php echo wp_kses_post( get_the_content() ); ?></span>
							</div>
							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09"><?php echo esc_html( get_field( 'button_category' ) ); ?></div>
							</div>
						</a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif;
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'product_categories', 'olanolan_shop_product_categories_shortcode' );

function olanolan_shop_blog_item_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts'   => 3,
			'order'   => 'ASC',
			'orderby' => 'date',
		),
		$atts,
		'item-blog'
	);

	$args = array(
		'post_type'      => 'item-blog',
		'posts_per_page' => intval( $atts['posts'] ),
		'order'          => sanitize_text_field( $atts['order'] ),
		'orderby'        => sanitize_text_field( $atts['orderby'] ),
	);

	$query = new WP_Query( $args );
	ob_start();
	if ( $query->have_posts() ) : ?>
		<div class="row">
			<div class="col-md-8 col-lg-9 p-b-80">
				<div class="p-r-45 p-r-0-lg">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="p-b-63">
							<a href="blog-detail.html" class="hov-img0 how-pos5-parent">
								<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
								<div class="flex-col-c-m size-123 bg9 how-pos5">
									<span class="ltext-107 cl2 txt-center"><?php echo esc_html( get_field( 'date' ) ); ?></span>
									<span class="stext-109 cl3 txt-center"><?php echo esc_html( get_field( 'month' ) ); ?></span>
								</div>
							</a>

							<div class="p-t-32">
								<h4 class="p-b-15"><a href="blog-detail.html" class="ltext-108 cl2 hov-cl1 trans-04"><?php echo esc_html( get_the_title() ); ?></a></h4>
								<p class="stext-117 cl6"><?php echo wp_kses_post( get_the_content() ); ?></p>

								<div class="flex-w flex-sb-m p-t-18">
									<span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
										<span><span class="cl4">By</span> Admin <span class="cl12 m-l-4 m-r-6">|</span></span>
										<span>StreetStyle, Fashion, Couple <span class="cl12 m-l-4 m-r-6">|</span></span>
										<span>8 Comments</span>
									</span>

									<a href="#" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10"><?php echo esc_html( get_field( 'blog_button' ) ); ?><i class="fa fa-long-arrow-right m-l-9"></i></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	<?php endif;
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'item-blog', 'olanolan_shop_blog_item_shortcode' );

function olanolan_shop_about_content_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts'   => 3,
			'order'   => 'ASC',
			'orderby' => 'date',
		),
		$atts,
		'about-content'
	);

	$args = array(
		'post_type'      => 'about-content',
		'posts_per_page' => intval( $atts['posts'] ),
		'order'          => sanitize_text_field( $atts['order'] ),
		'orderby'        => sanitize_text_field( $atts['orderby'] ),
	);

	$query = new WP_Query( $args );
	ob_start();
	if ( $query->have_posts() ) : ?>
		<div class="row p-b-148">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16"><?php echo esc_html( get_the_title() ); ?></h3>
						<p class="stext-113 cl6 p-b-26"><?php echo wp_kses_post( get_the_content() ); ?></p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif;
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'about-content', 'olanolan_shop_about_content_shortcode' );

function olanolan_shop_blog_shortcode() {
	$args = array( 'post_type' => 'blog' );
	$query = new WP_Query( $args );
	ob_start();
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post(); ?>
			<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
				<h2 class="ltext-105 cl0 txt-center"><?php echo esc_html( get_the_title() ); ?></h2>
			</section>
		<?php endwhile;
	endif;
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'blog', 'olanolan_shop_blog_shortcode' );

function olanolan_shop_about_shortcode() {
	$args = array( 'post_type' => 'about' );
	$query = new WP_Query( $args );
	ob_start();
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post(); ?>
			<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
				<h2 class="ltext-105 cl0 txt-center"><?php echo esc_html( get_the_title() ); ?></h2>
			</section>
		<?php endwhile;
	endif;
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'about', 'olanolan_shop_about_shortcode' );

function olanolan_shop_contact_shortcode() {
	$args = array( 'post_type' => 'contact' );
	$query = new WP_Query( $args );
	ob_start();
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post(); ?>
			<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>');">
				<h2 class="ltext-105 cl0 txt-center"><?php echo esc_html( get_the_title() ); ?></h2>
			</section>
		<?php endwhile;
	endif;
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'contact', 'olanolan_shop_contact_shortcode' );

function olanolan_shop_contact_details_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts'   => -1,
			'order'   => 'ASC',
			'orderby' => 'date',
		),
		$atts,
		'contact-details'
	);

	$args = array(
		'post_type'      => 'contact-details',
		'posts_per_page' => intval( $atts['posts'] ),
		'order'          => sanitize_text_field( $atts['order'] ),
		'orderby'        => sanitize_text_field( $atts['orderby'] ),
	);

	$query = new WP_Query( $args );
	ob_start();
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post(); ?>
			<div class="flex-w w-full p-b-42">
				<span class="fs-18 cl5 txt-center size-211">
					<?php if ( has_post_thumbnail() ) : ?>
						<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="contact-icon" style="width:24px; height:24px; object-fit:contain;">
					<?php endif; ?>
				</span>

				<div class="size-212 p-t-2">
					<span class="mtext-110 cl2"><?php echo esc_html( get_the_title() ); ?></span>
					<p class="stext-115 cl6 size-213 p-t-18"><?php echo wp_kses_post( get_the_content() ); ?></p>
				</div>
			</div>
		<?php endwhile;
	endif;
	wp_reset_postdata();
	return ob_get_clean();
}
add_shortcode( 'contact_details', 'olanolan_shop_contact_details_shortcode' );

/* ---------------------------------------------------------------------------
 * Include other theme files if required (kept as in original)
 * --------------------------------------------------------------------------- */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* End of functions.php */


