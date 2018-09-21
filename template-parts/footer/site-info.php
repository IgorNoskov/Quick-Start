<?php
/**
 * Template part for site info
 *
 * This is the template that displays site copyright
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage quick-start
 * @since 1.0.0
 * @version 1.0.0
 */

/**
 * File Security Check.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="site-info">
	<?php echo '&copy; ', date( 'Y' ), "\n"; ?>
    <span id="js-footerSiteInfo">
        <?php echo get_theme_mod( 'theme_customizer_site_info', 'All rights reserved.' ); ?>
    </span>
</div>
