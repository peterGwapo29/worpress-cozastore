<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Modern Dashboard Styles -->
<style>
    .myaccount-dashboard p {
        font-family: 'Arial', sans-serif;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        margin-bottom: 20px;
        padding: 15px;
        background-color: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .myaccount-dashboard p:hover {
        background-color: #fff3e0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .myaccount-dashboard a {
        color: #ff6600;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.3s ease, transform 0.2s ease;
    }

    .myaccount-dashboard a:hover {
        color: #e55b00;
        transform: translateY(-2px);
    }

    .myaccount-dashboard strong {
        color: #222;
    }
</style>

<div class="myaccount-dashboard">
    <p>
        <?php
        printf(
            wp_kses(
                __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
                array( 'a' => array( 'href' => array() ) )
            ),
            '<strong>' . esc_html( $current_user->display_name ) . '</strong>',
            esc_url( wc_logout_url() )
        );
        ?>
    </p>

    <p>
        <?php
        $dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
        if ( wc_shipping_enabled() ) {
            $dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
        }
        printf(
            wp_kses(
                $dashboard_desc,
                array( 'a' => array( 'href' => array() ) )
            ),
            esc_url( wc_get_endpoint_url( 'orders' ) ),
            esc_url( wc_get_endpoint_url( 'edit-address' ) ),
            esc_url( wc_get_endpoint_url( 'edit-account' ) )
        );
        ?>
    </p>

    <?php
    do_action( 'woocommerce_account_dashboard' );
    do_action( 'woocommerce_before_my_account' );
    do_action( 'woocommerce_after_my_account' );
    ?>
</div>
