<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
do_action( 'woocommerce_before_account_navigation' );
?>

<!-- Modern Navigation Styles -->
<style>
    .woocommerce-MyAccount-navigation {
        margin-bottom: 30px;
    }

    .woocommerce-MyAccount-navigation ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex; /* horizontal nav; change to column for vertical */
        gap: 15px;
        flex-wrap: wrap;
    }

    .woocommerce-MyAccount-navigation li {
        flex: 1;
    }

    .woocommerce-MyAccount-navigation a {
        display: block;
        padding: 12px 20px;
        background-color: #f9f9f9;
        color: #333;
        text-decoration: none;
        font-weight: 600;
        border-radius: 10px;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .woocommerce-MyAccount-navigation a:hover {
        background-color: #ff6600;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .woocommerce-MyAccount-navigation .is-active a,
    .woocommerce-MyAccount-navigation a[aria-current="page"] {
        background-color: #ff6600;
        color: #fff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
</style>

<nav class="woocommerce-MyAccount-navigation" aria-label="<?php esc_html_e( 'Account pages', 'woocommerce' ); ?>">
	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" <?php echo wc_is_current_account_menu_item( $endpoint ) ? 'aria-current="page"' : ''; ?>>
					<?php echo esc_html( $label ); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
