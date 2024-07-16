<?php
/**
 * *************************************************
 * JEEBLOG - create free blog zero configuration
 * @author JeeBlog Team.
 * @copyright 2024
 * *************************************************
 **/

// Path : app/data.fun.php

/**
 * Load data from the JSON file and remove expired entries.
 *
 * @param string $file_path The path to the JSON file.
 * @return array The data array with expired entries removed.
 */
function load_data($file_path)
{
    if (file_exists($file_path)) {
        $data = json_decode(file_get_contents($file_path), true);
        return remove_expired_data($data);
    }
    return [];
}

/**
 * Save data to the JSON file.
 *
 * @param string $file_path The path to the JSON file.
 * @param array $data The data array to save.
 */
function save_data($file_path, $data)
{
    file_put_contents($file_path, json_encode($data, JSON_PRETTY_PRINT));
}

/**
 * Set a key-value pair in the data array with an expiration timestamp.
 *
 * @param string $file_path The path to the JSON file.
 * @param string $key The key for the data entry.
 * @param mixed $value The value for the data entry.
 * @param int $expiration_in_seconds The expiration time in seconds.  default 24 hours within 86400 seconds.
 */
function set_data($file_path, $key, $value, $expiration_in_seconds = 86400)
{
    $data = load_data($file_path);
    $data[$key] = [
        'value' => $value,
        'expires_at' => time() + $expiration_in_seconds
    ];
    save_data($file_path, $data);
}

/**
 * Get a value from the data array if it hasn't expired.
 *
 * @param string $file_path The path to the JSON file.
 * @param string $key The key for the data entry.
 * @return mixed|null The value of the data entry or null if expired or not found.
 */
function get_data($file_path, $key)
{
    $data = load_data($file_path);
    if (isset($data[$key])) {
        if ($data[$key]['expires_at'] > time()) {
            return $data[$key]['value'];
        } else {
            delete_data($file_path, $key);
        }
    }
    return null;
}

/**
 * Delete a specific key-value pair from the data array.
 *
 * @param string $file_path The path to the JSON file.
 * @param string $key The key for the data entry.
 */
function delete_data($file_path, $key)
{
    $data = load_data($file_path);
    unset($data[$key]);
    save_data($file_path, $data);
}

/**
 * Remove expired entries from the data array.
 *
 * @param array $data The data array.
 * @return array The data array with expired entries removed.
 */
function remove_expired_data($data)
{
    foreach ($data as $key => $item) {
        if ($item['expires_at'] <= time()) {
            unset($data[$key]);
        }
    }
    return $data;
}

/**
 * Get all data from the JSON file after removing expired entries.
 *
 * @param string $file_path The path to the JSON file.
 * @return array The data array.
 */
function get_all_data($file_path)
{
    return load_data($file_path);
}


function get_posts()
{
    $data_path = DATA_PATH.'/posts.json';
    $load_data = load_data($data_path);
    if(count($load_data) < 1)
    {
        $posts = http_api('post');
        if($posts['status_code'] == 200 )
        {
            set_data($data_path ,'posts' , json_decode($posts['response']));
        }
    }

    return get_data($data_path , 'posts');
}