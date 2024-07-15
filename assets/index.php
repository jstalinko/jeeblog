<?php

/**
 * *************************************************
 * JEEBLOG - create free blog zero configuration
 * @author JeeBlog Team.
 * @copyright 2024
 * *************************************************
 **/


/**
 *                                                  
 *   mmm  mmmmmm mmmmmm mmmmm  m       mmmm    mmm 
 *     #  #      #      #    # #      m"  "m m"   "
 *     #  #mmmmm #mmmmm #mmmm" #      #    # #   mm
 *     #  #      #      #    # #      #    # #    #
 * "mmm"  #mmmmm #mmmmm #mmmm" #mmmmm  #mm#   "mmm"
 *                                                
 */

/** ASSETS CALLERZ */
require_once '../app/const.php';
require_once '../app/fun.php';

if (isset_get('theme')) {
    $src = request_get_value('src');
    $theme = request_get_value('theme');
    $path = THEME_PATH . DIRECTORY_SEPARATOR . $theme . DIRECTORY_SEPARATOR . $src;
    if (file_exists($path)) {
        asset_header($path);
        echo file_get_contents($path);
        exit;
    } else {
        @header('HTTP/1.1 404 Not Found');
        die("404 Not found");
    }
} else if (isset_get('plugin')) {
    $src = request_get_value('src');
    $theme = request_get_value('theme');
    $path = PLUGIN_PATH . DIRECTORY_SEPARATOR . $theme . DIRECTORY_SEPARATOR . $src;

    if (file_exists($path)) {
        asset_header($path);
        echo file_get_contents($path);
        exit;
    } else {
        @header('HTTP/1.1 404 Not Found');
        die("404 Not found");
    }
} else {

    @header('HTTP/1.1 404 Not Found');
    die("404 Not found");
}
?>
<pre>
/**
 *                                                  
 *   mmm  mmmmmm mmmmmm mmmmm  m       mmmm    mmm 
 *     #  #      #      #    # #      m"  "m m"   "
 *     #  #mmmmm #mmmmm #mmmm" #      #    # #   mm
 *     #  #      #      #    # #      #    # #    #
 * "mmm"  #mmmmm #mmmmm #mmmm" #mmmmm  #mm#   "mmm"
 *                                                
 */
</pre>