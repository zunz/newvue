<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

include ( trailingslashit( get_template_directory() ).'includes/acf/acf-config.php' );
include ( trailingslashit( get_template_directory() ).'includes/config.php' );
include ( trailingslashit( get_template_directory() ).'includes/custom-functions.php' );
include ( trailingslashit( get_template_directory() ).'includes/gravityform-settings.php' );
include ( trailingslashit( get_template_directory() ).'includes/custom-posts-and-taxonomies.php' );
include ( trailingslashit( get_template_directory() ).'includes/class-sidebar-nav-walker.php' );
include ( trailingslashit( get_template_directory() ).'includes/custom-shortcodes.php' );