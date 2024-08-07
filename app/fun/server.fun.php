<?php

/**
 * *************************************************
 * JEEBLOG - create free blog zero configuration
 * @author JeeBlog Team.
 * @copyright 2024
 * *************************************************
 **/

// Path : app/server.php
// "Lazy programmers solve problems twice: once when they create the bug and once when they fix it." — Unknown

/**
 * Check if the current request method is GET.
 *
 * @return bool True if the request method is GET, false otherwise.
 */
function is_request_get()
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

/**
 * Check if the current request method is POST.
 *
 * @return bool True if the request method is POST, false otherwise.
 */
function is_request_post()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Check if the current request method is neither GET nor POST.
 *
 * @return bool True if the request method is neither GET nor POST, false otherwise.
 */
function is_request_any()
{
    $method = $_SERVER['REQUEST_METHOD'];
    return $method !== 'GET' && $method !== 'POST';
}

/**
 * Get a value from the GET request.
 *
 * @param string $key The key to look for in the GET request.
 * @param mixed $default The default value to return if the key is not found. Default is null.
 * @return mixed The value from the GET request or the default value.
 */
function request_get_value($key, $default = null)
{
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

/**
 * Get a value from the POST request.
 *
 * @param string $key The key to look for in the POST request.
 * @param mixed $default The default value to return if the key is not found. Default is null.
 * @return mixed The value from the POST request or the default value.
 */
function request_post_value($key, $default = null)
{
    return isset($_POST[$key]) ? $_POST[$key] : $default;
}


/**
 * Reads configuration from jeeblog.json and returns as array.
 *
 * @param string|null $key Optional. The key to fetch from config array.
 *                         If null, prints all config; if defined, returns the value.
 * @return mixed|null Returns the config value for $key if defined, otherwise null.
 * @throws Exception Throws exception if jeeblog.json file is not found.
 */
function config($key = null)
{
    // Path to your configuration file
    $configFile = ROOT_PATH . '/jeeblog.json';

    // Check if the config file exists
    if (file_exists($configFile)) {
        // Read the JSON file
        $config = file_get_contents($configFile);

        // Parse JSON string to array
        $configArray = json_decode($config, true);

        // If $key is null, print all config; otherwise, return the value for the key
        if ($key === null) {
            print_r($configArray); // Or you can return $configArray; for printing purposes
        } else {
            return isset($configArray[$key]) ? $configArray[$key] : null;
        }
    } else {
        throw new Exception('Config file ' . $configFile . ' not found.');
    }
}
/**
 * Sets a session variable.
 *
 * @param string $key The key for the session variable.
 * @param mixed $value The value to store in the session variable.
 */
function set_session($key, $value)
{
    // Assign the value to the session variable with the given key
    $_SESSION[$key] = $value;
}

/**
 * Gets a session variable.
 *
 * @param string $key The key for the session variable.
 * @return mixed|null The value of the session variable, or null if it doesn't exist.
 */
function get_session($key)
{
    // Check if the session variable with the given key exists and return its value
    return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
}

/**
 * Removes a session variable.
 *
 * @param string $key The key for the session variable to remove.
 */
function remove_session($key)
{
    // Check if the session variable with the given key exists
    if (isset($_SESSION[$key])) {
        // Unset the session variable
        unset($_SESSION[$key]);
    }
}
/**
 * Clears all session variables.
 */
function clear_session()
{
    // Unset all session variables
    session_unset();
}
/**
 * Destroys the session.
 */
function destroy_session()
{
    // Unset all session variables
    session_unset();
    // Destroy the session
    session_destroy();
}

/**
 * Checks if a GET parameter is set and not null.
 *
 * @param string $key The key of the GET parameter.
 * @return bool True if the GET parameter is set and not null, false otherwise.
 */
function isset_get($key)
{
    return isset($_GET[$key]);
}

/**
 * Checks if a POST parameter is set and not null.
 *
 * @param string $key The key of the POST parameter.
 * @return bool True if the POST parameter is set and not null, false otherwise.
 */
function isset_post($key)
{
    return isset($_POST[$key]);
}

/**
 * Checks if a GET parameter is either not set or empty.
 *
 * @param string $key The key of the GET parameter.
 * @return bool True if the GET parameter is not set or empty, false otherwise.
 */
function empty_get($key)
{
    return empty($_GET[$key]);
}

/**
 * Checks if a POST parameter is either not set or empty.
 *
 * @param string $key The key of the POST parameter.
 * @return bool True if the POST parameter is not set or empty, false otherwise.
 */
function empty_post($key)
{
    return empty($_POST[$key]);
}
