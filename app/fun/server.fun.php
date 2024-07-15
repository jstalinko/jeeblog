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
