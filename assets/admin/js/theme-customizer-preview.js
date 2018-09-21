/**
 *
 * Theme Customizer enhancements for a better user experience
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
(function ($) {

    /**
     * Toggles site info.
     *
     * @since 1.0.0
     */
    wp.customize('header_text', function (value) {
        value.bind(function (to) {
            if (to) {
                $('#js-headerSiteInfo').show();
            } else {
                $('#js-headerSiteInfo').hide();
            }
        });
    });

    /**
     * Changes site name.
     *
     * @since 1.0.0
     */
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('#js-siteName').text(to);
        });
    });
    /**
     * Changes site description.
     *
     * @since 1.0.0
     */
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('#js-siteDescription').text(to);
        });
    });

    /**
     * Changes site info.
     *
     * @since 1.0.0
     */
    wp.customize('theme_customizer_site_info', function (value) {
        value.bind(function (to) {
            $('#js-footerSiteInfo').text(to);
        });
    });

})(jQuery);
