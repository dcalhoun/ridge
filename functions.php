<?php
/**
 * Ridge functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ridge
 * @since Ridge 1.0
 */

if (!function_exists("ridge_setup")):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * @since Ridge 1.0
     *
     * @return void
     */
    function ridge_setup() {
        // Enqueue editor styles.
        add_editor_style("style.css");

        // Add support for Global Style settings.
        add_theme_support("appearance-tools");
    }
endif;

add_action("after_setup_theme", "ridge_setup");

if (!function_exists("ridge_styles")):
    /**
     * Enqueue styles.
     *
     * @since Ridge 1.0
     *
     * @return void
     */
    function ridge_styles() {
        $theme_version = wp_get_theme()->get("Version");
        $version_string = is_string($theme_version) ? $theme_version : false;

        // Register theme stylesheet.
        wp_register_style(
            "ridge-style",
            get_template_directory_uri() . "/style.css",
            [],
            $version_string,
        );

        // Enqueue theme stylesheet.
        wp_enqueue_style("ridge-style");
    }
endif;

add_action("wp_enqueue_scripts", "ridge_styles");

if (!function_exists("ridge_add_preconnect_links")):
    /**
     * Add preconnect links for Google Fonts.
     *
     * @since Ridge 1.0
     *
     * @return void
     */
    function ridge_add_preconnect_links() {
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    }
endif;

add_action("wp_head", "ridge_add_preconnect_links");

if (!function_exists("ridge_load_fonts")):
    /**
     * Enqueue Google Fonts.
     *
     * @since Ridge 1.0
     *
     * @return void
     */
    function ridge_load_fonts() {
        wp_enqueue_style(
            "ridge-fonts",
            "https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,700;1,6..72,400;1,6..72,700&display=swap",
            [],
            null,
        );
        wp_enqueue_style(
            "ridge-fonts",
            "https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap",
            [],
            null,
        );
    }
endif;

add_action("wp_enqueue_scripts", "ridge_load_fonts");

if (!function_exists("ridge_disable_emojis")):
    /**
     * Disable the emoji script and styles.
     *
     * @since Ridge 1.0
     *
     * @return void
     */
    function ridge_disable_emojis() {
        remove_action("wp_head", "print_emoji_detection_script", 7);
        remove_action("admin_print_scripts", "print_emoji_detection_script");
        remove_action("wp_print_styles", "print_emoji_styles");
        remove_action("admin_print_styles", "print_emoji_styles");
        remove_filter("the_content_feed", "wp_staticize_emoji");
        remove_filter("comment_text_rss", "wp_staticize_emoji");
        remove_filter("wp_mail", "wp_staticize_emoji_for_email");
        add_filter(
            "wp_resource_hints",
            "disable_emojis_remove_dns_prefetch",
            10,
            2,
        );
    }
endif;

add_action("init", "ridge_disable_emojis");

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
    if ("dns-prefetch" == $relation_type) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters(
            "emoji_svg_url",
            "https://s.w.org/images/core/emoji/2/svg/",
        );

        $urls = array_diff($urls, [$emoji_svg_url]);
    }

    return $urls;
}

if (!function_exists("ridge_block_styles")):
    /**
     * Register block styles.
     *
     * @since Ridge 1.0
     *
     * @return void
     */
    function ridge_block_styles() {
        if (!function_exists("register_block_style")) {
            return;
        }

        register_block_style("core/post-excerpt", [
            "name" => "sans-link",
            "label" => __("Sans Link", "ridge"),
            "inline_style" =>
                ".wp-block-post-excerpt.is-style-sans-link .wp-block-post-excerpt__more-text { display: none; }",
        ]);

        register_block_style("core/post-navigation-link", [
            "name" => "bar",
            "label" => __("Bar", "ridge"),
            "style_handle" => "ridge-style",
        ]);
    }
endif;

add_action("init", "ridge_block_styles");

if (!function_exists("ridge_code_block_tabindex")):
    /**
     * Enable code block focus, allowing scrolling for keyboard users.
     *
     * @param string $block_content The block content.
     * @return string The updated block content.
     */
    function ridge_code_block_tabindex($block_content) {
        $content = new WP_HTML_Tag_Processor($block_content);
        $content->next_tag();
        $content->set_attribute("tabindex", 0);
        return $content->get_updated_html();
    }
endif;

add_filter("render_block_core/code", "ridge_code_block_tabindex");

if (!function_exists("ridge_no_likes_headline")):
    /**
     * Disable Jetpack sharing headline.
     *
     * @param string $headline The headline.
     * @param string $title The title.
     * @param string $module The module.
     * @return string The headline.
     */
    function ridge_no_likes_headline($headline, $title, $module) {
        if ("likes" === $module) {
            return "";
        }

        return $heading;
    }
endif;

add_filter("jetpack_sharing_headline_html", "ridge_no_likes_headline", 10, 3);
