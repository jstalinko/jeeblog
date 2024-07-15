
<?php

/**
 * *************************************************
 * JEEBLOG - create free blog zero configuration
 * @author JeeBlog Team.
 * @copyright 2024
 * *************************************************
 **/

// Path : app/client.php


/**
 * Retrieves the domain name from the current HTTP request.
 *
 * @return string The domain name of the current HTTP request.
 * @throws Exception If the domain name cannot be determined.
 */
function web_domain()
{

    if (isset($_SERVER['HTTP_HOST'])) {
        // Return the value of HTTP_HOST
        return $_SERVER['HTTP_HOST'];
    } else {
        $url = parse_url($_SERVER['REQUEST_URI']);
        if (isset($url['host'])) {
            return $url['host'];
        } else {
            throw new Exception("Invalid URL: Host component missing.");
        }
    }
}

/**
 * Retrieves the IP address of the user making the current request.
 *
 * @return string The IP address of the user.
 */
function get_user_ip() {
    // Check for shared internet/ISP IP address
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for IPs passing through proxies
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Sometimes, HTTP_X_FORWARDED_FOR can contain multiple IP addresses. 
        // This extracts the first IP address in the list.
        $ip_list = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim($ip_list[0]);
    }
    // Return the remote address IP
    if (!empty($_SERVER['REMOTE_ADDR'])) {
        return $_SERVER['REMOTE_ADDR'];
    }
    // If IP address is not found, return unknown
    return '0.0.0.0';
}

/**
 * Retrieves the User-Agent string from the current HTTP request.
 *
 * @return string The User-Agent string.
 */
function get_user_agent() {
    // Check if the User-Agent header is set
    if (!empty($_SERVER['HTTP_USER_AGENT'])) {
        return $_SERVER['HTTP_USER_AGENT'];
    }
    // Return unknown if User-Agent is not set
    return 'UNKNOWN';
}

/**
 * Determines the device type based on the User-Agent string.
 *
 * @return string The device type (e.g., 'Mobile', 'Tablet', 'Desktop').
 */
function get_device() {
    $user_agent = get_user_agent();
    // Check for mobile devices
    if (preg_match('/Mobile|Android|BlackBerry|IEMobile|Opera Mini|iPhone|iPad/i', $user_agent)) {
        return 'Mobile';
    }
    // Check for tablets
    if (preg_match('/Tablet|iPad/i', $user_agent)) {
        return 'Tablet';
    }
    // Default to desktop
    return 'Desktop';
}

/**
 * Determines the platform/operating system based on the User-Agent string.
 *
 * @return string The platform/operating system (e.g., 'Windows', 'Mac', 'Linux', 'Android', 'iOS').
 */
function get_platform() {
    $user_agent = get_user_agent();
    // Check for platforms/operating systems
    if (preg_match('/Windows NT/i', $user_agent)) {
        return 'Windows';
    }
    if (preg_match('/Mac OS X/i', $user_agent)) {
        return 'Mac';
    }
    if (preg_match('/Linux/i', $user_agent)) {
        return 'Linux';
    }
    if (preg_match('/Android/i', $user_agent)) {
        return 'Android';
    }
    if (preg_match('/iPhone|iPad|iPod/i', $user_agent)) {
        return 'iOS';
    }
    // Default to unknown platform
    return 'UNKNOWN';
}
