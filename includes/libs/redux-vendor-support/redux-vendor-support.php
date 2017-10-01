<?php
    /**
     * The Redux Framework Plugin
     * A simple, truly extensible and fully responsive options framework
     * for WordPress themes and plugins. Developed with WordPress coding
     * standards and PHP best practices in mind.
     * @copyright       2012-2015 Redux Framework
     */

// Exit if accessed directly
    if ( ! defined( 'ABSPATH' ) ) {
        die;
    }

    if ( ! class_exists( 'ReduxFramework_extension_vendor_support' ) ) {
        if ( file_exists( dirname( __FILE__ ) . '/vendor_support/extension_vendor_support.php' ) ) {
            require dirname( __FILE__ ) . '/vendor_support/extension_vendor_support.php';
            new ReduxFramework_extension_vendor_support();
        }
    }