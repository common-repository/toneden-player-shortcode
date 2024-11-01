<?php
/*
Plugin Name: ToneDen Player Shortcode
Plugin URI: http://wordpress.org/extend/plugins/toneden-player-shortcode/
Description: Enables shortcode to embed the ToneDen player in WordPress blogs.
Version: 0.1
Author: ToneDen, Inc.
Author URI: https://www.toneden.io
License: GPLv2
*/

add_shortcode("tonedenplayer", "tonedenplayer_shortcode");

/**
 * ToneDen Player shortcode handler
 * @param {string|array} $atts The attributes passed to the shortcode like [tonedenplayer attr1="value" /].
 * @param {string} $content  The content between non-self closing [tonedenplayer]...[/tonedenplayer] tags.
 * @return {string} HTML code to output.
 */
function tonedenplayer_shortcode($atts, $content = null) {
    $atts = shortcode_atts(array(
        'debug' => 'false', // Output debug messages?
        'dom' => '',
        'keyboardevents' => 'false', // Should we listen to keyboard events?
        'urls' => '',
        'single' => 'null',
        'skin' => 'light',
        'staticurl' => '//sd.toneden.io/',
        'tracksperartist' => 10, // How many tracks to load when given an artist SoundCloud URL.
        'visualizer' => 'true',
        'visualizertype' => 'waves', // Equalizer type. 'waves' or 'bars'
        'mini' => 'false'
    ), $atts);

    extract($atts);

    if($content) {
        $urls = $content;
    }

    if(!$urls) {
        return '';
    }

    // Clean inputs and convert them to valid values.
    $debug = booleanize_string($debug);
    $dom = clean_string($dom);
    $keyboardevents = booleanize_string($keyboardevents);
    $urls = clean_string($urls);
    $single = parse_null_boolean($single);
    $skin = clean_string($skin);
    $staticurl = clean_string($staticurl);
    $tracksperartist = numberize_string($tracksperartist, 10);
    $visualizer = booleanize_string($visualizer);
    $visualizertype = clean_string($visualizertype);
    $mini = booleanize_string($mini);

    if($debug === 'true') {
        $loaderUrl = '//sd.toneden.io/dev/toneden.loader.js';
    } else {
        $loaderUrl = '//sd.toneden.io/production/toneden.loader.js';
    }

    $urls = '"' . implode('","', explode(',', $urls)) . '"';

    $embed = sprintf('<script type="text/javascript">(function() {var script = document.createElement("script");script.type = "text/javascript";script.async = true;script.src = "%s";var entry = document.getElementsByTagName("script")[0];entry.parentNode.insertBefore(script, entry);}());ToneDenReady = window.ToneDenReady || [];ToneDenReady.push(function() {ToneDen.player.create({debug:%s,dom:"%s",keyboardEvents:%s,urls:[%s],single:%s,skin:"%s",staticUrl:"%s",tracksPerArtist:%s,visualizer:%s,visualizerType:"%s",mini:%s});});</script>',
        $loaderUrl, $debug, $dom, $keyboardevents, $urls, $single, $skin, $staticurl, $tracksperartist, $visualizer, $visualizertype, $mini);

    return $embed;
}

/**
 * Removes single and double quotes, as well as any HTML tags.
 */
function clean_string($value) {
    $value = str_replace("'", '', $value);
    $value = str_replace('"', '', $value);
    $value = strip_tags($value);

    return $value;
}

/**
 * Takes a string and returns 'null' if it is null, otherwise booleanizes it.
 */
function parse_null_boolean($value) {
    if($value === 'null') {
        return 'null';
    } else {
        return booleanize_string($value);
    }
}

/**
 * Converts strings into Boolean strings, either 'true' or 'false'.
 */
function booleanize_string($value) {
    if($value === 'true') {
        return 'true';
    } else {
        return 'false';
    }
}

/**
 * Converts strings into numerical strings. If they cannot be converted, returns default.
 */
function numberize_string($value, $default = 0) {
    if(is_numeric($value)) {
        return $value;
    } else {
        return $default;
    }
}

?>
