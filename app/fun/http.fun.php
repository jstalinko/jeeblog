
<?php

/**
 * *************************************************
 * JEEBLOG - create free blog zero configuration
 * @author JeeBlog Team.
 * @copyright 2024
 * *************************************************
 **/

// Path : app/http.php
// "Lazy programmers solve problems twice: once when they create the bug and once when they fix it." — Unknown



/**
 * Perform an HTTP request using cURL.
 *
 * @param string $url The URL to request.
 * @param string $method The HTTP method to use (GET, POST, PUT, DELETE). Default is GET.
 * @param array|string|null $data The data to send with the request (for POST and PUT). Default is null.
 * @param array $headers An array of headers to send with the request. Default is an empty array.
 * @return array An array containing the HTTP status code and the response body.
 * @throws Exception If there is a cURL error.
 */
function http($url, $method = 'GET', $data = null, $headers = [])
{
    $ch = curl_init();

    // Set URL
    curl_setopt($ch, CURLOPT_URL, $url);

    // Set HTTP method
    switch (strtoupper($method)) {
        case 'POST':
            curl_setopt($ch, CURLOPT_POST, true);
            if ($data) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            if ($data) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            }
            break;
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
            break;
        default:
            // Default is GET, no need to set
            break;
    }

    // Set headers
    if ($headers) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    // Set options to return the response as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL error: $error_msg");
    }

    // Get HTTP response code
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL resource
    curl_close($ch);

    return [
        'status_code' => $http_code,
        'response' => $response
    ];
}


/**
 * Perform an HTTP GET request using cURL.
 *
 * @param string $url The URL to request.
 * @param array $headers An array of headers to send with the request. Default is an empty array.
 * @return array An array containing the HTTP status code and the response body.
 * @throws Exception If there is a cURL error.
 */
function http_get($url, $headers = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL error: $error_msg URL $url");
    }

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'status_code' => $http_code,
        'response' => $response
    ];
}

/**
 * Perform an HTTP POST request using cURL.
 *
 * @param string $url The URL to request.
 * @param array|string|null $data The data to send with the request. Default is null.
 * @param array $headers An array of headers to send with the request. Default is an empty array.
 * @return array An array containing the HTTP status code and the response body.
 * @throws Exception If there is a cURL error.
 */
function http_post($url, $data = null, $headers = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if (!empty($data)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL error: $error_msg");
    }

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'status_code' => $http_code,
        'response' => $response
    ];
}

/**
 * Perform an HTTP PUT request using cURL.
 *
 * @param string $url The URL to request.
 * @param array|string|null $data The data to send with the request. Default is null.
 * @param array $headers An array of headers to send with the request. Default is an empty array.
 * @return array An array containing the HTTP status code and the response body.
 * @throws Exception If there is a cURL error.
 */
function http_put($url, $data = null, $headers = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if (!empty($data)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL error: $error_msg");
    }

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'status_code' => $http_code,
        'response' => $response
    ];
}

/**
 * Perform an HTTP DELETE request using cURL.
 *
 * @param string $url The URL to request.
 * @param array $headers An array of headers to send with the request. Default is an empty array.
 * @return array An array containing the HTTP status code and the response body.
 * @throws Exception If there is a cURL error.
 */
function http_delete($url, $headers = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL error: $error_msg");
    }

    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return [
        'status_code' => $http_code,
        'response' => $response
    ];
}

/**
 * Perform an HTTP REQUEST API using cURL.
 *
 * @param string $url The URL to request.
 * @param array $headers An array of headers to send with the request. Default is an empty array.
 * @return array An array containing the HTTP status code and the response body.
 * @throws Exception If there is a cURL error.
 */
function http_api($endpoint,$method = 'GET' , $data = [])
{
    defined('API_URL') or die("API_URL Not defined");
    $api = API_URL.'/'.$endpoint;
    $headers = [
        'User-Agent: JeeBlog@'.DOMAIN,
        'X-Request-Domain: '.DOMAIN,
        'X-Signature: '.sha1(DOMAIN) 
    ];

    if($method == 'GET')
    {
        return http_get($api,$headers);
    }else if($method == 'POST')
    {
        return http_post($api,$data,$headers);
    }

    return null;
}