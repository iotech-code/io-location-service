<?php
/*
Plugin Name: iO Location Service
Plugin URI: https://iotech.co.th/opensource/location-service/
Description: Insert the location check field to anywhere you want to use such as woocommerce checkout page theme to confirm the location of your customer.
Version: 1.2
Author: iOTech Enterprise
Author URI: https://iotech.co.th
License: GNU2.0
Domain Path:  /languages

README:
This plugin is allow to load by many method.
- Shortcode io_location_field.
- Action io_location_field_form.
- Autoload on page load display under div class io_confirm_my_location and require text field or hidden field named, value or id latitude_io and longitude_io.

Required:
- GSP Permission must allowed on the device.
*/

defined ( 'ABSPATH' ) or die ( "No direct script access allowed." );

add_shortcode( 'io_location_field', 'io_the_location_field_form');
add_action('io_location_field_form', 'io_the_location_field_form');

function io_the_location_field_form() {
    echo '
    <p class="form-row form-row-wide openmap-button" data-priority="100">
        <label>
            <a onclick="io_getLocation()" class="iolabel io_location_button">กรุณายืนยันที่อยู่</a> 
            <span id="io-error-text"></span>
        </label>
        <div id="io-spinner" class="spinner">
            <div class="loading-object">
                <div class="cp-spinner cp-hue"></div> 
                <span class="iolabel"></span>
            </div>
        </div>
    </p>
    <input type="text" name="latitude" placeholder="Latitude" id="latitude_io">
    <input type="text" name="longitude" placeholder="Longitude" id="longitude_io">';
}

add_action('wp_head','io_include_dependency');
add_action('wp_footer', 'io_include_ft_dependency');
function io_include_dependency() {
    echo  '<link rel="stylesheet" href="'.plugins_url('io-location-service/assets/spinner/csspin.css').'"/>';
    echo '<link rel="stylesheet" id="iOTech-location" href="' .plugins_url('io-location-service/assets/style.css'). '" type="text/css">';
}

function io_include_ft_dependency() {
    echo '<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>';
    echo '<script src="' . plugins_url('io-location-service/assets/add_action.js') . '"></script>';
}