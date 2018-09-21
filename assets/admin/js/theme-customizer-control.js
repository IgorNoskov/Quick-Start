/**
 *
 * Theme Customizer enhancements for controls
 *
 * @since 1.0.0
 */
(function ($) {

    wp.customize.bind('ready', function () {

        /**
         * Example required field.
         *
         * @since 1.0.0
         */
        wp.customize('theme_customizer_text_input_field', function (setting) {
            setting.bind(function (value) {
                var code = 'required';

                if (value.length === 0) {
                    setting.notifications.add(code, new wp.customize.Notification(
                        code,
                        {
                            type: 'error',
                            message: window.theme_admin_vars.i18n.error_input_required,
                        }
                    ));
                } else {
                    setting.notifications.remove(code);
                }
            });
        });

    });

})(jQuery);