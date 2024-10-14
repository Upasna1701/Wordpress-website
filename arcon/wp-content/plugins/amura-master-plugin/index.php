<?php
/**
 * Plugin Name: Amura Master Plugins
 * Description: Install Required Plugins.
 * Version: 1.0
 * Author: Nigam Pardhi
 * Text Domain: amura-master-plugin
*/

// Function to install and activate plugins.
function install_and_activate_required_plugins() {
    $plugins = array(
        'wordpress-seo',
        'contact-form-7',
        'wp-mail-smtp',
        'all-in-one-wp-migration',
        'custom-post-type-ui',
        'sucuri-scanner',   
        'svg-support',
        'wps-hide-login',
        'autoptimize',
        'contact-form-cfdb7',
        'permalink-manager',
    );

    // Install and activate the specified plugins.
    foreach ($plugins as $plugin) {
        $install = shell_exec("wp plugin install $plugin --activate");
        if (strpos($install, 'Success') === false) {
            error_log("Failed to install and activate plugin: $plugin");
        }
    }
}

// Hook the installation function to the activation of this plugin.
register_activation_hook(__FILE__, 'install_and_activate_required_plugins');
