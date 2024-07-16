<?php

/**
 * *************************************************
 * JEEBLOG - create free blog zero configuration
 * @author JeeBlog Team.
 * @copyright 2024
 * *************************************************
 **/

// Path : app/common.fun.php



/**
 * Reads the content of a JSON file and decodes it into an associative array.
 *
 * @param string $filePath The path to the JSON file.
 * @return array The decoded JSON data as an associative array.
 */
function read_json($filePath)
{
    if (!file_exists($filePath)) {
        return [];
    }
    $jsonContent = file_get_contents($filePath);
    $data = json_decode($jsonContent, true);
    return $data ? $data : [];
}

/**
 * Encodes an associative array into JSON and writes it to a file.
 *
 * @param string $filePath The path to the JSON file.
 * @param array $data The associative array to encode and write.
 * @return bool True if the file was written successfully, false otherwise.
 */
function write_json($filePath, $data)
{
    $jsonContent = json_encode($data, JSON_PRETTY_PRINT);
    return file_put_contents($filePath, $jsonContent) !== false;
}

/**
 * Adds multiple key-value pairs to a JSON file.
 *
 * @param string $filePath The path to the JSON file.
 * @param array $keyValuePairs The associative array of key-value pairs to add.
 * @return bool True if the key-value pairs were added successfully, false otherwise.
 */
function merge_json($filePath, $keyValuePairs)
{
    // Read the existing data from the JSON file
    $data = read_json($filePath);

    // Add or update the key-value pairs
    foreach ($keyValuePairs as $key => $value) {
        $data[$key] = $value;
    }

    // Write the updated data back to the JSON file
    return write_json($filePath, $data);
}

function asset_header($path)
{
    $extension = pathinfo($path, PATHINFO_EXTENSION);
    switch ($extension) {
        case 'css':
            header('Content-Type: text/css');
            break;
        case 'js':
            header('Content-Type: application/javascript');
            break;
        case 'json':
            header('Content-Type: application/json');
            break;
        case 'jpg':
        case 'jpeg':
            header('Content-Type: image/jpeg');
            break;
        case 'png':
            header('Content-Type: image/png');
            break;
        case 'gif':
            header('Content-Type: image/gif');
            break;
        case 'svg':
            header('Content-Type: image/svg+xml');
            break;
        default:
            header('Content-Type: text/plain');
    }
}

/**
 * Generates a URL for accessing theme assets.
 *
 * @param string $theme The name of the theme.
 * @param string $src The path to the asset within the theme.
 * @return string The generated URL for the asset.
 */
function asset_theme($theme, $src)
{
    // Base URL for the assets script
    $baseUrl = '/assets/';

    // Build query string with the theme and src parameters
    $queryString = http_build_query([
        'theme' => $theme,
        'src' => $src
    ]);

    // Return the complete URL
    return $baseUrl . '?' . $queryString;
}

/**
 * Generates a URL for accessing plugin assets.
 *
 * @param string $plugin The name of the plugin.
 * @param string $src The path to the asset within the plugin.
 * @return string The generated URL for the asset.
 */
function asset_plugin($plugin, $src)
{
    // Base URL for the assets script
    $baseUrl = '/assets/';

    // Build query string with the plugin and src parameters
    $queryString = http_build_query([
        'plugin' => $plugin,
        'src' => $src
    ]);

    // Return the complete URL
    return $baseUrl . '?' . $queryString;
}

function route_dispatch($defaultPath, $state = 'index')
{
    $state = ($state == '') ? 'index': $state;
    $files = $defaultPath.'/'.$state.'.php';
    if(!file_exists($files)) die("Route not found : " .$files);

    require_once $files;
}
