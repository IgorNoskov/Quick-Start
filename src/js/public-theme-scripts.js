/**
 * Theme scripts
 *
 * Creates Mobile menu, ajax-loading posts.
 *
 * @since 1.0.0
 */
;(function ($, window, document, undefined) {
    'use strict';

    /**
     * Primary Navigation.
     *
     * @since 1.0.0
     */
    const primaryNavigation = $('#js-primaryNavigation');

    /**
     * Creates and inserts Site Overlay.
     *
     * @since 1.0.0
     */
    const siteOverlay = $('<div id="js-siteOverlay" class="site-overlay"></div>').insertAfter('#js-site');

    if (primaryNavigation.length) {
        /**
         * Adds button for navigation items with submenu.
         *
         * @since 1.0.0
         */
        primaryNavigation.find('.menu-item-has-children').each(function () {
            $(this).append('<button type="button" class="menu-item__button js-showSubmenu">&rsaquo;</button>');
        });

        /**
         * Adds button for navigation submenus.
         *
         * @since 1.0.0
         */
        primaryNavigation.find('.sub-menu').each(function () {
            $(this).append('<button type="button" class="sub-menu__button js-closeSubmenu">&lsaquo;</button>');
        });

        /**
         * Opens side menu.
         *
         * @since 1.0.0
         */
        $('#js-buttonOpenSideMenu').on('click', function () {
            primaryNavigation.addClass('active');
            siteOverlay.addClass('site-overlay_active');
        });

        /**
         * Closes side menu.
         *
         * @since 1.0.0
         */
        $('#js-buttonCloseSideMenu').on('click', function () {
            primaryNavigation.removeClass('active');
            siteOverlay.removeClass('site-overlay_active');
        });

        /**
         * Opens submenu.
         *
         * @since 1.0.0
         */
        $(primaryNavigation).on('click', '.js-showSubmenu', function () {
            $(this).prev().addClass('active');
        });

        /**
         * Closes submenu.
         *
         * @since 1.0.0
         */
        $(primaryNavigation).on('click', '.js-closeSubmenu', function () {
            $(this).parent().removeClass('active');
        });

    } else {
        $('#js-buttonOpenSideMenu').hide();
    }

    /**
     * Clicks on site overlay.
     *
     * @since 1.0.0
     */
    $(siteOverlay).on('click', function () {

        if (primaryNavigation.length) {
            // Closes side menu.
            primaryNavigation.removeClass('active');
            primaryNavigation.find('.sub-menu').each(function () {
                $(this).removeClass('active');
            });
        }

        // Hides overlay.
        siteOverlay.removeClass('site-overlay_active');
    });

    /**
     * Presses footer to the bottom of window.
     *
     * @since 1.0.0
     */
    $(window).on('load resize', function () {
        const headerHeight = $('#js-siteHeader').outerHeight(true),
            footerHeight = $('#js-siteFooter').outerHeight(true),
            adminbarHeight = $('#wpadminbar').outerHeight(true),
            minHeight = $(window).innerHeight() - (headerHeight + footerHeight + adminbarHeight) + 'px';

        $('#js-siteContent').css('min-height', minHeight);
    });

    /**
     * Ajax loads posts.
     *
     * @since 1.0.0
     */

    $('#js-loadMorePosts:not(.is_loading)').on('click', function (event) {

        event.preventDefault();

        const element = $(this),
            postsWrapper = $('#js-postsWrapper'),
            themePostPaginationVars = window.theme_post_pagination_vars,
            query = themePostPaginationVars.query,
            maxPages = parseInt(themePostPaginationVars.max_page),
            moreText = element.text();

        let currentPage = themePostPaginationVars.current_page;

        element.addClass('is_loading').text(window.theme_vars.i18n.button_loading_text);

        $.ajax({
            url: window.theme_vars.ajaxurl,
            data: {
                'action': 'load_more_posts',
                'query': query,
                'page': currentPage
            },
            type: 'POST',

            success: function (data) {

                element.removeClass('is_loading').text(moreText);

                if (data.length > 0) {
                    postsWrapper.append(data);
                }

                currentPage++;

                window.theme_post_pagination_vars.current_page = currentPage;

                if (currentPage === maxPages) {
                    element.hide();
                } else {
                    element.show().blur();
                }
            },

            error: function (request, textStatus, errorThrown) {
                console.log(request);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });

    });

})(jQuery, window, document);
